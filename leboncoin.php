<?php

require_once('inc/init.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>



    <h3>Car details</h3>
    <div class="row">



        <form method="get" action="ajax.php">
            <div class="col">
                <label for="police_number">police_number</label>
                <select name="police_number" id="police_number">
                    <option value="">--Choisir un police Number--</option>
                    <?php $r = $pdo->query("SELECT * FROM cars");
                    while ($cars = $r->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $cars["police_number"]; ?>">
                        <?php echo $cars["police_number"] ;
                    } ?>
                        </option>
                </select>
            </div>
            <div class="col">
                <label for="brand_car">brand_car</label>
                <input type="text" name="brand_car" placeholder="brand_car" id="brand_car" class="form-control" value="">
            </div>

            <div class="col">
                <label for="model_car">model_car</label>
                <input type="text" name="model_car" placeholder="model_car" id="model_car" class="form-control" value="">
            </div>

            <div class="col">
                <label for="motor">motor</label>
                <textarea type="text" name="motor" placeholder="motor" id="motor" class="form-control"></textarea>
            </div>

            <div class="col">
                <label for="first_registration_car">first_registration_car</label>
                <input type="date" name="first_registration_car" placeholder="first_registration_car" id="motor" class="form-control">
            </div>

    </div>

    <div class="row">

        <div class="col">
            <label for="year">year</label>
            <input type="date" name="year" placeholder="year" id="motor" class="form-control">
        </div>

        <div class="col">
            <label for="gearbox">gearbox</label>
            <input type="text" name="gearbox" placeholder="gearbox" id="gearbox" class="form-control" value="">
        </div>

        <div class="col">
            <label for="cv_car">cv_car</label>
            <input type="text" name="cv_car" placeholder="cv_car" id="cv_car" class="form-control" value="">
        </div>

        <div class="col">
            <label for="ch_car">ch_car</label>
            <input type="text" name="ch_car" placeholder="ch_car" id="ch_car" class="form-control" value="">
        </div>




    </div>

    <div class="row">

        <div class="col">
            <label for="car_energy">car_energy</label>
            <input type="text" name="car_energy" placeholder="car_energy" id="car_energy" class="form-control">
        </div>

        <div class="col">
            <label for="plate_number">plate_number</label>
            <input type="text" name="plate_number" placeholder="plate_number" id="plate_number" class="form-control" value="">
        </div>

        <div class="col">
            <label for="km">km</label>
            <input type="text" name="km" placeholder="km" id="km" class="form-control" value="">
        </div>

        <div class="col">
            <label for="ext_color">ext_color</label>
            <input type="text" name="ext_color" placeholder="ext_color" id="ext_color" class="form-control" value="">
        </div>
    </div>

    <div class="row">

        <div class="col">
            <label for="in_color">in_color</label>
            <input type="text" name="in_color" placeholder="in_color" id="in_color" class="form-control" value="">
        </div>

        <div class="col">
            <label for="type_car">type_car</label>
            <input type="text" name="type_car" placeholder="type_car" id="type_car" class="form-control" value="">
        </div>

        <div class="col">
            <label for="serie_car_number">serie_car_number</label>
            <input type="text" name="serie_car_number" placeholder="serie_car_number" id="serie_car_number" class="form-control" value="">
        </div>
        <div class="col">
            <label for="number_key">number_key</label>
            <input type="text" name="number_key" placeholder="number_key" id="number_key" class="form-control" value="">
        </div>
    </div>

    <h3>More details</h3>

    <div class="row">

        <div class="col">
            <label for="global_information">global_information</label>
            <input type="text-area" name="global_information" placeholder="global_information" id="global_information" class="form-control" value="">
        </div>
        <div class="col">
            <label for="options">options</label>
            <input type="text-area" name="options" placeholder="options" id="options" class="form-control" value="">
        </div>




        <h3>Prices</h3>

        <div class="row">

            <div class="col">
                <label for="selling_price">selling_price</label>
                <input type="text" name="selling_price" placeholder="selling_price" id="selling_price" class="form-control" value="">
            </div>
            <div class="col">
                <label for="old_selling_price">old_selling_price</label>
                <input type="text" name="old_selling_price" placeholder="old_selling_price" id="old_selling_price" class="form-control" value="">
            </div>
            <div class="col">
                <label for="purchase_price">purchase_price</label>
                <input type="text" name="purchase_price" placeholder="purchase_price" id="purchase_price" class="form-control" value="">
            </div>

        </div>

        <div class="row">

            <div class="col">
                <label for="purchase_commission_price">purchase_commission_price</label>
                <input type="text" name="purchase_commission_price" placeholder="purchase_commission_price" id="purchase_commission_price" class="form-control" value="">
            </div>

            <div class="col">
                <label for="status">status</label>
                <input type="text" name="status" placeholder="status" id="status" class="form-control" value="">
            </div>

            <div class="col">
                <label for="price_letters">price_letters</label>
                <input type="text" name="price_letters" placeholder="price_letters" id="price_letters" class="form-control" value="">
            </div>

        </div>

        <div class="row">

            <div class="col">
                <label for="provider">provider</label>
                <input type="text" name="provider" placeholder="provider" id="provider" class="form-control" value="">
            </div>

            <div class="col">
                <label for="purchase_date">purchase_date</label>
                <input type="date" name="purchase_date" placeholder="purchase_date" id="purchase_date" class="form-control" value="">
            </div>
            <div class="col">
                <label for="origin">origin</label>
                <input type="text" name="origin" placeholder="origin" id="origin" class="form-control" value="">
            </div>
            <div class="col">
                <label for="carscol">carscol</label>
                <input type="text" name="carscol" placeholder="carscol" id="carscol" class="form-control" value="">
            </div>
            <div class="col">
                <label for="availability">availability</label>
                <input type="text" name="availability" placeholder="availability" id="availability" class="form-control" value="">
            </div>
        </div>

        <input type="submit" id="submit" value="afficher la voiture" class="btn btn btn-primary">
        <input type="text" name="text" value="">
        </form>

        <div id="resultat"></div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="app.js"></script>
</body>

</html>