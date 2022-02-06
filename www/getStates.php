<?php

$countryID = $_POST['country'];

if (filter_var($countryID, FILTER_VALIDATE_INT)) {
    require("../dbConfig.php");
    // $countryID = $_POST['country'];
    $sql = "SELECT * FROM states WHERE countryID = :countryID ORDER BY state ASC";
    $states = $db->prepare($sql);
    $states->execute(array(
        ':countryID' => $countryID
    ));

    echo "<option>-- select a state --</option>";
    foreach ($states as $state) {
        echo "<option value='" . $state['id'] . "'>" . $state['state'] . "</option>";
    }
} else {
    echo "<option>Failed to load!</option>";
}
