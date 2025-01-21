<?php 
require_once 'utilisateur.php';


class Etudiant extends Utilisateur {
    private $pdo ;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function enrollCourse($etudient_id, $coursId) {
        try {
            $query = "INSERT INTO inscriptioncours (etudiant_id, cours_id) 
                     VALUES (:etudiant_id, :cours_id)";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([
                ':etudiant_id' => $etudient_id,
                ':cours_id' => $coursId
            ]);
        } catch (PDOException $e) {
            error_log("Enrollment error: " . $e->getMessage());
            return false;
        }
    }

    public function getMyEnrollments(int $student_id) {

    }
}

?>