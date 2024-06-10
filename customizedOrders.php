<?php
// Include necessary components after the redirection
include 'components/connect.php';
include 'components/navbar.php';


// Retrieve customized cake orders for the logged-in user from the database
$user_email = $_SESSION['email'];
$sql = "SELECT c.*, u.number FROM `cakes` c LEFT JOIN `users` u ON c.user_email = u.email WHERE c.user_email = '$user_email'";
$result = $conn->query($sql);

if (isset($_POST['cake_id']) && !empty($_POST['cake_id'])) {
    // Sanitize the input to prevent SQL injection
    $cake_id = mysqli_real_escape_string($conn, $_POST['cake_id']);
    
    // SQL query to delete the cake order
    $sql = "DELETE FROM `cakes` WHERE `cake_id` = '$cake_id' AND `user_email` = '$user_email'";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Set success message in session
        $_SESSION['delete_success'] = true;
    } else {
        // Set error message in session
        $_SESSION['delete_error'] = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/homeStyle.css">
    <link rel="stylesheet" href="css/navStyle.css">
    <link rel="stylesheet" href="css/tableStyle.css"> <!-- Add CSS for table styling -->

    <title>Your Customized Cake Orders</title>
</head>

<body>
    <br>
    <h2 class="heading">Your Customized Cake Orders</h2>
    <!-- Display success message if set -->
    <?php if (isset($_SESSION['delete_success']) && $_SESSION['delete_success']) : ?>
                    <div class="alert alert-success" role="alert">
                        Cake order deleted successfully.
                    </div>
                    <?php unset($_SESSION['delete_success']); ?>
                <?php endif; ?>
                <!-- Display error message if set -->
                <?php if (isset($_SESSION['delete_error']) && $_SESSION['delete_error']) : ?>
                    <div class="alert alert-danger" role="alert">
                        Error deleting cake order. Please try again.
                    </div>
                    <?php unset($_SESSION['delete_error']); ?>
                <?php endif; ?>

    <div class="container">
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
                                            <form method="post" action="">
                                            <p class="pay-status">Process Status: <span class="payment-status <?= ($row['payment_status'] == 'completed') ? 'completed' : 'pending' ?>">
                                            <?= $row['payment_status'] ?></p>
                                                <input type="hidden" name="cake_id" value="<?= $row['cake_id'] ?>">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/loadingScreen.js"></script>

    <?php
    include 'components/footer.php';
    ?>
</body>

</html>
