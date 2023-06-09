<?php
session_start();
// require database.php wordt gebruikt voor de database connectie
if (isset($_SESSION['user_id']) && isset($_SESSION['email']) && (($_SESSION['role']) === 'administrator' || ($_SESSION['role']) === 'employee')) {
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
        <title>user settings</title>
    </head>

    <body>
        <!-- begin navbar / header -->
        <?php
        include('header.php');
        ?>
        <!-- einde navbar / header -->
        <!-- begin main -->
        <section class="min_page_heigt">
            <div class="container">
                <div class="container_width">
                    <?php
                    // Array keys omzetten in variabelen.
                    foreach ($users as $user) : ?>
                        <div class="user_dashboard">
                            <h2 class="user_name">
                                <?php echo $user["voornaam"] ?>
                                <?php echo $user["achternaam"] ?>
                            </h2>
                            <div class="user_settings_container">
                                <div class="user_settings_card">
                                    <div class="user_settings_image">
                                        <span class="user_settings_overlay"></span>
                                        <div class="usercardimage">
                                            <img src="/img/alexis-amz-da-cruz-GfA_3_hLUNA-unsplash.jpg" alt="error" class="usercard_img">
                                        </div>
                                    </div>
                                    <div class="usercardcontent">
                                        <div class="user_settings_leftgrid">
                                            <h2 class="user_settings_name">
                                                Voornaam:
                                            </h2>
                                            <h2 class="user_settings_name">
                                                Achternaam:
                                            </h2>
                                            <p class="user_settings_description">
                                                <?php echo $user["email"] ?>
                                            </p>
                                        </div>
                                        <div class="user_settings_gridright">
                                            <p class="user_settings_description">
                                                <?php echo $user["voornaam"] ?>
                                            </p>
                                            <p class="user_settings_description">
                                                <?php echo $user["achternaam"] ?>
                                            </p>
                                            <p class="user_settings_description">
                                                <?php echo $user["address"] ?>
                                            </p>
                                            <p class="user_settings_description">
                                                <?php echo $user["stad"] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- einde main part -->

        <!-- begin footer -->
        <?php
        include('footer.php');
        ?>
        <!-- einde footer -->
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>