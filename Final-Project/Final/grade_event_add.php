<!DOCTYPE html>
<html>

    <!--
     * Mark Max
     * markmax@my.smccd.edu
     * Final
     * CIS 380 OL
     * File Name: grade_event_add.php
     * Date: 2016/12/17
    -->
    

<?php include '../view/header.php'; ?>
<main>
    <h1>Add Events</h1>
    <form action="index.php" method="post" id="add_event_form">
        <input type="hidden" name="action" value="add_event">

        
        <label>Event Date:</label>
        <input type="text" name="eventDate" />
        <br>
        
        <label>Category:</label>
        <select name="category">
            <option value="T">T</option>
            <option value="Q">Q</option>
        </select>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Events" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_grades">View Grade List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>

</html>
