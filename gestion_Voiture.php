<?php
require_once('inc/header3.php');

if (isset($_GET["action"])  && $_GET["action"] == "supprimer") {
   $pdo->query("DELETE FROM cars WHERE id_car = '$_GET[id_car]'");
   $content .= "<div class='alert alert-success' role='alert'>Votre voiture a bien été supprimé!</div>";
}

if (isset($_GET["action"]) && $_GET["action"] == "modifier") {
   $r = $pdo->query("SELECT * FROM cars WHERE id_car= '$_GET[id_car]'");
   $cars_actuel = $r->fetch(PDO::FETCH_ASSOC);
}

if ($_POST) {

   if (isset($_GET["action"]) && $_GET["action"] == "modifier") {
      $photo_bdd = $_POST["photo_actuelle"];
   }

   if (!empty($_FILES["img"]["name"])) {
      // Nom de la photo
      $nom_photo = $_POST["brand_car"] . "_" . $_FILES["img"]["name"];
      $photo_bdd = URL . "/imgs/$nom_photo";
      $photo_dossier = RACINE_SITE . "/imgs/$nom_photo";
      copy($_FILES["img"]["tmp_name"], $photo_dossier);
   }


   foreach ($_POST as $key => $value) {
      $_POST[$key] = addslashes($value);
   }

   if (isset($_GET["action"]) && $_GET["action"] == "modifier") {
      $r = $pdo->query("UPDATE cars SET 
       brand_car = '$_POST[brand_car]',  model_car = '$_POST[model_car]',  gearbox = '$_POST[gearbox]',motor = '$_POST[motor]',  type_car = '$_POST[type_car]',
       serie_car_number = '$_POST[serie_car_number]', first_registration_car = '$_POST[first_registration_car]',cv_car = '$_POST[cv_car]',ch_car = '$_POST[ch_car]',
        car_energy = '$_POST[car_energy]',plate_number = '$_POST[plate_number]',km = '$_POST[km]',number_key = '$_POST[number_key]',ext_color = '$_POST[ext_color]',
        in_color = '$_POST[in_color]',global_information = '$_POST[global_information]',options = '$_POST[options]',
        
        img = '$photo_bdd',


        selling_price = '$_POST[selling_price]',price_letters = '$_POST[price_letters]',purchase_price = '$_POST[purchase_price]',purchase_commission_price = '$_POST[purchase_commission_price]',
        status = '$_POST[status]',old_selling_price = '$_POST[old_selling_price]',year = '$_POST[year]',  police_number = '$_POST[police_number]',
        provider = '$_POST[provider]',purchase_date = '$_POST[purchase_date]',origin = '$_POST[origin]',carscol = '$_POST[carscol]',
        availability = '$_POST[availability]',origin = '$_POST[origin]'
        WHERE id_car = '$_POST[id_car]'");

      $id_car = $r->rowCount();

      if ($id_car >= 1) {
         $content .= "<div class='alert alert-success' role='alert'>La voiture a bien été modifié!</div>";
      }
   } else {
      $r = $pdo->query("INSERT INTO cars (id_car,
            brand_car, model_car, gearbox, motor,
             type_car, serie_car_number, first_registration_car, 
             cv_car, ch_car, car_energy, plate_number, km, number_key, 
             ext_color, in_color, global_information, options, img, selling_price, 
             price_letters, purchase_price, purchase_commission_price, status, old_selling_price, year, police_number, provider,
              purchase_date, origin, carscol, availability) 
   VALUES('$_POST[id_car]','$_POST[brand_car]', 
   '$_POST[model_car]','$_POST[gearbox]', '$_POST[motor]', '$_POST[type_car]','$_POST[serie_car_number]','$_POST[first_registration_car]',
   '$_POST[cv_car]','$_POST[ch_car]','$_POST[car_energy]','$_POST[plate_number]','$_POST[km]','$_POST[number_key]','$_POST[ext_color]', '$_POST[in_color]',
   '$_POST[global_information]','$_POST[options]',


   '$photo_bdd',


   '$_POST[selling_price]','$_POST[price_letters]', '$_POST[purchase_price]',
   '$_POST[purchase_commission_price]','$_POST[status]','$_POST[old_selling_price]','$_POST[year]','$_POST[police_number]','$_POST[provider]','$_POST[purchase_date]',
   '$_POST[origin]','$_POST[carscol]','$_POST[availability]')");

      $id_car = $pdo->lastInsertId();
      echo $id_car;




      if ($id_car >= 1) {
         echo "je rentre ici";
         $content .= "<div class='alert alert-success' role='alert'>
     La voiture a bien été ajouté au catalogue;
   </div>";
      }
   }
}



$r = $pdo->query("SELECT id_car,brand_car,model_car,gearbox,img,selling_price FROM cars");
$content .= "<table class='table'>";
$content .= "<tr>";
for ($i = 0; $i < $r->columnCount(); $i++) {
   $column = $r->getColumnMeta($i);
   $content .= "<th>$column[name]</th>";
}

$content .= "<th> modification </th>";
$content .= "<th> suppression </th>";
$content .= "</tr>";

while ($cars = $r->fetch(PDO::FETCH_ASSOC)) {
   $content .= "<tr>";
   foreach ($cars as $key => $value) {


      if ($key == "img") {
         $content .= "<td> <img src=\"$value\" width=\"70\" class=\"img-fluid\"> </td>";
      } else {
         $content .= "<td> $value </td>";
      }
   }
   $content .= "<td> <a href=\"?action=modifier&id_car=$cars[id_car]\"> Modifier </a> </td>";
   $content .= "<td> <a href=\"?action=supprimer&id_car=$cars[id_car]\"> Supprimer </a> </td>";
   $content .= "</tr>";
}


$content .= "</table>";



$id_car = (isset($cars_actuel['id_car'])) ? $cars_actuel['id_car'] : '';
$brand_car = (isset($cars_actuel['brand_car'])) ? $cars_actuel['brand_car'] : '';
$model_car = (isset($cars_actuel['model_car'])) ? $cars_actuel['model_car'] : '';
$gearbox = (isset($cars_actuel['gearbox'])) ? $cars_actuel['gearbox'] : '';
$motor = (isset($cars_actuel['motor'])) ? $cars_actuel['motor'] : '';
$type_car = (isset($cars_actuel['type_car'])) ? $cars_actuel['type_car'] : '';
$serie_car_number = (isset($cars_actuel['serie_car_number'])) ? $cars_actuel['serie_car_number'] : '';

$first_registration_car = (isset($cars_actuel['first_registration_car'])) ? $cars_actuel['first_registration_car'] : '';
$cv_car = (isset($cars_actuel['cv_car'])) ? $cars_actuel['cv_car'] : '';
$ch_car = (isset($cars_actuel['ch_car'])) ? $cars_actuel['ch_car'] : '';
$car_energy = (isset($cars_actuel['car_energy'])) ? $cars_actuel['car_energy'] : '';
$plate_number = (isset($cars_actuel['plate_number'])) ? $cars_actuel['plate_number'] : '';
$km = (isset($cars_actuel['km'])) ? $cars_actuel['km'] : '';
$number_key = (isset($cars_actuel['number_key'])) ? $cars_actuel['number_key'] : '';
$ext_color = (isset($cars_actuel['ext_color'])) ? $cars_actuel['ext_color'] : '';
$in_color = (isset($cars_actuel['in_color'])) ? $cars_actuel['in_color'] : '';
$global_information = (isset($cars_actuel['global_information'])) ? $cars_actuel['global_information'] : '';
$options = (isset($cars_actuel['options'])) ? $cars_actuel['options'] : '';
$img = (isset($cars_actuel['img'])) ? $cars_actuel['img'] : '';
$selling_price = (isset($cars_actuel['selling_price'])) ? $cars_actuel['selling_price'] : '';
$price_letters = (isset($cars_actuel['price_letters'])) ? $cars_actuel['price_letters'] : '';
$purchase_price = (isset($cars_actuel['purchase_price'])) ? $cars_actuel['purchase_price'] : '';
$purchase_commission_price = (isset($cars_actuel['purchase_commission_price'])) ? $cars_actuel['purchase_commission_price'] : '';
$status = (isset($cars_actuel['status'])) ? $cars_actuel['status'] : '';
$old_selling_price = (isset($cars_actuel['old_selling_price'])) ? $cars_actuel['old_selling_price'] : '';
$year = (isset($cars_actuel['year'])) ? $cars_actuel['year'] : '';
$police_number = (isset($cars_actuel['police_number'])) ? $cars_actuel['police_number'] : '';
$provider = (isset($cars_actuel['provider'])) ? $cars_actuel['provider'] : '';
$purchase_date = (isset($cars_actuel['purchase_date'])) ? $cars_actuel['purchase_date'] : '';
$origin = (isset($cars_actuel['origin'])) ? $cars_actuel['origin'] : '';
$carscol = (isset($cars_actuel['carscol'])) ? $cars_actuel['carscol'] : '';
$availability = (isset($cars_actuel['availability'])) ? $cars_actuel['availability'] : '';


?>


<h1> Gestion Des voitures </h1>

<?php echo $content; ?>
<div class="container-fluid">
   <form method="post" action="" enctype="multipart/form-data">
      <input type="hidden" name="id_car" value="<?= $id_car ?>">

      <h3>Car details</h3>
      <div class="row">

         <div class="col">
            <label for="brand_car">brand_car</label>
            <input type="text" name="brand_car" placeholder="brand_car" id="brand_car" class="form-control" value="<?= $brand_car ?>">
         </div>

         <div class="col">
            <label for="model_car">model_car</label>
            <input type="text" name="model_car" placeholder="model_car" id="model_car" class="form-control" value="<?= $model_car ?>">
         </div>

         <div class="col">
            <label for="motor">motor</label>
            <textarea type="text" name="motor" placeholder="motor" id="motor" class="form-control"><?= $motor ?></textarea>
         </div>

         <div class="col">
            <label for="first_registration_car">first_registration_car</label>
            <input type="date" name="first_registration_car" placeholder="first_registration_car" id="motor" class="form-control"><?= $first_registration_car ?>
         </div>

      </div>

      <div class="row">

         <div class="col">
            <label for="year">year</label>
            <input type="date" name="year" placeholder="year" id="motor" class="form-control"><?= $year ?>
         </div>

         <div class="col">
            <label for="gearbox">gearbox</label>
            <input type="text" name="gearbox" placeholder="gearbox" id="gearbox" class="form-control" value="<?= $gearbox ?>">
         </div>

         <div class="col">
            <label for="cv_car">cv_car</label>
            <input type="text" name="cv_car" placeholder="cv_car" id="cv_car" class="form-control" value="<?= $cv_car ?>">
         </div>

         <div class="col">
            <label for="ch_car">ch_car</label>
            <input type="text" name="ch_car" placeholder="ch_car" id="ch_car" class="form-control" value="<?= $ch_car ?>">
         </div>




      </div>

      <div class="row">

         <div class="col">
            <label for="car_energy">car_energy</label>
            <input type="text" name="car_energy" placeholder="car_energy" id="car_energy" class="form-control"><?= $car_energy ?>
         </div>

         <div class="col">
            <label for="plate_number">plate_number</label>
            <input type="text" name="plate_number" placeholder="plate_number" id="plate_number" class="form-control" value="<?= $plate_number ?>">
         </div>

         <div class="col">
            <label for="km">km</label>
            <input type="text" name="km" placeholder="km" id="km" class="form-control" value="<?= $km ?>">
         </div>

         <div class="col">
            <label for="ext_color">ext_color</label>
            <input type="text" name="ext_color" placeholder="ext_color" id="ext_color" class="form-control" value="<?= $ext_color ?>">
         </div>
      </div>

      <div class="row">

         <div class="col">
            <label for="in_color">in_color</label>
            <input type="text" name="in_color" placeholder="in_color" id="in_color" class="form-control" value="<?= $in_color ?>">
         </div>

         <div class="col">
            <label for="type_car">type_car</label>
            <input type="text" name="type_car" placeholder="type_car" id="type_car" class="form-control" value="<?= $type_car ?>">
         </div>

         <div class="col">
            <label for="serie_car_number">serie_car_number</label>
            <input type="text" name="serie_car_number" placeholder="serie_car_number" id="serie_car_number" class="form-control" value="<?= $serie_car_number ?>">
         </div>
         <div class="col">
            <label for="number_key">number_key</label>
            <input type="text" name="number_key" placeholder="number_key" id="number_key" class="form-control" value="<?= $number_key ?>">
         </div>
      </div>

      <h3>More details</h3>

      <div class="row">

         <div class="col">
            <label for="global_information">global_information</label>
            <input type="text-area" name="global_information" placeholder="global_information" id="global_information" class="form-control" value="<?= $global_information ?>">
         </div>
         <div class="col">
            <label for="options">options</label>
            <input type="text-area" name="options" placeholder="options" id="options" class="form-control" value="<?= $options ?>">
         </div>

         <div class="row">
            <div class="col">
               <label for="img">img</label>
               <input type="file" name="img" id="img" class="form-control">
               <?php if (!empty($img)) : ?>
                  <p>Vous pouvez uplaoder une nouvelle photo si vous souhaitez la changer.<br>
                     <img src="<?= $img ?>" width="100"></p>
               <?php endif;  ?><br>
               <input type="hidden" name="photo_actuelle" value="<?= $img ?>">
            </div>

         </div>


         <h3>Prices</h3>

         <div class="row">

            <div class="col">
               <label for="selling_price">selling_price</label>
               <input type="text" name="selling_price" placeholder="selling_price" id="selling_price" class="form-control" value="<?= $selling_price ?>">
            </div>
            <div class="col">
               <label for="old_selling_price">old_selling_price</label>
               <input type="text" name="old_selling_price" placeholder="old_selling_price" id="old_selling_price" class="form-control" value="<?= $old_selling_price ?>">
            </div>
            <div class="col">
               <label for="purchase_price">purchase_price</label>
               <input type="text" name="purchase_price" placeholder="purchase_price" id="purchase_price" class="form-control" value="<?= $purchase_price ?>">
            </div>

         </div>

         <div class="row">

            <div class="col">
               <label for="purchase_commission_price">purchase_commission_price</label>
               <input type="text" name="purchase_commission_price" placeholder="purchase_commission_price" id="purchase_commission_price" class="form-control" value="<?= $purchase_commission_price ?>">
            </div>

            <div class="col">
               <label for="status">status</label>
               <input type="text" name="status" placeholder="status" id="status" class="form-control" value="<?= $status ?>">
            </div>
            <div class="col">
               <label for="police_number">police_number</label>
               <input type="text" name="police_number" placeholder="police_number" id="police_number" class="form-control" value="<?= $police_number ?>">
            </div>
            <div class="col">
               <label for="price_letters">price_letters</label>
               <input type="text" name="price_letters" placeholder="price_letters" id="price_letters" class="form-control" value="<?= $price_letters ?>">
            </div>

         </div>

         <div class="row">

            <div class="col">
               <label for="provider">provider</label>
               <input type="text" name="provider" placeholder="provider" id="provider" class="form-control" value="<?= $provider ?>">
            </div>

            <div class="col">
               <label for="purchase_date">purchase_date</label>
               <input type="date" name="purchase_date" placeholder="purchase_date" id="purchase_date" class="form-control" value="<?= $purchase_date ?>">
            </div>
            <div class="col">
               <label for="origin">origin</label>
               <input type="text" name="origin" placeholder="origin" id="origin" class="form-control" value="<?= $origin ?>">
            </div>
            <div class="col">
               <label for="carscol">carscol</label>
               <input type="text" name="carscol" placeholder="carscol" id="carscol" class="form-control" value="<?= $carscol ?>">
            </div>
            <div class="col">
               <label for="availability">availability</label>
               <input type="text" name="availability" placeholder="availability" id="availability" class="form-control" value="<?= $availability ?>">
            </div>
         </div>

         <input type="submit" value="enregistrer la voiture" class="btn btn btn-primary">
   </form>

</div>

</body>

</html>