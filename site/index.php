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
    <title>Webwinkel</title>
    <link rel="icon" type="image/x icon" href="img/webwinkel.png">
</head>

<body>
    <!-- begin ingoegen van navbar / header -->
    <?php
    include('header.php');
    ?>
    <!-- einde invoegen van navbar / header -->
    <!-- begin main -->
    <section id="content" class="min_page_heigt">
        <main>
            <!-- begin main part 1 -->
            <section class="container_img">
                <div class="container">
                    <div class="container_width">
                        <div class="box">
                            <div class="txt_box">
                                <h1>Uw auto dealer</h1>

                                <p>Zoek een dealer bij u in de buurt.</p>

                                <a href="">Meer weten</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- einde main part 1 -->
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
                                                <a href="productInfo.php?id=<?php echo $product['car_id'] ?>" class="btn btn-info">Lees meer</a>
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
            <!-- tussen lijn -->
            <div class="container">
                <div class="container_width">
                    <hr class="hr-dark">
                </div>
            </div>
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
                                <label class="container_checkbox" name="checkbox1" id="checkbox1">Elektrisch
                                    <input type="checkbox" name="checkbox1" id="checkbox1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_checkbox" name="checkbox2" id="checkbox2">Plug-in-Hybrid
                                    <input type="checkbox" name="checkbox2" id="checkbox2">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_checkbox" name="checkbox3" id="checkbox3">Benzine
                                    <input type="checkbox" name="checkbox3" id="checkbox3">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container_checkbox" name="checkbox4" id="checkbox4">Diesel
                                    <input type="checkbox" name="checkbox4" id="checkbox4">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="mains_product_container main_product_section">
                                <div class="mains_container_name">
                                    <h2 class="mains_cards_name">Limousine</h2>
                                    <hr class="hr-dark">
                                </div>
                                <?php
                                // Array keys omzetten in variabelen.
                                foreach ($producten as $product) : ?>
                                    <div class="mains_product_card">
                                        <div class="mains_card">
                                            <div class="mains_image_content">
                                                <span class="mains_overlay"></span>
                                                <div class="mains_card_image">
                                                    <img src="img/<?php echo $product["img"] ?>" alt="" class="mains_card_img">
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
                                                    <a href="productInfo.php?id=<?php echo $product['car_id'] ?>" class="btn btn-info">Lees meer</a>
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