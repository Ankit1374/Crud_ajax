<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'phpcrud');

    if(isset($_POST['checking_viewbtn']))
    {   
        $e_id = $_POST['employee_id'];

        $query = "SELECT * FROM records WHERE id= '$e_id'";
        $query_run = mysqli_query($connection, $query);

        // if(mysqli_num_rows($query_run) > 0)
        // {
            foreach($query_run as $row)
            {
                ?>
            <table class="table table-bordered table-dark rtable">
                  
                <tr>
                    <th scope="col"> ID</th>
                    <th scope="col"> Employee ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name </th>
                    <th scope="col"> Photograph </th>
                </tr>

                <tr>

                    <td class="emp_id"> <?php echo $row['id']; ?> </td>
                    <td> <?php echo $row['emp']; ?> </td>
                    <td> <?php echo $row['fname']; ?> </td>
                    <td> <?php echo $row['lname']; ?> </td>
                    <td> <img src="upload/<?php echo $row['photo']; ?>" height="50" > </td>
                </tr>
                
                <tr>
                    <th scope="col"> Department </th>
                    <th scope="col"> Contact </th>
                    <th scope="col"> Designation </th>
                    <th scope="col"> Salary </th>

                </tr>

                <tr>
                    <td> <?php echo $row['dept']; ?> </td>
                    <td> <?php echo $row['contact']; ?> </td>
                    <td> <?php echo $row['desg']; ?> </td>
                    <td> <?php echo $row['salary']; ?> </td>
                </tr>
            </table>
            <?php
            }              
        // }
        // else
        // {
        //     echo '<script> alert("Data Not Updated"); </script>';
        // }
    }
?>
