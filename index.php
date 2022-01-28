<?php
include "server/db.php";
$sql = "SELECT * FROM profile";
$result = $conn->query($sql);




?>



<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Table</h2>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add User</h4>
                    </div>
                    <div class="modal-body">
                        <form action="server/adduser.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                            </div>

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> -->
                </div>

            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // echo "id: " . $row["id"]. " - Email: " . $row["email"]. " Password" . $row["password"]. "<br>";


                    ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["password"]; ?></td>
                                <td> <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-edit-<?php echo $row["id"]; ?>">Edit</button> <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-delete-<?php echo $row["id"]; ?>">Delete</button></td>
                            </tr>
                            <div class="modal fade" id="myModal-edit-<?php echo $row["id"]; ?>" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="server/updateuser.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row["email"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pwd">Password:</label>
                                                    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value="<?php echo $row["password"]; ?>">
                                                </div>

                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="modal fade" id="myModal-delete-<?php echo $row["id"]; ?>" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Delete User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="server/deleteuser.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                               
                                                <h1>Are You Sure To Delete?</h1>
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        echo "0 results"; 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>