<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cheile API reCAPTCHA
    $secretKey = "6LdkNiIrAAAAANTDvBtSW-HfCtpqBzY1HSKAkcu5"; // cheia secretă
    $responseKey = $_POST['g-recaptcha-response']; // răspunsul reCAPTCHA
    $userIP = $_SERVER['REMOTE_ADDR']; // adresa IP a utilizatorului

    // Verifică reCAPTCHA
    $verifyURL = "https://www.google.com/recaptcha/api/siteverify";
    $response = file_get_contents($verifyURL . "?secret=" . $secretKey . "&response=" . $responseKey . "&remoteip=" . $userIP);
    $responseKeys = json_decode($response);

    // Verifică dacă reCAPTCHA a fost validat
    if(intval($responseKeys->success) !== 1) {
        echo "Please verify that you are not a robot.";
    } else {
        // Dacă reCAPTCHA este valid, procesează mesajul
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Aici poți să adaugi codul pentru a trimite un email sau să salvezi în baza de date
        // Exemplu simplu de trimitere email:
        $to = "your-email@example.com";  // Schimbă cu adresa ta de email
        $subject = "Contact Message from $name";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Trimite email
        if(mail($to, $subject, $body)) {
            echo "Message sent successfully!";
        } else {
            echo "There was an error sending the message.";
        }
    }
}
?>
