<?php
   include('inc/init.php');

   $r = $pdo->query("SELECT * FROM cars WHERE police_number ='$_GET[police_number]'");
   $resultat = $r->fetch(PDO::FETCH_ASSOC);
   $json = json_encode($resultat);

   echo strip_tags( $json);


?>