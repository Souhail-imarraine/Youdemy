<?php
require_once 'utilisateur.php';

class Enseignant extends Utilisateur {  
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

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

    public function getCourseEnrollments($user_id) {
        $query = "SELECT 
            u.nom AS enseignant_name,
            COUNT(inc.id) AS total_inscriptions
            FROM 
                inscriptioncours inc
            LEFT JOIN 
                cours c 
            ON 
                inc.cours_id = c.id
            LEFT JOIN 
                utilisateur u 
            ON 
                c.enseignant_id = u.id
            WHERE 
                u.role = 'Enseignant' && u.id = :enseignant_id
            GROUP BY 
                u.id;
            ";
            
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':enseignant_id'=> $user_id]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    }


?>