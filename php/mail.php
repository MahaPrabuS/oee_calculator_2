<?php

include './connect.php';

session_start();

$annualincrease = $_SESSION['output_annual_increase'];
$dailyincrease =  $_SESSION['output_daily_increase'];
$ROIoutput = $_SESSION['output_roi'];
$yearlyincrease = $_SESSION['output_yearly_increase'];
$selectedCurrency = $_SESSION['selected_currency'];

$conn = new mysqli("localhost", "root", "", "new_oee_calculator");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$output_data = $conn->prepare("INSERT INTO oee_output (annual_increase, daily_increase, ROI, yearly_increase) VALUES (?, ?, ?, ?)");
$output_data->bind_param("ssss", $annualincrease, $dailyincrease, $ROIoutput,  $yearlyincrease);
$execval = $output_data->execute();
$output_data->close();

$machines = $_SESSION['machines_measured'];
$runningCost = $_SESSION['running_cost'];
$workingHours = $_SESSION['working_hours'];
$workingDays = $_SESSION['working_days'];
$currentOEE = $_SESSION['current_OEE'];
$email = $_SESSION['email'];
$selectedCurrency = $_SESSION['selected_currency'];

$input_data = $conn->prepare("INSERT INTO oee_input(machines_measured, hourly_running, working_hours, production_days, curr_oee) values(?, ?, ?, ?, ?)");
$input_data->bind_param("sssss", $machines, $runningCost, $workingHours, $workingDays, $currentOEE);
$execval = $input_data->execute();
$input_data->close();

$conn->close();

session_destroy();

?>

<?php

require 'C:/xampp/composer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'C:/xampp/composer/vendor/phpmailer/phpmailer/src/Exception.php';
require 'C:/xampp/composer/vendor/phpmailer/phpmailer/src/SMTP.php';

require_once 'C:\xampp\htdocs\TCPDF-main\tcpdf.php';
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->AddPage();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        echo "Please fill in the email field.";
    } else {
        // Check if there are rows to fetch
        $recipientEmail = $_POST["email"];
        $subject = "Digital Production OEE ROI Calculator";
        $message = "hi";
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'lalithkishore18@gmail.com'; // Replace with your SMTP username
            $mail->Password = 'dmkp jlci qwyv vsqe'; // Replace with your SMTP password
            $mail->SMTPSecure = 'ssl'; // Use 'ssl' for SSL encryption, 'tls' for TLS encryption
            $mail->Port = 465; // Adjust the port accordingly

            $mail->setFrom('lalithkishore18@gmail.com', 'Maxbyte'); // Replace with your email and name
            $mail->addAddress($recipientEmail);

            $mail->isHTML(true);
            $mail->Subject = $subject;

            // Create and configure PDF generation
            $html = '
            <!DOCTYPE html>
<html>
<head>
<style>
.myDiv {
text-align: right;
}

.title {
margin: 0;
text-align: center;
color: #191982;
}

table {
width: 100%;
border-collapse: collapse;
margin-left: 0 auto;
}

th{
text-align: left;
padding: 8px;
}

.hr {
height: 4px;
color: rgb(160, 155, 155);
}

.table2 {
margin: 0 auto;
width: 100%;
}

.c {
width: 100%;
background-color: gray;
}

.data {
border: 1px solid red;
}

.Benefits {
width: 100%;
background-color: gray;
}

.last {
display: flex;
justify-content: space-between;
width: 100%;
}

.table3 {
width: 100%;
margin: 0 auto;
}

</style>
</head>
<body>
<section>
<div>
<div class="myDiv">
<img id="header-image" src="C:/xampp/htdocs/oee_calculator_1/images/Maxbyte.jpg" height="50" width="110" alt="Maxbyte">
<h1 class="title">Overall Equipment Effeciency</h1>
</div>
</div>


<div>
<hr class="hr">
</div>

<table class="table2">
<tr>
<td style="width:50%"><div class="square square-lg " style="background-color: rgb(19, 174, 19);">
<strong>ROI</strong>
</div>
</td>
<td style="width:15%; color: #191982;"><strong>' . number_format($ROIoutput,2) . ' %</strong></td>
</tr>
</table>
<br>

<div>
<table class="c">
<tr>
<th>Current State</th>
</tr>
</table>
<table class="data">
<tr>
<td>Number of Machines to be Monitored</td>
<td>' . htmlspecialchars($machines) . '</td>
</tr>
<tr>
<td>Hourly running cost of one Machine</td>
<td>' .  htmlspecialchars($runningCost) . '<span style="white-space: pre;"> </span>' . htmlspecialchars($selectedCurrency) .'</td>
</tr>
<tr>
<td>Working Hours per Day</td>
<td>' . htmlspecialchars($workingHours) . ' Hrs</td>
</tr>
<tr>
<td>Production days per week</td>
<td>' . htmlspecialchars($workingDays) . ' days</td>
</tr>
<tr>
<td>Current estimated OEE</td>
<td>' . htmlspecialchars($currentOEE) . ' %</td>
</tr>
</div>
<br>
<div>
<table class="c">
<tr>
<th>Challenges</th>
</tr>
</table>
<table class="data">
<tr>
<td>
    The Current Challenges are time-consuming, potentially inaccurate manual data collection, Inability to monitor, visualize and react in real time to production issues.
</td>
</tr>
</table>
</div>
<div>
<table class="Benefits">
<tr>
<th>Benefits of OEE</th>
</tr>
</table>
<div class="last">
<table class="table3">
<tr>
  <td style="width:50%">Annual Increase in Productivity</td>
  <td>' .  htmlspecialchars($annualincrease) . '<span style="white-space: pre;"> </span>' . htmlspecialchars($selectedCurrency) . '</td>
</tr>
<tr>
  <td style="width:50%">Daily Increase in Productivity</td>
  <td>' .  htmlspecialchars($dailyincrease) . '<span style="white-space: pre;"> </span>' . htmlspecialchars($selectedCurrency) . '</td>
</tr>
<tr>
  <td style="width:50%">Yearly Increase in Machine Hours</td>
  <td>' .  htmlspecialchars($yearlyincrease) . '<span style="white-space: pre;"> </span>' . htmlspecialchars($selectedCurrency) . '</td>
</tr>
</table>
</div>
</div>
<br>
<div>
<p style="font-size: small;">This assessment method is based on Maxbyte industry 4.0 implementation experience with various enterprises.
<a href="http://www.maxbyte.co">www.maxbyte.co</a></p>
</div>
<hr class="hr">
</section>
</body>
</html>
            '; // Your HTML content here
            $pdf->writeHTML($html, true, false, true, false, '');

            $pdfFilePath = 'C:\xampp\htdocs\oee_calculator_2\php\pdf\download.pdf';
            $pdf->Output($pdfFilePath, 'F');

            // Attach the generated PDF
            $mail->Body = 'Hi User<br>Thank you for using our Digital Production OEE ROI Calculator. Just for your record, please find the Return on Investment benefits for your requirements in the attachment.';
            $mail->addAttachment($pdfFilePath, 'download.pdf');

            $mail->send();
            // echo 'Email sent successfully!';
        } catch (Exception $e) {
            echo 'Email sending failed: ', $mail->ErrorInfo;
        }
    }
}
?>
