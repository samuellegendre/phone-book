<?php
if (!isset($_POST["inputName"]) || !isset($_POST["inputEmail"]) || !isset($_POST["inputMessage"])) {
    header("location:../contactUs.php?error=true&message=Veuillez remplir tous les champs.");
    exit();
} else {
    $name = htmlspecialchars($_POST["inputName"]);
    $emailAddress = htmlspecialchars($_POST["inputEmail"]);
    $message = htmlspecialchars($_POST["inputMessage"]);

    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        header("location:../contactUs.php?error=true&message=L'adresse courriel est invalide.");
        exit();
    }

    $subject = "LEGENDRE - Confirmation de la demande de " . (isset($_GET["request"]) ? "modification" : "contact");
    $message = "Bonjour " . $name . ",\n\nNous avons reçu votre demande et nous vous répondrons le plus rapidement possible.\n\nCordialement,\nLe service à la clientèle de LEGENDRE\n\n---\n\n" . $message;

    try {
        $email = mail($emailAddress, $subject, $message);
    } catch (exception $e) {
        header("location:../contactUs.php?error=true&message=" . $e->getMessage());
        exit();
    }

    header("location:../contactUs.php?success=true&message=Le message a été envoyé avec succès ! (Vérifiez vos pourriels)");
}