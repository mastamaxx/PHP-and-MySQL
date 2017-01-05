<?php

/******************************************************
* Mark Max
* markmax@my.smccd.edu
* Final
* CIS 380 OL
* File Name: index.php
* Date: 2016/12/17
******************************************************/

require('../model/database.php');
require('../model/grades_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_grades';
        if ($action == '') {
            $action = 'list_grades';
        }
    }
}

if ($action == 'list_grades') {
    
    $grades = get_student_grade_table();
    
    include('grade_list.php');
} else if ($action == 'show_add_student_form') {
     include('student_add.php');
} else if ($action == 'add_student') {
    $studentName = filter_input(INPUT_POST, 'studentName');
    $gender = filter_input(INPUT_POST, 'gender');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    
    $j = strpos($email, '@');
    $k = strpos($email, '.');
    
    if (!ctype_digit($phone)) {
        
        $temp_phone = $phone;
        $phone = '';

        for ($m = 0; $m < strlen($temp_phone); $m++) {
            if (ctype_digit(substr($temp_phone, $m, 1))) {
                $phone = $phone . substr($temp_phone, $m, 1);
            }
        }
    }
    
    if ($gender == NULL || $gender == FALSE || $studentName == NULL 
            || $studentName == NULL) {
        $error = "Invalid student name or gender data. Check all fields and try "
                . "again.";
        include('../error/error.php');
    } else if ($j == FALSE || $k == FALSE) {
        $error = "Invalid email address. Check all fields and try again.";
        include('../error/error.php');
    } else if (strlen($phone) <> 10){
        $error = "Invalid # of digits in phone #. Please check all fields.";
        include('../error/error.php');
    } else {
        $last_four = substr($phone, 6, 4);
        $region_code = substr($phone, 3, 3);
        $area_code = substr($phone, 0, 3);
        $phone = $area_code . '-' . $region_code 
                . '-' . $last_four;
        add_student($gender, $studentName, $email, $phone);
        header("Location: .?action=list_grades");
    }
} else if ($action == 'show_add_event_form') {
     include('grade_event_add.php');
} else if ($action == 'add_event') {
    $eventDate = filter_input(INPUT_POST, 'eventDate');
    $category = filter_input(INPUT_POST, 'category');
    
    $is_valid_date = (bool)strtotime($eventDate);
      
    if ($eventDate == NULL || $eventDate == FALSE || $category == NULL 
            || $category == NULL || $is_valid_date == FALSE) {
        $error = "Invalid event data. Check all fields and try again.";
        include('../error/error.php');
    } else {
        $status_message = '';
        $eventDate = strtotime($eventDate);
        $currentTime = time();
        
        $eventDateParts = getDate($eventDate);
        $currentTimeParts = getDate($currentTime);
        
        $monthsAhead = $currentTimeParts['year'] * 12 + $currentTimeParts['mon']
                - $eventDateParts['year'] * 12 - $eventDateParts['mon'];
        $daysAhead = $currentTimeParts['mday'] - $eventDateParts['mday'];        
        
        if ($daysAhead < 0) {
            $monthsAhead = $monthsAhead - 1;
            $daysAhead += 30;
        }
        
        
        $yearsAhead = (int)($monthsAhead/12);
        $monthsAhead %= 12;
        
        $status_message = "Event is " . $yearsAhead . " years, " .$monthsAhead .
                " months, and " . $daysAhead . " days ahead of current date.";
        
        $eventDate = $eventDateParts['year'] . "-" . $eventDateParts['mon'] 
                . "-" . $eventDateParts['mday'];
        
        add_event($eventDate, $category, $status_message);
        header("Location: .?action=list_grades");
    }
} else if ($action == 'show_add_grade_form') {
     include('grade_add.php');
} else if ($action == 'add_grade') {
    $studentID = filter_input(INPUT_POST, 'studentID', FILTER_VALIDATE_INT);
    $eventID = filter_input(INPUT_POST, 'eventID', FILTER_VALIDATE_INT);
    $score = filter_input(INPUT_POST, 'score', FILTER_VALIDATE_INT);
    
    $events = get_event_table();
    $event_array = array();

    foreach ($events as $event) {
        $event_id = $event['event_id'];
        $category = $event['category'];
        $event_array[$event_id] = $category;
    }
    
    $key_exists = array_key_exists($eventID, $event_array);
    
    $students = get_student_table();
    $student_array = array();
    
    
    foreach ($students as $student) {
        $student_id = $student['student_id'];
        $name = $student['student_name'];
        $student_array[$student_id] = $name;
    }
    
    $student_key_exists = array_key_exists($studentID, $student_array);
    
    
    if ($studentID == NULL || $studentID == FALSE || $eventID == NULL 
            || $eventID == NULL || $score == NULL || $score == FALSE) {
        $error = "Invalid grade data. Check all fields and try again.";
        include('../error/error.php');
    } else if ($key_exists == FALSE) {
        $error = "Invalid Event_ID. Check all fields and try again.";
        include('../error/error.php');    
    } else if ($student_key_exists == FALSE) {
        $error = "Invalid Student_ID. Check all fields and try again.";
        include('../error/error.php');    
    } else {
        add_grade($studentID, $eventID, $score);
        header("Location: .?action=list_grades");
    }
}

?>