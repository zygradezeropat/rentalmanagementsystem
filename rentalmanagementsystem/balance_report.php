<?php include 'links.php'; ?>
<?php include 'connect.php'; ?>


<?php
include 'sidebar.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
}
?>

<div class="home">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <a href="report.php" class="text-right"><button class="btn btn-outline-primary">
                                BACK </button></a>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <div id="report">
                            <div class="on-print">
                                <p>
                                    <center>Balance Renter Report</center>
                                </p>
                            </div>
                            <div class="row">
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Renter</th>

                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <form action="view_in.php" method="POST">

                                            <input type="hidden" id="renter_id" name="renter_id">
                                            <?php
                                            $i = 1;
                                            $balanceRenters = $conn->query("SELECT *, concat(lastname,', ',firstname,' ',middlename) as name FROM renters");
                                            if ($balanceRenters->num_rows > 0) :
                                                while ($row = $balanceRenters->fetch_assoc()) :
                                            ?>

                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $row['id'] ?></td>
                                                        <td><?php echo ucwords($row['name']) ?></td>
                                                        <td class="text-center"><input type="submit" class="btn btn-sm btn-outline btn-primary viewRent" value="VIEW">
                                                        </td>
                                                    </tr>

                                                <?php endwhile;
                                                ?>
                                        </form>
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
    $('.viewRent').on('click', function() {
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data);


        $('#renter_id').val(data[1]);

    });
</script>



</html>