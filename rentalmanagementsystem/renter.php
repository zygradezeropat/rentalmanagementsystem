<?php include("connect.php");

include 'sidebar.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

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
            <div class="container-fluid pt-4">


                <!-- ADD RENTER -->
                <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="addForm" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content p-md-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add a Renter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="add_renters.php" method="GET">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="firstname">First name<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="firstname" type="text" placeholder="Enter the first name" required name="fname" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="lastname">Middle name<span class="text-primary ml-1">N/A if none</span></label>
                                            <input class="form-control" id="lastname" type="text" placeholder="Enter the Middle name" required name="mname" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="email">Last Name<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="email" type="text" placeholder="Enter the Last Name" required name="lname" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="phone">Phone number<small class="small text-gray">optional</small></label>
                                            <input class="form-control" id="phone" type="tel" placeholder="Enter the phone number" name="phone" />
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="font-weight-bold text-small" for="projecttype">Email<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="projecttype" type="email" placeholder="Enter the email address" required name="email" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="projecttype">Address<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="projecttype" type="text" placeholder="Enter the Address" required name="address" />
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="projecttype">Gender<span class="text-primary ml-1">*</span></label>
                                            <select name="gender" class="form-control" id="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6">


                                            <label class="font-weight-bold text-small" for="budget">Room<span class="text-primary ml-1">*</span></label>
                                            <select class="form-control" name="room" id="room">
                                                <?php
                                                $i = 1;
                                                $j = 1;
                                                $totalroom = $conn->query("SELECT * FROM rooms");
                                                $avail = $conn->query("SELECT * FROM rooms NATURAL JOIN renters WHERE rooms.room_id = renters.room_id");
                                                while ($row = $totalroom->fetch_assoc()) :
                                                    if ($row['total_bed_avail'] < 1) {
                                                ?> <option value="" disabled>Room <?php echo $row['room_num'] ?> Full</option> <?php } else {       ?>
                                                        <option value="<?php echo $row['room_num'] ?>"><?php echo $i ?></option>
                                                    <?php } $i++; ?>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="timeframe">Date In<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="timeframe" type="date" required name="date" />
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

                <!-- Delete Renter -->
                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="delete_renter.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <input type="hidden" name="delete_id" id="delete_id">
                                <input type="hidden" name="room_num" id="room_num">
                                <div class="modal-body" id="mbody">
                                    Do you want to delete this data?
                                </div>

                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-danger" name="deleteRenter">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Renter -->

                <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="addForm" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content p-md-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit a Renter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="edit_renter.php" method="GET">
                                <div class="modal-body">
                                    <input type="hidden" name="edit_id" id="edit_id">
                                    <input type="hidden" name="room_num" class="room_num">

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="fname">First name<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="fname" type="text" placeholder="Enter the first name" required name="fname" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="lastname">Middle name<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="mname" type="text" placeholder="Enter the Middle name" required name="mname" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="email">Last Name<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="lname" type="text" placeholder="Enter the Last Name" required name="lname" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="phone">Phone number<small class="small text-gray">optional</small></label>
                                            <input class="form-control" id="phonenum" type="text" placeholder="Enter the phone number" name="phonenum" />
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="font-weight-bold text-small" for="email">Email<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="emailadd" type="email" placeholder="Enter the email address" required name="emailadd" />
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="font-weight-bold text-small" for="projecttype">Address<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="address" type="text" placeholder="Enter the Address" required name="address" />
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="projecttype">Gender<span class="text-primary ml-1">*</span></label>
                                            <select name="gen" class="form-control" id="gen">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="projecttype">Room<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="edroom" type="text" placeholder="" required name="room" />
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-small" for="timeframe">Date In<span class="text-primary ml-1">*</span></label>
                                            <input class="form-control" id="datein" type="date" required name="date" />
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


            <div class="col-md-12">

                <div class="card p-3">
                    <?php if (isset($_GET['added'])) { ?>
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
                    <?php if (isset($_GET['error'])) { ?>
                        <script>
                            alert('Room is full, contact admin to edit room');
                        </script>
                    <?php } ?>
                    <div class="card-header">
                        <h4>LIST OF RENTER</h4>
                        <button type="button" class="btn btn-primary mx-auto d-block mt-5" data-bs-toggle="modal" data-bs-target="#modalForm">
                            Add New Renter
                        </button>
                    </div>

                    <div>

                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th>Middle Name</th>
                                    <th>Gender</th>
                                    <th>Room Number</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Date In</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $renter = $conn->query("SELECT *
                                FROM renters
                                INNER JOIN renters_info ON renters.id = renters_info.id
                                INNER JOIN rooms ON renters_info.room_id = rooms.room_id;");

                                if ($renter->num_rows > 0) :
                                    while ($row = $renter->fetch_assoc()) :
                                       


                                ?>
                                        <tr>

                                            <td><p><b><?php echo $row['id'] ?></b></p></td>
                                            <td><p><b><?php echo $row['lastname'] ?></b></p></td>
                                            <td><p><b><?php echo $row['firstname'] ?></b></p></td>
                                            <td><p><b><?php echo $row['middlename'] ?></b></p></td>
                                            <td><p><b><?php echo $row['gender'] ?></b></p></td>
                                            <td><p><b><?php echo $row['room_num'] ?></b></p></td>
                                            <td><p><b><?php echo $row['contact'] ?></b></p></td>
                                            <td><p><b><?php echo $row['email'] ?></b></p></td>
                                            <td><p><b><?php echo $row['address'] ?></b></p></td>
                                            <td><p><b><?php echo $row['date_in'] ?></b></p></td>
                                            <td class="text-center">

                                                <button class="btn btn-sm btn-outline-primary editbtn" type="button">Edit</button>
                                                <button class="btn btn-sm btn-outline-danger deleteBtn"> Delete</button>
                                            </td>

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
                td = $(this).find("td:eq(2)");
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

        var table = $('#myTable').DataTable({
            "lengthMenu": [20, 50]
        });
        $('#entriesDropdown').on('change', function() {
            var selectedValue = $(this).val();
            table.page.len(selectedValue).draw();
        });

        //Modal for Delete
        $('.deleteBtn').on('click', function() {
            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#delete_id').val(data[0]);
            $('#room_num').val(data[5]);

            $('#mbody').text("Are you sure you want to delete " + data[2] + "?");

        });


    });
</script>

<script>
    $(document).ready(function() {

        $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#edit_id').val(data[0]);
            $('#fname').val(data[2]);
            $('#mname').val(data[3]);
            $('#lname').val(data[1]);
            $('#phonenum').val(data[6]);
            $('#edroom').val(data[5]);
            $('#emailadd').val(data[7]);
            $('#address').val(data[8]);
            $('.room_num').val(data[5]);
            if (data[4] == "Male") {
                $('#gen').val("Male");

            } else {
                $('#gen').val("Female");
            }

            $('#datein').val(data[9]);



        });
    });
</script>