<?php include 'connect.php';
include 'sidebar.php';
include 'links.php';

?>
<?php
$month_of = isset($_GET['month_of']) ? $_GET['month_of'] : date('Y-m');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = validate($_POST['renter_id']);
}
$nem = $conn->query("SELECT *, concat(lastname,', ',firstname,' ',middlename) as name FROM renters WHERE id = '$id'");
$rem = $nem->fetch_assoc();
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
            border-collapse: collapse
        }

        tr,
        td,
        th {
            border: 1px solid black;
        }
    </style>
</noscript>
<div class="home">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <a href="balance_report.php" class="text-right"><button class="btn btn-outline-primary">
                                BACK</button></a>
                    </div>
                    <div class="col-md-12">
                        <form id="filter-report">
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                        <div id="report">
                            <div class="on-print">
                                <p>
                                    <center>Rental Payments Report</center>
                                </p>
                                <p>
                                    <center>for the Month of <b><?php echo date('F ,Y', strtotime($month_of . '-1')) ?></b></center>
                                </p>
                            </div>
                            <div class="row" id="printableTable">

                            </div>
                            <div class="col-md-12">
                                <b>
                                    <p><?php echo $rem['name'] ?></p>
                                </b>
                                <b>Payment List</b>
                                <hr>
                                <table class="table table-condensed table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Invoice</th>
                                            <th>Amount</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $conn->query("SELECT *
                                            FROM payments
                                            INNER JOIN renters ON payments.renter_id = renters.id
                                            INNER JOIN rooms ON renters.room_id = rooms.room_id WHERE renter_id = '$id';
                                            ");

                                        if ($sql->num_rows > 0) :
                                            while ($row = $sql->fetch_assoc()) :
                                              

                                        ?>
                                                <tr>
                                                    <td><?php echo $row['date_created'] ?></td>
                                                    <td><?php echo $row['invoice'] ?></td>
                                                    <td><?php echo $row['amount'] ?></td>
                                                   
                                                  
                                                </tr>
                                    </tbody>
                                <?php endwhile;
                                ?>
                            <?php else : ?>
                                </tbody>

                                
                                <tfoot>
                                    <tr>
                                        <th colspan="9">
                                            <center>No Data.</center>
                                        </th>
                                    </tr>
                                <?php endif; ?>
                                </tfoot>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $('#print').click(function() {
        var _style = $('noscript').clone()
        var _content = $('#report').clone()
        var nw = window.open("", "_blank", "width=800,height=700");
        nw.document.write(_style.html())
        nw.document.write(_content.html())
        nw.document.close()
        nw.print()
        setTimeout(function() {
            nw.close()
        }, 500)
    })
</script>