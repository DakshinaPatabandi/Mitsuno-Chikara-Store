<?php
include '../Admin/config.php';

session_start();

// Check if the update payment form is submitted
if (isset($_POST['update_payment'])) {
    // Sanitize input data
    $cake_id = $_POST['cake_id'];
    $payment_status = $_POST['payment_status'];

    // Prepare and execute SQL query to update payment status
    $update_payment = $conn->prepare("UPDATE `cakes` SET payment_status = ? WHERE cake_id = ?");
    $update_payment->bind_param("si", $payment_status, $cake_id);
    if ($update_payment->execute()) {
        $_SESSION['payment_update_success'] = true; // Set success message in session
    } else {
        $_SESSION['payment_update_error'] = true; // Set error message in session
    }
}

// Check if the cake_id is set and not empty for deletion
if (isset($_POST['delete_cake'])) {
    // Sanitize the input to prevent SQL injection
    $cake_id = $_POST['cake_id'];
    $cake_id = mysqli_real_escape_string($conn, $cake_id);
    
    // SQL query to delete the cake order
    $sql = "DELETE FROM `cakes` WHERE `cake_id` = '$cake_id'";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Set success message in session
        $_SESSION['delete_success'] = true;
    } else {
        // Set error message in session
        $_SESSION['delete_error'] = true;
    }
}

// Retrieve customized cake orders from the database
$sql = "SELECT c.*, u.number FROM `cakes` c LEFT JOIN `users` u ON c.user_email = u.email";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin product</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/product_style.css">
    <link rel="stylesheet" href="css/placed_order.css">

</head>

<body id="page-top">

<div id="wrapper">

<?php include '../Admin/admin_components/sidebar.php'; ?>
<!-- side bar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- navbar -->
        <?php include '../Admin/admin_components/navbar.php'; ?>

        <div class="container">
            <h1 class="h3 mb-0 text-gray-800">Customized Orders</h1><br>
            <!-- Display success and error messages -->
            <?php 
            // Display success message for updating payment status
            if (isset($_SESSION['payment_update_success']) && $_SESSION['payment_update_success']) {
                echo '<div class="alert alert-success" role="alert">Payment status updated successfully.</div>';
                unset($_SESSION['payment_update_success']);
            }
            
            // Display success message for cake deletion
            if (isset($_SESSION['delete_success']) && $_SESSION['delete_success']) {
                echo '<div class="alert alert-success" role="alert">Cake order deleted successfully.</div>';
                unset($_SESSION['delete_success']);
            }
            ?>
            <div class="row">
                <?php
                // Check if there are customized cake orders
                if ($result->num_rows > 0) {
                    // Output each customized cake order in a container
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-md-4">
                            <div class="cake-order-container">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td><?= $row['user_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">User Email</th>
                                        <td><?= $row['user_email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone Number</th>
                                        <td><?= $row['number'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Theme</th>
                                        <td><?= $row['theme'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Size</th>
                                        <td><?= $row['size'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Shape</th>
                                        <td><?= $row['shape'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fillings</th>
                                        <td><?= $row['fillings'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Colors</th>
                                        <td><?= $row['colors'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Icing</th>
                                        <td><?= $row['icing'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Toppings</th>
                                        <td><?= $row['toppings'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">More Options</th>
                                        <td><?= $row['more_options'] ?></td>
                                    </tr>
                                    <!-- Add more rows for other cake customization details -->
                                    <tr>
                                        <td colspan="2">
                                            <!-- Delete form -->
                                            <form method="post" action="">
                                                <input type="hidden" name="cake_id" value="<?= $row['cake_id'] ?>">
                                                <button type="submit" name="delete_cake" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- Update payment status form -->
                                <form method="post" action="">
                                    <input type="hidden" name="cake_id" value="<?= $row['cake_id'] ?>">
                                    <div class="form-group">
                                        <label for="payment_status">Ordering Status:</label>
                                        <select class="form-control" name="payment_status" id="payment_status">
                                            <option class="select_status" value="Pending" <?= $row['payment_status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                            <option class="select_status"  value="completed" <?= $row['payment_status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="update_payment" class="btn btn-primary">Update Status</button>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // If no customized cake orders found, display a message
                    echo '<div class="col-md-12"><p>No customized cake orders found.</p></div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
