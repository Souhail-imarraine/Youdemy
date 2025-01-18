<?php

class VideoCours extends Cours {
    private string $contenu_video;

    public function __construct($pdo, $titre, $description, $enseignant_id, $category_id, $tags, $imageCouverture, $contenu_video) {
        parent::__construct($pdo);
        $this->titre = $titre;
        $this->description = $description;
        $this->enseignant_id = $enseignant_id;
        $this->category_id = $category_id;
        $this->tags = $tags;
        $this->imageCouverture = $imageCouverture;
        $this->contenu_video = $contenu_video;
    }

    public function createCourse() {
        $query = "INSERT INTO cours (titre, description, contenu_video, enseignant_id, type, Image_couverture, categorie_id) VALUES (:titre, :description, :contenu_video, :enseignant_id,'Video', :Image_couverture, :categorie_id)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            ':titre' => $this->titre,
            ':description' => $this->description,
            ':contenu_video' => $this->contenu_video,
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