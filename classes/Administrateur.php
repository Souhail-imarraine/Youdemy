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
        $query = "SELECT COUNT(u.id) AS total_enseignant, u.nom, u.email, u.date_creation, u.status, COUNT(c.id) AS total_cours, COUNT(inc.id) as total_student 
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
    

    public function modifyTeacher($teacher_id){
    }

    public function deleteTeacher($teacher_id){
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

    
    
    
}

?>