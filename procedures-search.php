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
  $sql = "SELECT * FROM procedures WHERE doc_tg LIKE '%".$param_term."%' OR title_eng LIKE '%".$param_term."%';";

  // Attempt to execute the prepared statement
  if($result = mysqli_query($link, $sql)){
    echo "Strings: ".$count  =  mysqli_num_rows($result);
    // Check number of rows in the result set
    if(mysqli_num_rows($result) > 0){
    //Table head//
    echo "
    <div class='table-responsive'>
      <table class='table table-striped table-hover table-sm'>
        <thead>
          <tr>
            <th>GC Doc number</th>
            <th>SNEC Doc number</th>
            <th>Title</th>
          </tr>
        </thead>
        <tbody>";
          //Table of results//
          // Fetch result rows as an associative array
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          echo "<tr style='font-size: 0.8rem;'>
            <td style='width: 25%;'>".$row["doc_tg"]."</td>
            <td style='width: 20%;'>".$row["doc_tsc"]."</td>
            <td style='width: 55%;'>".$row["title_eng"]."</td>
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
