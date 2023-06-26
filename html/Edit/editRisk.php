<?php 
session_start();
include("h.php");
include("../database.php");
?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Risk/</span> Edit Risk Management</h4>
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                      <form action="../Create/backendCreateRisk.php" method="post">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Year Identified</label>
                          <div class="col-sm-10">
                            <select required  name="year_id" class="form-select" aria-label="Default select example">
                              <option value="">YYYY</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Risk Number</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              name = "risk_num"
                              class="form-control"
                              id="basic-default-company"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Division</label>
                          <div class="col-sm-10">
                            <select required id= 'division' name = "division"  class = "form-control" single>
                              <?php 
                                  $stm = $conn->query("SELECT * FROM division_cat ");
                                  $output="";
                                  $output.='
                                  <option value= "" active >Select</option>';
                                  while($row = $stm->fetch_assoc()) {
                                  $output .=" 
                                  <option value = '$row[div_desc]'>$row[div_desc]</option>";     
                                  }
                                  echo $output;
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Programs</label>
                          <div class="col-sm-10">
                            <select name = "process"  id= "process" class = "form-control" single>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Frequency</label>
                          <div class="col-sm-10">
                            <select required name = "frequency"  class = "form-select"  >
                              <?php 
                                  $stm = $conn->query("SELECT * FROM lookup_table WHERE lookupcat_ID = 3");
                                  $output="";
                                  $output.='
                                  <option value= "" active>Select</option>';
                                  while($row = $stm->fetch_assoc()) {
                                  $output .="<option  value = '$row[lookupcat_DESC]'>$row[lookupcat_DESC]</option>"; 
                                  }
                                  echo $output;
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Factor</label>
                          <div class="col-sm-10">
                            <select required name = "factor[]"  class = "form-control js-example-basic-multiple" multiple >
                              <?php 
                                  $stm = $conn->query("SELECT * FROM lookup_table WHERE lookupcat_ID = 2");
                                  $output="";
                                  $output.='
                                  <option value= "" active>Select</option>';
                                  while($row = $stm->fetch_assoc()) {
                                  $output .="<option  value = '$row[lookupcat_DESC]'>$row[lookupcat_DESC]</option>"; 
                                  }
                                  echo $output;
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Risk</label>
                          <div class="col-sm-10">
                            <input
                                    required
                                    type="text"
                                    class="form-control"
                                    id="basic-default-company"
                                    placeholder=""
                                    name="risks"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Impact</label>
                          <div class="col-sm-10">
                            <input
                              required
                              name="impact"
                              type="text"
                              class="form-control"
                              id="basic-default-company"
                              placeholder=""
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Likelihood</label>
                          <div class="col-sm-10">
                          <select required onchange="myFunction()" name="likelihood" class="form-select" id="like" aria-label="Default select example">
                            <option selected>Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Severity</label>
                          <div class="col-sm-10">
                          <select required onchange="myFunction()"name="severity" class="form-select" id="sev" aria-label="Default select example">
                            <option selected>Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Risk Priority Number</label>
                          <div class="col-sm-10">
                          <textarea class= "form-control" name="rpn" id="riskN" cols="8" rows="1.4"></textarea>
                          </div>
                        </div>
                        <script>
                          function myFunction() {
                            var x = document.getElementById("like").value;
                            var y = document.getElementById("sev").value;
                            var result = parseInt(x) * parseInt(y);                 
                            document.getElementById("riskN").innerHTML =  result;
                          }
                        </script>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Evaluation Result</label>
                          <div class="col-sm-10">
                          <select required name="eval_res" class="form-select"  aria-label="Default select example">
                            <option value="">Select</option>
                            <option value="High Risk">High Risk</option>
                            <option value="Medium Risk">Medium Risk</option>
                            <option value="Low Risk">Low Risk</option>
                          </select>  
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Treatment</label>
                          <div class="col-sm-10">
                          <select required name="treatment" class="form-select"  aria-label="Default select example">
                            <option value="">Select</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Treat">Exploit</option>
                            <option value="Transfer">Transfer</option>
                          </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Action Plan</label>
                          <div class="col-sm-10">
                            <input
                              required
                              type="text"
                              class="form-control"
                              id="basic-default-company"
                              placeholder=""
                              name="action_plan"
                              /> 
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Responsible</label>
                          <div class="col-sm-10">
                            <input
                              required
                              type="text"
                              class="form-control"
                              id="basic-default-company"
                              placeholder=""
                              name="responsible"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Start of Activity</label>
                          <div class="col-sm-10">
                            <input
                              required
                              type="date"
                              class="form-control"
                              id="basic-default-company"
                              placeholder=""
                              name="start"
                            />  
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">End of Activity</label>
                          <div class="col-sm-10">
                            <input
                              required
                              type="date"
                              class="form-control"
                              id="basic-default-company"
                              placeholder=""
                              name="end"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Measure of Effectiveness</label>
                          <div class="col-sm-10">
                            <select required name="measure" class="form-select"  aria-label="Default select example">
                              <option value="">Select</option>
                              <option value="Effective">Effective</option>
                              <option value="Not Effective">Not Effective</option>
                            </select>  
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Monitoring Frequency</label>
                          <div class="col-sm-10">
                            <select required name="monitoring" class="form-select"  aria-label="Default select example">
                              <option value="">Select</option>
                              <option value="Annual">Annual</option>
                              <option value="Semestral">Semestral</option>
                              <option value="Quarterly">Quarterly</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3"> 
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Date of Assessment</label>
                          <div class="col-sm-10">
                            <input
                              required
                              type="date"
                              class="form-control"
                              id="basic-default-company"
                              placeholder=""
                              name="dataAs"
                              /> 
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Date of Reassessment</label>
                          <div class="col-sm-10">
                            <input
                              required
                              type="date"
                              class="form-control"
                              id="basic-default-company"
                              placeholder=""
                              name="dataRe"
                            />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <a type="submit" href="../Edit/editRisk.php" class="btn btn-danger">Update</a>
                            <a type="submit" href="../Forms/addRisk.php" class="btn btn-primary">Back</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
              </div>
            </div>
            <!-- / Content -->
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

                    })
                  });
                  $('#process').val();
                })
              </script>


<?php 
include("f.php");
?>