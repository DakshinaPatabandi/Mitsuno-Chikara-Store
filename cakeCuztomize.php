<?php

// Include necessary components after the redirection
include 'components/connect.php';
include 'components/navbar.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $theme = $_POST['theme'];
    $size = $_POST['size'];
    $shape = $_POST['shape'];
    $fillings = $_POST['fillings'];
    $colors = $_POST['colors'];
    $icing = $_POST['icing'];
    $toppings = $_POST['toppings'];
    $more_options = $_POST['more_options']; // New field added

    // Get user ID, name, and number from session variables
    session_start(); // Start the session
    $user_name = $_SESSION['name'];
    $user_email = $_SESSION['email'];
    $user_number = $_SESSION['number']; // New session variable added

    // Prepare the SQL statement to insert data into the database
    $sql = "INSERT INTO cakes (user_email, user_name, number, theme, size, shape, fillings, colors, icing, toppings, more_options)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssssssssss", $user_email, $user_name, $user_number, $theme, $size, $shape, $fillings, $colors, $icing, $toppings, $more_options);

    // Execute the SQL query
    if ($stmt->execute()) {
        $success_message = "Cake customization details added successfully.";
    } else {
        echo "Error: " . $stmt->error;
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

</head>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const themeDropdown = document.getElementById('theme');
        const cakeImg = document.getElementById('cakeImg');

        themeDropdown.addEventListener('change', function() {
            const selectedTheme = themeDropdown.value;
            const imagePath = `./images2/${selectedTheme}.jpg`;
            cakeImg.src =imagePath;
        });

        
    });

    document.addEventListener('DOMContentLoaded', function(){
        const themeDropdown = document.getElementById('shape');
        const cakeImg = document.getElementById('cakeImg');

        themeDropdown.addEventListener('change', function() {
            const selectedTheme = themeDropdown.value;
            const imagePath = `./images2/${selectedTheme}.jpg`;
            cakeImg.src =imagePath;
        });

        
    });

    document.addEventListener('DOMContentLoaded', function(){
        const themeDropdown = document.getElementById('fillings');
        const cakeImg = document.getElementById('cakeImg');

        themeDropdown.addEventListener('change', function() {
            const selectedTheme = themeDropdown.value;
            const imagePath = `./images2/${selectedTheme}.jpg`;
            cakeImg.src =imagePath;
        });

        
    });

    document.addEventListener('DOMContentLoaded', function(){
        const themeDropdown = document.getElementById('colors');
        const cakeImg = document.getElementById('cakeImg');

        themeDropdown.addEventListener('change', function() {
            const selectedTheme = themeDropdown.value;
            const imagePath = `./images2/${selectedTheme}.jpg`;
            cakeImg.src =imagePath;
        });

        
    });

    document.addEventListener('DOMContentLoaded', function(){
        const themeDropdown = document.getElementById('icing');
        const cakeImg = document.getElementById('cakeImg');

        themeDropdown.addEventListener('change', function() {
            const selectedTheme = themeDropdown.value;
            const imagePath = `./images2/${selectedTheme}.jpg`;
            cakeImg.src =imagePath;
        });

        
    });

    document.addEventListener('DOMContentLoaded', function(){
        const themeDropdown = document.getElementById('toppings');
        const cakeImg = document.getElementById('cakeImg');

        themeDropdown.addEventListener('change', function() {
            const selectedTheme = themeDropdown.value;
            const imagePath = `./images2/${selectedTheme}.jpg`;
            cakeImg.src =imagePath;
        });

        
    });

    
</script>
<body>
    <br>
    <h2 class="heading">Cuztomize Your Dream Cake...</h2>
    <div class="cake-imge"><img id="cakeImg" src="./images2/base_cake.jpg"></div>


    <div class="cake-container">

        <div class="cake-details">
            <?php if (!empty($success_message)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="detail-title">Theme:</div>
                    <div class="detail-value">
                        <select id="theme" class="select-del" name="theme" required>
                            <option value="" selected disabled>select theme</option>
                            <option class="select-del-cat" value="birthday">Birthday Cake</option>
                            <option class="select-del-cat" value="wedding">Wedding Cake</option>
                            <option class="select-del-cat" value="Annivesary Cake">Annivesary Cake</option>
                            <option class="select-del-cat" value="Cup Cake">Cup Cake</option>
                            <option class="select-del-cat" value="Valentine Cake">Valentine Cake</option>
                            <!-- Add more options here -->
                        </select>
                    </div>
                </div>
                <div class="row">
            <div class="detail-title">Size:</div>
                    <div class="detail-value">
                        <select class="select-del" name="size" id ="size" required>
                            <option value="" selected disabled>select size </option>
                            <option class="select-del-cat" value="500g">500g</option>
                            <option class="select-del-cat" value="1kg">1kg</option>
                            <option class="select-del-cat" value="1.5kg">1.5kg</option>
                            <option class="select-del-cat" value="2kg">2kg</option>
                            <option class="select-del-cat" value="2.5kg">2.5kg</option>
                            <!-- Add more options here -->
                        </select>
                    </div>
                </div>
            <div class="row">
            <div class="detail-title">Shape:</div>
                    <div class="detail-value">
                        <select class="select-del" name="shape" id ="shape" required>
                            <option value="" selected disabled>select shape </option>
                            <option class="select-del-cat" value="Round">Round</option>
                            <option class="select-del-cat" value="Square">Square</option>
                            <option class="select-del-cat" value="Petal">Petal</option>
                            <option class="select-del-cat" value="Hexagonal">Hexagonal</option>
                            <option class="select-del-cat" value="Staircase">Staircase</option>
                            <!-- Add more options here -->
                        </select>
                    </div>
                </div>
            <div class="row">
            <div class="detail-title">Fillings:</div>
                    <div class="detail-value">
                        <select class="select-del" name="fillings" id="fillings">
                            <option value="" selected disabled>select fillings </option>
                            <option class="select-del-cat" value="Frosting">Frosting</option>
                            <option class="select-del-cat" value="Custard">Custard</option>
                            <option class="select-del-cat" value="Whipped Cream">Whipped Cream</option>
                            <option class="select-del-cat" value="Buttercream">Buttercream</option>
                            <option class="select-del-cat" value="Ganache">Ganache</option>
                            <!-- Add more options here -->
                        </select>
                    </div>
                </div>
            <div class="row">
            <div class="detail-title">Colors:</div>
                    <div class="detail-value">
                        <select class="select-del" name="colors" id="colors">
                            <option value="" selected disabled>select colour </option>
                            <option class="select-del-cat" value="white">white</option>
                            <option class="select-del-cat" value="red">red</option>
                            <option class="select-del-cat" value="blue">blue</option>
                            <option class="select-del-cat" value="yellow">yellow</option>
                            <!-- Add more options here -->
                        </select>
                    </div>
                </div>
            <div class="row">
            <div class="detail-title">Icing:</div>
                    <div class="detail-value">
                        <select class="select-del" id="icing" name="icing" >
                            <option value="" selected disabled>select icing </option>
                            <option class="select-del-cat" value="Butter Cream">Butter Cream</option>
                            <option class="select-del-cat" value="Whipped Cream">Whipped Cream</option>
                            <option class="select-del-cat" value="Royal Icing">Royal Icing</option>
                            <option class="select-del-cat" value="Cream Cheese Frosting">Cream Cheese Frosting</option>
                            <option class="select-del-cat" value="Meringue">Meringue</option>
                            <option class="select-del-cat" value="Fondant">Fondant</option>
                            <!-- Add more options here -->
                        </select>
                    </div>
                </div>
            <div class="row">
            <div class="detail-title">Toppings:</div>
                    <div class="detail-value">
                        <select class="select-del" name="toppings" id="toppings">
                            <option value="" selected disabled>select toppings </option>
                            <option class="select-del-cat" value="Coconut Enveloping">Coconut Enveloping</option>
                            <option class="select-del-cat" value="Edible Flowers">Edible Flowers</option>
                            <option class="select-del-cat" value="Chocolate Ganache">Chocolate Ganache</option>
                            <option class="select-del-cat" value="Fresh Fruit Compote">Fresh Fruit Compote</option>
                            <option class="select-del-cat" value="Whipped Cream With Berries">Whipped Cream With Berries</option>
                            <option class="select-del-cat" value="Cookie Crumbs">Cookie Crumbs</option>
                            <!-- Add more options here -->
                        </select>
                    </div>
                </div>
            <!-- Add more customization options as needed -->
            <div class="row">
                <div class="detail-more">
                    <input class="select-more " type="text" name="more_options" placeholder="Enter more options here">
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn_cuz">Customize Cake</button>
            </div>
        </form>
    </div>
</div>
<br><br>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>

<script src="js/slider.js"></script>
<script src="js/loadingScreen.js"></script>

<?php
include 'components/footer.php';
?>
</body>


</html>