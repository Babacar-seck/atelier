<?php
require_once("inc/header3.php");

// Lorsque j'accède à la page profil
// Si je ne suis pas connecté, je suis automatiquement
// redirigé vers la page de connexion
if (!internauteEstConnecte()) {
   header("location:connexion.php");
   exit();
}





?>






<h1> back office </h1>

<h3> Bonjour <?php echo $_SESSION["admin"]["pseudo"] ?> </h3>

<p> Voici vos informations </p> <br>
<p> nom: <?php echo $_SESSION["admin"]["nom"] ?> </p> <br>
<p> prenom: <?php echo $_SESSION["admin"]["prenom"] ?> </p> <br>


</body>

</html>