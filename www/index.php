<?php

include("../dbConfig.php");
$sql = "SELECT * FROM countries ORDER BY country ASC";
$countries = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Dropdown lists examples</title>
    <script>
        function getStates(countryID) {
            // alert(countryID);
            $("#state").show();
            $("#stateDropdown").html("<option>loading...</option>");
            $.ajax({
                method: "POST",
                url: "getStates.php",
                dataType: "html",
                data: {
                    country: countryID
                }
            }).done(function(data) {
                $("#stateDropdown").html(data);
            });
        }
    </script>
</head>

<body>
    <div class="container">
        <form action="" class="form-horizontal">
            <div class="form-group">
                <label for="country" class="col-sm-2">Country:</label>
                <div class="col-sm-4">
                    <select name="country" id="country" class="form-control" onchange="getStates(this.value)">
                        <option value="">-- select a country --</option>
                        <?php
                        foreach ($countries as $country) {
                            echo "<option value='" . $country['id'] . "'>" . $country['country'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group" id="state">
                <label for="state" class="col-sm-2">State:</label>
                <div class="col-sm-4">
                    <select name="state" id="stateDropdown" class="form-control"></select>
                </div>
            </div>
        </form>
    </div>
</body>

</html>