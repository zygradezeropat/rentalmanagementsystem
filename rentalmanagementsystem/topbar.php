<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'links.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>MRRMS</title>

<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
} else {
}
$id = $_SESSION['user'];

$sql = $conn->query("SELECT name from user where id = '$id' ");
$row = $sql->fetch_assoc()
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style>
    #imgs {
        height: 50%;
        width: 25%;
        object-position: center;

    }

    @font-face {
        font-family: myFirstFont;
        src: url(Font/Poppins-Regular.ttf);
    }

    #buttons {
        margin-top: 200px;
        margin-left: 210px;
    }

    .list-group-item {
        padding-right: 20px;
    }

    img {
        height: 75vh;
        width: 75vh;
    }

    #logo-btn {
        margin-right: 70px;
    }

    section {
        background-color: #d1e7dd;
    }

    section>span {
        margin-left: 50px;
        display: inline;
    }

    #imgs {
        width: 50px;
        height: 50px;
    }
</style>


<body class="content justify-content-center">
    <div class="navbar justify-content-center bg-success-subtle p-3">

        <button id="logo-btn" class="btn btn-success-subtle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-arrow-left-right"></i>
        </button>

        <h6 style="font-size: 20px;margin-top: 7px;"><span>WELCOME HOME <?php echo $row['name'] ?></h6>
    </div>
    <div class="bg-light">
        <div class="offcanvas offcanvas-start bg-light" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header bg-white">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-white">
                <div class="offcanvass-header bg-white">
                    <div class="bg-white" id="sidebar-wrapper">
                        <div class="sidebar-heading  bg-white text-center " style="font-size: 40px;"></div>
                        <div class="list-group list-group-flush">
                            <a class="list-group-item list-group-item-action list-group-item-white p-4" href="userui.php">Home</a>
                            <a class="list-group-item list-group-item-action list-group-item-white p-4" href="#!">Profile</a>
                            <a class="list-group-item list-group-item-action list-group-item-white p-4" href="#!">My Payments</a>
                            <button type="button" class="list-group-item list-group-item-action list-group-item-white p-4" data-toggle="modal" data-target="#exampleModal">Maintenance</button>

                            <a href="log_out.php"><button id="buttons" class="btn btn-success=-subtle">LOGOUT</i></a><svg xmlns"http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>