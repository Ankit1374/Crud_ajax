<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> employee records </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <style>
        table {
            border-collapse: collapse;
        }

        .rtable{
        border: 0;
        overflow: overlay;
        display: block;
        width: 100%;
        text-align: center; 
        }

        .inline {
            /* display: inline-block; */
            float: right;
            margin: 20px 0px;
        }

        input,
        button {
            height: 34px;
        }

        .pagination {
            display: inline-block;
        }

        .pagination a {
            font-weight: bold;
            font-size: 18px;
            color: black;
            float: left;
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid black;
        }

        .pagination a.active {
            background-color: #212529;
            color: white;
        }

        .pagination a:hover:not(.active) {
            background-color: #17a2b8;
        }
    </style>

</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="employeeaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="align-items:center" class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" enctype='multipart/form-data' id="addform">
                    <div class="modal-body">

                        <div class="form-group">
                        <label> Employee ID </label>
                            <input type="text" name="emp" class="form-control" placeholder="Enter Employee Id">
                            <span class="empErr"></span>
                        </div>
                        
                        <div class="form-group">
                            <label> First Name </label>
                            <input type="text" name="fname"  class="form-control" placeholder="Enter First Name">
                            <span class="fnameErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Last Name </label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                            <span class="lnameErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Department </label>
                            <input type="text" name="dept" class="form-control" placeholder="Enter Department">
                            <span class="deptErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="contact" class="form-control" placeholder="Enter Phone Number">
                            <span class="contactErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Photograph </label><br>
                            <input type="file" name="photo">
                            <span class="photoErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Designation </label>
                            <input type="text" name="desg" class="form-control" placeholder="Enter Designation">
                            <span class="desgErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Salary </label>
                            <input type="text" name="salary" class="form-control" placeholder="Enter Salary">
                            <span class="salaryErr"></span>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- UPDATE -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Employee Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" enctype='multipart/form-data' id="editform">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <input type="hidden" name="prev_photo" id="prev_photo">

                        <div class="form-group">
                            <label> Employee ID </label>
                            <input type="text" name="emp" id="edit_emp" class="form-control" placeholder="Enter Employee Id">
                            <span class="empErr"></span>
                        </div>
                        
                        <div class="form-group">
                            <label> First Name </label>
                            <input type="text" name="fname" id="edit_fname" class="form-control" placeholder="Enter First Name">
                            <span class="fnameErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Last Name </label>
                            <input type="text" name="lname" id="edit_lname" class="form-control" placeholder="Enter Last Name">
                            <span class="lnameErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Department </label>
                            <input type="text" name="dept" id="edit_dept" class="form-control" placeholder="Enter Department">
                            <span class="deptErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="contact" id="edit_contact" class="form-control" placeholder="Enter Phone Number">
                            <span class="contactErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Photograph </label><br>
                            <input type="file" name="photo" id="edit_photo">
                            <span class="photoErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Designation </label>
                            <input type="text" name="desg" id="edit_desg" class="form-control" placeholder="Enter Designation">
                            <span class="desgErr"></span>
                        </div>

                        <div class="form-group">
                            <label> Salary </label>
                            <input type="text" name="salary" id="edit_salary" class="form-control" placeholder="Enter Salary">
                            <span class="salaryErr"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="edit" id="edit" values="Edit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Employee Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- VIEW -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Employee Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="employee_viewing_data">
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2> Employee Records </h2>
            </div>

            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeeaddmodal">
                        ADD DATA
                    </button>
                </div>
            </div>
            <div class="card">
            <form action="" method="get">
                <div class="card-body">
                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            </div>
            <div class="card">
                <div class="card-body">

                    <?php
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, 'phpcrud');

                    $per_page_record = 5;

                    if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                    } else {
                        $page = 1;
                    }

                    $start_from = ($page - 1) * $per_page_record;

                    ?>

                    <table class="table table-bordered table-dark rtable">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col"> Employee ID </th>
                                <th scope="col"> First Name</th>
                                <th scope="col"> Last Name </th>
                                <th scope="col"> Department </th>
                                <th scope="col"> Contact </th>
                                <th scope="col"> Photograph </th>
                                <th scope="col"> Designation </th>
                                <th scope="col"> Operation </th>
                                <!-- <th scope="col"> EDIT </th>
                                <th scope="col"> DELETE </th> -->
                            </tr>
                        </thead>

                        <tbody>

                        <?php
                        if(isset($_GET['search']))
                        {
                            $filtervalues = $_GET['search'];
                            $querys = "SELECT * FROM records WHERE CONCAT(fname,lname,dept) LIKE '%$filtervalues%'  LIMIT $start_from, $per_page_record ";
                            $query_runs = mysqli_query($connection, $querys);

                            if(mysqli_num_rows($query_runs) > 0)
                            {
                                foreach($query_runs as $row)
                                {
                                    ?>
                                        <tr>
                                            <td class="emp_id"> <?php echo $row['id']; ?> </td>
                                            <td> <?php echo $row['emp']; ?> </td>
                                            <td> <?php echo $row['fname']; ?> </td>
                                            <td> <?php echo $row['lname']; ?> </td>
                                            <td> <?php echo $row['dept']; ?> </td>
                                            <td> <?php echo $row['contact']; ?> </td>
                                            <td> <img src="upload/<?php echo $row['photo']; ?>" height="70" > <span style="display: none;"><?php echo $row['photo']; ?></span> </td>
                                            <td> <?php echo $row['desg']; ?> </td>
                                            <td>
                                                <button type="button" class="btn btn-info viewbtn"> VIEW </button><br>
                                            <!-- </td>
                                            <td> -->
                                                <button type="button" class="btn btn-success editbtn"> EDIT </button><br>
                                            <!-- </td>
                                            <td> -->
                                                <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                                <td colspan ='7' style="text-align:center"> No record </td>
                                    </tr>  
                        <?php
                            }
                        }
                        else{
                            $query = "SELECT * FROM records LIMIT $start_from, $per_page_record";
                        $query_run = mysqli_query($connection, $query);
                                if ($query_run) {

                                    foreach ($query_run as $row) {
                                ?>
                                            <tr>
                                                <td class="emp_id"> <?php echo $row['id']; ?> </td>
                                                <td> <?php echo $row['emp']; ?> </td>
                                                <td> <?php echo $row['fname']; ?> </td>
                                                <td> <?php echo $row['lname']; ?> </td>
                                                <td> <?php echo $row['dept']; ?> </td>
                                                <td> <?php echo $row['contact']; ?> </td>
                                                <td> <img src="upload/<?php echo $row['photo']; ?>" height="70" > <span style="display: none;"><?php echo $row['photo']; ?></span> </td>
                                                <td> <?php echo $row['desg']; ?> </td>
                                                <td>
                                                    <button type="button" class="btn btn-info viewbtn"> VIEW </button><br>
                                                <!-- </td>
                                                <td> -->
                                                    <button type="button" class="btn btn-success editbtn"> EDIT </button><br>
                                                <!-- </td>
                                                <td> -->
                                                    <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                                                </td>
                                            </tr>
                                            </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                                <td colspan ='7' style="text-align:center"> No record </td>
                                    </tr>  
                            <?php        
                        }
                    }
                        
                        ?>
                        
                    </tbody>
                    </table>

                    <div class="pagination">
                        <?php
                        if(isset($_GET['search']))
                        {
                        $filtervalues = $_GET['search'];
                        $query = "SELECT COUNT(*) FROM records WHERE CONCAT(fname,lname,dept) LIKE '%$filtervalues%'";
                        $query_run = mysqli_query($connection, $query);
                        $row = mysqli_fetch_row($query_run);
                        $total_records = $row[0];
                        }else{
                        $query = "SELECT COUNT(*) FROM records";
                        $query_run = mysqli_query($connection, $query);
                        $row = mysqli_fetch_row($query_run);
                        $total_records = $row[0];
                        }

                        echo "</br>";

                        $total_pages = ceil($total_records / $per_page_record);
                        $pagLink = "";

                        if ($page >= 2) {
                            echo "<a href='index.php?page=" . ($page - 1) . "'>  << </a>";
                        }

                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $page) {
                                $pagLink .= "<a class = 'active' href='index.php?page=" . $i . "'>" . $i . " </a>";
                            } else {
                                $pagLink .= "<a href='index.php?page=" . $i . "'>" . $i . " </a>";
                            }
                        };
                        echo $pagLink;

                        if ($page < $total_pages) {
                            echo "<a href='index.php?page=" . ($page + 1) . "'>  >> </a>";
                        }

                        ?>
                    </div>

                    <div class="inline">
                        <input id="page" type="number" min="1" max="<?php echo $total_pages ?>" placeholder="<?php echo $page . "/" . $total_pages; ?>" required>
                        <button class="btn btn-success" onClick="go2Page();">Go</button>
                    </div>

                </div>
            </div>


        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


    <script>
        function go2Page() {
            var page = document.getElementById("page").value;
            page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
            window.location.href = 'index.php?page=' + page;
        }
    </script>


    <script>
        $(document).ready(function() {

            $('.viewbtn').click(function(e) {
                    e.preventDefault();
                var emp_id = $(this).closest('tr').find('.emp_id').text();
                
                $.ajax({
                    type: "POST",
                    url: "display.php",
                    data: {
                        'checking_viewbtn' : true,
                        'employee_id' : emp_id,
                    },
                    success: function(response){
                        $('.employee_viewing_data').html(response);
                        $('#viewmodal').modal('show');
                    }   
                });
             });
        });

    </script>

        <script>

    $('#addform').submit(function(e) {
                    e.preventDefault();
                    var form_data = new FormData($('#addform')[0]);


                    $.ajax({
                    type: 'POST',                    
                    dataType: "json",
                    url: 'insertcode.php',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if(res.error == "True"){                            
                            $('.empErr').text(res.empErr);
                            $('.fnameErr').text(res.fnameErr);
                            $('.lnameErr').text(res.lnameErr);
                            $('.deptErr').text(res.deptErr);
                            $('.contactErr').text(res.contactErr);
                            $('.photoErr').text(res.photoErr);
                            $('.desgErr').text(res.desgErr);
                            $('.salaryErr').text(res.salaryErr);
                        } else {
                            $('#employeeaddmodal').modal('hide');
                            // window.location.reload();
                        }                        
                        

                    }
                });
               
             });

            </script>



    <script>
        $(document).ready(function() {

            $('.editbtn').click(function(e) {
                    e.preventDefault();
                var emp_id = $(this).closest('tr').find('.emp_id').text();
                
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "fetch.php",
                    data: {
                        'checking_editbtn' : true,
                        'employee_id' : emp_id,
                    },
                    success: function(res){
                        console.log(res);
                        $('#update_id').val(res.id);
                        $('#prev_photo').val(res.photo);
                        $('#edit_emp').val(res.emp);
                        $('#edit_fname').val(res.fname);
                        $('#edit_lname').val(res.lname);
                        $('#edit_dept').val(res.dept);
                        $('#edit_contact').val(res.contact);
                        $('#edit_desg').val(res.desg);
                        $('#edit_salary').val(res.salary);
                        $('#editmodal').modal('show');
                    }   
                });
             });

            
            $('#editform').submit(function(e) {
                    e.preventDefault();
                    var form_data = new FormData($('#editform')[0]);


                    $.ajax({
                    type: 'POST',                    
                    dataType: "json",
                    url: 'updatecode.php',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if(res.error == "True"){                            
                            $('.empErr').text(res.empErr);
                            $('.fnameErr').text(res.fnameErr);
                            $('.lnameErr').text(res.lnameErr);
                            $('.deptErr').text(res.deptErr);
                            $('.contactErr').text(res.contactErr);
                            $('.photoErr').text(res.photoErr);
                            $('.desgErr').text(res.desgErr);
                            $('.salaryErr').text(res.salaryErr);
                        } else {
                            $('#editmodal').modal('hide');
                            window.location.reload();
                        }                        
                        

                    }
                });
               
             });
        });

    </script>


    <script>
        $(document).ready(function() {

            $('.deletebtn').on('click', function() {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <!-- <script>
        $(document).ready(function() {

            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#emp').val(data[1]);
                $('#fname').val(data[2]);
                $('#lname').val(data[3]);
                $('#dept').val(data[4]);
                $('#contact').val(data[5]);
                $('#prev_photo').val(data[6]);
                $('#desg').val(data[7]);
                $('#salary').val(data[8]);
            });
        });
    </script> -->

        <!-- <script>
        $(document).ready(function () {
            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });
        });
    </script> -->

</body>

</html>

