<?php
  $web_title = "Project letters";
  require 'tmplates/header.php';
  //Keep all data in session
  session_start();
  //Activation navs-tabs - if never exist before go to search tab
  if (!isset($_SESSION["findTabStatus"])) { $_SESSION["findTabStatus"] = "show active";};
  if (!isset($_SESSION["infoTabStatus"])) { $_SESSION["infoTabStatus"] = "";};
?>
<!--Search request Jquery-->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result");
          if(inputVal.length){
              $.get("letters-search.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });

      // Set search input value on click of result item
      $(document).on("click", ".result p", function(){
          $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
          $(this).parent(".result").empty();
      });
  });
  </script>

<main class="container" mt-5>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link <?= $_SESSION['findTabStatus'] ?>" id="find-tab" data-toggle="tab" href="#search" role="tab" aria-controls="home" aria-selected="true">Find</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= $_SESSION['infoTabStatus'] ?>" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Info</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="contact" aria-selected="false">Edit</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade <?= $_SESSION['findTabStatus'] ?>" id="search" role="tabpanel" aria-labelledby="find-tab">
    <div class="search-box mt-2 mt-md-2">
      <input class="form-control mr-sm-2" type="text" autocomplete="off" placeholder="Type to live Search or put % to see all..." aria-label="Search"/>
      <div class="result"></div>
    </div>
  </div>

  <div class="tab-pane fade <?= $_SESSION['infoTabStatus'] ?>" id="info" role="tabpanel" aria-labelledby="info-tab">
    <!--Window see letter info deatils-->
    <div class="row">
    <div class="col-md-4 mb-3">
      <label for="letterNumber">Letter number</label>
      <div class="card">
        <p class="card-text">
        <?php if (isset($_SESSION["letterNumber"])){echo $_SESSION["letterNumber"];}?></p>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="submissionDate">Submission date</label>
      <div class="card">
        <p class="card-text">
          <?php if (isset($_SESSION["submissionDate"])){echo $_SESSION["submissionDate"];}?></p>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="expectedReply">Expected reply</label>
      <div class="card">
        <p class="card-text">
        <?php if (isset($_SESSION["expectedReply"])){echo $_SESSION["expectedReply"];}?></p>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-4 mb-3">
        <label for="replyOnLetter">Reply on letter</label>
        <div class="card">
          <p class="card-text">
          <?php if (isset($_SESSION["replyOnLetter"])){echo $_SESSION["replyOnLetter"];}?></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mb-3">
        <label for="subjectLetter">Subject</label>
        <div class="card">
          <p class="card-text">
          <?php if (isset($_SESSION["subjectLetter"])){echo $_SESSION["subjectLetter"];}?></p>
        </div>
      </div>
    </div>
    <!--END Window see letter info deatils-->
  </div>
  <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
    <!--Window to edit letter data-->
    <form action="letters-edit.php" method="get" class="needs-validation">
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="letterNumber">Letter number:</label>
          <!--Regular expression Check 1396-0055-BTP-SNEC-TRM-0033-->
          <input type="text" class="form-control" placeholder="1396-0055-BTP-SNEC-TRM-0033"
            name="letterNumber"
            required pattern="1396-0055-(BTP-SNEC-|SNEC-BTP-)(TRM-|LET-|EMA-)[0-9]{4}">
        </div>
        <div class="col-md-4 mb-3">
          <label for="submissionDate">Submission date</label>
          <input type="date" class="form-control" placeholder="Submission date" value="<?php echo date("Y-m-d"); ?>" name="submissionDate" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="expectedReply">Expected reply</label>
          <input type="date" class="form-control" name="expectedReply" placeholder="Expected reply">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="replyOnLetter">Reply on letter</label>
          <input type="text" class="form-control" placeholder="Reply on letterr"
                 name="replyOnLetter"
                 pattern="1396-0055-(BTP-SNEC-|SNEC-BTP-)(TRM-|LET-|EMA-)[0-9]{4}">
        </div>
        <div class="col-md-4 mb-3">
          <label for="replyOnLetter">Responsible for reply</label>
          <input type="email" class="form-control" placeholder="Responsible for reply" name="responsibleForReply">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="subjectLetter">Subject</label>
          <input type="text" class="form-control" name="subjectLetter" placeholder="Subject" required>
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Submit</button>
    </form>

    <!--END Window to edit letter data-->
  </div>
</div>
</main>

<?php require 'tmplates/footer.php' ?>
