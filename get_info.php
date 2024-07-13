<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Year Resolutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>New Year Resolution Details</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Resolution</th>
                                    <th>Description</th>
                                    <th>Target Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "resolution_db");

                                $query = "SELECT * FROM resolutions";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    $i = 1;
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row['firstName']; ?></td>
                                            <td><?= $row['lastName']; ?></td>
                                            <td><?= $row['gender']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['resolution']; ?></td>
                                            <td><?= $row['description']; ?></td>
                                            <td><?= $row['target_date']; ?></td>
                                            <td>
                                                <a href="update-process.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Update</a>
                                                <br>
                                                <a href="delete.php?id=<?= $row["id"]; ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="9">No Record Found</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <button onclick="window.location.href = 'index.html';" class="btn btn-primary">Add New Resolution</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
