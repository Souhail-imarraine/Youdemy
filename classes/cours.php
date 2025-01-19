<?php

class Cours {
    protected int $id;
    protected string $titre;
    protected string $description;
    protected int $enseignant_id;
    protected int $category_id = 1;
    protected array $tags = [];
    protected string $imageCouverture;
    protected array $errors = [];
    protected $connection;

    public function __construct($pdo) {
        $this->connection = $pdo;
    }

    public function createCourse(){
    }

    public function deleteCours($cours_id){
        $query = "DELETE FROM cours WHERE id = :cours_id ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([':cours_id' => $cours_id]);
        return true;
    }


    public function selectAllCourses(){
        $query = "SELECT * FROM cours";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
