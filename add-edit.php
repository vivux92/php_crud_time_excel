<?php
include 'conn.php';
$data = [];
$id = $_GET['id'] ?? '';
$sql = "SELECT * FROM vivek WHERE id ='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $fname = $_POST['firstname'] ?? '';
    $lname = $_POST['lastname'] ?? '';


    if ($id) {
        $sql = "UPDATE vivek SET firstname='$fname',lastname='$lname' WHERE id='$id'";
    } else {
        $sql = "INSERT INTO vivek (id,firstname,lastname)
            VALUES ('$id','$fname','$lname')";
    }

    if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>USER_ADD_EDIT</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="index.php" class="btn btn-outline-dark">List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF'] ?? '' ?>" method="POST">
                            <input type="hidden" name="id" name="id" value="<?php echo $data['id'] ?? '' ?>">
                            <div class="form-group">
                                <label for="text">First_Name</label>
                                <input type="text" class="form-control" placeholder="Enter first name" name="firstname" value="<?php echo $data['firstname'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="text">Last_Name</label>
                                <input type="text" class="form-control" placeholder="Enter last name" name="lastname" value="<?php echo $data['lastname'] ?? '' ?>">
                            </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>