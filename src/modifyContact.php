<?php
session_start();

if (!isset($_SESSION["email"]) || !isset($_POST["inputId"]) || !isset($_POST["inputFirstName"]) || !isset($_POST["inputLastName"]) || !isset($_POST["inputEmail"]) || !isset($_POST["inputPhone"]) || !isset($_POST["inputCellphone"]) || !isset($_POST["inputAddress"])) {
    header("location:../contactForm.php?error=true&message=Veuillez compléter tous les champs.");
    exit();
} else {
    $id = htmlspecialchars($_POST["inputId"]);
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
        $query = $DATABASE->prepare("SELECT u.email FROM contact INNER  JOIN user u on contact.user_id = u.id WHERE contact.id = ?");
        $query->execute(array($id));
    } catch (exception $e) {
        header("location:../contactForm.php?error=true&message=" . $e->getMessage());
        exit();
    }

    while ($data = $query->fetch()) {
        if ($data["email"] !== htmlspecialchars($_SESSION["email"])) {
            header("location:../directory.php?error=true&message=Le contact n'a pas été modifié.");
            exit();
        }
    }

    try {
        $query = $DATABASE->prepare("UPDATE contact INNER JOIN user on contact.user_id = user.id SET contact.first_name = ?, contact.last_name = ?, contact.email = ?, contact.phone = ?, contact.cellphone = ?, contact.address = ? WHERE contact.id = ? AND user.email = ?");
        $query->execute(array($firstName, $lastName, $email, $phone, $cellphone, $address, $id, htmlspecialchars($_SESSION["email"])));
    } catch (exception $e) {
        header("location:../contactForm.php?error=true&message=" . $e->getMessage());
        exit();
    }

    header("location:../directory.php?success=true&message=Le contact a été modifié avec succès.");
}
