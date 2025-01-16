<?php

class Enseignant extends Utilisateur {
    public function getMyCourses(int $teacher_id){
        // Return list of courses taught by the teacher
    }

    public function getCourseEnrollments(int $course_id){
        // Return list of students enrolled in a course
    }

    public function getMyStatistics(){
        // Return teacher's statistics
    }
}


?>