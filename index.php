<?php
  $web_title = "TechDB";
  require 'tmplates/header.php';
  /*Attempt MySQL server connection. Assuming you are running MySQL
  server with default setting*/
  // Check connection
  // Include config file
    require_once "config.php";
?>
<!--START Main page-->
<main class="container" mt-5>
<h1>Project status week: <?php echo " ".date("W");?></h1>
<!--BEGIN Letters status-->
<section id="pending-btp-snec" class="py-3 bg-light">
  <div class="container">
    <div class="row">
      <div class="col">

        <!--ACCORDION-->
        <div id="accordion" role="tablist">

        <!--Pending letters reply BTP - SNEC card-->
          <div class="card">
            <div class="card-header" id="heading1">
              <h5 class="mb-0">
                <div href="#collapse1" data-toggle="collapse" data-parent="#accordion">
                  <?php
                    // Prepare a select statement
                    $param_term = 'SNEC-BTP';
                    require 'pending-letters-count.php';
                  ?>
                  Pending letters reply BTP to SNEC: <?php echo $count; ?>
                </div>
              </h5>
            </div>
            <div id="collapse1" class="collapse" >
              <div class="card-body">
                <?php
                  // Missed letters reply result table
                  require 'pending-letters-table.php';
                ?>
              </div>
            </div>
          </div>

          <!--Pending letters reply SNEC - BTP card-->
            <div class="card">
              <div class="card-header" id="heading2">
                <h5 class="mb-0">
                  <div href="#collapse2" data-toggle="collapse" data-parent="#accordion">
                    <?php
                      // Prepare a select statement
                      $param_term = 'BTP-SNEC';
                      require 'pending-letters-count.php';
                    ?>
                    Pending letters reply SNEC to BTP: <?php echo $count; ?>
                  </div>
                </h5>
              </div>
              <div id="collapse2" class="collapse" >
                <div class="card-body">
                  <?php
                    // Missed letters reply result table
                    require 'pending-letters-table.php';
                  ?>
                </div>
              </div>
            </div>

            <!--Pending letters reply BT2 to SNEC card-->
              <div class="card">
                <div class="card-header" id="heading3">
                  <h5 class="mb-0">
                    <div href="#collapse3" data-toggle="collapse" data-parent="#accordion">
                      <?php
                        // Prepare a select statement
                        $param_term = 'SNEC-BT2';
                        require 'pending-letters-count.php';
                      ?>
                      Pending letters reply BT2 to SNEC: <?php echo $count; ?>
                    </div>
                  </h5>
                </div>
                <div id="collapse3" class="collapse" >
                  <div class="card-body">
                    <?php
                      // Missed letters reply result table
                      require 'pending-letters-table.php';
                    ?>
                  </div>
                </div>
              </div>

              <!--Pending letters reply SNEC to BT2 card-->
                <div class="card">
                  <div class="card-header" id="heading4">
                    <h5 class="mb-0">
                      <div href="#collapse4" data-toggle="collapse" data-parent="#accordion">
                        <?php
                          // Prepare a select statement
                          $param_term = 'BT2-SNEC';
                          require 'pending-letters-count.php';
                        ?>
                        Pending letters reply SNEC to BT2: <?php echo $count; ?>
                      </div>
                    </h5>
                  </div>
                  <div id="collapse4" class="collapse" >
                    <div class="card-body">
                      <?php
                        // Missed letters reply result table
                        require 'pending-letters-table.php';
                      ?>
                    </div>
                  </div>
                </div>

                <!--Pending letters reply SNEC to BT2 card-->
                  <div class="card">
                    <div class="card-header" id="heading5">
                      <h5 class="mb-0">
                        <div href="#collapse5" data-toggle="collapse" data-parent="#accordion">
                          <?php
                            // Prepare a select statement
                            //Pending letters reply function
                              $sql = "SELECT * FROM `td_tc_register` WHERE `status` LIKE 'Open';";
                            // Attempt to execute the prepared statement
                              if($result = mysqli_query($link, $sql)){
                                  $count  =  mysqli_num_rows($result);
                              } else {
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                          ?>
                          Opend Technical Deviations and Query: <?php echo $count; ?>
                        </div>
                      </h5>
                    </div>
                    <div id="collapse5" class="collapse" >
                      <div class="card-body">
                        <?php
                          // Missed letters reply result table
                          require 'pending-tdtc-table.php';
                        ?>
                      </div>
                    </div>
                  </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!--END Letters status-->

<?php
  // close connection
  mysqli_close($link);
  require 'tmplates/footer.php' ?>
