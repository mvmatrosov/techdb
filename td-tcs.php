<?php
  $web_title = "Project TD-TCs";
  require 'tmplates/header.php';
?>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result");
          if(inputVal.length){
              $.get("td-tcs-search.php", {term: inputVal}).done(function(data){
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
  <h2>Find TD-TCs</h2>
    <div class="search-box mt-2 mt-md-0">
      <input class="form-control mr-sm-2" type="text" autocomplete="off" placeholder="Input '%' to see all..." aria-label="Search"/>
      <div class="result"></div>
    </div>
</main>

<?php require 'tmplates/footer.php' ?>
