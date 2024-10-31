<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

check_user()


?>



<div class="container py-3">
    <h2 class="text-center display-6 fw-bold py-3 margin_yy hh1">Date Wise Salary</h2>
    <div class="row px-3">
        <div class="col-xl-6 col-lg-6">

            <!-- <a href="#"> -->

            <div class="card l-bg-orange-dark scrollme">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">This Month Income</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                    $current_date = date('Y-m-d');

                                    $previous_month = date('Y-m', strtotime('-1 month', strtotime($current_date)));

                                    $first_day_of_current_month = date('Y-m-01', strtotime($current_date));

                                    $fetch_previous_month_total_salary = "SELECT SUM(item_price) AS total_price FROM salary WHERE (item_date >= '$first_day_of_current_month' AND MONTH(item_date) = MONTH('$previous_month') AND YEAR(item_date) = YEAR('$previous_month')) OR (MONTH(item_date) = MONTH('$previous_month') - 1 AND YEAR(item_date) = YEAR('$previous_month'))";

                                    $run_fetch_previous_month_total_salary = mysqli_query($conn, $fetch_previous_month_total_salary);

                                    $result_month = mysqli_fetch_assoc($run_fetch_previous_month_total_salary);

                                    echo number_format($result_month['total_price']);

                            // $today_date = date("Y-m-d");
                            // $previous_month_date = date("Y-m-01", strtotime($today_date . "-1 month"));
                            // $fetch_month_total_income = "SELECT SUM(item_price) AS total_price FROM salary WHERE item_date BETWEEN '$previous_month_date' AND '$today_date'";

                            // $run_fetch_month_total_income = mysqli_query($conn, $fetch_month_total_income);

                            // $result_month = mysqli_fetch_assoc($run_fetch_month_total_income);

                            // echo $result_month['total_price'];
                            ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>


            <!-- </a> -->


        </div>
       
       
        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./all_salary.php">
            
            <div class="card l-bg-sky-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total All Salary</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                            
                            $current_date = date('Y-m-d');

                            $previous_year = date('Y', strtotime('-1 year', strtotime($current_date)));

                            $current_year = date('Y');

                            $fetch_year_to_previous_year_total_income = "SELECT SUM(item_price) AS total_price FROM salary WHERE YEAR(item_date) >= '$previous_year' AND YEAR(item_date) <= '$current_year'";

                            $run_fetch_year_to_previous_year_total_income = mysqli_query($conn, $fetch_year_to_previous_year_total_income);
                            
                            $result_year = mysqli_fetch_assoc($run_fetch_year_to_previous_year_total_income);

                            echo number_format($result_year['total_price']);
                            ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

       
        
    </div>
</div>








<?php
include("./includes/footer_copywrite.php");
include("./includes/footer.php");
?>