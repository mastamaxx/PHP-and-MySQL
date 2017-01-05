<!DOCTYPE html>
<html>
    <!--
     * Mark Max
     * markmax@my.smccd.edu
     * Final
     * CIS 380 OL
     * File Name: product_list.php
     * Date: 2016/12/17
    -->
    
<?php include '../view/header.php'; ?>
<main>    
        
    <section>
        <!-- display a table of grades -->
        <h2>Student Report</h2>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Event ID</th>
                <th>Event Date</th>
                <th>Category</th>
                <th>Score</th>
            </tr>
            <?php foreach ($grades as $grade) : ?>
            <tr>
                <td><?php echo $grade['student_id']; ?></td>
                <td><?php echo $grade['student_name']; ?></td>
                <td><?php echo $grade['student_email']; ?></td>
                <td><?php echo $grade['event_id']; ?></td>
                <td><?php echo $grade['event_Date']; ?></td>                
                <td><?php echo $grade['category']; ?></td>
                <td><?php echo $grade['score']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p>
            <a href="?action=show_add_student_form">Add Student</a>
        </p>
        <p>
            <a href="?action=show_add_event_form">Add Event</a>
        </p>
        <p>
            <a href="?action=show_add_grade_form">Add Grade</a>
        </p>
    </section>
        
        
</main>

<?php include '../view/footer.php'; ?>
    
</html>