
<?php
// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $servername = "localhost";
    $dbname = "new_oee_calculator";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $annualincrease = $_POST['output_annual_increase'];

    $dailyincrease = $_POST['output_daily_increase'];

    $ROIoutput = $_POST['output_roi'];

    $yearlyincrease = $_POST['output_yearly_increase'];

    $selectedCurrency = $_POST["selected_currency"];

        // Save the results to the database
    $query = "INSERT INTO oee_output (`annual_increase`, `daily_increase`, `ROI`, `yearly_increase`, `selected_currency`)
    VALUES ('$annualincrease', '$dailyincrease', '$ROIoutput', '$yearlyincrease', '$selectedCurrency')";

    $result = $conn->query($query);

    if ($result == TRUE) {

        echo "New record created successfully.";

    }else{

        echo "Error:". $query . "<br>". $conn->error;

    } 

    $_SESSION['output_annual_increase'] = $annualincrease;
    $_SESSION['output_daily_increase'] = $dailyincrease;
    $_SESSION['output_roi'] =  $ROIoutput;
    $_SESSION['output_yearly_increase'] = $yearlyincrease;
    $_SESSION['selected_currency'] = $selectedCurrency;

    $conn->close(); 
// }
?>