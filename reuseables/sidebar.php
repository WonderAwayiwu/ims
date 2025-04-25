<!-- Sidebar -->
<div class="dashboard_sidebar" id="dashboard_sidebar">
    <h3 class="sidebar-logo">IMS</h3>
    <div class="sidebar-user">
        <img class="userimage" src="images/nice wonder.jpg" alt="User Image">
        <span style="font-size: 14px; "><?= $user['first_name'] . " " . $user['last_name']; ?></span>
    </div>
    <hr class="line">
    <div class="sidebar-menus">
        <ul class="sidebar-menu-list">
            <!-- class="active" -->
            <li>
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    <span class="menuname">DASHBOARD</span>
                </a>
            </li>
            <li>
                <a href="addUsers.php">
                    <i class="fa fa-user-plus"></i>
                    <span class="menuname">ADD USER</span>
                </a>
            </li>
            <!--
            <li>
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span class="menuname">REVENUE MANAGEMENT</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-credit-card"></i>
                    <span class="menuname">ACCOUNTS RECEIVABLE</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-wrench"></i>
                    <span class="menuname">CONFIGURATION</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <span class="menuname">STATS</span>
                </a>
            </li>
            -->
        </ul>
    </div>
</div>
