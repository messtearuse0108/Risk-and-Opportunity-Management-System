<?php  
                        // Check if the query executed successfully
                        if ($resultE) {
                            // Check if there are rows returned
                            if ($resultE->num_rows > 0) {
                                // Initialize an array to store the values
                                $measureArray = array();
                        
                                // Fetch all rows from the result
                                while ($rowT = $resultE->fetch_assoc()) {
                                    // Access the value from the desired column
                                    $value = $rowT['measure'];
                        
                                    // Add the value to the array
                                    $measureArray[] = $value;
                                }
                        
                                // Iterate over the array indices and display the values
                                foreach ($measureArray as $index => $value) {
                                    echo "<div class='row mb-3'>";
                                    echo "<label class='col-sm-9 col-form-label' for='basic-default-company'>Measure " . ($index + 1) . "</label><br>";
                                    echo "<input readonly class ='form-control' type='text' name='measure[$index]' value='$value'><br></div>";
                                }
                            } else {
                                echo "No data found in the database.";
                            }
                        } else {
                            echo "Error executing the SQL query: " . $connection->error;
                        }
                      ?>