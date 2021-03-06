<?php

// for web
$filename = '../../../db/performance.txt';

// for cmd
// $filename = './db/performance.txt';

// check if file exists
if (file_exists($filename)) {


  $myFile = new SplFileObject($filename);


  // sql
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = new mysqli($servername, $username, $password);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  while (!$myFile->eof()) {
    // echo $myFile->fgets() . PHP_EOL;
    $line = $myFile->fgets();



    // echo $line . PHP_EOL;

    // the data should be in the following format:
      // (assignment_id, score, comment, user_code)
      // ('assignment_id', 'score', 'comment', 'user_code')
      // (1, 'score', 'comment', 'user_code')




    // sql command to insert data into the db
    $sql_data = "INSERT IGNORE INTO 
        kindercare.assignmentscore (assignment_id, score, comment, user_code)
         VALUES   " .  $line . ";";

    //  use the kindercare db
    $conn->select_db('kindercare');

    // insert data query
    if ($conn->query($sql_data) === TRUE) {

      // set session success
      echo "Pupil Mark Added Successfully Added!";


      // redirect to the add assignment screen
      // header("Location: add_assignment_screen.php");
    } else {
      echo "Error: " . $sql_data . "<br>" . $conn->error;
    }
  }

  $conn->close();
  exit();
} else {
  // echo "The file does not exist";
}
