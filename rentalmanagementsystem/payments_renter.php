<?php include("connect.php");

include 'links.php';
$sql = $conn->query("SELECT * FROM renters");
$row = $sql->fetch_assoc();
include 'sidebar.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
}
?>

<style>
    .text-primary {
        color: #0CDA90 !important;
    }

    .btn-primary {
        color: #fff;
        background-color: #0CDA90;
        border-color: #0CDA90;
    }

    .btn-primary {
        box-shadow: 0 3px 2px rgb(12 218 144 / 20%);
    }
</style>
</head>

<body>




    <div class="home">
        <main>

         <!-- EDIT -->
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="addForm" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content p-md-3">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit a Renter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="edit_payment.php" method="GET">
                            <div class="modal-body">
                                <input type="hidden" name="renter_id" id="renter_id">
                                <input type="hidden" name="edit_id" id="edit_id">

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label class="font-weight-bold text-small" for="fname">Name<span class="text-primary ml-1">*</span></label>
                                        <input class="form-control" id="nameEdit" type="text" placeholder="e" required name="nameEdit" disabled />
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label class="font-weight-bold text-small" for="lastname">Invoice<span class="text-primary ml-1">*</span></label>
                                        <input class="form-control" id="rein" type="number" placeholder="" required name="rein"  />
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label class="font-weight-bold text-small" for="payment">Payment<span class="text-primary ml-1">*</span></label>
                                        <input class="form-control" id="paymentEdit" type="text" placeholder="" required name="paymentEdit" />
                                    </div>


                                    <div class="form-group col-lg-12">
                                        <button type='submit' class="btn btn-primary" name="submit">Update</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

    </div>

    <!-- Add -->
    <div class="container-fluid pt-4">
        <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="addForm" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content p-md-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="payments.php" method="GET">
                            <div class="row">
                               
                                <div class="form-group col-lg-12">
                                    <label class="font-weight-bold text-small" for="projecttype">Renter<span class="text-primary ml-1">*</span></label>
                                    <select name="renter" class="form-control" id="gender">
                                        <?php
                                        $i = 1;
                                        $paymentRenter = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM renters where status = 1;");
                                        if ($paymentRenter->num_rows > 0) :
                                            while ($row = $paymentRenter->fetch_assoc()) :
                                        ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="font-weight-bold text-small" for="projecttype">Invoice<span class="text-primary ml-1">*</span></label>
                                    <input class="form-control" id="projecttype" type="number" placeholder="" required name="invoice" />
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="font-weight-bold text-small" for="projecttype">Amount<span class="text-primary ml-1">*</span></label>
                                    <input class="form-control" id="projecttype" type="number" placeholder="Enter the Amount" required name="amount" />
                                </div>

                                <div class="form-group col-lg-12">
                                    <input type='submit' class="btn btn-primary" name="submit"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       

        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <button type="button" class="btn btn-primary mx-auto d-block mt-5" data-bs-toggle="modal" data-bs-target="#modalForm">
                        + Add Payment
                    </button>
                </div>

                <div>

                    <table class="table table-striped table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="">ID</th>
                                <th class>Renter ID</th>
                                <th class="">Date</th>
                                <th class="">Renter</th>
                                <th class="">Invoice</th>
                                <th class="">Amount</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $invoices = $conn->query("SELECT p.*,concat(r.lastname,', ',r.firstname,' ',r.middlename) as name FROM payments p inner join renters r on r.id = p.renter_id where r.status = 1 order by date(p.date_created) desc ");
                            while ($row = $invoices->fetch_assoc()) :

                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td class=""><p><b><?php echo ucwords($row['id']) ?></b></p></td>
                                    <td><p><b><?php echo ucwords($row['renter_id']) ?></b></p></td>
                                    <td><?php echo date('M d, Y', strtotime($row['date_created'])) ?></td>
                                    <td class=""><p><b><?php echo ucwords($row['name']) ?></b></p></td>
                                    <td><p><b><?php echo $row['invoice'] ?></b></p></td>
                                    <td class="text-right"><p><b><?php echo number_format($row['amount'], 2) ?></b></p></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary edit_invoice" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>
                                       </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </main>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $("#searchBar").keyup(function() {
            let input, filter, table, tr, td, i, txtValue;
            input = $("#searchBar");
            filter = input.val().toUpperCase();
            table = $("#myTable");
            tr = table.find("tr");

            tr.each(function() {
                td = $(this).find("td:eq(1)");
                if (td) {
                    txtValue = td.text();
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                }
            });
        });
        $('.edit_invoice').on('click', function() {
            $('#editmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#edit_id').val(data[1]);
            $('#nameEdit').val(data[4]);
            $('#rein').val(data[5]);
            $('#paymentEdit').val(data[6]);
            $('#renter_id').val(data[2]);
        });

        var table = $('#myTable').DataTable({
            "lengthMenu": [5, 10, 50]
        });
        $('#entriesDropdown').on('change', function() {
            var selectedValue = $(this).val();
            table.page.len(selectedValue).draw();
        });
    });
</script>

<?php if (isset($_GET['success'])) { ?>
		<script>
			alert('Successfully add');
		</script>
	<?php } ?>

	<?php if (isset($_GET['edit'])) { ?>
		<script>
			alert('Successfully edited');
		</script>
	<?php } ?>
	<?php if (isset($_GET['delete'])) { ?>
		<script>
			alert('Successfully Deleted');
		</script>
	<?php } ?>
	