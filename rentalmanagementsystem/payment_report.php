<?php include 'connect.php';

include 'links.php';

?>
<?php

$month_of = isset($_GET['month_of']) ? $_GET['month_of'] : date('Y-m');

include 'sidebar.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
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
                        <a href="report.php" class="text-right"><button class="btn btn-outline-primary">
                                Back</button></a>
                    </div>
                    <div class="col-md-12">
                        <form id="filter-report">
                            <div class="row form-group">
                                <label class="control-label col-md-2 offset-md-2 text-right">Month of: </label>
                                <input type="month" name="month_of" class='from-control col-md-4' value="<?php echo ($month_of) ?>">
                                <button class="btn btn-sm btn-block btn-primary col-md-2 ml-1">Filter</button>
                            </div>
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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Renter</th>
                                            <th>Room Number</th>
                                            <th>Invoice</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $amount = 0;
                                        $payments = $conn->query("SELECT p.*, concat(r.lastname,', ' ,r.firstname,', ' ,r.middlename) AS name, s.room_num FROM payments p INNER JOIN renters r ON r.id = p.renter_id INNER JOIN rooms s ON s.room_id = r.room_id where date_format(p.date_created,'%Y-%m') = '$month_of' order by unix_timestamp(date_created)  asc");
                                        if ($payments->num_rows > 0) :
                                            while ($row = $payments->fetch_assoc()) :
                                                $amount += $row['amount'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo date('M d, Y', strtotime($row['date_created'])) ?></td>
                                                    <td><b><?php echo ucwords($row['name']) ?></b> </td>
                                                    <td><?php echo $row['room_num'] ?></td>
                                                    <td><?php echo $row['invoice'] ?></td>
                                                    <td class="text-right"><?php echo number_format($row['amount'], 2) ?></td>
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
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total Amount</th>
                                            <th class='text-right'><?php echo number_format($amount, 2) ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
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