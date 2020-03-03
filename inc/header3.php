<?php
include('init.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Boutique : BackOffice</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/toto.css">
</head>

<div class="container">

   <body>

      <div id="wrapper">

         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="backoffice.php">Home <span class="sr-only">(current)</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="##navbarNavDropdown" aria-controls="#navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="#navbarNavDropdown">
               <ul class="navbar-nav mr-auto">

                  <li class="nav-item ">
                     <a class="nav-link" href="gestion_Voiture.php">Gestion Voiture</a>
                  </li>

                  <li class="nav-item ">
                     <a class="nav-link" href="gestion_Client.php">Gestion Client</a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link" href="gestion_Facture.php">Gestion Facture</a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link" href="listefactures.php">Listes Factures</a>
                  </li>
                  
                  <?php if (internauteEstConnecte()) { ?>
                    
                     <li class="nav-item">
                        <a class="nav-link" href="connexion.php?action=deconnexion">Deconnexion</a>
                     </li>

                  <?php } ?>

               </ul>

            </div>
            
         </nav>
         <!-- /#sidebar-wrapper -->

         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">