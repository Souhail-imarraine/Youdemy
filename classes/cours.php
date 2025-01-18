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

    public function selectAllCourses(){
        $query = "SELECT * FROM cours";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
