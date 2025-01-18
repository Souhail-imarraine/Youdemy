<?php

class Utilisateur {
    protected int $id;
    protected string $name;
    protected string $email;
    protected string $password;
    protected string $role;
    protected string $status = 'active'; 
    protected DateTime $created_at;
    private $errors = [];
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    /***** ==== register ====  *****/

    public function register($name, $email, $password, $role){
        if(empty($name)){
            array_push($this->errors, "Le nom d'utilisateur est requis");
            return false;
        } elseif(strlen($name) < 3 || strlen($name) > 20){
            array_push($this->errors, "Le nom d'utilisateur doit comporter entre 3 et 20 caracteres");
            return false;
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($this->errors, "Format d'email invalide");
            return false;
        } elseif(empty($password)){
            array_push($this->errors, "Le mot de passe est requis");
            return false;
        } elseif(strlen($password) < 6){
            array_push($this->errors, "Le mot de passe doit comporter au moins 6 caracteres");
            return false;
        }elseif(empty($role)){
            array_push($this->errors, "le role n'exist te pas");
            return false;
        }
        
        if(empty($this->errors)){
            $query = "SELECT * FROM utilisateur WHERE email = :email";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':email' => $email]);
            $userExists = $stmt->fetch(PDO::FETCH_ASSOC);
            if($userExists){
                array_push($this->errors, "Cet email est deja enregistre");
                return false;
            }else {
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                $query = "INSERT INTO utilisateur (nom, email, mot_de_passe, role, status) VALUES (:nom, :email, :mot_de_passe, :role, :status);";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([
                    ':nom' => $name,
                    ':email'=> $email,
                    ':mot_de_passe'=> $passwordHash,
                    'role' => $role,
                    ':status' => $this->status
                ]);
                return true;
            }
        }else {
            return false;
        }
    }


    /***** ==== sign in ====  *****/
    
    public function login($email, $password) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errors, "Format d'email invalide");
            return false;
        } elseif (empty($password)) {
            array_push($this->errors, "Le mot de passe est requis");
            return false;
        }
    
        if (empty($this->errors)) {
            $query = "SELECT * FROM utilisateur WHERE email = :email;";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':email' => $email]);
            $userExist = $stmt->fetch(PDO::FETCH_ASSOC); 
    
            if (!$userExist) {
                array_push($this->errors, "Cet email n'a pas ete trouve");
                return false;
            } else {
                if (password_verify($password, $userExist['mot_de_passe'])) {
                    session_start();
                    $_SESSION['is_login'] = true;
                    $_SESSION['id'] = $userExist['id'];
                    $_SESSION['role'] = $userExist['role'];
                    $_SESSION['nom'] = $userExist['nom'];
                    return true;
                } else {
                    array_push($this->errors, "Mot de passe invalide");
                    return false;
                }
            }
        }
    }
    

    public function getErrors(){
       return $this->errors;
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('location: index.php');
        exit();
    }
}