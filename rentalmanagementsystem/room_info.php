<?php include 'connect.php';
include 'links.php';
include 'sidebar.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
}




if (isset($_POST['roomId'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $roomId = validate($_POST['roomId']);
    if ($roomId == 'Room 1') {
        $roomId = '1';
    } else if ($roomId == 'Room 2') {
        $roomId = '2';
    } else if ($roomId == 'Room 3') {
        $roomId = '3';
    } else if ($roomId == 'Room 4') {
        $roomId = '4';
    } else if ($roomId == 'Room 5') {
        $roomId = '5';
    } else {
        echo 'error';
    }
}
?>

<head>
    <script src="js/jquery.js"></script>
</head>
<style>
    .on-print {
        display: none;
    }
</style>
<noscript>
    <style>
        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        tr,
        td,
        th {
            border: 1px solid black;
        }
    </style>
</noscript>
<div class="home">

    <div class="justify-content-center">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="col">
                            <a href="room.php" class="text-right"><button class="btn btn-outline-primary">
                                    BACK</button></a>
                        </div>
                        <div class="row">

                            <div class="col-md-12 ">
                                <h4>INFORMATION</h4>
                            </div>
                        </div>
                        <div id="report">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date of Occupancy</th>
                                        <th>Address</th>
                                        <th>Email Address</th>
                                        <th>Contact Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $info = $conn->query("SELECT *, concat(firstname, ' ' ,middlename, ' ' ,lastname) as name FROM rooms NATURAL JOIN renters WHERE room_id =  " . $roomId . " ");

                                    if ($info->num_rows > 0) :
                                        while ($row = $info->fetch_assoc()) :
                                    ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><b><?php echo ucwords($row['name']) ?></b> </td>
                                                <td><?php echo date('M d, Y', strtotime($row['date_in'])) ?></td>
                                                <td><?php echo $row['address'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td class="text-right"><?php echo $row['contact']  ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else : ?>
                                        <tr>
                                            <th colspan="6">
                                                <center>No Data.</center>
                                            </th>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>