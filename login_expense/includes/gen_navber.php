

<!-- <nav class="navbar navbar-expand-lg shadow bg-body-tertiary px-md-5 px-2 fixed-top"> -->
<nav class="navbar navbar-expand-lg shadow px-md-5 px-2 fixed-top topbar_manue">
  <div class="container-fluid">
    <a class="navbar-brand me-md-5 fw-bold hh1" href="./logout.php">
    <?php echo isset($_SESSION['name']) ? ucfirst($_SESSION['name']) : 'SK'; ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link hh1" aria-current="page" href="./index.php">Dashboard</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hh1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu bg-primary-subtle">
            <li><a class="dropdown-item" href="./register_user.php">Add User</a></li>
            <li><a class="dropdown-item" href="./display_reg.php">All Users</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hh1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Expense
          </a>
          <ul class="dropdown-menu bg-primary-subtle">
            <li><a class="dropdown-item" href="./add_expense.php">Add Expense</a></li>
            <li><a class="dropdown-item" href="./total_all_expenses.php">Expense Deshboard</a></li>
            <li><a class="dropdown-item" href="./all_expenses.php">All Expense</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hh1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Income
          </a>
          <ul class="dropdown-menu bg-primary-subtle">
            <li><a class="dropdown-item" href="./add_income.php">Add Income</a></li>
            <li><a class="dropdown-item" href="./total_all_income.php">Income Deshboard</a></li>
            <li><a class="dropdown-item" href="./all_income.php">All Income</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hh1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lone
          </a>
          <ul class="dropdown-menu bg-primary-subtle">
            <li><a class="dropdown-item" href="./add_lone.php">Add Lone</a></li>
            <li><a class="dropdown-item" href="./paid_lone.php">Paid Lone</a></li>
            <li><a class="dropdown-item" href="./total_all_lone.php">Lone Deshboard</a></li>
            <li><a class="dropdown-item" href="./all_lone.php">All Lone</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle hh1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Report
          </a>
          <ul class="dropdown-menu bg-primary-subtle">
            <li><a class="dropdown-item" href="./search_expenses.php">Expense Report</a></li>
            <li><a class="dropdown-item" href="./search_income.php">Income Report</a></li>
            <li><a class="dropdown-item" href="./search_lone.php">Lone Report</a></li>
            <li><a class="dropdown-item" href="./search_paid_lone.php">Paid Lone Report</a></li>
          </ul>
        </li>
      </ul>
      <div>
        <div class="dropdown">
          <button class="btn dropdown-toggle fw-semibold hh1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi fs-4 bi-person-bounding-box me-2 hh1"></i> 
            <span><?php echo isset($_SESSION['name']) ? ucfirst($_SESSION['name']) : 'SK'; ?></span>
          </button>
          <ul class="dropdown-menu bg-primary-subtle">
            <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
