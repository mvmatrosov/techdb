<?php
  //Pending letters reply function
    $sql = "SELECT * FROM `letters` WHERE `ex_reply`<>'' AND `reply` ='' AND `letter` LIKE '%".$param_term."%' ORDER BY `ex_reply`;";

  // Attempt to execute the prepared statement
    if($result = mysqli_query($link, $sql)){
        $count  =  mysqli_num_rows($result);
    } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
?>
