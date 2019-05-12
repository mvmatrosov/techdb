<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting*/
// Check connection
// Include config file
  require_once "config.php";

  if(isset($_REQUEST["term"])){
  // Set parameters any
  $param_term = $_REQUEST["term"];
  // Prepare a select statement
  $sql = "SELECT * FROM td_tc_register WHERE TDTC LIKE '%".$param_term."%' OR descr_en LIKE '%".$param_term."%' OR status LIKE '%".$param_term."%';";

  // Attempt to execute the prepared statement
  if($result = mysqli_query($link, $sql)){
    echo "Strings: ".$count  =  mysqli_num_rows($result);
    // Check number of rows in the result set
    if(mysqli_num_rows($result) > 0){
    //Table head//
    echo "
    <div class='table-responsive'>
      <table class='table mb-0 table-striped table-hover'>
        <thead>
          <tr>
            <th style='width: 20%;'>TD and TC number</th>
            <th style='width: 60%;'>Description</th>
            <th style='width: 20%;'>Status</th>
          </tr>
        </thead>
        <tbody>";
          //Table of results//
          // Fetch result rows as an associative array
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          echo "<tr style='font-size: 0.8rem;'>
            <td >".$row["TDTC"]."</td>
            <td>".$row["descr_en"]."</td>
            <td>".$row["status"]."</td>
          </tr>";
          }
    } else {
    echo "<p>No matches found</p>";
    }
  } else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
  // close connection
  mysqli_close($link);
}
?>
