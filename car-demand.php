<?php
require_once("inc/header.php");
?>

<!--=================================
 header -->


<!--=================================
 inner-intro -->
 
 <section class="inner-intro bg-1 bg-overlay-black-70">
  <div class="container">
     <div class="row text-center intro-title">
           <div class="col-md-6 text-md-left d-inline-block">
             <h1 class="text-white">Demande précise </h1>
           </div>
           <div class="col-md-6 text-md-right float-right">
             <!--<ul class="page-breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><a href="#">pages</a> <i class="fa fa-angle-double-right"></i></li>
                <li><span>Register</span> </li>
             </ul>-->
           </div>
     </div>
  </div>
</section>

<!--=================================
 inner-intro -->


<!--=================================
 register-form  -->

<section class="register-form page-section-ptb">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="section-title">
           <span>Une envie précise? </span>
           <h2>Nous vous trouvons le véhicule de votre choix</h2>
           <div class="separator"></div>
         </div>
      </div>
    </div>
    <div id="formmessage">
      <p style="float:left;margin-right:10px"> Message envoyé </p>
      <img style="width:20px;color:green;"src="images/tick.png" alt="">
    </div>
    <form class="form-horizontal" id="carDemandForm" action="">
    <div class="row justify-content-center">
       <div class="col-lg-8 col-md-12">
        <div class="gray-form">
           <div class="row">
              <div class="form-group col-md-6">
                <label>Votre prénom*</label>
                <input class="form-control" required type="text" placeholder="Votre prénom" name="first-name">
              </div> 
              <div class="form-group col-md-6">
                <label>Votre nom*</label>
                <input class="form-control" required type="text" placeholder="Votre nom" name="name">
               </div>
              <div class="form-group col-md-6">
                <label>Votre numéro de téléphone*</label>
                <input class="form-control" required type="text" placeholder="Votre numéro de téléphone" name="phone">
              </div>
             <div class="form-group col-md-6">
              <label>Votre email*</label>
              <input class="form-control" required type="email" placeholder="Votre email" name="email">
             </div>
            </div>

            <div class="form-group">
             <label>Marque du véhicule* </label>
               <input  class="form-control" required type="text" placeholder="La marque du véhicule" name="brand">
            </div>
            <div class="form-group">
             <label>Modèle du véhicule* </label>
               <input class="form-control" required type="text" placeholder="Le modèle du véhicule" name="model">
            </div>

          </div>
            <label>Année du véhicule *</label>
            <div class="row">
             <div class="form-group col-md-4">
                 <div class="selected-box auto-hight">
                   <select required="required" name="year">
                      <option value="" disabled>Année du véhicule</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>  
                        <option value="2010">2010</option>  
                        <option value="2011">2011</option>  
                        <option value="2012">2012</option>  
                        <option value="2013">2013</option>  
                        <option value="2014">2014</option>  
                        <option value="2015">2015</option>  
                        <option value="2016">2016</option>  
                        <option value="2017">2017</option>  
                        <option value="2018">2018</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-4">
                 <div class="selected-box auto-hight">
                    <select required name="kilometer">
                        <option value="" disabled>Kilométrage</option>
                        <option value="100 000 km">- 100 000 km</option>
                        <option value="100 000 km - 120 000 km">100 000 km - 120 000 km</option>
                        <option value="120 000 km - 140 000 km">120 000 km - 140 000 km</option>
                        <option value="140 000 km - 160 000 km">140 000 km - 160 000 km</option>
                        <option value="160 000 km - 180 000 km">160 000 km - 180 000 km</option>
                        <option value="180 000 km - 200 000 km">180 000 km - 200 000 km</option>
                        <option value="200 000 km - 220 000 km">200 000 km - 220 000 km</option>
                        <option value="220 000 km - 240 000 km">220 000 km - 240 000 km</option>
                        <option value="240 000 km - 260 000 km">240 000 km - 260 000 km</option>
                        <option value="260 000 km - 280 000 km">260 000 km - 280 000 km</option>
                        <option value="280 000 km - 300 000 km">280 000 km - 300 000 km</option>
                        <option value="+ 300 000 km">+ 300 000 km</option>
                     </select>
                  </div>
                </div>
                <div class="form-group col-md-4">
                 <div class="selected-box auto-hight">
                    <select required name="budget">
                        <option value="" disabled>Budget</option>
                        <option value="- 1000€">- 1000€</option>
                        <option value="1000€ - 1500€">1000€ - 1500€</option>
                        <option value="1500€ - 2000€">1500€ - 2000€</option>
                        <option value="2000€ - 2500€">2000€ - 2500€</option>
                        <option value="2500€ - 3000€">2500€ - 3000€</option>
                        <option value="3000€ - 4000€">3000€ - 4000€</option>
                        <option value="4000 - 5000€">4000 - 5000€</option>
                        <option value="5000 - 6000€">5000 - 6000€</option>
                        <option value="6000€ - 7000€">6000€ - 7000€</option>
                        <option value="7000€ - 8000€">7000€ - 8000€</option>
                        <option value="8000€ - 9000€">8000€ - 9000€</option>
                        <option value="9000€ - 1000€">9000€ - 1000€</option>
                        <option value="+ 10 000€">+ 10 000€</option>
                     </select>
                  </div>
                </div>
                </div>
                 <input type="hidden" name="action" value="sendEmail"/>
                 <button id="submit" name="submit" type="submit" value="Send" class="button red"> Demander un véhicule </button>
               </div>
           </div>
         </form>
         <div id="ajaxloader" style="display:none"><img class="center-block" src="images/ajax-loader.gif" alt=""></div>
    </div>
</section>

<!--=================================
 register-form  -->
 
 
<!--=================================
 footer -->

<footer class="footer bg-2 bg-overlay-black-90">
  <div class="container">
    <div class="row">
     <div class="col-md-12">
      <div class="social" style="margin-bottom:40px">
        <ul>
          <li style="opacity:0"><a class="pinterest" href="#">pinterest <i class="fa fa-pinterest-p"></i> </a></li>
          <li style="opacity:0"><a class="dribbble" href="#">dribbble <i class="fa fa-dribbble"></i> </a></li>
          <li><a class="facebook" href="https://www.facebook.com/sam.lethauto.39">facebook <i class="fa fa-facebook"></i> </a></li>
          <li><a class="twitter" href="https://www.instagram.com/sam.shauto/">instagram <i class="fa fa-instagram"></i> </a></li>
          <li style="opacity:0"><a class="google-plus" href="#">google plus <i class="fa fa-google-plus"></i> </a></li>
          <li style="opacity:0"><a class="behance" href="#">behance <i class="fa fa-behance"></i> </a></li>
        </ul>
       </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="about-content">
          <img class="img-fluid" id="logo-footer" src="images/logo2.png" alt="" style="filter: brightness(0) invert(1);">
          <p id="company-name" style="font-family: 'Sonsie One', cursive;color:white;margin-top: 10px;"> SH Auto</p>
          <p>SH Auto est spécialisé dans la vente et l'achat de véhicules d'occasions et vous propose également des services de réparations pour l'entretien de votre véhicule. </p>
        </div>
        <div class="address">
          <ul>
            <li style="margin-bottom:0px;padding-bottom:0px"><span>68 Rue Boucicaut</span> </li>
            <li><span>92260 Fontenay-aux-Roses</span> </li>
            <li> <i class="fa fa-phone"></i><span>(+33) 7 82 14 81 41</span> </li>
            <li> <i class="fa fa-envelope-o"></i><span>contact@lethauto.com</span> </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="usefull-link">
        <h6 class="text-white">Liens Utils</h6>
          <ul>
            <li><a href="listing-01.html"><i class="fa fa-angle-double-right"></i> Vente de véhicules </a></li>
            <li><a href="purchase.html"><i class="fa fa-angle-double-right"></i> Achat de véhicules</a></li>
            <li><a href="mecanic.html"><i class="fa fa-angle-double-right"></i> Préstations liées à la mécanique</a></li>
            <li><a href="purchase.html"><i class="fa fa-angle-double-right"></i> Devis pour achat de véhicule </a></li>
            <li><a href="cost-estimate.html"><i class="fa fa-angle-double-right"></i> Devis pour réparation de véhicule</a></li>
          </ul>
        </div> 
      </div>
      <div class="col-lg-3 col-md-6">
       <div class="recent-post-block">
        <h6 class="text-white">Dernières actualités </h6>
          <div class="recent-post">
            <div class="recent-post-image">
              <img class="img-fluid" src="images/car/01.jpg" alt=""> 
            </div>
            <div class="recent-post-info">
                <a href="events.html">Salon de l'auto</a>
                <span class="post-date"><i class="fa fa-calendar"></i>10 Septembre 2017</span>
            </div>
         </div>
         <div class="recent-post">
            <div class="recent-post-image">
              <img class="img-fluid" src="images/car/02.jpg" alt=""> 
            </div>
            <div class="recent-post-info">
                <a href="events.html">Classiques des 80's </a>
                <span class="post-date"><i class="fa fa-calendar"></i>10 Septembre 2017</span>
            </div>
         </div>
         <div class="recent-post">
            <div class="recent-post-image">
              <img class="img-fluid" src="images/car/03.jpg" alt=""> 
            </div>
            <div class="recent-post-info">
                <a href="events.html">"Avoir un joint de culasse?" </a>
                <span class="post-date"><i class="fa fa-calendar"></i>10 Septembre 2017</span>
            </div>
         </div>
       </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="news-letter">
        <h6 class="text-white">Inscrivez-vous à notre newsletter </h6>
         <p>Inscrivez-vous à notre newsletter pour ne rien manquer quant à l'entrée de nouveaux véhicules dans notre parc automobile.</p>
         <form class="news-letter">
           <input type="email" placeholder="Entrez votre courriel" class="form-control placeholder">
           <a class="button red" href="#">S'inscrire</a>
         </form>
        </div> 
      </div>
    </div>
    <hr />
    <div class="copyright">
     <div class="row">
      <div class="col-lg-6 col-md-12">
       <div class="text-lg-left text-center">
        <p>©Copyright 2018 SH Auto </a></p>
       </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <ul class="list-inline text-lg-right text-center">
          <li><a href="terms-and-conditions.html"> Conditions générales </a> |</li> 
          <li><a href="contact.html"> Nous contacter </a></li>
        </ul>
      </div>
     </div>
    </div>
  </div>
</footer>
 
<!--=================================
 footer -->
 
  

 <!--=================================
 back to top -->

<div class="car-top">
  <span><img src="images/car.png" alt=""></span>
</div>

 <!--=================================
 back to top -->

<!--=================================
 jquery -->

<!-- jquery  -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
 
<!-- bootstrap -->
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- mega-menu -->
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>

<!-- select -->
<script type="text/javascript" src="js/select/jquery-select.js"></script>

<!-- magnific popup -->
<script type="text/javascript" src="js/magnific-popup/jquery.magnific-popup.min.js"></script>
 
<!-- custom -->
<script type="text/javascript" src="js/custom.js"></script>
  
</body>
</html>
