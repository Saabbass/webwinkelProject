<?php
session_start();
require 'database.php';

$carid = $_GET['id'];

$sql = "SELECT * FROM producten WHERE car_id = $carid ";

$result = mysqli_query($conn, $sql);

$producten = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (!is_object($result)) {
    header("location: productInfo.php");
    exit;
}

if (mysqli_num_rows($result) <= 0) {
    echo "This product doens't exist!!";
    exit;
}

$product = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Webwinkel</title>
</head>

<body>
    <!-- hier begind de navbar / header -->
    <?php
    include('header.php');
    ?>
    <!-- hier eindigd het onderste gedeelte van de navbar / header -->
    <!-- hier begint het main gedeelte van de pagina -->
    <section class="home_main">
        <main>
            <!-- main part 2 -->
            <section>
                <div class="container">
                    <div class="container_width">
                        <?php
                        // Array keys omzetten in variabelen.
                        foreach ($producten as $product) : ?>

                            <div class="singleProduct">
                                <h2 class="singleProduct_category">
                                    <?php echo $product["merk"] ?>
                                    <?php echo $product["model"] ?>
                                </h2>
                                <div class="singleProduct_container">
                                    <div class="singleProduct_card">
                                        <div class="singleCard">
                                            <div class="singleImage_content">
                                                <span class="singleOverlay"></span>
                                                <div class="singleCardimage">
                                                    <img src="img/<?php echo $product["img"] ?>" alt="" class="singleCard_img">
                                                </div>
                                            </div>
                                            <div class="singleCard_content">
                                                <div class="grid_left">
                                                    <h2 class="singleName">
                                                        <?php echo $product["merk"] ?>
                                                        <?php echo $product["model"] ?>
                                                    </h2>
                                                    <p class="singleDescription_Left">
                                                        <?php echo $product["type"] ?>
                                                        € <?php echo $product["prijs"] ?>
                                                    <p class="singleDescription_Left">
                                                        <?php echo $product["brandstof"] ?>
                                                        voorraad: <?php echo $product["voorraad"] ?>
                                                    </p>
                                                    <a href="" class="btn btn-info">Vraag offerte aan</a>
                                                </div>
                                                <div class="grid_right">
                                                    <p class="singleDescription_Right">
                                                        <?php echo $product["product_info"] ?>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <script src="script.js"></script>
            </section>
        </main>
    </section>
    <!-- hier eindigd het main gedeelte van de pagina -->
    <!-- hier begint de footer -->
    <?php
    include('footer.php');
    ?>
    <!-- hier eindigd de footer -->
</body>

</html>