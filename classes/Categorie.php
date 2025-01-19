<?php
class Categorie {
    public int $id;
    public string $name;
    private $connexion;
    public function __construct($pdo) {
        $this->connexion = $pdo;
    }

    public function createCategory(){
    }

    public function deleteCategory(int $category_id){
        // Delete category logic
    }

    public function getAllCategories() {
            $query = "SELECT * FROM categorie";
            $stmt = $this->connexion->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}