<?php
  session_start();
  //Write in database
  /* Attempt MySQL server connection. Assuming you are running MySQL
  server with default setting*/
  // Check connection
  // Include config file
    require_once "config.php";
  //Validation must be
  $letterNumber = $_GET['letterNumber'];
  $submissionDate = $_GET['submissionDate'];
  $expectedReply = $_GET['expectedReply'];
  $replyOnLetter = $_GET['replyOnLetter'];
  $subjectLetter = $_GET['subjectLetter'];
  $responsibleForReply = $_GET['responsibleForReply'];
  //After Validation - submission
  $sql = "INSERT INTO letters(letter,date,ex_reply,note,reply,actoin_to)
          VALUES ('$letterNumber','$submissionDate','$expectedReply',
                  '$subjectLetter','$replyOnLetter','$responsibleForReply')";

  // Attempt to execute the prepared statement
  if($result = mysqli_query($link, $sql)){

  } else {
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
  // close connection
  mysqli_close($link);

  //Return back on Letters page window info with latest dates
  header('Location: letters.php');
  $_SESSION['letterNumber'] = $_GET['letterNumber'];
  $_SESSION['submissionDate'] = $_GET['submissionDate'];
  $_SESSION['expectedReply'] = $_GET['expectedReply'];
  $_SESSION['replyOnLetter'] = $_GET['replyOnLetter'];
  $_SESSION['subjectLetter'] = $_GET['subjectLetter'];
  $_SESSION['responsibleForReply'] = $_GET['responsibleForReply'];
  //Jump to info tab
  $_SESSION['findTabStatus'] = "";
  $_SESSION['infoTabStatus'] = "show active";
  exit();
 ?>
