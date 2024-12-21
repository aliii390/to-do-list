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
    <link rel="stylesheet" href="./assets/css/output.css">
  
</head>

<body class="bg-zinc-900 ">
    <main class="pt-[20%] flex flex-col xl:pt-[10%]">
        <form action="./process/process-login.php" method="post">
        <section>
            <h1 class=" text-center font-logo font-title text-[80px] bg-gradient-to-r from-[#02d4ffcc]  to-[#020024] text-transparent bg-clip-text ">Agenda.</h1>
            <div class="flex flex-col gap-2 items-center mt-40">
                <input
                    type="text"
                    name="pseudo"
                    placeholder="Nom d'utilisateur"
                    class="w-[340px] p-[8px] mb-3 text-white border rounded-md border-[#262626] bg-[#262626] focus:outline-none focus:ring-2 focus:ring-violet" />


               
                <input
                    type="password"
                   name="mdp"
                    placeholder="Mot de passe"
                    class="w-[340px] p-[8px] mb-4 border text-white rounded-md border-[#262626] bg-[#262626] focus:outline-none focus:ring-2 focus:ring-violet" />

                    <?php if(isset($_SESSION["mdp-incorect"])): ?>
                    <p class="text-white"><?= $_SESSION["mdp-incorect"]?></p>
                    <?php unset($_SESSION["mdp-incorect"]); ?>
                    
                    <?php endif; ?>
                <input
                    type="submit"
                    value="Connexion"
                    class="w-[340px] p-[8px] bg-gradient-to-r from-[#020024] to-[#02d4ffcc] text-white font-bold rounded-md cursor-pointer hover:bg-blue-600" />
                
            </div>
        </section>
        </form>

    </main>



</body>

</html>