<?php include('connect.php');
include('links.php'); 


?>
<script>
    function myFunction() {
        var x = document.getElementById("mypass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: auto;
        background: scroll;

    }

    .container {
        content: inherit;
        background-position: right top;
        border: 1px solid rgb(87, 218, 126);
        border-radius: 10px;
        margin: 90px 230px 10px 230px;
        height: 440px;
        padding-bottom: 40px;


    }

    div>label {
        padding: 20px 20px 0px 20px;
    }

    .text {
        width: 240px;
        height: 40px;
        border: 1px solid rgb(87, 218, 126);
        border-radius: 5px;
    }

    .password {
        width: 240px;
        height: 40px;
        border: 1px solid rgb(87, 218, 126);
        border-radius: 5px;
        position: relative;
    }

    h4 {
        padding: 30px 0px 0px 0px;
    }

    .btn {
        margin-top: 20px;
    }

    .img {
        padding: 30px 0px 0px 250px;
    }

    footer {
        background-color: rgb(87, 218, 126);
    }

    @font-face {
        font-family: myFirstFont;
        src: url(Font/Poppins-Regular.ttf);
    }

    body {
        font-family: myFirstFont;
    }

    #check {

        margin-top: 1px;

    }


    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }


    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 25%;
        height: 50%;

    }

    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    #reg {
        width: 100px;
        box-sizing: border-box;
        margin-left: 100px;
    }
</style>
</head>
<body>
    <form method="POST" action="login.php">
        <div class="row">
            <div class="col img">
                <image src="img/House searching.gif"></image>
            </div>
            <div class="container col text-center">
                <h4>MANAITS RENTAL</h4>
                <?php if (isset($_GET['error'])) { ?>
                    <script>
                        alert('Wrong username/password')
                    </script>
                <?php } ?>

         
	<?php if (isset($_GET['logout'])) { ?>
		<script>
			alert('Successfully logout');
		</script>
	<?php } ?>
	

                <div>
                    <label>USERNAME</label><br>
                    <input type="text" class="text text-center" name="uname">
                </div>

                <div>
                    <label>PASSWORD</label><br>
                    <input type="password" class="password text-center" id="mypass" name="pass"><br>
                </div>
                <div>
                    <input type="checkbox" id="check" onclick="myFunction()">Show password
                    <hr style="color: rgb(87, 218, 126); border: 1px solid;">
                    <button type="submit" class="btn btn-success"> Log in</button>

                </div>
            </div>
        </div>
    </form>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div>
                <label>NAME</label><br>
                <input type="text" class="text text-center" required>
            </div>

            <div>
                <label>USERNAME</label><br>
                <input type="text" class="password text-center" required><br>
            </div>
            <div>
                <label>PASSWORD</label><br>
                <input type="password" class="password text-center" required><br>
            </div>

            <select name="" id="">
                <option value="">USER TYPE</option>
                <option value="">ADMIN</option>
                <option value="">RENTER</option>
            </select>
            <button type="button" class="btn btn-success" id="reg">Register</button>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("mypass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <div class=" my-5">
        <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
            <section class="d-flex justify-content-between p-4 text-white" style="background-color:rgb(87, 218, 126)">
            </section>
            <section>
                <div class=" text-center text-md-start mt-5">
                   <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold">MANAIT RENTALS</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color:rgb(87, 218, 126); height: 2px" />
                            <p>
                                <span>
                                    "Your Safe Haven: Affordable, High-Quality House Rentals"
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            <hr>
            <img src="img/Life in a city.gif" class="container-fluid justify-content-center" style="height: 50%; width: 50%; display: grid;">
            <div class="content">
                <div class="content-body">
                    <hr class="container-fluid">
                    <div class="container-fluid mt-2">
                        <h3 class="content-header text-center">Our Company</h3>
                        <p class="text-center m-5">
                            Welcome to Manait's Rental, where quality, affordability,
                            and safety are our top priorities. We are committed to providing our customers with
                            exceptional rental spaces that meet their needs and exceed their expectations.
                            With meticulous maintenance of our properties, you can trust that your rental
                            experience will be hassle-free and comfortable. Our competitive and transparent
                            pricing ensures that you get the best value for your money. We take your safety
                            seriously, implementing robust security measures to give you peace of mind. Our
                            friendly and knowledgeable staff is always ready to assist you. Renting with
                            us is a decision you won't regret. Experience the difference today!
                        </p>
                    </div>
                    <hr class="container-fluid">
                    <div class="container-fluid text-center">
                        <div class="row">
                            <div class="col-lg-6">
                                <img class="img-fluid" src="img/Create.gif">
                            </div>
                            <div class="col">
                                <h4 class="p-3">Vision</h4>
                                <p>
                                    "Where Quality Meets Excellence and Safety: Providing
                                    Top-Notch Rental Spaces for a Secure and Exceptional Experience."
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="p-3">Mission</h4>
                                    <p>
                                        "Delivering Exceptional Service with Top-Notch Facilities,
                                        Ensuring Affordable <br>and Secure Rental Space Solutions"
                                    </p>
                                </div>
                                <div class="col-lg-6">

                                    <img class="img-fluid" src="img/Business mission.gif">
                                </div>
                            </div>
                    </div>
                    </section>
            <section class="d-flex justify-content-between p-4 text-white" style="background-color: rgb(87, 218, 126)">
            </section>