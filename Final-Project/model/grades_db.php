<?php

/******************************************************
* Mark Max
* markmax@my.smccd.edu
* Final
* CIS 380 OL
* File Name: product_db.php
* Date: 2016/12/17
******************************************************/

function get_student_grade_table() {
    
    global $db;
    $query = 'SELECT * 
              FROM Student_Report';
    $statement = $db->prepare($query);
    $statement->execute();
    $grades = $statement->fetchAll();
    $statement->closeCursor();
    return $grades;
}

function get_student_grade() {
        global $db;
    $query = 'SELECT student_name, gender, event_id, category, score 
              FROM student, grade_event, score
              WHERE student.student_id = score.student_id 
              AND grade_event.event_id = score.event_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $grade = $statement->fetch();
    $statement->closeCursor();
    return $grade;
}

function get_event_table() {
    
    global $db;
    $query = 'SELECT * FROM grade_event';
    $statement = $db->prepare($query);
    $statement->execute();
    $events = $statement->fetchAll();
    $statement->closeCursor();
    return $events;
}

function get_student_table() {
    
    global $db;
    $query = 'SELECT student_id, student_name FROM student';
    $statement = $db->prepare($query);
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;
}

function get_student() {
    global $db;
    $query = 'SELECT * FROM student';
    $statement = $db->prepare($query);
    $statement->execute();
    $student = $statement->fetch();
    $statement->closeCursor();
    return $student;
}

function add_student($gender, $studentName, $email, $phone) {
    global $db;
    $query = 'INSERT INTO student
                (student_name, gender, student_email, student_phone)
              VALUES
                (:student_name, :gender, :student_email, :student_phone)';
    $statement = $db->prepare($query);
    $statement->bindValue('student_name', $studentName);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':student_email', $email);
    $statement->bindValue(':student_phone', $phone);
    $statement->execute();
    $statement->closeCursor();
}

function add_event($eventDate, $category, $status_message) {
    global $db;
    $query = 'INSERT INTO grade_event
                (Event_date, category, status_message)
              VALUES
                (:event_date, :category, :status_message)';
    $statement = $db->prepare($query);
    $statement->bindValue(':event_date', $eventDate);
    $statement->bindValue(':category', $category);
    $statement->bindValue(':status_message', $status_message);
    $statement->execute();
    $statement->closeCursor();
}

function add_grade($studentID, $eventID, $score) {
    global $db;
    $query = 'INSERT INTO score
                (student_id, event_id, score)
              VALUES
                (:student_id, :event_id, :score)';
    $statement = $db->prepare($query);
    $statement->bindValue(':student_id', $studentID);
    $statement->bindValue(':event_id', $eventID);
    $statement->bindValue(':score', $score);
    $statement->execute();
    $statement->closeCursor();
}

?>
