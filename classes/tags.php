<?php
class Tag {
    private int $id;
    private string $name;
    private $connexion;

    public function __construct($pdo)
    {
        $this->connexion = $pdo;
    }

    public function createTag($name_tags) {
        try {
            if (empty($name_tags)) {
                return ["success" => false, "message" => "Le nom du tag ne peut pas être vide."];
            }
            
            $name_tags = trim($name_tags);
            
            $check_query = "SELECT COUNT(*) as count FROM tag WHERE nom = :nom";
            $check_stmt = $this->connexion->prepare($check_query);
            $check_stmt->execute([':nom' => $name_tags]);
            $result = $check_stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result['count'] > 0) {
                return ["success" => false, "message" => "Ce tag existe déjà."];
            }
            
            $query = 'INSERT INTO tag (nom) VALUES (:nom)';
            $stmt = $this->connexion->prepare($query);
            $success = $stmt->execute([':nom' => $name_tags]);
            
            if ($success) {
                return ["success" => true];
            } else {
                return ["success" => false, "message" => "Erreur lors de la création du tag."];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Erreur de base de données: " . $e->getMessage()];
        }
    }

    public function deleteTag(int $tag_id) {
    $query = "DELETE FROM tag WHERE id = :tag_id";
    $stmt = $this->connexion->prepare($query);
    $result = $stmt->execute([':tag_id' => $tag_id]);
    
    if ($result) {
        return "Tag with ID $tag_id deleted successfully.";
    } else {
        return "Error: Could not delete tag with ID $tag_id.";
    }
    }

    public function getAllTags() {
        $query = "SELECT * FROM tag;";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(); 
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tags;
    }
    
}

?>