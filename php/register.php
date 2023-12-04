<?php
// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();

    $servername = "localhost";
    $dbname = "new_oee_calculator";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $machines = $_POST['machines_measured'];

    $runningCost = $_POST['running_cost'];

    $workingHours = $_POST['working_hours'];

    $workingDays = $_POST['working_days'];

    $currentOEE = $_POST['current_OEE'];

    $email = $_POST['email'];

    $selectedCurrency = $_POST["selected_currency"];
    

    $sql = "INSERT INTO `oee_input`(`machines_measured`, `hourly_running`, `working_hours`, `production_days`, `curr_oee`, `email`, `selected_currency`) 
    VALUES ('$machines','$runningCost','$workingHours','$workingDays','$currentOEE', '$email', '$selectedCurrency')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "New record created successfully.";

    }else{

        echo "Error:". $sql . "<br>". $conn->error;

    } 


    $_SESSION['machines_measured'] = $machines;
    $_SESSION['running_cost'] = $runningCost;
    $_SESSION['working_hours'] =  $workingHours;
    $_SESSION['working_days'] = $workingDays;
    $_SESSION['current_OEE'] = $currentOEE;
    $_SESSION['email'] = $email;
    $_SESSION['selected_currency'] = $selectedCurrency;
    

    $conn->close(); 
// }
?>
