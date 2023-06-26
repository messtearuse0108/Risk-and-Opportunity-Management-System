<?php
session_start();

$_SESSION["cat"] = "R&O";
$_SESSION["sub-cat"] = "Opp";
include("h.php"); 
include("../database.php");
?>  
        <div class="content-wrapper">
          <div class="container-xxl  container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Opportunities/</span> Add Opportunities</h4>
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-9">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                     <?php include "addopForm.php" ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="content-wrapper">
        <div class="container-xxl  container-p-y">
          <h4 class="fw-bold py-3 mb-4">Opportunity Management Table</h4>
            <div class="row">
              <div class="col-xxl">
                <div class="card mb-9">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                      <?php 
                        include("../tables/tOpp.php");
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script>
                $(document).ready(function(){
                  $('#division').on("change", function(){
                    // alert($(this).val());
                    let div_desc = $(this).val();
                    $.ajax({
                      url: "func.php",
                      data: {
                        div_desc: div_desc,
                        div_program: "YES"
                      },
                      method: "POST",
                      success: function(response){
                        $('#process').html(response);
                      }

                    })
                  });
                  $('#process').val();
                })
              </script>    
<?php 
include("f.php")
?>