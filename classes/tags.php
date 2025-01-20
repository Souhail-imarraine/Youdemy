<?php
class Tag {
    private int $id;
    private string $name;
    private $connexion;

    public function __construct($pdo)
    {
        $this->connexion = $pdo;
    }

    public function createTag(){
        

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