<?php
require_once 'utilisateur.php';

class Administrateur extends Utilisateur {

    private $connexion ;

    public function __construct($connexion){
        $this->connexion = $connexion ;
    }
        
    public function validateTeacher($teacher_id){
    }

    public function getAllEtudiant(){
        $query = "SELECT u.nom, u.email, u.status, COUNT(c.id) AS total_cours_Inscription
                FROM utilisateur u 
                LEFT JOIN inscriptioncours inc ON u.id = inc.etudiant_id 
                LEFT JOIN cours c ON inc.cours_id = c.id 
                WHERE u.role = 'Etudiant'
                GROUP BY u.id
                ORDER BY total_cours_Inscription DESC;";

        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteEtudiant($student_id){
    }

    public function modifyEtudiant($student_id){
    }

    public function TotalCountTeachers(){
        $query = "SELECT COUNT(id) AS totalTeatcher FROM utilisateur WHERE role = 'Enseignant'";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTeachers()
    {
        $query = "SELECT COUNT(u.id) AS total_enseignant, u.id, u.nom, u.email, u.date_creation, u.status, COUNT(c.id) AS total_cours, COUNT(inc.id) as total_student 
                FROM utilisateur u
                LEFT JOIN cours c ON u.id = c.enseignant_id
                LEFT JOIN inscriptioncours inc ON c.id = inc.cours_id
                WHERE u.role = 'Enseignant'
                GROUP BY u.email
                ORDER BY u.date_creation DESC";

        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function banTeachers($teacher_id) {
        $query = 'UPDATE utilisateur SET status = :status WHERE id = :teacher_id AND role = :role';
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([
            ':status' => 'suspended',
            ':teacher_id' => $teacher_id,
            ':role' => 'Enseignant' 
        ]);
        return true;
    }
    

    public function deleteTeacher($teacher_id){
        $query = "DELETE FROM utilisateur WHERE id = :teacher_id AND role = 'Enseignant';";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([':teacher_id' => $teacher_id]);
        return true;
    }
    

    public function manageContent(){
    }

    public function getTotalCours() {
        $query = "SELECT COUNT(*) AS total_cours FROM cours";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_cours'];
    }
    public function getTotalEnseignants() {
        $query = "SELECT COUNT(*) AS total_enseignants FROM utilisateur WHERE role = 'Enseignant'";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_enseignants'] ?? 0;
    }

    public function getCoursesByCategory() {
        $query = "SELECT c.name AS categorie, COUNT(co.id) AS total_cours 
                    FROM categorie c
                    LEFT JOIN cours co ON c.id = co.categorie_id
                    GROUP BY c.name
                    ORDER BY total_cours DESC";
    
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getCourseWithMostStudents() {
            $query = "SELECT c.id, c.titre, c.Image_couverture AS image_cours, COUNT(ic.etudiant_id) AS total_etudiants 
                      FROM cours c
                      LEFT JOIN inscriptioncours ic ON c.id = ic.cours_id
                      GROUP BY c.id, c.titre
                      ORDER BY total_etudiants DESC
                      LIMIT 1";
    
            $stmt = $this->connexion->prepare($query);
            $stmt->execute();
    
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getTop3Enseignants(){
    $query = "
        SELECT u.id AS enseignant_id, u.nom AS enseignant_nom, COUNT(ic.etudiant_id) AS total_etudiants 
        FROM utilisateur u
        JOIN cours c ON u.id = c.enseignant_id
        LEFT JOIN inscriptioncours ic ON c.id = ic.cours_id
        WHERE u.role = 'Enseignant'
        GROUP BY u.id, u.nom
        ORDER BY total_etudiants DESC
        LIMIT 3;
    ";

    $stmt = $this->connexion->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}   

public function getCoursesWithTeachersAndCategories() {
    $query = "SELECT 
            c.Image_couverture AS image, 
            c.id, 
            c.titre, 
            u.nom, 
            ca.name AS categories
        FROM cours c
        INNER JOIN utilisateur u ON u.id = c.enseignant_id
        INNER JOIN categorie ca ON c.categorie_id = ca.id
        WHERE u.role = 'Enseignant'
        GROUP BY c.id, c.titre
        ORDER BY u.date_creation DESC
    ";

    $stmt = $this->connexion->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



public function getAllCategories() {
    $query = "SELECT * FROM categorie";
    $stmt = $this->connexion->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function securiterSession(){
    session_start();
    if(!isset($_SESSION) && $_SESSION['is_login'] != true ||  $_SESSION['role'] != 'Administrateur'){
        header('Location: ../signin.php');
        die();
    }
}

public function selectALLRequestPending() {
    $query = "SELECT id, nom, email, status FROM utilisateur WHERE role = :role";
    $stmt = $this->connexion->prepare($query); 
    $stmt->execute([':role' => 'Enseignant']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function selectALLutilisateur(){
    $query = "SELECT COUNT(id) AS total FROM utilisateur WHERE role = 'Enseignant' OR role = 'Etudiant';";
    $stmt = $this->connexion->query($query);
    return $stmt->fetchColumn();
}

public function acceptEnseignant($id_enseignant){
    $query = "UPDATE utilisateur SET status = :status WHERE id = :id_enseignant";
    $stmt = $this->connexion->prepare($query);
    $stmt->execute([
        ':status' => 'Active',
        ':id_enseignant' => $id_enseignant
    ]);
    return true;
}

public function debanUser($id_enseignant){
    $query = "UPDATE utilisateur SET status = :status WHERE id = :id_enseignant";
    $stmt = $this->connexion->prepare($query);
    $stmt->execute([
        ':status' => 'Active',
        ':id_enseignant' => $id_enseignant
    ]);
    return true;
}

}

?>