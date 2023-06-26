<?php
session_start();
$_SESSION["cat"] = "Dash";
$_SESSION["sub-cat"] = "";
include("h.php");
include("database.php");
?>
<style>
    /* .divN {
      background-color: yellow;
    }
    .divM {
      background-color: orange;
    }
    .divQ {
      background-color: red;
    }
    .divP {
      background-color: blue;
    } */
    .home-title {
      padding: 15px;
      text-align: start;
      font-size: 24px;
      color: #333;
      font-weight: bold;
      letter-spacing: 3px;
    }
  </style>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-13 mb-4 ">
      <div class="card">
        <div class="d-flex justify-content-start">
          <div class="col-sm-1j">
            <div class="card-body">
              <div class ="row mr-10 div0">
                <img style="width: 190px; height: 115px;"src="ecclogo.jpg" alt="Image Description">
              <div class="col ">
                <div class="home-title">
                  <h1>Employees' Compensation Commission</h1>
                  <h5>Current User : <?php echo $_SESSION['fullName'] ?></h5>
                </div>
              </div>   
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 order-1">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img
                    src="../assets/img/icons/unicons/chart-success.png"
                    alt="chart success"
                    class="rounded"
                  />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt3"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Risks</span>
              <?php
                // Define the SQL query to count the rows
                $query = "SELECT COUNT(*) AS risk_num FROM risk_table";
                // Execute the query
                $result = mysqli_query($conn, $query);
                // Check if the query was successful
                if ($result) {
                    // Fetch the count value
                    $row = mysqli_fetch_assoc($result);
                    $count = $row['risk_num'];
                }
              ?>
              <h3 class="card-title mb-2"><?php echo $count;?></h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img
                    src="../assets/img/icons/unicons/wallet-info.png"
                    alt="chart success"
                    class="rounded"
                  />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt3"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Opportunity</span>
              <?php
                
                // Define the SQL query to count the rows
                $query = "SELECT COUNT(*) AS opp_num FROM opportunity_table";

                // Execute the query
                $result = mysqli_query($conn, $query);

                // Check if the query was successful
                if ($result) {
                    // Fetch the count value
                    $row = mysqli_fetch_assoc($result);
                    $count = $row['opp_num'];
                }
              ?>
              <h3 class="card-title mb-2"><?php echo $count;?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php
include("f.php");
?>