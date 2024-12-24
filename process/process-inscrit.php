<?php
require_once '../connect/connectDB.php';
session_start();

// Vérification des champs du formulaire
if (!isset($_POST['pseudo']) || empty(trim($_POST['pseudo'])) || 
    !isset($_POST['mdp']) || empty(trim($_POST['mdp'])) || 
    empty(trim($_POST['prenom'])) || empty(trim($_POST['nom'])) || 
    empty(trim($_POST['email']))) {
    echo "Tous les champs sont requis.";
    exit;
}

// Protection des données utilisateur
$username = htmlspecialchars(trim($_POST['pseudo']));
$email = htmlspecialchars(trim($_POST['email']));
$prenom = htmlspecialchars(trim($_POST['prenom']));
$nom = htmlspecialchars(trim($_POST['nom']));
$password = trim($_POST['mdp']);

try {
   
    $stmt = $pdo->prepare('SELECT * FROM user WHERE pseudo = :pseudo AND email = :email AND prenom = :prenom AND nom = :nom');
    $stmt->execute([
        ':pseudo' => $username,
        ':email' => $email,
        ':prenom' => $prenom,
        ':nom' => $nom
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['mdp'])) {
        // Connexion réussie
        $_SESSION['pseudo'] = [
            'id' => $user['id'],
            'pseudo' => $user['pseudo']
        ];
    } elseif (!$user) {
        //ajout d'un nouveau user si le pseudo existe pas
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (pseudo, mdp, email, prenom, nom) VALUES (:pseudo, :mdp, :email, :prenom, :nom)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':pseudo' => $username,
            ':mdp' => $hash,
            ':email' => $email,
            ':prenom' => $prenom,
            ':nom' => $nom
        ]);

        $_SESSION['pseudo'] = [
            'id' => $pdo->lastInsertId(),
            'pseudo' => $username
        ];
    } else {
     
        $_SESSION["mdp-incorect"] = "Votre mot de passe ou votre identifiant est incorrect";
        header("Location: ../index.php");
        exit;
    }

} catch (PDOException $error) {
    
    echo "Erreur lors de l'insertion ou de la connexion : " . $error->getMessage();
    exit;
}


header("Location: ../front/acceuil/acceuil.php");
exit;
