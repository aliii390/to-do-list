<?php

require_once '../connect/connectDB.php';
session_start();


if (!isset($_SESSION['pseudo']['id']) || !isset($_POST['tache']) || !isset($_POST['titre']))  {
    echo "Données manquantes.";
    exit;
}

// Sécurisation des données entrantes
$tache = htmlspecialchars(trim($_POST['tache']));
$titre = htmlspecialchars(trim($_POST['titre']));

$sql = "INSERT INTO liste (id_user, titre, tache)
        VALUES (:id_user, :titre, :tache)";

try {
    // Préparation et exécution de la requête
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id_user' => $_SESSION["pseudo"]['id'],
        ':titre' => $titre,  
        ':tache' => $tache   
    ]);

   
    header("Location: ../front/acceuil/acceuil.php");
    exit;

} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
}

?>
