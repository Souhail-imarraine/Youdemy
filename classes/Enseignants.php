<?php
require_once 'utilisateur.php';

class Enseignant extends Utilisateur {  
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // total courses
    public function getCourseCount($enseignant_id) {
        $query = "SELECT COUNT(*) FROM cours WHERE enseignant_id = :enseignant_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':enseignant_id' => $enseignant_id]);
        return $stmt->fetchColumn();
    }
    public function SelectAllCourse($enseignant_id) {
        $query = "SELECT * FROM cours WHERE enseignant_id = :enseignant_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':enseignant_id' => $enseignant_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCourseEnrollments(int $course_id){
        
    }


    public function getMyStatistics(){

    }
}


?>