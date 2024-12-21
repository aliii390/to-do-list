<?php
require_once '../../connect/connectDB.php';
session_start();

// Requête SQL pour récupérer les tâches avec le pseudo de l'utilisateur
$sql = "SELECT user.pseudo, liste.titre, liste.tache
        FROM liste
        INNER JOIN user ON user.id = liste.id_user";

try {
    // Préparer et exécuter la requête
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $taches = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier si des tâches ont été trouvées
    if (!$taches) {
        $taches = []; // Pas de tâches
    }

} catch (PDOException $error) {
    // Afficher l'erreur si la requête échoue
    echo "Erreur lors de la requête des tâches : " . $error->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Ma Todo List</title>
    <link rel="stylesheet" href="../../assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-zinc-900 p-8">

<header class="flex items-center justify-between gap-4 sm:gap-6 md:gap-8 lg:gap-11 px-6 sm:px-8 md:px-12 lg:px-16 py-4">
  <h1 class="text-center font-logo font-title text-[36px] sm:text-[40px] md:text-[48px] lg:text-[55px] bg-gradient-to-r from-[#02d4ffcc] to-[#020024] text-transparent bg-clip-text">
    Agenda.
  </h1>
  <i class="fa-solid fa-user text-xl sm:text-2xl md:text-3xl lg:text-4xl text-gray-100"></i>
</header>

<main>
<section class="min-h-screen w-full flex items-center justify-center font-sans py-10">
    <div class="bg-white rounded-xl shadow-xl p-6 sm:p-8 md:p-10 w-full max-w-md md:max-w-2xl lg:max-w-4xl">
        <!-- Header -->
        <div class="mb-6 text-center">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Ma Todo List</h1>
            <p class="text-sm md:text-base text-gray-600">Organisez vos tâches efficacement et atteignez vos objectifs.</p>
        </div>

        <!-- Add Task -->
        <div class="mb-8">
            <!-- Formulaire pour ajouter une tâche -->
            <form action="../../process/process-tache.php" method="post">
                <div class="flex flex-col gap-4">
                    <input 
                        class="shadow-lg border border-gray-300 rounded-lg w-full py-2 px-3 text-sm sm:text-base text-gray-700 focus:ring-2 focus:ring-blue-400 focus:outline-none" 
                        placeholder="Titre de la tâche" name="titre" required>
                    <textarea
                        class="shadow-lg border border-gray-300 rounded-lg w-full py-2 px-3 text-sm sm:text-base text-gray-700 focus:ring-2 focus:ring-blue-400 focus:outline-none" 
                        placeholder="Description de la tâche" name="tache" required></textarea>
                    <button 
                        class="bg-gradient-to-r from-[#02d4ffcc] to-[#020024] text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg shadow-lg hover:bg-blue-600 transition-all text-sm sm:text-base">
                        Ajouter la tâche
                    </button>
                </div>
            </form>
        </div>

        <!-- Task List -->
        <div class="space-y-4">
            <?php
            // Afficher les tâches récupérées depuis la base de données
            if (!empty($taches)) {
                foreach ($taches as $tache): ?>
            <!-- Task Item -->
            <div class="flex flex-col sm:flex-row items-center justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                <div class="flex flex-col sm:flex-row items-start sm:items-center w-full">
                    <h3 class="text-gray-800 text-sm sm:text-base font-semibold mb-2 sm:mb-0"><?php echo htmlspecialchars($tache['titre']);  ?></h3>
                    <p class="text-gray-600 text-xs sm:text-sm"><?php echo htmlspecialchars($tache['tache']); ?></p>
                </div>
                <div class="flex gap-2">
                    <button 
                        class="bg-green-500 text-white px-3 sm:px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition-all text-sm">
                        Terminé
                    </button>
                    <button 
                        class="bg-red-500 text-white px-3 sm:px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition-all text-sm">
                        Supprimer
                    </button>
                </div>
            </div>
            <?php endforeach;
            } else {
                echo '<p class="text-gray-800 text-center">Aucune tâche trouvée.</p>';
            }
            ?>
        </div>
    </div>
</section>
</main>

</body>
</html>
