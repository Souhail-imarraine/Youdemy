<?php

class Cours {
    protected int $id;
    protected string $titre;
    protected string $description;
    protected int $enseignant_id;
    protected int $category_id;
    protected array $tags = [];
    protected string $imageCouverture;
    protected array $errors = [];
    protected $connection;

    public function __construct($pdo) {
        $this->connection = $pdo;
    }
    
    public function createCourse(){

    }
    public function editCourse(){

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

    public function getCourseById($course_id) {
        // var_dump($course_id);die();
        $query = "SELECT c.*, u.nom as enseignant_nom 
                 FROM cours c 
                 LEFT JOIN utilisateur u ON c.enseignant_id = u.id 
                 WHERE c.id = :course_id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':course_id',$course_id, PDO::PARAM_INT);
        // $stmt->execute([':course_id' => $course_id]);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getCourseEnrolById($course_id) {
        // var_dump($course_id);die();
        $query = "SELECT c.*, u.nom as enseignant_nom 
                 FROM cours c 
                 LEFT JOIN utilisateur u ON c.enseignant_id = u.id 
                 INNER JOIN inscriptioncours inc 
                 WHERE inc.id = :course_id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':course_id',$course_id, PDO::PARAM_INT);
        // $stmt->execute([':course_id' => $course_id]);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
