<?php
require_once('inc/header3.php');

if (isset($_POST['creer_Facture']) && !empty($_POST['creer_Facture'])) {
   $pdo->query("INSERT INTO invoices (first_name, 
   last_name, address,  postal_code, city,
    telephone,  siret,  date_invoice, police_number,
     brand_car, model_car,type_car, serie_car_number, 
   cv_car ,price_letters, number_key,total,reprise,
    reprise_number, ttc_total, way_of_payment, type,
     warranty,plate_number,km,first_registration_car,
     id_client )
     VALUES ( '$_POST[first_name]', 
    '$_POST[last_name]', '$_POST[address]','$_POST[postal_code]', '$_POST[city]', 
    '$_POST[telephone]','$_POST[siret]', '$_POST[date_invoice]', '$_POST[police_number]', 
    '$_POST[brand_car]', '$_POST[model_car]', '$_POST[type_car]', '$_POST[serie_car_number]',
    '$_POST[cv_car]', '$_POST[price_letters]', '$_POST[number_key]', '$_POST[total]',
     '$_POST[reprise]', '$_POST[reprise_number]', '$_POST[ttc_total]', '$_POST[way_of_payment]', 
     '$_POST[type]', '$_POST[warranty]','$_POST[plate_number]','$_POST[km]','$_POST[first_registration_car]',
      '$_SESSION[id_client]'
      )");

   $last_id = $pdo->lastInsertId();
   if ($last_id >= 1) {
      $content .= "<div class=\"alert alert-success\" role=\"alert\">
               La facture a bien été ajouté à la base de données.</div>";
   } else {
      $content .= "<div class=\"alert alert-danger\" role=\"alert\">
               Un problème est survenu lors de l'ajout de la facture. Veuillez réessayer.
           </div>";
   }
}

?>


<div class='container'>
   <h1>Gestion facture</h1>

   <?php echo $content ?>
   <br>

   <div id="resultat"></div>

   <form method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_client" value="<?= $id_client ?>">
      <div class="row">
         <form>

            <div class="col-4">
               <label for="id_client">first_name:</label>
               <select name="id_client" id="id_client">
                  <option value="">--Choisir un Nom--</option>
                  <?php $r = $pdo->query("SELECT * FROM clients");
                  while ($clients = $r->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $clients["id_client"]; ?>">
                     <?php echo $clients["id_client"] . " " . $clients["last_name"] . " " . $clients["first_name"];
                  } ?>
                     </option>
               </select>
            </div>
            <div class="col-4">
               <label for="id_car">Voitures:</label>
               <select name="id_car" id="id_car">
                  <option value="">--Choisir Voiture--</option>
                  <?php $r = $pdo->query("SELECT * FROM cars");
                  while ($cars = $r->fetch(PDO::FETCH_ASSOC)) {

                  ?>
                     <option value="<?php echo $cars["id_car"]; ?>">
                     <?php echo  $cars["id_car"] . " " . $cars["brand_car"];
                  } ?>
                     </option>
               </select>
            </div>
            <div class="row">
               <input type="submit" id="generer" name="generer" action="" value="Générer Facture" class="btn btn btn-primary">
            </div>
         </form>
      </div>

      <br>
      <br>
      <h3 class='text-center md-4'>CLIENTS </h3>
      <br>
      <br>

      <form method="post">
         <div class="row">

            <?php
            if (isset($_POST['generer']) && !empty($_POST['generer'])) {

               $_SESSION['id_car'] = $_POST['id_car'];
               $_SESSION['id_client'] = $_POST['id_client'];

               $r = $pdo->query("SELECT * FROM clients  WHERE id_client = '$_POST[id_client]'");
               $r2 = $pdo->query("SELECT * FROM cars  WHERE id_car= '$_POST[id_car]'");


               $clients = $r->fetch();
               $cars = $r2->fetch();

            ?>




               <div class="col">
                  <label for="first_name">first_name</label>
                  <input type="text" name="first_name" placeholder="first_name" id="first_name" class="form-control" value="<?= $clients['first_name'] ?>">
               </div>

               <div class="col-md-4">
                  <label for="last_name">last_name</label><br>
                  <input type="text" name="last_name" placeholder="last_name" id="last_name" class="form-control" value="<?= $clients['last_name'] ?>">
               </div>
               <div class="col-md-4">
                  <label for="address">address</label><br>
                  <input type="text" name="address" placeholder="address" id="address" class="form-control" value="<?= $clients['adress'] ?>">
               </div>
               <div class="col-md-4">
                  <label for="postal_code">postal_code</label><br>
                  <input type="text" name="postal_code" placeholder="postal_code" id="postal_code" class="form-control" value="<?= $clients['postal_code'] ?>">
               </div>
               <div class="col-md-4">
                  <label for="city">city</label><br>
                  <input type="text" name="city" placeholder="city" id="city" class="form-control" value="<?= $clients['city'] ?>">
               </div>
               <div class="col-md-4">
                  <label for="telephone">telephone</label><br>
                  <input type="text" name="telephone" placeholder="telephone" id="telephone" class="form-control" value="<?= $clients['telephone'] ?>">
               </div>
               <div class="col-md-4">
                  <label for="type">type</label><br>
                  <input type="text" name="type" placeholder="type" id="type" class="form-control" value="<?= $clients['type'] ?>">
               </div>
               <div class="col-md-4">
                  <label for="siret">siret</label><br>
                  <input type="text" name="siret" placeholder="siret" id="siret" class="form-control" value="<?= $clients['siret'] ?>">
               </div>
               <div class="col-md-4">
                  <label for="date_of_birth">date_of_birth</label><br>
                  <input type="text" name="date_of_birth" placeholder="date_of_birth" id="date_of_birth" class="form-control" value="<?= $clients['date_of_birth'] ?>">
               </div>
               <div class="col-md-4">
                  <label for="place_of_birth">place_of_birth</label><br>
                  <input type="text" name="place_of_birth" placeholder="place_of_birth" id="place_of_birth" class="form-control" value="<?= $clients['place_of_birth'] ?>">
               </div>
               <div class="col-md-4">
                  <label for="sexe">sexe</label><br>
                  <input type="text" name="sexe" placeholder="sexe" id="sexe" class="form-control" value="<?= $clients['sexe'] ?>">
               </div>



         </div>

         <br>
         <br>
         <h3 class='text-center md-4'> INVOICE INFORMATIONS </h3>
         <br>
         <br>
         <div class='row'>
            <div class="col-md-6">
               <label for="number_invoice">number_invoice</label>
               <input type="text" name="number_invoice" placeholder="number_invoice" id="number_invoice" class="form-control" value="">
            </div>
            <div class="col-md-6">
               <label for="city_invoice">city_invoice</label>
               <input type="text" name="city_invoice" placeholder="city_invoice" id="city_invoice" class="form-control" value="">
            </div>

            <div class="col-md-6">
               <label for="date_invoice">date_invoice</label><br>
               <input type="date" name="date_invoice" placeholder="date_invoice" id="date_invoice" class="form-control" value="">
            </div>
            <div class="col-md-6">
               <label for="police_number">police_number</label><br>
               <input type="text" name="police_number" placeholder="police_number" id="police_number" class="form-control" value="">
            </div>
            <div class="col-md-6">
               <label for="postal_code">postal_code</label><br>
               <input type="text" name="postal_code" placeholder="postal_code" id="postal_code" class="form-control" value="">
            </div>


         </div>



         <br>
         <br>

         <h3 class='text-center md-4'>VOITURES</h3>

         <br>
         <br>

         <div class='row'>

            <div class="col-md-4">
               <label for="brand_car">brand_car</label>
               <input type="text" name="brand_car" placeholder="brand_car" id="brand_car" class="form-control" value="<?= $cars['brand_car'] ?>">
            </div>

            <div class="col-md-4">
               <label for="model_car">model_car</label><br>
               <input type="text" name="model_car" placeholder="model_car" id="model_car" class="form-control" value="<?= $cars['model_car'] ?>">
            </div>
            <div class="col-md-4">
               <label for="type_car">type_car</label><br>
               <input type="text" name="type_car" placeholder="type_car" id="type_car" class="form-control" value="<?= $cars['type_car'] ?>">
            </div>
            <div class="col-md-4">
               <label for="serie_car_number">serie_car_number</label><br>
               <input type="text" name="serie_car_number" placeholder="serie_car_number" id="serie_car_number" class="form-control" value="<?= $cars['serie_car_number'] ?>">
            </div>
            <div class="col-md-4">
               <label for="cv_car">cv_car</label><br>
               <input type="text" name="cv_car" placeholder="cv_car" id="cv_car" class="form-control" value="<?= $cars['cv_car'] ?>">
            </div>

            <div class="col-md-4">
               <label for="number_key">number_key</label><br>
               <input type="text" name="number_key" placeholder="number_key" id="number_key" class="form-control" value="<?= $cars['number_key'] ?>">
            </div>
            <div class="col-md-4">
               <label for="plate_number">plate_number</label><br>
               <input type="text" name="plate_number" placeholder="plate_number" id="plate_number" class="form-control" value="<?= $cars['plate_number'] ?>">
            </div>
            <div class="col-md-4">
               <label for="km">km</label><br>
               <input type="text" name="km" placeholder="km" id="km" class="form-control" value="<?= $cars['km'] ?>">
            </div>
            <div class="col-md-4">
               <label for="first_registration_car">first_registration_car</label><br>
               <input type="date" name="first_registration_car" placeholder="first_registration_car" id="first_registration_car" class="form-control" value="<?= $cars['first_registration_car'] ?>">
            </div>

         </div>



         <br>
         <br>

         <h3 class='text-center md-4'>OTHERS INFORMATIONS</h3>

         <br>
         <br>

         <div class='row'>

            <div class="col-md-4">
               <label for="price_letters">price_letters</label><br>
               <input type="text" name="price_letters" placeholder="price_letters" id="price_letters" class="form-control" value="<?= $cars['price_letters'] ?>">
            </div>
         <?php } ?>
         <div class="col-md-4">
            <label for="total">total</label><br>
            <input type="text" name="total" placeholder="total" id="total" class="form-control" value="">
         </div>
         <div class="col-md-4">
            <label for="ttc_total">ttc_total</label><br>
            <input type="text" name="ttc_total" placeholder="ttc_total" id="ttc_total" class="form-control" value="">
         </div>
         <div class="col-md-4">
            <label for="reprise">reprise</label><br>
            <input type="text" name="reprise" placeholder="reprise" id="reprise" class="form-control" value="">
         </div>
         <div class="col-md-4">
            <label for="reprise_number">reprise_number</label><br>
            <input type="text" name="reprise_number" placeholder="reprise_number" id="reprise_number" class="form-control" value="">
         </div>
         <div class="col-md-4">
            <label for="way_of_payment">way_of_payment</label><br>
            <input type="text" name="way_of_payment" placeholder="way_of_payment" id="way_of_payment" class="form-control" value="">
         </div>
         <div class="col-md-4">
            <label for="warranty">warranty</label><br>
            <input type="text" name="warranty" placeholder="warranty" id="warranty" class="form-control" value="">
         </div>
         <div class="col-md-4">
            <label for="type">type</label><br>
            <input type="text" name="type" placeholder="type" id="type" class="form-control" value="">
         </div>


         </div>



</div>

<div class="row">
   <input type="submit" id="creer_Facture_Facture" name="creer_Facture" action="" value="Créer Facture" class="btn btn btn-primary">
</div>
</form>

</body>

</html>