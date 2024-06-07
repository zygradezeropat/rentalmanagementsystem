<?php include("connect.php");
include("links.php");

include 'sidebar.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
} ?>


<style>
    h4 {
        color: white;
        width: 10px fixed;
    }

    .btn {
        padding: auto;
        font-size: 200%;
        margin-left: 40px;
    }
</style>
<div class="home">
    <div class="col py-3">
        <div class="container-fluid">
            <div class="row mt-3 ml-3 mr-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <hr>
                            <form action="room_info.php" method="POST">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="card border-success">
                                            <div class="card-body bg-success">
                                                <div class="card-body text-white">
                                                    <span class="float-right summary_icon"> <i class="bi bi-door-closed"></i></span>
                                                    <div class="col-lg-12">
                                                        <input type="submit" value="Room 1" name="roomId" class="btn btn-success">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="card border-success">
                                            <div class="card-body bg-success">
                                                <div class="card-body text-white">
                                                    <span class="float-right summary_icon"> <i class="bi bi-door-closed"></i></span>
                                                    <div class="col-lg-12">
                                                        <input type="submit" value="Room 2" name="roomId" class="btn btn-success">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="card border-success">
                                            <div class="card-body bg-success">
                                                <div class="card-body text-white">
                                                    <span class="float-right summary_icon"> <i class="bi bi-door-closed"></i></span>
                                                    <div class="col-lg-12">
                                                        <input type="submit" value="Room 3" name="roomId" class="btn btn-success">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="card border-success">
                                            <div class="card-body bg-success">
                                                <div class="card-body text-white">
                                                    <span class="float-right summary_icon"> <i class="bi bi-door-closed"></i></span>
                                                    <div class="col-lg-12">
                                                        <input type="submit" value="Room 4" name="roomId" class="btn btn-success">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="card border-success">
                                            <div class="card-body bg-success">
                                                <div class="card-body text-white">
                                                    <span class="float-right summary_icon"> <i class="bi bi-door-closed"></i></span>
                                                    <div class="col-lg-12">
                                                        <input type="submit" value="Room 5" name="roomId" class="btn btn-success">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>