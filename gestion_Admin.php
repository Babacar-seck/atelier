<?php

require_once('inc/header3.php');

$r = $pdo->query("SELECT * FROM admin");
$content .= "<table class='table'>";
$content .= "<tr>";
for ($i = 0; $i < $r->columnCount(); $i++) {
  $column = $r->getColumnMeta($i);
  $content .= "<th>$column[name]</th>";
}

$content .= "<th> modification </th>";
$content .= "<th> suppression </th>";
$content .= "</tr>";

while ($admin = $r->fetch(PDO::FETCH_ASSOC)) {
  $content .= "<tr>";
  foreach ($admin as $row) {




    $content .= "<td> $row </td>";
  }
  $content .= "<td> <a href=\"?action=modifier&id_admin=$admin[id_admin]\"> Modifier </a> </td>";
  $content .= "<td> <a href=\"?action=supprimer&id_admin=$admin[id_admin]\"> Supprimer </a> </td>";
  $content .= "</tr>";
}


$content .= "</table>";




if (isset($_GET["action"]) && $_GET["action"] == "supprimer") {
  $pdo->query("DELETE FROM admin WHERE id_admin = '$_GET[id_admin]'");
  $content .= "<div class='alert alert-success' role='alert'>Le client a bien été supprimé!</div>";
}

if (isset($_GET["action"]) && $_GET["action"] == "modifier") {
  $r = $pdo->query("SELECT * FROM admin WHERE id_admin= '$_GET[id_admin]'");
  $client_actuel = $r->fetch(PDO::FETCH_ASSOC);
}

if ($_POST) {



  foreach ($_POST as $key => $value) {
    $_POST[$key] = addslashes($value);
  }
  $_POST["mdp"] = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
  if (isset($_GET["action"]) && $_GET["action"] == "modifier") {
    $r = $pdo->query("UPDATE admin SET id_admin = '$_POST[id_admin]', pseudo = '$_POST[pseudo]', mdp = '$_POST[mdp],nom = '$_POST[nom]',prenom = '$_POST[prenom]'");

    $id_admin = $r->rowCount();

    if ($id_admin >= 1) {
      $content .= "<div class='alert alert-success' role='alert'>Le client a bien été modifié!</div>";
    }
  } else {
    $r = $pdo->query("INSERT INTO admin (
      id_admin, pseudo, mdp,nom,prenom)
      VALUES('$_POST[id_admin]', '$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]')");

    $id_admin = $pdo->lastInsertId();
    echo $id_admin;

    if ($id_admin >= 1) {

      $content .= "<div class='alert alert-success' role='alert'>
        Le client a bien été ajouté à la base;
      </div>";
    }
  }
}


$id_admin = (isset($client_actuel['id_admin'])) ? $client_actuel['id_admin'] : '';
$pseudo = (isset($client_actuel['pseudo'])) ? $client_actuel['pseudo'] : '';
$nom = (isset($client_actuel['nom'])) ? $client_actuel['nom'] : '';
$prenom = (isset($client_actuel['prenom'])) ? $client_actuel['prenom'] : '';
$mdp = (isset($client_actuel['mdp'])) ? $client_actuel['mdp'] : '';




?>


<h1> back office client</h1>

<?php
echo $content;
?>

<form method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="id_admin" value="<?= $id_admin ?>">
  <div class="row">
    <div class="col">
      <label for="pseudo">pseudo</label><br>
      <input type="text" name="pseudo" placeholder="pseudo" id="pseudo" class="form-control" pattern="[a-zA-Z0-9-_.]{3,20}" title="caractères acceptés : a-z A-Z 0-9 .-_" required value="<?= $pseudo ?>">
    </div>
    <div class="col">
      <label for="nom">nom</label><br>
      <input type="text" name="nom" placeholder="nom" id="nom" class="form-control" value="<?= $nom ?>">
    </div>

  </div>
  <div class="row">
    <div class="col">
      <label for="prenom">prenom</label><br>
      <input type="text" name="prenom" placeholder="prenom" id="prenom" class="form-control" value="<?= $prenom ?>">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label for="mdp">Mot de Passe</label><br>
      <input type="text" name="mdp" placeholder="mdp" id="mdp" class="form-control" value="<?= $mdp ?>">
    </div>

    <br>
    <input type="submit" value="Créer le client" class="btn btn btn-primary">
</form>
</body>

</html>