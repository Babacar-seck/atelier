<?php

require_once('inc/header3.php');

?>

<script>
    function printPDF(htmlPage) {
        var w = window.open("about:blank");
        w.document.write(htmlPage);
        if (navigator.appName == 'Microsoft Internet Explorer') window.print();
        else w.print();
    }
</script>


<style>
    body {
        margin: 0 auto;
        padding: 100px 500px;
    }

    .titre {
        background-color: grey;
        color: black;
    }
</style>
</head>

<body>
    <?php $r = $pdo->query("SELECT * FROM invoices WHERE id_invoice = '$_GET[id_invoice]'");
    while ($invoices = $r->fetch(PDO::FETCH_ASSOC)) {
    ?>


        <container>
            <div class="row">
                <div class="col">
                    <h2>SH AUTO</h2>
                    <p>2 chemin du Ponceau</p>
                    <p>02200 Soissons</p>
                    <p>Tel: 07.82.14.81.41</p>
                    <p>Siren: 0844 913 822</p>
                    <p>contactshauto@gmail.com</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <h2>
                        <?php
                        echo $invoices['last_name'];
                        echo " ";
                        echo $invoices['first_name'];
                        ?></h2>
                    <p><?php
                        echo $invoices['address'];
                        ?></p>
                    <p><?php
                        echo $invoices['postal_code'];
                        echo " ";
                        echo $invoices['city'];
                        ?></p>
                    <p>Tel: <?php
                            echo $invoices['telephone'];
                            ?></p>
                    <p>Siren: <?php
                                echo $invoices['siret'];
                                ?></p>
                </div>
            </div>
            <div class="row border bg-secondary text-dark">
                <div class="col text-center d-flex justify-content-between align-middle font-weight-bold">
                    <p>Facture N°</p>
                    <p><?php
                        echo $invoices['number_invoice'];
                        ?></p>
                    <p><?php
                        echo $invoices['city_invoice'];
                        ?> le</p>
                    <p><?php
                        echo $invoices['date_invoice'];
                        ?></p>
                </div>
            </div>
            <div class="border">
                <div class="row">
                    <div class="col font-weight-bold">
                        <p>Véhicule garanti 3 mois, en collaboration avec le Prestataire Opteven</p>
                        <p>Véhicule d'occasion</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 font-weight-bold">
                        <p>N°Police</p>
                        <p>Marque</p>
                        <p>Modèle</p>
                        <p>Type</p>
                        <p>N° Série</p>
                        <p>1ère mise en circulation</p>
                        <p>CV</p>
                        <p>Immatriculation</p>
                        <p>Kilométrage</p>
                    </div>
                    <div class="col-3">
                        <p><?php echo $invoices['police_number']; ?></p>
                        <p><?php echo $invoices['brand_car']; ?></p>
                        <p><?php echo $invoices['model_car']; ?></p>
                        <p><?php echo $invoices['type_car']; ?></p>
                        <p><?php echo $invoices['serie_car_number']; ?></p>
                        <p><?php echo $invoices['first_registration_car']; ?></p>
                        <p><?php echo $invoices['cv_car']; ?></p>
                        <p><?php echo $invoices['plate_number']; ?></p>
                        <p><?php echo $invoices['km']; ?></p>
                    </div>
                </div>
            </div>
            <div class="border">
                <div class="row">
                    <div class="col font-weight-bold">
                        <p>Vendu pour la somme de : </p>
                        <p>Vendu avec <?php echo $invoices['number_key']; ?> clé</p>
                    </div>
                    <div class="col-3 text-right align-middle">
                        <p class="align-middle bg-secondary text-dark font-weight-bold">TOTAL <?php echo $invoices['ttc_total']; ?>€</p>
                    </div>
                </div>
            </div>
            <div class="border">
                <div class="row">
                    <div class="col font-weight-bold">
                        <p>Reprise: <?php echo $invoices['reprise_number']; ?></p>
                    </div>
                    <div class="col-3 text-right align-middle">
                        <p class="align-middle bg-secondary text-dark font-weight-bold"><?php echo $invoices['reprise']; ?>€</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="border">
                    <div class="col-4 text-center">
                        <p class="font-weight-bold">Vendeur</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row d-flex justify-content-between font-weight-bold">
                        <p>Total TCC</p>
                        <p class="bg-secondary text-dark font-weight-bold"><?php echo $invoices['ttc_total']; ?> €</p>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <p class="font-weight-bold">Mode de règlement</p>
                        <p><?php echo $invoices['way_of_payment'];
                        } ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="font-weight-bold">CLAUSE DE RESERVATION DE PROPRIETE</p>
                    <p>La responsabilité du véhicule est transférée à l'acquéreur dès la délivrance, mais il n'en acquerra la propriété qu'après paiement complet du prix, frais, accessoires et cartes grises conformément à la loi 80.335 du 12 mai 1980.</p>
                    <p class="font-weight-bold">ART 297 A | 1ER DU CGI TVA SUIR MARGE</p>
                </div>
            </div>
            <a href="javascript:window.print()"><button>Print the page</button></a>

        </container>
</body>

</html>