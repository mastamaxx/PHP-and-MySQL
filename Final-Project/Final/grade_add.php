<!DOCTYPE html>
<html>

    <!--
     * Mark Max
     * markmax@my.smccd.edu
     * Final
     * CIS 380 OL
     * File Name: grade_add.php
     * Date: 2016/12/17
    -->
    

<?php include '../view/header.php'; ?>
<main>
    <h1>Add Scores</h1>
    <form action="index.php" method="post" id="add_event_form">
        <input type="hidden" name="action" value="add_grade">

        
        <label>Student ID:</label>
        <input type="text" name="studentID" />
        <br>
        
        <label>Event ID:</label>
        <input type="text" name="eventID" />
        <br>
        
        <label>Score:</label>
        <input type="text" name="score" />
        <br>
       
        <label>&nbsp;</label>
        <input type="submit" value="Add Scores" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_grades">View Student Report</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>

</html>