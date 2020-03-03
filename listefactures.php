<?php

require_once('inc/header3.php');

$r = $pdo->query("SELECT id_invoice, number_invoice, first_name, last_name, siret, city_invoice, police_number, total, ttc_total FROM invoices");


$content .= "<table class='table'>";
$content .= "<tr>";
for ($i = 0; $i < $r->columnCount(); $i++) {
   $column = $r->getColumnMeta($i);
   $content .= "<th>$column[name]</th>";
}

$content .= "<th> Télécharger </th>";
$content .= "</tr>";

while ($invoices = $r->fetch(PDO::FETCH_ASSOC)) {
   $content .= "<tr>";
   foreach ($invoices as $row) {
      $content .= "<td> $row </td>";
   }


   $content .= "<td> <a href=\"facturemodel.php?id_invoice=$invoices[id_invoice]\"> Télécharger </a> </td>";
}

$content .= "</tr>";

$content .= "</table>";

?>


<h1>Listing factures</h1>

<?php
echo $content;
?>
</body>
</html>