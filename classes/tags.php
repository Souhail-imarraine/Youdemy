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

    public function deleteTag(int $tag_id){

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