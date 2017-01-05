<!DOCTYPE html>
<html>
    <!--
     * Mark Max
     * markmax@my.smccd.edu
     * Final
     * File Name: database_error.php
     * Date: 2016/12/17
     -->

     <head>
         <title>Student Grades</title>
         <link rel="stylesheet" type="text/css" href="main.css">
     </head>

     <body>
         <main>
             <h1>Database Error</h1>
             <p>There was an error connecting to the database.</p>
             <p>The database must be installed as described in appendix A.</p>
             <p>The database must be running as described in chapter 1.</p>
             <p>Error message: <?php echo $error_message; ?></p>
         </main>
     </body>
</html>