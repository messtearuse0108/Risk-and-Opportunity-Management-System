                        <div class="row mb-3">
                          <input type="hidden" name="r_id" value="<?php echo $r_id; ?>">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Year Identified</label>
                            <div class="col-sm-10">
                              <select   name="year_id" class="form-select" aria-label="Default select example">
                                <option value="<?php echo $year_id ?>"><?php echo $year_id ?></option>
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
                              name="risk_num"
                              type="text"
                              class="form-control"
                              id="basic-default-company"
                              value="<?php echo $risk_num?>"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Division</label>
                            <div class="col-sm-10">
                              <select  id= 'division' name = "division"  class = "form-control" value = "<?php echo $division ?>" single>
                                <?php 
                                  $stm = $conn->query("SELECT * FROM division_cat ");
                                  $output="";
                                  $output.='
                                  <option value= "" active >'.$division.'</option>';
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
                            <div class="col-sm-5">
                              <input
                                readonly
                                type="text"
                                class="form-control"
                                id="basic-default-company"
                                value="<?php echo $process ?>"
                              />
                            </div>
                            <div class="col-sm-5">
                              <select name = "process" id= "process" class = "form-control" single>
                              </select> 
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Frequency</label>
                          <div class="col-sm-10">
                            <select  name = "frequency"  class = "form-select" >
                              <?php 
                                  $stm = $conn->query("SELECT * FROM lookup_table WHERE lookupcat_ID = 3");
                                  $output="";
                                  $output.='
                                  <option value= "" active>'.$frequency.'</option>';
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
                          <div class="col-sm-5">
                            <input 
                              readonly
                              type="text" 
                              class="form-control"  
                              value="<?php 
                              $output="";
                                        while($factor = $result2->fetch_assoc()){
                                        $output= $factor['factor_name'];
                                        echo "[".$output."] ";
                                        }
                                      ?>">
                          </div>
                          <div class="col-sm-5">
                            <select  name = "factor[]"  class = "form-control js-example-basic-multiple" multiple >
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
                              name = "risks"
                              type="text"
                              class="form-control"
                              id="basic-default-company"
                              value="<?php echo $risks ?>"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Impact</label>
                          <div class="col-sm-10">
                            <input name = "impact" value="<?php echo $impact ?>" type="text" class="form-control" id="basic-default-name"  />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Likelihood</label>
                          <div class="col-sm-10">
                            <select  onchange="myFunction()"name="likelihood" class="form-select" id="like" aria-label="Default select example">
                                  <option value= "<?php echo $likelihood ?>"><?php echo $likelihood ?></option>
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
                            <select  onchange="myFunction()"name="severity" class="form-select" id="sev" aria-label="Default select example">
                              <option value="<?php echo $severity ?>"><?php echo $severity ?></option>
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
                          <div class="col-sm-5">
                            <input readonly name="rpn" class=  "form-control" id="riskN" cols="8" rows="1.4" value="<?php echo $rpn ?>">
                          </div>
                          <div class="col-sm-5">
                            <textarea readonly class= "form-control" name="rpn" id="riskN" cols="8" rows="1.4" ></textarea>
                          </div>
                          <script>
                                function myFunction() {
                                  var x = document.getElementById("like").value;
                                  var y = document.getElementById("sev").value;
                                  var result = parseInt(x) * parseInt(y);                 
                                  document.getElementById("riskN").innerHTML =  result;
                                }
                            </script>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Evaluation Result</label>
                          <div class="col-sm-10">
                            <select  name="eval_res" class="form-select"  aria-label="Default select example">
                              <option value="<?php echo $eval_res ?>"><?php echo $eval_res ?></option>
                              <option value="High Risk">High Risk</option>
                              <option value="Medium Risk">Medium Risk</option>
                              <option value="Low Risk">Low Risk</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Treatment</label>
                          <div class="col-sm-10">
                            <select  name="treatment" class="form-select"  aria-label="Default select example">
                              <option value="<?php echo $treatment ?>"><?php echo $treatment ?></option>
                              <option value="Monitor">Monitor</option>
                              <option value="Treat">Treat</option>
                              <option value="Transfer">Transfer</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Action Plan</label>
                          <div class="col-sm-10">
                            <input  value="<?php echo $action_plan?>" name= "action_plan" type="text" class="form-control" id="basic-default-name"/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Responsible</label>
                          <div class="col-sm-10">
                            <input
                              name="responsible"
                              type="text"
                              class="form-control"
                              value="<?php echo $responsible ?>"
                              id="basic-default-company"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Start of Activity</label>
                          <div class="col-sm-10">
                            <input name="start" value="<?php echo $start ?>" type="date" class="form-control" id="basic-default-name" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">End of Activity</label>
                          <div class="col-sm-10">
                            <input
                              name="end"
                              type="date"
                              class="form-control"
                              value="<?php echo $end ?>"
                              id="basic-default-company"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Measure of Effectiveness</label>
                          <div class="col-sm-10">
                            <select  name="measure" class="form-select"  aria-label="Default select example">
                              <option value="<?php echo $measure ?>"><?php echo $measure ?></option>
                              <option value="Effective">Effective</option>
                              <option value="Not Effective">Not Effective</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Monitoring Frequency</label>
                          <div class="col-sm-10">
                            <select  name="monitoring" class="form-select"  aria-label="Default select example">
                              <option value="<?php echo $monitoring ?>"><?php echo $monitoring ?></option>
                              <option value="Annual">Annual</option>
                              <option value="Semestral">Semestral</option>
                              <option value="Quarterly">Quarterly</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3"> 
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Date of Assessment</label>
                          <div class="col-sm-10">
                            <input value="<?php echo $dataAs ?>" name="dataAs" type="date" class="form-control" id="basic-default-name" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Date of Reassessment</label>
                          <div class="col-sm-10">
                            <input
                              name="dataRe"
                              type="date"
                              class="form-control"
                               value="<?php echo $dataRe ?>"
                              id="basic-default-company"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Encoder</label>
                          <div class="col-sm-10">
                            <input
                            readonly
                              type="text"
                              class="form-control"
                               value="<?php echo $encoder ?>"
                              id="basic-default-company"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Date Encoded</label>
                          <div class="col-sm-10">
                            <input
                            readonly
                              type="text"
                              class="form-control"
                               value="<?php echo $dateEncoded?>"
                              id="basic-default-company"
                            />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <input type="submit" class ="btn btn-success" value="Save">
                            <a type="submit" href="../Forms/addRisk.php" class="btn btn-primary">Back</a>
                          </div>
                        </div>