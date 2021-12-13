<?php
if (!isset($_POST["inputFirstName"]) || !isset($_POST["inputLastName"]) || !isset($_POST["inputEmail"]) || !isset($_POST["inputPassword"]) || !isset($_POST["inputPasswordRetyped"])) {
    header("location:../signup.php?error=true&message=Veuillez compléter tous les champs.");
    exit();
} else {
    $firstName = htmlspecialchars($_POST["inputFirstName"]);
    $lastName = htmlspecialchars($_POST["inputLastName"]);
    $email = htmlspecialchars($_POST["inputEmail"]);
    $password = htmlspecialchars($_POST["inputPassword"]);
    $passwordVerification = htmlspecialchars($_POST["inputPasswordRetyped"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location:../signup.php?error=true&message=L'adresse courriel est invalide.");
        exit();
    }

    if ($password !== $passwordVerification) {
        header("location:../signup.php?error=true&message=Les mots de passe ne correspondent pas.");
        exit();
    }

    $DATABASE = require("database.php");

    try {
        $query = $DATABASE->prepare("SELECT count(*) as numberEmail FROM user WHERE email =?");
        $query->execute(array($email));
    } catch (exception $e) {
        header("location:../login.php?error=true&message=" . $e->getMessage());
        exit();
    }

    while ($exists = $query->fetch()) {
        if ($exists["numberEmail"] == 1) {
            header("location:../signup.php?error=true&message=L'adresse courriel est déjà utilisée.");
            exit();
        }
    }

    $remember_me = sha1($email) . time();
    $remember_me = sha1($remember_me) . time();
    require("encryptPassword.php");
    $password = encryptPassword($email, $password);

    try {
        $query = $DATABASE->prepare("INSERT INTO user (email, first_name, last_name, password, remember_me) VALUES (?, ?, ?, ?, ?);");
        $query->execute(array($email, $firstName, $lastName, $password, $remember_me));
    } catch (exception $e) {
        header("location:../login.php?error=true&message=" . $e->getMessage());
        exit();
    }

    header("location:../login.php?success=true&message=Le compte a été créé avec succès.");
}
