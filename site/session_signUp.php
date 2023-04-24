<?php
session_start();
include("database.php");

if (
    isset($_POST['email']) && isset($_POST['voornaam'])
    && isset($_POST['achternaam']) && isset($_POST['address'])
    && isset($_POST['stad']) && isset($_POST['wachtwoord'])
    && isset($_POST['check_wachtwoord'])
) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $firstname = validate($_POST['voornaam']);
    $lastname = validate($_POST['achternaam']);
    $address = validate($_POST['address']);
    $city = validate($_POST['stad']);
    $pass = validate($_POST['wachtwoord']);
    $check_pass = validate($_POST['check_wachtwoord']);
    $role = validate($_POST['role']);

    $user_data = 'email=' . $email . '&voornaam=' . $firstname . '&achternaam=' . $lastname . '&address=' . $address . '&stad=' . $city;

    if (empty($email)) {
        header("Location: signUp.php?error=Email-address is required&$user_data");
        exit();
    } else if (empty($firstname)) {
        header("Location: signUp.php?error=Firstname is required&$user_data");
        exit();
    } else if (empty($lastname)) {
        header("Location: signUp.php?error=Lastname is required&$user_data");
        exit();
    } else if (empty($address)) {
        header("Location: signUp.php?error=Address is required&$user_data");
        exit();
    } else if (empty($city)) {
        header("Location: signUp.php?error=City is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: signUp.php?error=Password is required&$user_data");
        exit();
    } else if (empty($check_pass)) {
        header("Location: signUp.php?error=Check password is required");
        exit();
    } else if ($pass !== $check_pass) {
        header("Location: signUp.php?error=Password confirmation does not math");
        exit();
    } else {

        // password hashing
        // $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signUp.php?error=This email-address is already in use&$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO users(email, voornaam, achternaam, address, stad, wachtwoord, role) VALUES('$email', '$firstname', '$lastname', '$address', '$city', '$pass', '$role')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: signUp.php?success=Your account has been created succesfully");
                exit();
            } else {
                header("Location: signUp.php?error=Unknown error occurred&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: signUp.php?error");
    exit();
}