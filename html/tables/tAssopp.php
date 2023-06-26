<div class="table-wrapper-scroll-y my-custom-scrollbar">
            <div class="table-responsive text-nowrap" style="overflow-y:auto;">
                <table class="table datatable">
                    <thead class="table-light">
                      <tr>
                        <th>ID</th>
                        <th>Opportunity Number</th>
                        <th>Opportunity Occurrence</th>
                        <th>Effectiveness</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                     <!-- Content PHP -->
                     
                   
                    <?php 
                            $query = "SELECT * FROM oppassessment_table WHERE deleted=0 && rpn != 0 ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $student)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $student['id']; ?></td>
                                        <td><?= $student['o_num']; ?></td>
                                        <td><?= $student['oppOccur']; ?></td>
                                        <td><?= $student['effective']; ?></td>
                                        <td><?= $student['remarks']; ?></td>
                                       
                                        <td>
                                        <a class="btn btn-success" href="../viewFront/viewAssOpp.php?id=<?php echo $student['id']; ?>">View</a>&nbsp;
                                        <a  class="btn btn-danger" href="../Delete/backendDelAssOpp.php?id=<?php echo $student['id']; ?>">Delete</a>
                                        </td>   
                                    </tr>
                            <?php
                                }
                            }
                            else
                            {
                              echo "<h6> &nbsp; &nbsp; &nbsp; No Record Found &nbsp; &nbsp;</h6>";
                            }
                        ?>

                      <!-- Content PHP -->
                    </tbody>
                </table>
            </div>
        </div>
        
            
