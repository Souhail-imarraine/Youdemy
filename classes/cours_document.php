<?php

class CoursDocument extends Cours {
    private string $contenu_document;

    public function __construct($pdo, $titre, $description, $enseignant_id, $category_id, $tags, $imageCouverture, $contenu_document) {
        parent::__construct($pdo);
        $this->titre = $titre;
        $this->description = $description;
        $this->enseignant_id = $enseignant_id;
        $this->category_id = $category_id;
        $this->tags = $tags;
        $this->imageCouverture = $imageCouverture;
        $this->contenu_document = $contenu_document;
    }

    public function createCourse() {
        $query = "INSERT INTO cours (titre, description, contenu_document, enseignant_id, type, Image_couverture, categorie_id) VALUES (:titre, :description, :contenu_document, :enseignant_id,'Document', :Image_couverture, :categorie_id)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            ':titre' => $this->titre,
            ':description' => $this->description,
            ':contenu_document' => $this->contenu_document,
            ':enseignant_id' => $this->enseignant_id,
            ':categorie_id' => $this->category_id,
            ':Image_couverture' => $this->imageCouverture
        ]);

        $course_id = $this->connection->lastInsertId();
        
        foreach ($this->tags as $tag) {
            $query = "INSERT INTO cours_tag (cours_id, tag_id) VALUES (:course_id, :tag_id)";
            $stmt = $this->connection->prepare($query);
            $stmt->execute([
                ':course_id' => $course_id,
                ':tag_id' => $tag
            ]);
        }
    }
}
?>