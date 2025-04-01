<?php
include 'conn.php';
$data = [];
if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
    $from_date = $_GET['from_date'] ?? '';
    $to_date = $_GET['to_date'] ?? '';

    $sql = "SELECT * FROM vivek WHERE created_at BETWEEN '$from_date' AND '$to_date'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>USER_LIST:</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="add-edit.php" class="btn btn-outline-dark">ADD</a>
                            </div>
                        </div>
                    </div>
                    <form method="GET" class="mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="date" name="from_date" class="form-control" placeholder="From Date" required>
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="to_date" class="form-control" placeholder="To Date" required>
                            </div>
                            <div class="col-md-4">
                                <div class="from-group">
                                    <button type="submit" class="btn btn-outline-primary">Search</button>
                                    <a href="index.php" class="btn btn-outline-secondary">Reset</a>
                                    <a href="expert.php"><button type="button" class="btn btn-outline-success">Expert</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <table class="table table-borderless text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($data) {
                                foreach ($data as $value) {
                                    echo '<tr class="text-center">';
                                    echo "<td>" . $value['id'] . "</td>";
                                    echo "<td>" . $value['firstname'] . "</td>";
                                    echo "<td>" . $value['lastname'] . "</td>";
                                    echo "<td><a href='add-edit.php?id=" . $value['id'] . "' class='btn btn-warning'>Edit</a></td>";
                                    echo "<td><a href='delete.php?id=" . $value['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No records found</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
