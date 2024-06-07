<?php include 'connect.php';
include 'links.php';

include 'sidebar.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
}

?>
<?php

$month_of = isset($_GET['month_of']) ? $_GET['month_of'] : date('Y-m');

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
                                            <th>Renter Id</th>
                                            <th>Issue</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $amount = 0;
                                        $payments = $conn->query("SELECT * from feedback");
                                        if ($payments->num_rows > 0) :
                                            while ($row = $payments->fetch_assoc()) :

                                        ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo date('M d, Y', strtotime($row['date'])) ?></td>
                                                    <td><?php echo $row['renter_id'] ?></td>
                                                    <td><b><?php echo $row['report'] ?></b> </td>

                                              
                                                   
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