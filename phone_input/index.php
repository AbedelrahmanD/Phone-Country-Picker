<?php

$languages = [
    "ar" => "rtl",
    "en" => "ltr",
];
$lang = isset($_GET["lang"]) ? $_GET["lang"] : "en";
if (!isset($languages[$lang])) {
    $lang = array_key_first($languages);
}
$dir = $languages[$lang];



?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone picker</title>
    <link rel="stylesheet" href="css/bootstrap_<?= $dir ?>.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/select2_bootstrap_<?= $dir ?>.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery.js"></script>
    <script src="js/select2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- list of countries falgs svg -->
    <script src="js/countries_flags.js"></script>
    <!-- list of countries with code and mobile code -->
    <script src="js/countries.js"></script>


    <script src="js/country_picker.js"></script>
</head>

<body dir="<?= $dir ?>">

    <?php
    print_r($_POST);
    ?>

    <form method="post" class="container shadow rounded my-5 p-2">
        <div class="row my-2">
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label">Country</label>
                    <select id="country" class="form-select form-select-lg">
                        <option value=""></option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="LB">Lebanon</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="form-group">
                <label class="form-label">Phone</label>
                <div data-country-picker class="d-flex">
                    <div class="col-1">
                        <select id="country_phone" class="form-select form-select-lg"> </select>
                    </div>
                    <input name="phone" type="text" class="form-control form-control-lg ms-2">
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <button class="btn btn-lg btn-dark">
                    Submit
                </button>
            </div>
        </div>
    </form>

    <script>
        $(function() {
            //initialize phone picker
            $("#country_phone").country_picker();


            //whe country combo changed,change mobile country picker
            $("#country").change(function() {
                $("#country_phone").val($(this).val()).trigger("change");
            });
        });
    </script>

</body>

</html>