<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navStyle.css">
    <link rel="stylesheet" href="css/about.css">

</head>

<body>
    <?php include 'components/navbar.php'; ?>
    <section class="about">

        <div class="row">
            <div class="image">
                <img src="images/logo.jpeg" alt=""><br><br><br>
                <p>In response to the evolving needs of our clientele, we recognized the importance of a seamless online ordering system. The decision to transition from traditional order methods to a user-friendly e-commerce platform was fueled by our desire to provide you with a hassle-free and enjoyable experience from start to finish.
                  What sets Mitsuno Chikara apart is not just our commitment to exceptional baking but also our unwavering dedication to customer satisfaction. Our e-commerce website is more than just a virtual storefront; it's a gateway to a world of possibilities where you can customize your cakes to match the uniqueness of your celebrations.
                  We invite you to explore the cake-customizing function on our web application, where you can personalize your orders with ease. From selecting flavors to choosing intricate designs, Mitsuno Chikara ensures that each cake is a masterpiece tailored to your preferences.

                  Thank you for being a part of our journey. As we embark on this digital adventure, we look forward to continuing to sweeten your moments and making Mitsuno Chikara a cornerstone of your joyous occasions.
            </div>

            <div class="content">
                <h3>Why choose us</h3>
                <p>Welcome to Mitsuno Chikara, where the art of baking meets the convenience of modern technology. Nestled in the heart of our kitchen is a passion for crafting delectable cakes that become the centerpiece of your most cherished celebrations. 
                    At Mitsuno Chikara, we understand the challenges of managing orders in today's fast-paced digital age. With a commitment to enhancing your experience, we are proud to introduce our bespoke e-commerce application. 
                    This innovative platform is designed to streamline the ordering process, ensuring efficiency and convenience for our valued customers. Our journey began with a simple yet profound goal: to bring joy and sweetness to every moment of your life. 
                    Whether it's a dreamy wedding cake, a whimsical birthday creation, or a delightful batch of cupcakes, Mitsuno Chikara is dedicated to turning your sweet visions into reality.</p>
                <button type="button" class="btn btn-primary">Contact us</button>
                <img src="images/barker.png" alt="">
            </div>
        </div>
    </section>

    <section class="reviews">
        <h1>Client's Reviews</h1>


        <!-- Carousel wrapper -->
        <div id="carouselExampleControls" class="carousel slide text-center carousel-dark" data-mdb-ride="carousel">
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <i class="bi bi-person-circle" style="font-size:5rem;"></i>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h5 class="mb-3">Maria Kate</h5>
                            <p class="text-muted">
                                <i class="bi bi-quote"></i>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
                                nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
                                fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
                                doloremque.
                            </p>
                        </div>
                    </div>
                    <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star"></i></li>
                    </ul>
                </div>
                <div class="carousel-item">
                    <i class="bi bi-person-circle" style="font-size:5rem;"></i>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h5 class="mb-3">John Doe</h5>
                            <p class="text-muted">
                                <i class="bi bi-quote"></i>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
                                nesciunt sint eligendi reprehenderit reiciendis.
                            </p>
                        </div>
                    </div>
                    <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star"></i></li>
                    </ul>
                </div>
                <div class="carousel-item">
                    <i class="bi bi-person-circle" style="font-size:5rem;"></i>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h5 class="mb-3">Anna Deynah</h5>
                            <p class="text-muted">
                                <i class="bi bi-quote"></i>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
                                nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
                                fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
                                doloremque.
                            </p>
                        </div>
                    </div>
                    <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star-fill"></i></li>
                        <li><i class="bi bi-star"></i></li>
                    </ul>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
                <i class="bi bi-caret-left-fill" style="color: black; font-size: 2.5rem;"></i>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
                <i class="bi bi-caret-right-fill" style="color: black; font-size: 2.5rem;"></i>
            </button>
        </div>
        <!-- Carousel wrapper -->
    </section>





    


    <?php
    include 'components/footer.php';
    ?>

</body>

</html>