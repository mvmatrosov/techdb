<?php
  // Check number of rows in the result set
  if($count > 0) {
  //Table head//
  echo "
    <table class='table mb-0 table-striped table-hover table-responsive'>
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
        echo "<tr style='font-size: 0.7rem;'>
                <td >".$row["TDTC"]."</td>
                <td>".$row["descr_en"]."</td>
                <td>".$row["status"]."</td>
              </tr>";
        }
      echo "
      </tbody>
    </table>";
  } else {
  echo "No matches found";
    };
?>
