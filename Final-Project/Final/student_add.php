<!DOCTYPE html>
<html>

    <!--
     * Mark Max
     * markmax@my.smccd.edu
     * Final
     * CIS 380 OL
     * File Name: student_add.php
     * Date: 2016/12/17
    -->
    

<?php include '../view/header.php'; ?>
<main>
    <h1>Add Student</h1>
    <form action="index.php" method="post" id="add_student_form">
        <input type="hidden" name="action" value="add_student">

        
        <label>Student Name:</label>
        <input type="text" name="studentName" />
        <br>
        
        <label>Gender:</label>
        <select name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
        <br>

        <label>Email:</label>
        <input type="text" name="email" />
        <br>
        
        <label>Phone Number:</label>
        <input type="text" name="phone" />
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Student" />
        <br>
        
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_grades">View Grade List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>

</html>
