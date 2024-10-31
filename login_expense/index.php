<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

check_user()

?>



<div class="container py-3">
    <h2 class="text-center display-6 fw-bold py-3  margin_yy hh1">Management System</h2>
    <div class="row px-3">

        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./display_reg.php">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Users</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">

                                <?php
                                    $user_query = "SELECT user_name from reg_users";
                                    $run_user_query = mysqli_query($conn,$user_query);
                                    echo mysqli_num_rows($run_user_query);
                                ?>

                            </h2>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <span>9.23% <i class="fa fa-arrow-up"></i></span>
                        </div> -->
                    </div>
                </div>
            </div>
            </a>
        </div>


        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./total_all_salary.php">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Monthly Salary</h5>
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

                                    $result_month_salary = mysqli_fetch_assoc($run_fetch_previous_month_total_salary);

                                    echo number_format($result_month_salary['total_price']);
                                ?>

                            </h2>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <span>9.23% <i class="fa fa-arrow-up"></i></span>
                        </div> -->
                    </div>
                </div>
            </div>
            </a>
        </div>


        <!-- Today Word -->
        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./today_income.php">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Today Income </h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                // total  today
                                $today_date = date("Y-m-d");
                                $fetch_today_total_income = "SELECT SUM(item_price) AS total_price FROM income_info WHERE item_date = '$today_date'";

                                $run_fetch_today_total_income = mysqli_query($conn, $fetch_today_total_income);

                                $result_today_income = mysqli_fetch_assoc($run_fetch_today_total_income);

                                echo number_format($result_today_income['total_price']);
                            ?>
                            </h2>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <span>
                            00
                                <i class="fas fa-dollar-sign"></i></span>
                        </div> -->
                    </div>
                </div>
            </div>
            </a>
        </div>



                <!-- Today Expense -->

        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./today_expense.php">
            <div class="card l-bg-white-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Today Expenses </h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                // total  today
                                $today_date = date("Y-m-d");
                                $fetch_today_total_expense = "SELECT SUM(item_price) AS total_price FROM expenses_info WHERE item_date = '$today_date'";

                                $run_fetch_today_total_expense = mysqli_query($conn, $fetch_today_total_expense);

                                $result_today_expense = mysqli_fetch_assoc($run_fetch_today_total_expense);

                                echo number_format($result_today_expense['total_price']);
                            ?>
                            </h2>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <span>000   
                                
                            show amount


                            <i class="fa fa-arrow-down"></i></span>
                        </div> -->
                    </div>
                </div>
            </div>
            </a>
        </div>


        <!-- Yesterday  -->

        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./yesterday_income.php">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Yesterday Income </h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                // total  yesterday
                                $today_date = date("Y-m-d", strtotime("-1 day"));
                                $fetch_yesterday_total_income = "SELECT SUM(item_price) AS total_price FROM income_info WHERE item_date = '$today_date'";

                                $run_fetch_yesterday_total_income = mysqli_query($conn, $fetch_yesterday_total_income);

                                $result_yesterday_income = mysqli_fetch_assoc($run_fetch_yesterday_total_income);

                                echo number_format($result_yesterday_income['total_price']);
                            ?>
                            </h2>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <span>2.5% <i class="fa fa-arrow-up"></i></span>
                        </div> -->
                    </div>
                </div>
            </div>
            </a>
        </div>
        





        <!-- Yesterday  -->


        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./yesterday_expense.php">
            <div class="card l-bg-sky-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Yesterday Expenses </h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                // total  yesterday
                                $today_date = date("Y-m-d", strtotime("-1 day"));
                                $fetch_yesterday_total_expense = "SELECT SUM(item_price) AS total_price FROM expenses_info WHERE item_date = '$today_date'";

                                $run_fetch_yesterday_total_expense = mysqli_query($conn, $fetch_yesterday_total_expense);

                                $result_yesterday_expense = mysqli_fetch_assoc($run_fetch_yesterday_total_expense);

                                echo number_format($result_yesterday_expense['total_price']);
                            ?>
                            </h2>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <span>000   
                                
                            show amount


                            <i class="fa fa-arrow-down"></i></span>
                        </div> -->
                    </div>
                </div>
            </div>
            </a>
        </div>




        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./yesterday_expense.php">
            <div class="card l-bg-fff-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Today Profit</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                // Calculate the difference between today's income and today's expenses
                                $today_date = date("Y-m-d");
                                $fetch_today_total_income = "SELECT SUM(item_price) AS total_income FROM income_info WHERE item_date = '$today_date'";

                                $fetch_today_total_expense = "SELECT SUM(item_price) AS total_expense FROM expenses_info WHERE item_date = '$today_date'";

                                $run_fetch_today_total_income = mysqli_query($conn, $fetch_today_total_income);

                                $run_fetch_today_total_expense = mysqli_query($conn, $fetch_today_total_expense);

                                $result_income = mysqli_fetch_assoc($run_fetch_today_total_income);

                                $result_expense = mysqli_fetch_assoc($run_fetch_today_total_expense);

                                $today_profit_balance = $result_income['total_income'] - $result_expense['total_expense'];

                                echo number_format($today_profit_balance);
                            ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>


        <div class="col-xl-6 col-lg-6 scrollme">
            <a href="./yesterday_expense.php">
            <div class="card l-bg-fff-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Yesterday Profit</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                                // Calculate the difference between today's income and today's expenses
                                $today_date = date("Y-m-d", strtotime("-1 day"));
                                $fetch_today_total_income = "SELECT SUM(item_price) AS total_income FROM income_info WHERE item_date = '$today_date'";

                                $fetch_today_total_expense = "SELECT SUM(item_price) AS total_expense FROM expenses_info WHERE item_date = '$today_date'";

                                $run_fetch_today_total_income = mysqli_query($conn, $fetch_today_total_income);

                                $run_fetch_today_total_expense = mysqli_query($conn, $fetch_today_total_expense);

                                $result_income = mysqli_fetch_assoc($run_fetch_today_total_income);

                                $result_expense = mysqli_fetch_assoc($run_fetch_today_total_expense);

                                $yesterday_profit_balance = $result_income['total_income'] - $result_expense['total_expense'];

                                echo number_format($yesterday_profit_balance);
                            ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>


        <!-- bar chart in last 10 days -->

        <div class="col-xl-6 scrollme">
            <div class="card">
                        <?php
                            // Fetch the income and expense data for the last 10 days from the database
                            $income_data = [];
                            $expense_data = [];
                            $labels = [];
                    
                            for ($i = 0; $i < 10; $i++) {
                                $date = date('Y-m-d', strtotime("-$i days"));
                    
                                // Replace the following queries with your actual database queries
                                $income_query = "SELECT SUM(item_price) AS total_income FROM income_info WHERE item_date = '$date'";
                                $expense_query = "SELECT SUM(item_price) AS total_expense FROM expenses_info WHERE item_date = '$date'";
                    
                                $income_result = mysqli_query($conn, $income_query);
                                $expense_result = mysqli_query($conn, $expense_query);
                    
                                $income_row = mysqli_fetch_assoc($income_result);
                                $expense_row = mysqli_fetch_assoc($expense_result);
                    
                                $income_data[] = $income_row['total_income'];
                                $expense_data[] = $expense_row['total_expense'];
                                $labels[] = $date;
                            }
                    
                            // Create the income dataset
                            $income_dataset = [
                                'label' => 'Income',
                                'data' => $income_data,
                                'backgroundColor' => 'rgba(75, 192, 192, 0.6)',
                                'borderColor' => 'rgba(75, 192, 192, 1)',
                                'borderWidth' => 1
                            ];
                    
                            // Create the expense dataset
                            $expense_dataset = [
                                'label' => 'Expense',
                                'data' => $expense_data,
                                'backgroundColor' => 'rgba(255, 99, 132, 0.6)',
                                'borderColor' => 'rgba(255, 99, 132, 1)',
                                'borderWidth' => 1
                            ];
                    
                            // Combine the datasets into a single array
                            $datasets = [$income_dataset, $expense_dataset];
                        ?>
        

        

                    <canvas id="barChart"></canvas>
        
                    <script>
                        // Get the canvas element
                        var ctx = document.getElementById('barChart').getContext('2d');
        
                        // Create the bar chart
                        var barChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: <?php echo json_encode($labels); ?>,
                                datasets: <?php echo json_encode($datasets); ?>
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
            </div>
        </div>








        <!-- clone bar chart defferent id -->


        <div class="col-xl-6 scrollme">
            <div class="card">


                    <?php
                        // Fetch the income and expense data for the last 10 days from the database
                        $income_data = [];
                        $expense_data = [];
                        $labels = [];

                        for ($i = 0; $i < 10; $i++) {
                            $date = date('Y-m-d', strtotime("-$i days"));

                            // Replace the following queries with your actual database queries
                            $income_query = "SELECT SUM(item_price) AS total_income FROM income_info WHERE item_date = '$date'";
                            $expense_query = "SELECT SUM(item_price) AS total_expense FROM expenses_info WHERE item_date = '$date'";

                            $income_result = mysqli_query($conn, $income_query);
                            $expense_result = mysqli_query($conn, $expense_query);

                            $income_row = mysqli_fetch_assoc($income_result);
                            $expense_row = mysqli_fetch_assoc($expense_result);

                            $income_data[] = $income_row['total_income'];
                            $expense_data[] = $expense_row['total_expense'];
                            $labels[] = $date;
                        }

                        // Create the income dataset
                        $income_dataset = [
                            'label' => 'Income',
                            'data' => $income_data,
                            'backgroundColor' => 'rgba(75, 192, 192, 0.6)',
                            'borderColor' => 'rgba(75, 192, 192, 1)',
                            'borderWidth' => 1
                        ];

                        // Create the expense dataset
                        $expense_dataset = [
                            'label' => 'Expense',
                            'data' => $expense_data,
                            'backgroundColor' => 'rgba(255, 99, 132, 0.6)',
                            'borderColor' => 'rgba(255, 99, 132, 1)',
                            'borderWidth' => 1
                        ];

                        // Combine the datasets into a single array
                        $datasets = [$income_dataset, $expense_dataset];
                    ?>




                <canvas id="lineChart"></canvas>

                <script>
                    // Get the canvas element
                    var ctx = document.getElementById('lineChart').getContext('2d');

                    // Create the line chart
                    var lineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: <?php echo json_encode($labels); ?>,
                            datasets: <?php echo json_encode($datasets); ?>
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>

            
            </div>
        </div>
       








        
    </div>
    
</div>










<?php
include("./includes/footer_copywrite.php");
include("./includes/footer.php");
?>