<?php 
include('h.php');
include('../viewBack/backendViewOpp.php');
?>
<!-- New Design -->
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Opportunity/</span> Opportunity Management</h4>
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                       <!-- Divider -->
                        <div class="row mb-3">
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-name">Year Identified</label>
                              <div class="col-sm-5">
                                <input style="color: #696cff;" required readonly type ="text" name= "year_id" class="form-control" id="basic-default-name" value = "<?php echo $row["year_id"]; ?>"  />
                              </div>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-company">Risk Number</label>
                              <div class="col-sm-12">
                                <input
                                  style="color: #696cff;"
                                  type="text"
                                  class="form-control"
                                  id="basic-default-company"
                                  readonly value="<?php echo $row["opp_num"]; ?>"
                                />
                              </div>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-company">Division</label>
                              <div class="col-sm-12">
                                <input
                                  style="color: #696cff;"
                                  type="text"
                                  class="form-control"
                                  readonly value="<?php echo $row["division"]; ?>"
                                  id="basic-default-company"
                                />
                              </div>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-name">Programs</label>
                              <div class="col-sm-12">
                                <input style="color: #696cff;" readonly value="<?php echo $row["process"]; ?>" type="text" class="form-control" id="basic-default-name"  />
                              </div>
                          </div>
                        </div>
                        <!-- Divider -->
                        <div class="row mb-3">
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-company">Frequency</label>
                            <div class="col-sm-12">
                              <input
                                style="color: #696cff;"
                                type="text"
                                class="form-control"
                                readonly value="<?php echo $row["frequency"]; ?>"
                                id="basic-default-company"
                              />
                            </div>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-company">Factor</label>
                            <div class="col-sm-12">
                            <input 
                                  style="color: #696cff;"
                                  type="text" 
                                  class="form-control"  
                                  readonly value="<?php 
                                  $output="";
                                            while($factor = $result2->fetch_assoc()){
                                            $output= $factor['factor_name'];
                                            echo "[".$output."] ";
                                            }
                                            if (empty($output)) {
                                              echo "N/A";
                                            }
                                            ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3" >
                <div class="col mb-1">
                  <label class="col-sm-5 col-form-label" for="basic-default-company">External Factor</label>
                  <div class="col-sm-12">
                  <input 
                        style="color: #696cff;"
                        type="text" 
                        class="form-control"  
                        readonly value="<?php 
                        $output="";
                                  while($factor = $result5->fetch_assoc()){
                                  $output= $factor['factor_name1'];
                                  echo "[".$output."] ";
                                  }
                                  if (empty($output)) {
                                    echo "N/A";
                                  }
                                  ?>">
                  </div>
                </div>
                <div class="col mb-1">
                  <label class="col-sm-5 col-form-label" for="basic-default-company">Interested Parties</label>
                  <div class="col-sm-12">
                  <input 
                        style="color: #696cff;"
                        type="text" 
                        class="form-control"  
                        readonly value="<?php 
                        $output="";
                                  while($factor = $result4->fetch_assoc()){
                                  $output= $factor['factor_name2'];
                                  echo "[".$output."] ";
                                  }
                                  if (empty($output)) {
                                    echo "N/A";
                                  }
                                  ?>">
                  </div>
                </div>
              </div>
                         <!-- Divider -->
                        <div class="row mb-3">
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-company">Likelihood</label>
                            <div class="col-sm-12">
                              <input
                                style="color: #696cff;"
                                type="text"
                                class="form-control"
                                readonly value="<?php echo $row["likelihood"]; ?>"
                                id="basic-default-company"
                              />
                            </div>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-company">Severity</label>
                            <div class="col-sm-12">
                              <input style="color: #696cff;" readonly value="<?php echo $row["benefit"]; ?>" type="text" class="form-control" id="basic-default-name" />
                            </div>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-9 col-form-label" for="basic-default-name">Risk Priority Number</label>
                              <div class="col-sm-12">
                                <input
                                    style="color: #696cff;"
                                    type="text"
                                    class="form-control"
                                    id="basic-default-company"
                                    readonly value="<?php echo $row["rpn"]; ?>"
                                  />
                              </div>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-9 col-form-label" for="basic-default-company">Evaluation Result</label>
                              <div class="col-sm-12">
                                <input
                                  style="color: #696cff;"
                                  type="text"
                                  class="form-control"
                                  id="basic-default-company"
                                  readonly value="<?php echo $row["eval_res"]; ?>"
                                />
                            </div>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-12 col-form-label" for="basic-default-company">Monitoring Frequency</label>
                            <div class="col-sm-12">
                              <input
                                style="color: #696cff;"
                                type="text"
                                class="form-control"
                                readonly value="<?php echo $row["monitoring"]; ?>"
                                id="basic-default-company"
                              />
                            </div>
                          </div>
                        </div>
                        <!-- Divider --> 
                        <?php 
                          $treatmentArray = array();
                          $action_planArray = array();
                          $startArray = array();
                          $endArray = array();
                          $responsibleArray = array();
                          $measureArray = array();
                          // Check if the query executed successfully
                          if ($resultA) {
                              // Check if there are rows returned
                              if ($resultA->num_rows > 0) {
                                  // Initialize an array to store the values
                                  // Fetch all rows from the result
                                  while ($rowT = $resultA->fetch_assoc()) {
                                      // Access the value from the desired column
                                      $value = $rowT['treatment'];
                                      // Add the value to the array
                                      $treatmentArray[] = $value;
                                  }
                              } 
                          }
                          if ($resultC) {
                            // Check if there are rows returned
                            if ($resultC->num_rows > 0) {
                                // Initialize an array to store the values
                                // Fetch all rows from the result
                                while ($rowT = $resultC->fetch_assoc()) {
                                    // Access the value from the desired column
                                    $value = $rowT['start'];
                                    // Add the value to the array
                                    $startArray[] = $value;
                                }
                            } 
                        } 
                            if ($resultD) {
                              // Check if there are rows returned
                              if ($resultD->num_rows > 0) {
                                  // Initialize an array to store the values
                                  // Fetch all rows from the result
                                  while ($rowT = $resultD->fetch_assoc()) {
                                      // Access the value from the desired column
                                      $value = $rowT['end'];
                                      // Add the value to the array
                                      $endArray[] = $value;
                                  }
                              } 
                            } 
                            if ($resultB) {
                              // Check if there are rows returned
                              if ($resultB->num_rows > 0) {
                                  // Initialize an array to store the values
                                  // Fetch all rows from the result
                                  while ($rowT = $resultB->fetch_assoc()) {
                                      // Access the value from the desired column
                                      $value = $rowT['action_plan'];
                                      // Add the value to the array
                                      $action_planArray[] = $value;
                                  }
                              } 
                          } 
                          if ($resultF) {
                            // Check if there are rows returned
                            if ($resultF->num_rows > 0) {
                                // Initialize an array to store the values
                                // Fetch all rows from the result
                                while ($rowT = $resultF->fetch_assoc()) {
                                    // Access the value from the desired column
                                    $value = $rowT['responsible'];
                                    // Add the value to the array
                                    $responsibleArray[] = $value;
                                }
                            } 
                        } 
                        if ($resultE) {
                          // Check if there are rows returned
                          if ($resultE->num_rows > 0) {
                              // Initialize an array to store the values
                              // Fetch all rows from the result
                              while ($rowT = $resultE->fetch_assoc()) {
                                  // Access the value from the desired column
                                  $value = $rowT['measure'];
                                  // Add the value to the array
                                  $measureArray[] = $value;
                              }
                          } 
                        }  
                        for($i= 0; $i < sizeof($measureArray); $i++){
                        ?>
                        <div class="row mb-3">
                            <div class="col mb-1">
                              <!-- Treatment -->
                                <div class="row mb-3">
                                    <label class="col-sm-9 col-form-label" for="basic-default-company">Treatment</label>
                                      <div class="col-sm-12">
                                        <input readonly type="text" class="form-control" id="basic-default-name" value= "<?= $treatmentArray[$i]; ?>">
                                      </div>
                                </div>
                                <!-- Start and End -->
                                <div class="row mb-3">
                                    <div class="col mb-1">
                                    <label class="col-sm-9 col-form-label" for="basic-default-company">Start of Activity</label>
                                    <input readonly type="text" class="form-control" value= "<?= $startArray[$i]; ?>" id="basic-default-name">
                                    </div>
                                    <div class="col mb-1">
                                    <label class="col-sm-9 col-form-label" for="basic-default-company">End of Activity</label>
                                    <input readonly type="text" class="form-control" value= "<?= $endArray[$i]; ?>" id="basic-default-name">
                                    </div>
                                </div>
                            </div>
                            <!-- Action Plan -->
                            <div class="col mb-1">
                              <label class="col-sm-9 col-form-label" for="basic-default-company">Action Plan</label>
                              <textarea readonly class="form-control" id="" cols="70" rows="5.2"><?= $action_planArray[$i]; ?></textarea> 
                            </div>
                            <div class="col mb-1">
                                <!-- Responsible -->
                                <div class="row mb-3">
                                  <label class="col-sm-9 col-form-label" for="basic-default-company">Responsible</label>
                                  <div class="col-sm-12">
                                    <input readonly type="text" class="form-control" value= "<?= $responsibleArray[$i]; ?>" id="basic-default-name">
                                  </div>
                                </div>
                                <!-- Measure of Effectiveness -->
                                <div class="row mb-3">
                                <label class="col-sm-9 col-form-label" for="basic-default-company">Measure of Effectiveness</label>
                                <div class="col-sm-12">
                                <input readonly type="text" class="form-control"  value= "<?= $measureArray[$i]; ?>" id="basic-default-name">
                                </div>
                                </div>
                            </div>
                        </div>
                      <?php 
                        }
                      ?>   
                        <!-- Divider -->
                        <div class="row mb-3">
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-company">Encoder</label>
                            <div class="col-sm-12">
                              <input
                                style="color: #696cff;"
                                type="text"
                                class="form-control"
                                readonly value="<?php echo $row["encoder"]; ?>"
                                id="basic-default-company"
                              />
                            </div>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-company">Date Encoded</label>
                            <div class="col-sm-12">
                              <input style="color: #696cff;" style="color: #696cff;" readonly value="<?php echo $row["dateEncoded"]; ?>" type="text" class="form-control" id="basic-default-name" />
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="d-flex justify-content-start">
                            <!-- <a type="submit"  class="btn btn-danger">Update</a>&nbsp; -->
                            <a type="submit" href="../Forms/addOp.php" class="btn btn-primary">Back</a>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
              </div>
            </div>


<!-- New Design -->
            
<?php 
include('f.php');
?>