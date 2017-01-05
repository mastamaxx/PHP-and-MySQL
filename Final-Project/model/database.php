<?php
    /******************************************************
     * Mark Max
     * markmax@my.smccd.edu
     * Final
     * File Name: database.php
     * Date: 2016/12/17
     *****************************************************/

     $dsn = 'mysql:host=localhost;dbname=CIS380_Final';
     $username = 'root';
     
     
     try {
         $db = new PDO($dsn, $username);
     } catch (PDOException $e) {
         $error_message = $e->getMessage();
         include('../error/database_error.php');
         exit();
     }
?>
