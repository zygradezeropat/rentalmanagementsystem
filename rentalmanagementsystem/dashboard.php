<?php include("connect.php");
include("links.php");
include 'sidebar.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
}

?>

<style>
    h4 {
        color: white;
        width: 10px fixed;
    }
</style>
<div class="home">
    <div class="col py-3">

        <div class="containe-fluid">
            <div class="row mt-3 ml-3 mr-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <hr>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card border-primary">
                                        <div class="card-body bg-primary">
                                            <div class="card-body text-white">
                                                <span class="float-right summary_icon"> <i class="bi bi-door-closed"></i></span>
                                                <h4><b>
                                                        <?php echo $conn->query("SELECT * FROM rooms")->num_rows
                                                        ?>
                                                    </b></h4>
                                                <p><b>Total Rooms</b></p>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a href="room.php" class="text-primary float-right">View List <span class="fa fa-angle-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card border-warning">
                                        <div class="card-body bg-warning">
                                            <div class="card-body text-white">
                                                <span class="float-right summary_icon"> <i class="bi bi-person"></i></span>
                                                <h4><b>
                                                        <?php echo $conn->query("SELECT * FROM renters where status = 1 ")->num_rows
                                                        ?>
                                                    </b></h4>
                                                <p><b>Total Renters</b></p>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a href="renter.php" class="text-primary float-right">View List <span class="fa fa-angle-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card border-success">
                                        <div class="card-body bg-success">
                                            <div class="card-body text-white">
                                                <span class="float-right summary_icon"> <i class="bi bi-credit-card"></i></span>
                                                <h4><b>
                                                        <?php $count = mysqli_query($conn, "SELECT amount FROM payments");
                                                        $total = 0;
                                                        while ($row = mysqli_fetch_assoc($count)) {
                                                            $total += $row['amount'];
                                                        }
                                                        echo number_format($total,2); ?>
                                                    </b></h4>
                                                <p><b>Payments This Month</b></p>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a href="payment_report.php" class="text-primary float-right">View Payments <span class="fa fa-angle-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>