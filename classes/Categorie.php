<?php
class Categorie {
    private  $id;
    private string $name;
    private $connexion;

    public function __construct($pdo) {
        $this->connexion = $pdo;
    }

    public function createCategory(string $value_Categorie){
        $query = "INSERT INTO categorie (name) VALUES (:name)";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute([':name' => $value_Categorie]);
        return true ;
    }

    public function deleteCategory(int $id){

    }

    public function getAllCategories() {
            $query = "SELECT * FROM categorie";
            $stmt = $this->connexion->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

}