<?php
include 'links.php';

session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
  } else {
  }

?>

<nav class="sidebar ">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="img/icon.png" alt="">
            </span>

            <div class="text logo-text">
                <span class="name">Manait's Rental</span>
            </div>
        </div>

        <i class='bi bi-caret-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">

            <ul class="menu-links">
                <li>
                    <a href="dashboard.php">
                        <i class='bi bi-speedometer icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="room.php">
                        <i class='bi bi-door-closed icon'></i>
                        <span class="text nav-text">Rooms</span>
                    </a>
                </li>

                <li>
                    <a href="renter.php">
                        <i class='bi bi-person icon'></i>
                        <span class="text nav-text">Renter</span>
                    </a>
                </li>

                <li>
                    <a href="maintenance_report.php">
                        <i class='bi bi-gear icon'></i>
                        <span class="text nav-text">Maintenance</span>
                    </a>
                </li>

                <li>
                    <a href="payments_renter.php">
                        <i class='bi bi-cash icon'></i>
                        <span class="text nav-text">Payments</span>
                    </a>
                </li>
          

                <li>
                    <a href="feedback.php">
                    <i class='bi bi-chat-left-dots icon'></i>
                        <span class="text nav-text">Feedback</span>
                    </a>
                </li>

                
                <li>
                    <a href="logbook.php">
                        <i class='bi bi-chat-left-text icon'></i>
                        <span class="text nav-text">Logbook</span>
                    </a>
                </li>

                <li>
                    <a href="report.php">
                        <i class='bi bi-list-columns-reverse icon'></i>
                        <span class="text nav-text">Reports</span>
                    </a>
                </li>




                <li>
                    <a href="user.php">
                        <i class='bi bi-people icon'></i>
                        <span class="text nav-text">User</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="log_out.php">
                    <i class='bi bi-box-arrow-left icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
        </div>
    </div>

</nav>



<script>
    var body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })
</script>