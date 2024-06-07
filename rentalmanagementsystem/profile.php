<?php
include 'connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
} else {
}
$id = $_SESSION['user'];

$sql2 = $conn->query("SELECT * from renters where id = '$id' ");
$sql3 = $conn->query("SELECT * FROM user where id = '$id'");
$row2 = $sql2->fetch_assoc();
$row3 = $sql3->fetch_assoc();


?>


<div class="container text-center">
    <div class="row">
        <div class="col-md-6">
            <img src="img/Personal settings.gif" style = "margin-top: 150px">
        </div>
        <div class="col-md-6 p-4">
            <h1 class="p-2">PERSONAL INFORMATION</h1>
            <div class="form-content  text-left">
                <form action="edit_info.php" method="POST">

                    <label for="fname" class="form-label p-2">First Name :</label>
                    <input type="text" class="form-control" placeholder=" " name="firstname" value="<?php echo $row2['firstname'] ?>">

                    <label for="fname" class="form-label p-2">Middle Name :</label>
                    <input type="text" class="form-control" placeholder=" " name="middlename" value="<?php echo $row2['middlename'] ?>">

                    <label for="fname" class="form-label p-2">Last Name :</label>
                    <input type="text" class="form-control" placeholder=" " name="lastname" value="<?php echo $row2['lastname'] ?>">

                    <label for="contact" class="form-label p-2">Contact Number :</label>
                    <input type="tel" class="form-control" placeholder=" " name="contact" value="<?php echo $row2['contact'] ?>">

                    <label for="contact" class="form-label p-2">Address :</label>
                    <input type="text" class="form-control" placeholder="" name="address" value="<?php echo $row2['address'] ?>">

                    <label for="contact" class="form-label p-2">Email :</label>
                    <input type="text" class="form-control" placeholder="" name="email" value="<?php echo $row2['email'] ?>">


                    <label for="contact" class="form-label p-2">Username :</label>
                    <input type="text" class="form-control" placeholder="" name="user" value="<?php echo $row3['user_name'] ?>">

                    <label for="contact" class="form-label p-2">Password :</label>
                    <input type="password" class="form-control" placeholder="" name="pass" value="">


                    <div class="bttn d-block">
                        <input type="submit" class="btn btn-success m-5 p-3" name="submit">

                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- REPORT ME -->
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
</div>

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
</div>