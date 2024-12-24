<?php
session_start();
// sa c'est pour verif si l'user est connecté via la session
if (isset($_SESSION['pseudo'])) {
    $username = $_SESSION['pseudo'];
   
} else {
   
    header("Location: ../index.php");
    exit;
}
?>