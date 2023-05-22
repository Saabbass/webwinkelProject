<?php
session_start();
// require database.php wordt gebruikt voor de database connectie
require 'database.php';

// met een get request de id ophalen van het opgevraagde product vanaf de index pagina
// vervolgend ook door de sql query de rest van de informatie ophalen
$userid = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = $userid ";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

// nagaan of de opgevraagde informatie gevonden is in de database 
// als het gevonden is dan wordt de pagina met de informatie getoond
if (!is_object($result)) {
    header("location: user_settings.php");
    exit;
}
// als de informatie niet gevonden is wordt er een bericht getoond
if (mysqli_num_rows($result) <= 0) {
    echo "This user doens't exist!!";
    exit;
}

$userid = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>user settings</title>
</head>

<body>
    <!-- begin navbar / header -->
    <?php
    include('header.php');
    ?>
    <!-- einde navbar / header -->
    <!-- begin main -->
    <section class="home_main">
        <main>
            <section>
                <div class="container">
                    <div class="container_width">
                        <?php
                        // Array keys omzetten in variabelen.
                        foreach ($users as $user) : ?>

                            <div class="singleProduct">
                                <h2 class="singleProduct_category">
                                    <?php echo $user["voornaam"] ?>
                                    <?php echo $user["achternaam"] ?>
                                </h2>
                                <div class="singleProduct_container">
                                    <div class="singleProduct_card">
                                        <div class="singleCard">
                                            <div class="singleImage_content">
                                                <span class="singleOverlay"></span>
                                                <div class="singleCardimage">
                                                    <img src="/site/img/webwinkel.png" alt="">
                                                </div>
                                            </div>
                                            <div class="singleCard_content">
                                                <div class="grid_left">
                                                    <h2 class="singleName">
                                                        <?php echo $user["voornaam"] ?>
                                                        <?php echo $user["achternaam"] ?>
                                                    </h2>
                                                    <p class="singleDescription_Left">
                                                        <?php echo $user["email"] ?>
                                                </div>
                                                <div class="grid_right">
                                                    
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