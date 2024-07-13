<?php
require_once 'database.php';

if (count($_POST) > 0 && isset($_POST)) {
    mysqli_query($conn, "UPDATE resolutions SET 
        id='" . $_POST['id'] . "', 
        firstName='" . $_POST['firstName'] . "', 
        lastName='" . $_POST['lastName'] . "', 
        gender='" . $_POST['gender'] . "', 
        email='" . $_POST['email'] . "', 
        resolution='" . $_POST['resolution'] . "', 
        description='" . $_POST['description'] . "', 
        target_date='" . $_POST['target_date'] . "' 
        WHERE id='" . $_POST['id'] . "'");
    $message = "Record Modified Successfully";
    header("Location: get_info.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM resolutions WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Resolution Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-submit {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .btn-back {
            background-color: #ccc;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <h2>Update Resolution Data</h2>
        <form name="frmUser" method="post" action="">
            <?php if (isset($message)) { ?>
                <div class="form-group">
                    <p><?php echo $message; ?></p>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="id">Id:</label>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" value="<?php echo $row['firstName']; ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" value="<?php echo $row['lastName']; ?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" name="gender" value="<?php echo $row['gender']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
                <label for="resolution">Resolution:</label>
                <input type="text" name="resolution" value="<?php echo $row['resolution']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" value="<?php echo $row['description']; ?>">
            </div>
            <div class="form-group">
                <label for="target_date">Target Date:</label>
                <input type="date" name="target_date" value="<?php echo $row['target_date']; ?>">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn-submit">
                <a href="get_info.php" class="btn-back">Back to List</a>
            </div>
        </form>
    </div>
</body>

</html>
