<?php
$host = 'localhost';
$db   = 'berru_template';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    $email = $_POST['email'] ?? '';
    $fullname = $_POST['fullname'] ?? '';
    $statut = $_POST['statut'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $budget = $_POST['budget'] ?? '';
    $messageContent = $_POST['message'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO contacts (email, fullname, statut, telephone, budget, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$email, $fullname, $statut, $telephone, $budget, $messageContent]);

    // ---------- Envoi de l'email au client ----------
    $to = "g.leberruyer@gmail.com";
    $subject = "Nouveau message depuis le site ...";
    $message = "
Vous avez reçu un nouveau message :

Nom complet : $fullname
Email : $email
Statut : $statut
Téléphone : $telephone
budget : $budget
Message :$messageContent

---

Ce message a été enregistré dans votre base de données.
";
    $headers = "From: noreply@mon-site.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    mail($to, $subject, $message, $headers);

    // Redirection vers la page de confirmation
    header("Location: merci.html");
    exit();

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
