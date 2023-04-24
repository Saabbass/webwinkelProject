<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Product</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- begin ingoegen van navbar / header -->
    <?php
    include('header.php');
    ?>
    <!-- einde invoegen van navbar / header -->
    <!-- action en method zijn atributen -->
    <div class="container_img">
        <div class="container">
            <div class="container_width">
                <section class="form_align">
                    <form action="session_new_user.php" method="post">
                        <h1 class="form_head">Maak een nieuwe gebruiker aan</h1>
                        <div>
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                        </div>
                        <div>
                            <?php if (isset($_GET['success'])) { ?>
                                <p class="success"><?php echo $_GET['success']; ?></p>
                            <?php } ?>
                        </div>
                        <div class="form_group">
                            <!-- for="" is voor het drukken op de naam / label, dan wordt de input automatisch aangetikt -->
                            <label for="voornaam">Voornaam</label>
                            <input type="text" name="voornaam" id="voornaam">
                        </div>
                        <div class="form_group">
                            <label for="achternaam">Achternaam</label>
                            <input type="text" name="achternaam" id="achternaam">
                        </div>
                        <div class="form_group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="form_group">
                            <label for="wachtwoord">Wachtwoord</label>
                            <input type="password" name="wachtwoord" id="wachtwoord">
                        </div>
                        <div class="form_group">
                            <label for="check_wachtwoord">Wachtwoord_check</label>
                            <input type="password" name="check_wachtwoord" id="check_wachtwoord">
                        </div>
                        <div class="form_group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address">
                        </div>
                        <div class="form_group">
                            <label for="stad">Stad</label>
                            <input type="text" name="stad" id="stad">
                        </div>
                        <div class="form_group_radio">
                            <input type="radio" id="role1" name="role" value="administrator">
                            <label for="role1">Administrator</label>
                        </div>
                        <div class="form_group_radio">
                            <input type="radio" id="role2" name="role" value="employee">
                            <label for="role2">Employee</label>
                        </div>
                        <div class="form_group_radio">
                            <input type="radio" id="role3" name="role" value="customer">
                            <label for="role3">Customer</label>
                        </div>
                        <div>
                            <a href="" class="form_content_switch">Ik heb al een account</a>
                            <button class="button_submit" type="sumbit">Maak nieuwe gebruiker</button>
                        </div>
                    </form>
                </section>
            </div>
            <!-- begin footer -->
        </div>
    </div>
    <?php
    include('footer.php');
    ?>
    <!-- einde footer -->
</body>

</html>