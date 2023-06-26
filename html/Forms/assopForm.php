                      <?php 
                      $connection = mysqli_connect("localhost", "root", "");
                      $db = mysqli_select_db($connection,'risk');                      
                      $sqlVal = "SELECT a.o_id,a.opp_num,a.rpn,b.id,b.o_id FROM opportunity_table a 
                      LEFT JOIN oppassessment_table b ON a.o_id = b.o_id WHERE a.o_id=b.o_id";
                      $resultVal = $connection->query($sqlVal);
                      ?>
                      <form action="../Create/backendAssOppAdd.php" onsubmit="window.location.reload()" method="post" >
                        <div class ="row mb-4">
                          <div class="col mb-3">
                            <label class="col-sm-5 col-form-label" for="basic-default-company">Risk Number</label>
                             <div class="col-sm-16">
                              <select class = "form-select" id="riskId">
                                <option value="" readonly>Select Risk Number</option>
                                  <?php 
                                    while( $rowVal = $resultVal->fetch_assoc()){
                                      echo "<option value='$rowVal[o_id]'>$rowVal[opp_num]</option>";
                                    }
                                  ?>
                              </select>
                               <!-- Hidden Value for Risk Number -->
                              <textarea hidden  name="o_num" value="<?php echo $rowVal["opp_num"]; ?>" class="form-control" id="riskVal" cols="30" rows="10"></textarea>
                              <textarea hidden  name="o_id" value="<?php echo $rowVal["o_id"]; ?>" class="form-control" id="risknumID" cols="30" rows="10"></textarea>
                            </div>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-8 col-form-label" for="basic-default-company">Did Risk Occur?</label>
                            <select  required name="oppOccur" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                              <option value="">Select</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                        </div>
                        <!-- Divider -->
                        <div class ="row mb-4">
                          <div class="col mb-1">
                            <label class="col-sm-8 col-form-label" for="basic-default-company">Effectiveness</label>
                            <select  required name="effective" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                              <option value="">Select</option>
                              <option value="Effective">Effective</option>
                              <option value="Not Effective">Not Effective</option>
                            </select>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-5 col-form-label" for="basic-default-company">Remarks</label>
                            <div class="col-sm-16">
                              <textarea name="remarks" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                          </div> 
                        </div>
                        <div class ="row mb-4">
                          <div class="col mb-1">
                            <label class="col-sm-9 col-form-label" for="basic-default-company">Likelihood</label>
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-bs-toggle="tooltip"
                              data-bs-offset="0,4"
                              data-bs-placement="top"
                              data-bs-html="true"
                              title="
                                    <span>1 Occurred in the last 2 years</span> <br><br>
                                    <span>2 Occurred once a year</span> <br><br>
                                    <span>3 Occurred at least once per semester</span> <br><br>
                                    <span>4 Occurred once or more within a quarter</span> <br><br>
                                    <span>5 Happens once or more times per month</span>
                                    ">
                            </button>
                            <select  required onchange="myFunction()" name="likelihood" class="form-select" id="like" aria-label="Default select example">
                              <option value="">Select</option>
                              <option value="1">1 Rare</option>
                              <option value="2">2 Moderate</option>
                              <option value="3">3 Possible</option>
                              <option value="4">4 Likely</option>
                              <option value="5">5 Almost Certain</option>
                            </select>
                          </div>
                          <div class="col mb-1">
                            <label class="col-sm-9 col-form-label" for="basic-default-company">Benefits</label>
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-bs-toggle="tooltip"
                              data-bs-offset="0,4"
                              data-bs-placement="top"
                              data-bs-html="true"
                              title="
                                    <span>1 Potential improvement to the process</span> <br><br>
                                    <span>2 Recognizable/visible improvement to the process</span> <br><br>
                                    <span>3 Significant benefit to the organization</span> <br><br>
                                    <span>4 Major contributory to the objectives of the organization</span> <br><br>
                                    <span>5 Leads to innovative change in the organization’s context, policies and programs</span>
                                    ">
                            </button>
                            <select  required onchange="myFunction()" name="severity" class="form-select" id="sev" aria-label="Default select example">
                              <option value="">Select</option>
                              <option value="1">1 Minimal</option>
                              <option value="2">2 Minor</option>
                              <option value="3">3 Significant</option>
                              <option value="4">4 Major</option>
                              <option value="5">5 Beneficial</option>
                            </select>
                          </div> 
                          <div class="col mb-1">
                            <label class="col-sm-10 col-form-label" for="basic-default-name">OPN</label>
                            <div class="col-sm-15">
                              <!-- Current RPN-->
                            <textarea  class="form-control" name="rpn" id="riskN" cols="8" rows="1.4"></textarea>
                            <!-- Former FORMER -->
                            <textarea hidden class="form-control"  name="rpn" value="<?php echo $rowVal['rpn']; ?>" id="riskPast" cols="8" rows="1.4"></textarea>
                            </div>
                          </div>
                          <div class="col mb-3">
                            <label class="col-sm-9 col-form-label" for="basic-default-company">Evaluation Result</label>
                            <!-- <input type="text" name="eval_res" id="eval_id" readonly class="form-control" > -->
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-bs-toggle="tooltip"
                              data-bs-offset="0,2"
                              data-bs-placement="top"
                              data-bs-html="true"
                              title="
                                    <span>1-3   Monitor possible changes to the process</span> <br><br>
                                    <span>4-10  Take advantage of the opportunity</span> <br><br>
                                    <span>11-25 Adopt new strategies</span> <br><br>
                                    ">
                            </button>
                            <textarea  class="form-control" name="eval_res" id="eval_id" cols="8" rows="1.4"></textarea>
                          </div>
                        </div>
                        <script>
                          function myFunction() {
                            var x = document.getElementById("like").value;
                            var y = document.getElementById("sev").value;
                            var riskPast = document.getElementById("riskPast").value;
                            var riskCurr = parseInt(x) * parseInt(y);                 
                            //  document.getElementById("riskN").innerHTML =  riskCurr;
                            if( riskCurr > riskPast ){

                              document.getElementById("riskN").innerHTML =  riskCurr;
                              document.getElementById("eval_id").innerHTML =  "Increases";
                              
                            }else if(riskCurr < riskPast){
                              document.getElementById("riskN").innerHTML =  riskCurr;
                              document.getElementById("eval_id").innerHTML =  "Decreases";
                            }else{
                              document.getElementById("riskN").innerHTML =  riskCurr;
                              document.getElementById("eval_id").innerHTML =  "No Change";
                            }
                          }
                          $(document).ready(function(){
                              $('#riskId').change(function(){
                                var riskPast = $(this).val();
                                $.ajax({
                                  url: 'assOppQuery.php',
                                  type: 'POST',
                                  data: {riskPast: riskPast},
                                  success: function(data){
                                    $('#riskPast').val(data);
                                  }
                                })
                              });
                            });
                            $(document).ready(function(){
                              $('#riskId').change(function(){
                                var oppId = $(this).val();
                                $.ajax({
                                  url: 'assOppQuery2.php',
                                  type: 'POST',
                                  data: {oppId: oppId},
                                  success: function(data){
                                    $('#riskVal').val(data);
                                  }
                                })
                              });
                            });
                            $(document).ready(function(){
                              $('#riskId').change(function(){
                                var riskNum = $(this).val();
                                $.ajax({
                                  url: 'assOppQueryid.php',
                                  type: 'POST',
                                  data: {riskNum: riskNum},
                                  success: function(data){
                                    $('#risknumID').val(data);
                                  }
                                })
                              });
                            });
                        </script>
                        <div class ="row"  id="riskAddFields">
                          <div class="col mb-2">
                            <label class="col-sm-10 col-form-label" for="basic-default-company">Action Plan</label>
                              <div class="col-sm-15">
                                <textarea name="action_plan[]" class="form-control" id="" cols="40" rows="5"></textarea>
                              </div>
                          </div>  
                          <div class="col mb-1">
                            <div class ="row mb-4">
                              <div class="col-sm-15">
                                <label class="col-sm-10 col-form-label" for="basic-default-company">Treatment</label>
                                  <select  required name="treatment[]" class="form-select"  aria-label="Default select example">
                                    <option value="">Select</option>
                                    <option value="Tolerate">Tolerate</option>
                                    <option value="Treat">Treat</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Terminate">Terminate</option>
                                  </select>
                              </div>
                            </div>
                            <div class ="row mb-2">
                              <label class="col-sm-10 col-form-label" for="basic-default-company">Date of Assessment</label>
                                <div class="col-sm-7">
                                  <input
                                    required
                                    type="Date"
                                    class="form-control"
                                    id="basic-default-company"
                                    placeholder=""
                                    name="dateAs[]"
                                  />
                                </div>
                                <div class="col-sm-5">
                                  <button type="button"  class="btn btn-success add">Add</button>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="demo-inline-spacing">
                          <button type="Submit" name="insertOpp" class="btn btn-primary">Submit</button>
                          <button type="button" onclick="window.location.reload()" class="btn btn-secondary">Cancel</button>
                          <p>Note: The remove button will cause logical error. Try to click cancel to reload the page.</p>
                        </div>
                      </form>
                      <script>
         $(document).ready(function(){
    $(".add").click(function(e){
     e.preventDefault();
     $("#riskAddFields").prepend(`
     <div class ="row"  id="riskAddFields">
        <div class="col mb-2">
          <label class="col-sm-10 col-form-label" for="basic-default-company">Action Plan</label>
            <div class="col-sm-15">
              <textarea name="action_plan[]" class="form-control" id="" cols="40" rows="5"></textarea>
            </div>
        </div>  
        <div class="col mb-1">
          <div class ="row mb-4">
            <div class="col-sm-15">
              <label class="col-sm-10 col-form-label" for="basic-default-company">Treatment</label>
                <select  required name="treatment[]" class="form-select"  aria-label="Default select example">
                  <option value="">Select</option>
                  <option value="Tolerate">Tolerate</option>
                  <option value="Treat">Treat</option>
                  <option value="Transfer">Transfer</option>
                  <option value="Terminate">Terminate</option>
                </select>
            </div>
          </div>
          <div class ="row mb-2">
            <label class="col-sm-10 col-form-label" for="basic-default-company">Date of Assessment</label>
              <div class="col-sm-7">
                <input
                  required
                  type="Date"
                  class="form-control"
                  id="basic-default-company"
                  placeholder=""
                  name="dateAs[]"
                />
              </div>
              <div class="col-sm-5">
                <button type="button"  class="btn btn-danger remove">Remove</button>
              </div>
          </div>
        </div>
      </div>
     `);
    });
    $(document).on('click', ' .remove', function(e){
          e.preventDefault();
          $(this).closest('.row').parent().remove();
        });
  });
      </script>
