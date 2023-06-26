<?php 
include('h.php');
include('../viewBack/backendAssOppView.php');
?>
            <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Opportunity/</span>Opportunity Assessment</h4>
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                      <?php include "vAssOp.php" ?>
                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <a type="submit" href="../Forms/assOp.php" class="btn btn-danger">Update</a>
                          <a type="submit" href="../Forms/assOp.php" class="btn btn-primary">Back</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php 
include('f.php');
?>