<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventory Management System</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <!-- Main container -->
    <div id="dashboardMainContainer">
        <!-- Sidebar -->
        <div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="sidebar-logo">IMS</h3>
            <div class="sidebar-user">
                <img class="userimage" src="images/nice wonder.jpg" alt="User Image">
                <span class="username">Wonder</span>
            </div>
            <hr class="line">
            <div class="sidebar-menus">
                <ul class="sidebar-menu-list">
                    <li>
                        <a href="#" class="active">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content container -->
        <div class="dashboard-content-container" id="dashboard_content">
            <div class="dashboard-content-topNav">
                <a href="#" id="togglebtn"><i class="fa fa-navicon"></i></a>
                <a href="#" class="logout-btn">
                    <i class="fa fa-power-off"></i> Log-out
                </a>
            </div>
            <div class="dashboard-content">
                <div class="dashboard-content-main">
                    <h1>Welcome to the Dashboard</h1>
                    <p>This is your main content area.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const togglebtn = document.getElementById('togglebtn');
        const sidebar = document.getElementById('dashboard_sidebar');
        const content = document.getElementById('dashboard_content');

        togglebtn.addEventListener('click', (event) => {
            event.preventDefault();
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
        });
    </script>
</body>

</html>