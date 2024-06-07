<!DOCTYPE html>
<html lang="en">

<head>
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

</head>

<body class="content justify-content-center">
  <div class="navbar justify-content-center bg-success-subtle p-3">

    <button id="logo-btn" class="btn btn-success-subtle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-arrow-left-right"></i>
    </button>

    <h6 style="font-size: 20px;margin-top: 7px;"><span>WELCOME <?php echo $row['name'] ?></h6>
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
              <a class="list-group-item list-group-item-action list-group-item-white p-4" href="profile_edit.php">Profile</a>
              <a class="list-group-item list-group-item-action list-group-item-white p-4" href="renter_payments.php">My Payments</a>
              <button type="button" class="list-group-item list-group-item-action list-group-item-white p-4" data-toggle="modal" data-target="#feedBack">Feedback</button>
              <button type="button" class="list-group-item list-group-item-action list-group-item-white p-4" data-toggle="modal" data-target="#exampleModal">Maintenance</button>
              <button type="button" class="list-group-item list-group-item-action list-group-item-white p-4" data-toggle="modal" data-target="#logbook">Logbook</button>
                           
              <a href="log_out.php"><button id="buttons" class="btn btn-success=-subtle">LOGOUT</i></a><svg xmlns"http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
              </svg></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/House bookshelves.gif" class="img-fluid d-inline-flex" alt="This is an image about a bookshelves" style="margin-left: 200px;">
        <img src="img/written2.png" class="img-fluid d-inline-flex" alt="This is an image of a calLigraphy">
      </div>
      <div class="carousel-item">
        <img src="img/written.png" class="img-fluid d-inline-flex" alt="This is an image of a calLigraphy" style="margin-left: 200px;">
        <img src="img/Building safety.gif" class="img-fluid d-inline-flex" alt="This is an image of a safe building">

      </div>
      <div class="carousel-item">
        <img src="img/Housing.gif" class="img-fluid d-inline-flex" alt="This is an image about a houses" style="height:190%; margin-left: 200px;">
        <img src="img/written3.png" class="img-fluid d-inline-flex" alt="This is an image of a calligraphy ">
      </div>
    </div>
    <button class="carousel-control-prev justify-content-between" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <section class="section border-box 1px p-5  fixed">
    <div class="row">
      <div class="col g-col-4">
        <pre clas="p-5" style="font-size: 15px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                " Your Safe Haven: Affordable,
                 High-Quality House Rentals. "
              </pre>
      </div>
      <div class="col g-col-4">
        <span class="p-5">For Direct Inquiries:&nbsp;&nbsp;+6397023612743</span><br>
        <span class="p-5">Email: &nbsp;&nbsp;info.tech@sup.ph <span>
      </div>

  </section>

<!-- FEEDBACK -->
<div class="modal fade" id="feedBack" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Submit Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="submit_feed.php" method="GET">
                <div class="modal-body">
                    <textarea name="report" id="" cols="55" rows="10">
        </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SUBMIT REPORT -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Submit your problem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="submit_report.php" method="GET">
          <div class="modal-body">
            <textarea name="report" id="" cols="55" rows="10">
        </textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  
<!-- SUBMIT LOG -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Submit Log</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="submit_log.php" method="GET">
          <div class="modal-body">
            <textarea name="report" id="" cols="55" rows="10">
        </textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>


    <!-- Logbook -->
    <div class="modal fade" id="logbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logbook</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="submit_log.php" method="GET">
          <div class="modal-body">
            <textarea name="report" id="" cols="55" rows="10">
        </textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>






</body>

</html>

<?php if (isset($_GET['submited'])) { ?>
		<script>
			alert('Successfully submit the report');
		</script>
	<?php } ?>
