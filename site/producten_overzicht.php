<?php
session_start();
// require database.php wordt gebruikt voor de database connectie
require 'database.php';

// sql-qeury voor het ophalen van alle producten uit de database
$sql = "SELECT * FROM producten";
$result = mysqli_query($conn, $sql);
$producten = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    <!-- begin ingoegen van navbar / header -->
    <?php
    include('header.php');
    ?>
    <!-- einde invoegen van navbar / header -->
    <!-- begin main -->
    <section class="home_main">
        <main>
            <!-- begin main part 2 -->
            <section>
                <div class="container">
                    <div class="container_width">
                        <div class="product">
                            <h2 class="product_category">Onze aanbevelingen</h2>
                            <button class="pre_btn"><i class="fa fa-chevron-left"></i></button>
                            <button class="nxt_btn"><i class="fa fa-chevron-right"></i></button>
                            <div class="product_container">
                                <?php
                                // Array keys omzetten in variabelen.
                                foreach ($producten as $product) : ?>
                                    <div class="product_card">
                                        <div class="card">
                                            <div class="image_content">
                                                <span class="overlay"></span>
                                                <div class="card_image">
                                                    <img src="img/<?php echo $product["img"] ?>" alt="" class="card_img">
                                                </div>
                                            </div>
                                            <div class="card_content">
                                                <h2 class="name">
                                                    <?php echo $product["merk"] ?>
                                                    <?php echo $product["model"] ?>
                                                </h2>
                                                <p class="description">
                                                    <?php echo $product["type"] ?>
                                                    €<?php echo $product["prijs"] ?>
                                                </p>
                                                <p class="description">
                                                    <?php echo $product["brandstof"] ?>
                                                    voorraad: <?php echo $product["voorraad"] ?>
                                                </p>
                                                <a href="productInfo.php?id=<?php echo $product['car_id'] ?>" class="btn-info">Lees meer</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="js/script.js"></script>
            </section>
            <!-- einde main part 2 -->
            <!-- begin main part 3 -->
            <section>
                <div class="container">
                    <div class="container_width">
                        <h2 class="main_product_category">De modellen</h2>
                        <section class="main_product_container">
                            <div class="main_product_nav main_product_section">
                                <h3 class="main_product_choise">Voertuigtype</h3>
                                <ul>
                                    <li>
                                        <a href=""><i class="fa fa-car"></i>Limousine</a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-car"></i>MPV</a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-car"></i>SUV</a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-car"></i>Estate</a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-car"></i>Hatchback</a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-car"></i>Coupé</a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-car"></i>Cabrio</a>
                                    </li>
                                </ul>
                                <h3 class="main_product_choise">brandstof type</h3>
                                <label class="container_checkbox">Elektrisch
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_checkbox">Plug-in-Hybrid
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_checkbox">Benzine
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_checkbox">Diesel
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="mains_product_container main_product_section">
                                <div class="mains_container_name">
                                    <h2 class="mains_cards_name">Limousine</h2>
                                </div>
                                <?php
                                // Array keys omzetten in variabelen.
                                foreach ($producten as $product) : ?>
                                    <div class="mains_product_card">
                                        <div class="mains_card">
                                            <div class="mains_image_content">
                                                <span class="mains_overlay"></span>
                                                <div class="mains_card_image">
                                                    <img src="img/<?php echo $product["img"] ?>" alt="" class="card_img">
                                                </div>
                                            </div>
                                            <div class="mains_card_content">
                                                <div class="card_content">
                                                    <h2 class="mains_name">
                                                        <?php echo $product["merk"] ?>
                                                        <?php echo $product["model"] ?>
                                                    </h2>
                                                    <p class="mains_description">
                                                        <?php echo $product["type"] ?>
                                                        €<?php echo $product["prijs"] ?>
                                                    </p>

                                                    <p class="mains_description">
                                                        <?php echo $product["brandstof"] ?>
                                                        voorraad: <?php echo $product["voorraad"] ?>
                                                    </p>
                                                    <a href="productInfo.php?id=<?php echo $product['car_id'] ?>" class="btn-info">Lees meer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                        </section>
                    </div>
                </div>
            </section>
        </main>
    </section>
    <!-- einde main -->
    <!-- begin footer -->
    <?php
    include('footer.php');
    ?>
    <!-- einde footer -->
</body>

</html>