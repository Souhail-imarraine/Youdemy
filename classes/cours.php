<?php

class Cours {
    private int $id;
    private string $titre;
    private string $description;
    private string $contenu;
    private string $category;
    private DateTime $created_at;

    public function createCourse(){
        // Create course logic
    }

    public function updateCourse(int $course_id){
        // Update course logic
    }

    public function deleteCourse(int $course_id){
        // Delete course logic
    }

    public function getAllCourses(){
        // Return all courses
    }

    public function getCourseDetail(int $course_id){
        // Return details of a specific course
    }

    public function getCoursesByCategory(string $category_id) {
        // Return courses by category
    }

    public function addTag(int $tag_id){
        // Add tag to course logic
    }
}
?>