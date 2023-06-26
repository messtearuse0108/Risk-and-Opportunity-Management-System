<?php
include('h.php');
include "../database.php";
include "viewFetch.php";
?>
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Risk/</span> Risk Management</h4>
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                      <form action="updatePost.php" method="POST" >
                          <?php include "viewEdit.php" ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fetch the Filtered Programs and Processes based on Division -->
            <script>
                $(document).ready(function(){
                  $('#division').on("change", function(){
                    // alert($(this).val());
                    let div_desc = $(this).val();
                    $.ajax({
                      url: "editfunc.php",
                      data: {
                        div_desc: div_desc,
                        div_program: "YES"
                      },
                      method: "POST",
                      success: function(response){
                        $('#process').html(response);
                      }
                    });
                  });
                  $('#process').val();
                });
            </script>
<?php
include('f.php');
?>