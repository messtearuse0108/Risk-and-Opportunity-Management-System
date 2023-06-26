<?php
session_start();
$_SESSION["cat"] = "Monitoring";
$_SESSION["sub-cat"] = "AssRisk";
include("h.php"); 
include("../database.php");
?>  
        <div class="content-wrapper">
          <div class="container-xxl  container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Monitoring/</span> Risk Assessment</h4>
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-9">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                      <?php include "assriskForm.php" ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="content-wrapper">
            <div class="container-xxl  container-p-y">
              <h5 class="pb-1 my-2">Risk Assessment Details</h5>
                <div class="row">
                  <div class="col-xxl">
                    <div class="card mb-9">
                      <div class="card-header d-flex align-items-center justify-content-between">
                        </div>
                        <div class="card-body">
                          <?php 
                          include('../tables/tAssrisk.php');
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>    
<?php 
include("f.php")
?>