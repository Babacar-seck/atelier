<?php

require_once('inc/header3.php');

$r = $pdo->query("SELECT * FROM clients");
$content .= "<table class='table'>";
$content .= "<tr>";
for ($i = 0; $i < $r->columnCount(); $i++) {
   $column = $r->getColumnMeta($i);
   $content .= "<th>$column[name]</th>";
}

$content .= "<th> modification </th>";
$content .= "<th> suppression </th>";
$content .= "</tr>";

while ($clients = $r->fetch(PDO::FETCH_ASSOC)) {
   $content .= "<tr>";
   foreach ($clients as $row) {
      //  echo"<pre>";
      // var_dump($key);
      // echo"</pre>";

      // echo"<pre>";
      // var_dump($value);
      // echo"</pre>";

      // $content .= "<td> <a href=\"?action=modifier&id_car=$cars[id_car]\"> Modifier </a> </td>";


      if ($row == "img") {
         $content .= "<td> <img src=\"$value\" width=\"100\" class=\"img-fluid\"> </td>";
      } else {
         $content .= "<td> $row </td>";
      }
   }
   $content .= "<td> <a href=\"?action=modifier&id_client=$clients[id_client]\"> Modifier </a> </td>";
   $content .= "<td> <a href=\"?action=supprimer&id_client=$clients[id_client]\"> Supprimer </a> </td>";
   $content .= "</tr>";
}


$content .= "</table>";




if (isset($_GET["action"]) && $_GET["action"] == "supprimer") {
   $pdo->query("DELETE FROM clients WHERE id_client = '$_GET[id_client]'");
   $content .= "<div class='alert alert-success' role='alert'>Le client a bien été supprimé!</div>";
}

if (isset($_GET["action"]) && $_GET["action"] == "modifier") {
   $r = $pdo->query("SELECT * FROM clients WHERE id_client= '$_GET[id_client]'");
   $client_actuel = $r->fetch(PDO::FETCH_ASSOC);
}

if ($_POST) {



   foreach ($_POST as $key => $value) {
      $_POST[$key] = addslashes($value);
   }

   if (isset($_GET["action"]) && $_GET["action"] == "modifier") {
      $r = $pdo->query("UPDATE clients SET id_client = '$_POST[id_client]', first_name = '$_POST[first_name]', last_name = '$_POST[last_name]', adress = '$_POST[adress]', postal_code = '$_POST[postal_code]', city = '$_POST[city]', telephone = '$_POST[telephone]', siret = '$_POST[siret]', type = '$_POST[type]', date_of_birth = '$_POST[date_of_birth]', place_of_birth = '$_POST[place_of_birth]' WHERE id_client = '$_POST[id_client]'");

      $id_client = $r->rowCount();

      if ($id_client >= 1) {
         $content .= "<div class='alert alert-success' role='alert'>Le client a bien été modifié!</div>";
      }
   } else {
      $r = $pdo->query("INSERT INTO clients (
      id_client, first_name, last_name, adress, postal_code, city, telephone, siret, type, date_of_birth, place_of_birth)
      VALUES('$_POST[id_client]', '$_POST[first_name]', '$_POST[last_name]', '$_POST[adress]', '$_POST[postal_code]', '$_POST[city]', '$_POST[telephone]', '$_POST[siret]', '$_POST[type]', '$_POST[date_of_birth]', '$_POST[place_of_birth]')");

      $id_client = $pdo->lastInsertId();
      echo $id_client;

      if ($id_client >= 1) {
         echo "je rentre ici";
         $content .= "<div class='alert alert-success' role='alert'>
        Le client a bien été ajouté à votre parc;
      </div>";
      }
   }
}


$id_client = (isset($client_actuel['id_client'])) ? $client_actuel['id_client'] : '';
$first_name = (isset($client_actuel['first_name'])) ? $client_actuel['first_name'] : '';
$last_name = (isset($client_actuel['last_name'])) ? $client_actuel['last_name'] : '';
$adress = (isset($client_actuel['adress'])) ? $client_actuel['adress'] : '';
$postal_code = (isset($client_actuel['postal_code'])) ? $client_actuel['postal_code'] : '';
$city = (isset($client_actuel['city'])) ? $client_actuel['city'] : '';
$telephone = (isset($client_actuel['telephone'])) ? $client_actuel['telephone'] : '';
$siret = (isset($client_actuel['siret'])) ? $client_actuel['siret'] : '';
$type = (isset($client_actuel['type'])) ? $client_actuel['type'] : '';
$date_of_birth = (isset($client_actuel['date_of_birth'])) ? $client_actuel['date_of_birth'] : '';
$place_of_birth = (isset($client_actuel['place_of_birth'])) ? $client_actuel['place_of_birth'] : '';
?>


<h1> GEstion client</h1>

<?php
echo $content;
?>

<form method="post" action="" enctype="multipart/form-data">
   <input type="hidden" name="id_client" value="<?= $id_client ?>">
   <div class="row">
      <div class="col">
         <label for="first_name">first_name</label><br>
         <input type="text" name="first_name" placeholder="first_name" id="first_name" class="form-control" value="<?= $first_name ?>">
      </div>
      <div class="col">
         <label for="last_name">last_name</label><br>
         <input type="text" name="last_name" placeholder="last_name" id="last_name" class="form-control" value="<?= $last_name ?>">
      </div>

   </div>
   <div class="row">
      <div class="col">
         <label for="adress">adress</label><br>
         <input type="text" name="adress" placeholder="adress" id="adress" class="form-control" value="<?= $adress ?>">
      </div>
   </div>
   <div class="row">
      <div class="col">
         <label for="postal_code">postal_code</label><br>
         <input type="text" name="postal_code" placeholder="postal_code" id="postal_code" class="form-control" value="<?= $postal_code ?>">
      </div>
      <div class="col">
         <label for="city">city</label><br>
         <input type="text" name="city" placeholder="city" id="city" class="form-control" value="<?= $city ?>"><br>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <label for="telephone">telephone</label><br>
         <input type="text" name="telephone" placeholder="telephone" id="telephone" class="form-control" value="<?= $telephone ?>">
      </div>
      <div class="col">
         <label for="siret">siret</label><br>
         <input type="text" name="siret" placeholder="siret" id="siret" class="form-control" value="<?= $siret ?>">
      </div>
      <div class="col">
         <label for="type">type</label><br>
         <input type="text" name="type" placeholder="type" id="type" class="form-control" value="<?= $type ?>">
      </div>
   </div>
   <div class="row">
      <div class="col">
         <label for="date_of_birth">date_of_birth</label><br>
         <input type="date" name="date_of_birth" placeholder="date_of_birth" id="date_of_birth" class="form-control" value="<?= $date_of_birth ?>">

      </div>
      <div class="col">
         <label for="place_of_birth">place_of_birth</label><br>
         <input type="text" name="place_of_birth" placeholder="place_of_birth" id="place_of_birth" class="form-control" value="<?= $place_of_birth ?>">
      </div>
   </div>
   <br>
   <input type="submit" value="Créer le client" class="btn btn btn-primary">
</form>

</body>
</html>
