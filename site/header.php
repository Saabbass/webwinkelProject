<!DOCTYPE html>
<html lang="nl-NL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- begin header -->
    <section class="header_nav">
        <header class="container">
            <section class="container_width">
                <div class="nav_top">
                    <img src="img/webwinkel.png" alt="">
                    <a href="">De auto webwinkel</a>
                    <!-- begin box voor de rechterkant van de header -->
                    <div class="right">
                        <p>&copy;2023.SchoolProject</p>
                        <div class="search_box">
                            <input type="text">
                            <span class="fa fa-search"></span>
                        </div>
                        <a href="index.php"><i class="fa fa-home"></i></a>
                        <a href="signUp.php"><i class="fa fa-user"></i></a>
                    </div>
                    <!-- einde box voor de rechterkant van de header -->
                </div>
            </section>
        </header>
        <!-- begin invoegen van navbar -->
        <?php
            include ('nav.php');
        ?>
        <!-- einde invoegen van navbar -->
    </section>
    <!-- einde header -->
</body>

</html>