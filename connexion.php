<?php
include('inc/init.php');

if (isset($_GET["action"]) && $_GET["action"] == "deconnexion") {
   unset($_SESSION["admin"]);
   header("Refresh:0; url=connexion.php");
   exit();
}

if (internauteEstConnecte()) {
   header("location:backoffice.php");
   exit();
}

if ($_POST) {
   $r = $pdo->query("SELECT * FROM admin WHERE pseudo = '$_POST[pseudo]'");
   $admin = $r->fetch(PDO::FETCH_ASSOC);

   if ($r->rowCount() >= 1) {

      if (password_verify($_POST["mdp"], $admin["mdp"])) {
         $_SESSION["admin"]["id_admin"] = $admin["id_admin"];
         $_SESSION["admin"]["pseudo"] = $admin["pseudo"];
         $_SESSION["admin"]["nom"] = $admin["nom"];
         $_SESSION["admin"]["prenom"] = $admin["prenom"];

         header("Refresh:0; url=backoffice.php");
         $content .= "<div class='alert alert-danger' role='alert'>
         Mot de passe valide!
      </div>";
      } else {
         $content .= "<div class='alert alert-danger' role='alert'>
         Mot de passe invalide1!
      </div>";
      }
   } else {
      $content .= "<div class='alert alert-danger' role='alert'>
         Le pseudo est invalide2!
      </div>";
   }
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
   <meta charset='utf-8'>
   <meta http-equiv='X-UA-Compatible' content='IE=edge'>
   <meta name='keywords' content='HTML5 Template' />
   <meta name='description' content='SH Auto - Achats et ventes de véhicules d' occasion' />
   <meta name='author' content='potenzaglobalsolutions.com' />
   <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
   <title>SH Auto - Achats et ventes de véhicules d'occasion</title>
   <link rel='shortcut icon' href='images/favicon.ico' />
   <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css' />
   <link rel='stylesheet' type='text/css' href='css/flaticon.css' />
   <link rel='stylesheet' type='text/css' href='css/mega-menu/mega_menu.css' />
   <link rel='stylesheet' type='text/css' href='css/font-awesome.min.css' />
   <link rel='stylesheet' type='text/css' href='css/slick/slick.css' />
   <link rel='stylesheet' type='text/css' href='css/slick/slick-theme.css' />
   <link rel='stylesheet' type='text/css' href='css/owl-carousel/owl.carousel.css' />
   <link rel='stylesheet' type='text/css' href='css/style.css' />
   <link rel='stylesheet' type='text/css' href='css/responsive.css' />
   <link href='https://fonts.googleapis.com/css?family=Sonsie+One' rel='stylesheet'>
</head>

<body>

   <header id='header' class='defualt'>
      <div class='topbar'>
         <div class='container'>
            <div class='row'>
               <div class='col-lg-6 col-md-12'>
                  <div class='topbar-left text-lg-left text-center'>
                     <ul class='list-inline'>
                        <li> <i class='fa fa-envelope-o'> </i> contact@lethauto.com</li>
                        <li> <i class='fa fa-clock-o'></i> Lun - Sam 9.00 - 19.00. Dim Fermé</li>
                     </ul>
                  </div>
               </div>
               <div class='col-lg-6 col-md-12'>
                  <div class='topbar-right text-lg-right text-center'>
                     <ul class='list-inline'>
                        <li> <i class='fa fa-phone'></i> (+33) 7 82 14 81 41</li>
                        <li><a href='#'><i class='fa fa-facebook'></i></a></li>
                        <li><a href='#'><i class='fa fa-twitter'></i></a></li>
                        <li><a href='#'><i class='fa fa-instagram'></i></a></li>
                        <li><a href='#'><i class='fa fa-youtube-play'></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class='menu'>
         <nav id='menu' class='mega-menu'>
            <section class='menu-list-items'>
               <div class='container'>
                  <div class='row'>
                     <div class='col-md-12'>
                        <ul class='menu-logo'>
                           <li>
                              <a href='../index.html'><img id='logo_img' src='images/logo2.png' alt='logo' style='filter: brightness(0) invert(1);'> </a>
                              <p id='company-name' style="font-family:'Sonsie One', cursive;color:white;margin-top: 10px;"> SH Auto</p>
                           </li>
                        </ul>
                        <ul class='menu-links'>
                           <li><a href='_index.php'> Accueil</a></li>
                           <li class='active'>
                              <a href='listing-01.php'>Voitures <i class='fa fa-angle-down fa-indicator'></i></a>
                              <ul class='drop-down-multilevel'>
                                 <li><a href='purchase.php'>Achat</a></li>
                                 <li><a href='listing-01.php'>Vente</a></li>

                              </ul>
                           </li>
                           <li><a href='connexion.php'>Connexion</a></li>


                        </ul>
                     </div>
                  </div>
               </div>
            </section>
         </nav>
      </div>
   </header>

   <section class='inner-intro bg-1 bg-overlay-black-70'>
      <div class='container'>
         <div class='row text-center intro-title'>
            <div class='col-md-6 text-md-left d-inline-block'>
               <h1 class='text-white'> </h1>
               </h1>
            </div>
            <div class='col-md-6 text-md-right float-right'></div>
         </div>
      </div>
   </section>
   <section class='car-details page-section-ptb'>
      <div class='container'>

         <div class='row'>
            <div class='col-md-12'>
               <div class='details-nav'>
                  <ul>
                     <li>
                        <a data-toggle='modal' data-target='#exampleModal2' data-whatever='@mdo' href='#' class='css_btn'><i class='fa fa-dashboard'></i>Prendre rendez-vous</a>
                        <div class='modal fade' id='exampleModal2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                           <div class='modal-dialog' role='document'>
                              <div class='modal-content'>
                                 <div class='modal-header'>
                                    <h4 class='modal-title' id='exampleModalLabel'>Prendre rendez-vous</h4>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                 </div>
                                 <div id='std_message'></div>
                                 <div class='modal-body'>
                                    <p class='sub-title'> Vous pouvez prendre rendez-vous en remplissant ce formulaire. Nous nous engageons à confirmer votre rendez-vous dans les 24h. </p>
                                    <form class='gray-form reset_css' id='rendezVousForm' action=''>
                                       <input type='hidden' name='action' value='schedule_test_drive' /><input type='hidden' name='reference' value='206PlusTrendyGrey' />
                                       <div class='form-group'><label>Nom*</label><input type='text' class='form-control' id='std_name' name='name' /></div>
                                       <div class='form-group'><label>Adresse Email*</label><input type='text' class='form-control' id='std_email' name='email'></div>
                                       <div class='form-group'><label>Téléphone*</label><input type='text' class='form-control' id='std_phone' name='phone'></div>
                                       <div class='form-group'><label>Jour*</label><input type='text' class='form-control' id='std_day' name='day'></div>
                                       <div class='form-group'><label>Heure*</label><input type='text' class='form-control' id='std_time' name='time'></div>
                                       <div class='form-group'>
                                          <label>Nous vous contactons par?*</label>
                                          <div class='radio'><label><input type='radio' id='std_optradio' name='contact' value='email' checked>Email</label></div>
                                          <div class='radio'><label><input type='radio' id='std_optradio' name='contact' value='phone'>Téléphone</label></div>
                                       </div>
                                       <div class='form-group'>
                                          <div id='recaptcha2'></div>
                                       </div>
                                       <div class='form-group'><button id='submit' name='submit' type='submit' value='Send' class='button red'> Prendre rendez-vous </button><i class='fa fa-refresh fa-spin fa-3x fa-fw load_spiner' style='display: none;'></i></div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li>
                        <a data-toggle='modal' data-target='#exampleModal3' data-whatever='@mdo' href='#' class='css_btn'><i class='fa fa-tag'></i>Faire une offre</a>
                        <div class='modal fade' id='exampleModal3' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                           <div class='modal-dialog' role='document'>
                              <div class='modal-content'>
                                 <div class='modal-header'>
                                    <h4 class='modal-title' id='exampleModalLabel'>Faire une offre</h4>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                 </div>
                                 <div id='mao_message'></div>
                                 <div class='modal-body'>
                                    <form class='gray-form reset_css' action='' id='makeOfferForm'>
                                       <input type='hidden' name='action' value='make_an_offer' /><input type='hidden' name='reference' value='206PlusTrendyGrey' />
                                       <div class='form-group'><label>Nom*</label><input type='text' id='mao_name' name='name' class='form-control'></div>
                                       <div class='form-group'><label>Adresse email*</label><input type='text' id='mao_email' name='email' class='form-control'></div>
                                       <div class='form-group'><label>Téléphone*</label><input type='text' id='mao_phone' name='phone' class='form-control'></div>
                                       <div class='form-group'><label>Vôtre proposition en Euros*</label><input type='text' id='mao_price' name='price' class='form-control'></div>
                                       <div class='form-group'><label>Commentaire additionnel*</label><textarea class='form-control input-message' rows='4' id='mao_comments' name='comments'></textarea></div>
                                       <div class='form-group'>
                                          <label>Nous vous contactons par?*</label>
                                          <div class='radio'><label><input type='radio' id='mao_radio' name='mao_radio' value='email' checked>Email</label></div>
                                          <div class='radio'><label><input type='radio' id='mao_radio' name='mao_radio' value='phone'>Téléphone</label></div>
                                       </div>
                                       <div class='form-group'>
                                          <div id='recaptcha3'></div>
                                       </div>
                                       <div class='form-group'><button id='submit' name='submit' type='submit' value='Send' class='button red'> Faire une offre </button></div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li><a href='javascript:window.print()'><i class='fa fa-print'></i>Imprimer cette page</a></li>
                  </ul>
                  <div id='rendezVousMessage' style='margin-bottom: 20px;'>
                     <p style='float:left;margin-right:10px;color:green;'>Votre demande de rendez-vous a été envoyée.</p>
                     <img style='width:20px;color:green;' src='../images/tick.png' alt=''>
                  </div>
                  <div id='offerMessage'>
                     <p style='float:left;margin-right:10px;color:green;'>Votre offre a été envoyée.</p>
                     <img style='width:20px;color:green;' src='../images/tick.png' alt=''>
                  </div>
               </div>
            </div>
         </div>



         <h1> connexion </h1>


         <?php
         echo $content;
         ?>

         <form method="POST" action="">
            <div>
               <label for="pseudo">Pseudo</label>
               <input type="text" name="pseudo" placeholder="First Name" id="pseudo" class="form-control">
            </div>

            <div>
               <label for="mdp">mdp</label>
               <input type="password" name="mdp" placeholder="votre mdp" id="mdp" class="form-control">
            </div>

            <div>
               <input type="submit" class="btn btn-default" value="se connecter">
            </div>
         </form>


</body>

</html>