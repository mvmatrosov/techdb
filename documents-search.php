<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting*/
// Check connection
// Include config file
  require_once "config.php";

  if(isset($_REQUEST["term"])){
  // Set parameters any
  $param_term = $_REQUEST["term"];
  // Prepare a select statement - latest revisions
  $sql = "SELECT
	  doc_tg,
    doc_tsc,
    title_eng,
    r_02,
    v_02,
    s_02,
 	  l_02
FROM edms LEFT JOIN
(SELECT
  doc_tg AS dtg_01,
  (
SELECT rev AS r_01
  FROM revisions
      WHERE doc_tg = rev_latest.doc_tg
  ORDER BY doc_tg ASC, ver DESC, status ASC LIMIT 1) as r_02,
  (
SELECT ver AS v_01
  FROM revisions
      WHERE doc_tg = rev_latest.doc_tg
  ORDER BY doc_tg ASC, ver DESC, status ASC LIMIT 1) as v_02,
  (
SELECT status AS s_01
  FROM revisions
      WHERE doc_tg = rev_latest.doc_tg
  ORDER BY doc_tg ASC, ver DESC, status ASC LIMIT 1) as s_02,
(
SELECT letter AS l_01
  FROM revisions
      WHERE doc_tg = rev_latest.doc_tg
  ORDER BY doc_tg ASC, ver DESC, status ASC LIMIT 1) as l_02
  FROM edms rev_latest) re_l on doc_tg = dtg_01
  WHERE doc_tg LIKE '%".$param_term."%' OR doc_tsc LIKE '%".$param_term."%' OR title_eng LIKE '%".$param_term."%';";


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
            <th style='width: 22%;'>GC docuent number</th>
            <th style='width: 20%;'>SNEC docuent number</th>
            <th style='width: 30%;'>Title</th>
            <th style='width: 5%;'>Rev</th>
            <th style='width: 5%;'>Status</th>
            <th style='width: 18%;'>Letter</th>
          </tr>
        </thead>
        <tbody>";
          //Table of results//
          // Fetch result rows as an associative array
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          echo "<tr style='font-size: 0.7rem;'>
            <td >".$row["doc_tg"]."</td>
            <td>".$row["doc_tsc"]."</td>
            <td>".$row["title_eng"]."</td>
            <td>".$row["r_02"]."</td>
            <td>".$row["s_02"]."</td>
            <td>".$row["l_02"]."</td>
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
