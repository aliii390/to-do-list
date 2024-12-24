<?php
session_start();

if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
    // header('Location: ./front/accueil/accueil.php');
    // exit;
}
// var_dump($_SESSION);
// die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/css/output.css">
</head>

<body class="bg-zinc-900">
    <main class="pt-[20%] flex flex-col items-center md:pt-[15%] lg:pt-[10%] xl:pt-[8%]">
        <form action="../../process/process-inscrit.php" method="post" class="w-full max-w-[400px] md:max-w-[480px] lg:max-w-[600px]">
            <section class="px-4">
                <h1 class="text-center font-logo font-title text-[40px] md:text-[50px] lg:text-[60px] xl:text-[80px] bg-gradient-to-r from-[#02d4ffcc] to-[#020024] text-transparent bg-clip-text">
                    Agenda.
                </h1>
                <div class="flex flex-col gap-4 items-center mt-12 lg:mt-20">
                    <input
                        type="text"
                        name="prenom"
                        placeholder="Prénom"
                        class="w-full p-[10px] text-white border rounded-md border-[#262626] bg-[#262626] focus:outline-none focus:ring-2 focus:ring-violet" />

                    <input
                        type="text"
                        name="nom"
                        placeholder="Nom de famille"
                        class="w-full p-[10px] text-white border rounded-md border-[#262626] bg-[#262626] focus:outline-none focus:ring-2 focus:ring-violet" />

                    <input
                        type="text"
                        name="email"
                        placeholder="Adresse mail"
                        class="w-full p-[10px] text-white border rounded-md border-[#262626] bg-[#262626] focus:outline-none focus:ring-2 focus:ring-violet" />

                    <input
                        type="text"
                        name="pseudo"
                        placeholder="Nom d'utilisateur"
                        class="w-full p-[10px] text-white border rounded-md border-[#262626] bg-[#262626] focus:outline-none focus:ring-2 focus:ring-violet" />

                    <input
                        type="password"
                        name="mdp"
                        placeholder="Mot de passe"
                        class="w-full p-[10px] border text-white rounded-md border-[#262626] bg-[#262626] focus:outline-none focus:ring-2 focus:ring-violet" />

                    <?php if(isset($_SESSION["mdp-incorect"])): ?>
                    <p class="text-white"><?= $_SESSION["mdp-incorect"]?></p>
                    <?php unset($_SESSION["mdp-incorect"]); ?>
                    <?php endif; ?>

                    <input
                        type="submit"
                        value="Inscription"
                        class="w-full p-[10px] bg-gradient-to-r from-[#020024] to-[#02d4ffcc] text-white font-bold rounded-md cursor-pointer hover:bg-blue-600" />
                </div>
                <div class="mt-7 text-center">
                    <p class="text-white">Si vous avez déjà un compte <span class="text-connect"><a href="../../index.php" class="underline text-blue-500 hover:text-blue-300">connectez-vous</a></span></p>
                </div>
            </section>
        </form>
    </main>
</body>

</html>
