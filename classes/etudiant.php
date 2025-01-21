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

    public function getMyEnrollments($student_id) {
        $query = "SELECT *, inc.cours_id, inc.date_inscription FROM cours c INNER JOIN inscriptioncours inc ON c.id = inc.cours_id WHERE inc.etudiant_id = :etudiant_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':etudiant_id' => $student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>