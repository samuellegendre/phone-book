<?php
session_start();

if (!isset($_SESSION["email"]) || !isset($_POST["inputFirstName"]) || !isset($_POST["inputLastName"]) || !isset($_POST["inputEmail"]) || !isset($_POST["inputPhone"]) || !isset($_POST["inputCellphone"]) || !isset($_POST["inputAddress"])) {
    header("location:../contactForm.php?error=true&message=Veuillez compléter tous les champs.");
    exit();
} else {
    $firstName = htmlspecialchars($_POST["inputFirstName"]);
    $lastName = htmlspecialchars($_POST["inputLastName"]);
    $email = htmlspecialchars($_POST["inputEmail"]);
    $phone = htmlspecialchars($_POST["inputPhone"]);
    $cellphone = htmlspecialchars($_POST["inputCellphone"]);
    $address = htmlspecialchars($_POST["inputAddress"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location:../contactForm.php?error=true&message=L'adresse courriel est invalide.");
        exit();
    }

    $DATABASE = require("database.php");

    try {
        $query = $DATABASE->prepare("INSERT INTO contact (user_id, first_name, last_name, email, phone, cellphone, address) VALUES ((SELECT id FROM user WHERE email = ?), ?, ?, ?, ?, ?, ?)");
        $query->execute(array(htmlspecialchars($_SESSION["email"]), $firstName, $lastName, $email, $phone, $cellphone, $address));
    } catch (exception $e) {
        header("location:../contactForm.php?error=true&message=" . $e->getMessage());
        exit();
    }

    header("location:../directory.php?success=true&message=Le contact a été ajouté avec succès.");
}
