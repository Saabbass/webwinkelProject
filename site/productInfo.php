<?php
session_start();
// require database.php wordt gebruikt voor de database connectie
require 'database.php';

// met een get request de id ophalen van het opgevraagde product vanaf de index pagina
// vervolgend ook door de sql query de rest van de informatie ophalen
$carid = $_GET['id'];
$sql = "SELECT * FROM producten WHERE car_id = $carid ";
$result = mysqli_query($conn, $sql);
$producten = mysqli_fetch_all($result, MYSQLI_ASSOC);

// nagaan of de opgevraagde informatie gevonden is in de database 
// als het gevonden is dan wordt de pagina met de informatie getoond
if (!is_object($result)) {
    header("location: productInfo.php");
    exit;
}
// als de informatie niet gevonden is wordt er een bericht getoond
if (mysqli_num_rows($result) <= 0) {
    echo "This product doens't exist!!";
    exit;
}

$product = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <title>Webwinkel</title>
</head>

<body>
    <!-- begin navbar / header -->
    <?php
    include('header.php');
    ?>
    <!-- einde navbar / header -->
    <!-- begin main -->
    <section class="min_page_heigt">
        <main>
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
    <!-- einde main part -->
    <!-- begin footer -->
    <?php
    include('footer.php');
    ?>
    <!-- einde footer -->
</body>

</html>