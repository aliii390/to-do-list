<?php
// Exemple de données utilisateur (à remplacer par une récupération réelle depuis la base de données)
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../../assets/css/output.css">
</head>
<body class="bg-zinc-900 text-white">
    <main class="min-h-screen flex justify-center items-center">
        <section class="w-full max-w-[800px] bg-zinc-800 rounded-lg shadow-lg p-6 sm:p-10 md:p-12">
           
            <header class="flex flex-col items-center gap-4 sm:flex-row sm:items-center sm:gap-8">
                <img 
                    src="https://via.placeholder.com/150" 
                    alt="Photo de profil" 
                    class="w-32 h-32 rounded-full border-4 border-blue-500 sm:w-40 sm:h-40">
                <div class="text-center sm:text-left">
                    <h1 class="text-3xl font-bold md:text-4xl">Mettre les donnée</h1>
                    <p class="text-blue-400 text-lg">Mettre les donnée</p>
                </div>
            </header>

           
            <div class="mt-6 text-center sm:text-left">
                <p class="text-gray-300 text-lg md:text-xl">
                Mettre les donnée
                </p>
            </div>

           
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-zinc-700 p-4 rounded-lg text-center">
                    <p class="text-sm text-gray-400">Email</p>
                    <p class="text-lg font-medium">Mettre les donnée</p>
                </div>
                <div class="bg-zinc-700 p-4 rounded-lg text-center">
                    <p class="text-sm text-gray-400">Nom d'utilisateur</p>
                    <p class="text-lg font-medium">Mettre les donnée</p>
                </div>
            </div>

            <!-- Boutons -->
            <div class="mt-8 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <a href="#edit" 
                   class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-md text-center">
                    Modifier le profil
                </a>
                <a href="../logout.php" 
                   class="bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-md text-center">
                    Se déconnecter
                </a>
            </div>
        </section>
    </main>
</body>
</html>
