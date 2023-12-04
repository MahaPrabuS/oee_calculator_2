<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OEE Calculator</title>
    <link rel="shortcut icon" href="../images/Maxbyte_favicon.png" type="image/x-icon">
    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
     
    <nav class="bg-white navbar navbar-expand-lg position-fixed top-0 w-100 z-3">
        <div class="container">
            <div class="w-50">
                <a class="d-block h-100 m-0 navbar-brand p-0 w-fit" href="#">
                    <img class="w-50" src="../images/maxbyte.jpg" alt="">
                </a>
            </div>
            <div class="w-100 d-flex justify-content-end">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav gap-3 ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold active" aria-current="page" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#">Why byteFACTORY ?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#">Marketplace</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#">byteFACTORY Trial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#">Pricing</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="pt-5 mt-lg-4">
        <div class="h-90vh background-img bg-overlay d-flex flex-column justify-content-center" style="background-image: url('../images/backg.jpg');">
            <div class="container text-center z-1">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-10">
                        <h1 class="fs-1 lh-base fw-bold text-white mb-3">Digital Production OEE ROI Calculator</h2>
                        <h5 class="fw-bold lh-base text-white mb-0">Evaluate your current digitization project and understand the potential impact to your organization!</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light p-5">
        <div class="container my-lg-4">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="mb-5 d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-0">OEE Calculator</h3>
                        </div>
                        <div class="w-200px">
                            <select id="to_value" name="to_value" class="w-100 form-select">
                                <option value="select" selected>-currency-</option>
                                <option value="USD">USD</option>
                                <option value="INR">INR</option>
                                <option value="AED">AED</option>
                            </select>
                        </div>
                    </div>
    
                    <!-- <form class="row g-4" method="post" onsubmit="return addNumbers()"> -->
                    <form class="row g-4" method="post" id="OEE_Form">
                        <div class="col-lg-6 col-md-6">
                            <label class="mb-2 fs-6 fw-semibold">Number of Machines to be Monitored</label>
                            <div class="d-flex justify-content-center flex-column">
                                <input type="text" name="machines_measured" id="machines_measured" class="border rounded p-2 px-3 bg-white w-100" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="mb-2 fs-6 fw-semibold">Hourly running cost of one Machine</label>
                            <div class="position-relative d-flex justify-content-center flex-column">
                                <input type="text" name="running_cost" id="running_cost" class="border rounded p-2 px-3 bg-white w-100" data-currentcurrency="USD" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="mb-1 fs-6 fw-semibold">Working Hours per Day :<output class="ms-1 fw-bold" id="workingHour_output">1</output></label>
                            <div class="d-flex justify-content-center flex-column">
                                <input type="range" name="working_hours" id="working_hours" class="slider border rounded bg-white w-100 my-2" min="1" max="24" step="1" value="1" oninput="workingHour_output.value = working_hours.value" required>
                                <div class="d-flex justify-content-between mt-1">
                                    <label class="belowlable w-100 text-start">1</label>
                                    <!-- <label class="belowlable w-100 text-center">12</label> -->
                                    <label class="belowlable w-100 text-end">24</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="mb-1 fs-6 fw-semibold">Production days per week :<output class="ms-1 fw-bold" id="workingDays_output">1</output></label>
                            <div class="d-flex justify-content-center flex-column">
                                <input type="range" name="working_days" id="working_days" class="slider border rounded bg-white w-100 my-2" min="1" max="7" step="1" value="1" oninput="workingDays_output.value = working_days.value" required>
                                <div class="d-flex justify-content-between mt-1">
                                    <label class="belowlable w-100 text-start">1</label>
                                    <label class="belowlable w-100 text-center">4</label>
                                    <label class="belowlable w-100 text-end">7</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="mb-1 fs-6 fw-semibold">Current estimated OEE :<output class="ms-1 fw-bold" id="current_OEE_output">1%</output></label>
                            <div class="d-flex justify-content-start flex-column">
                                <input type="range" name="current_OEE" id="current_OEE" class="slider border rounded bg-white w-100 my-2" min="1" max="100" step="1" value="1" oninput="current_OEE_output.value = current_OEE.value + '%' " required>
                                <div class="d-flex justify-content-between mt-1">
                                    <label class="belowlable w-100 text-start">1%</label>
                                    <label class="belowlable w-100 text-center pe-2">50%</label>
                                    <label class="belowlable w-100 text-end">100%</label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="selected_currency" id="selected_currency" value="">
                        <div class="col-lg-6 col-md-6">
                            <label class="mb-2 fs-6 fw-semibold">Email</label>
                        <div class="position-relative d-flex justify-content-center flex-column">
                            <input type="email" name="email" id="email" class="border rounded p-2 px-3 bg-white w-100" required>
                        </div>
                        </div>
                        <div class="col-12 text-center pt-3">
                            <button type="button" onclick="addNumbers()" class="scroll-trigger bg-theme px-5 py-2 rounded text-white border-0 text-decoration-none view-result">Calculate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="result-section" id="scroll-target">
        <div class="bg-white p-5">
            <div class="container my-lg-4">
                <div class="mb-4">
                    <h3 class="text-center mb-0">OEE Calculator Result</h3>
                </div>
                <div class="row g-4 gy-5 text-center justify-content-center">
                    <div class="col-12">
                        <div class="selector gap-3 w-100">
                            <div class="selector-item">
                                <input type="radio" name="radioo" value="5" id="radio1" class="selector-item_radio" onchange="updateOEEGrowthValue(this)" checked>
                                <label for="radio1" class="selector-item_label">5%</label>
                            </div>
                            <div class="selector-item">
                                <input type="radio" name="radioo" value="10" id="radio2" class="selector-item_radio" onchange="updateOEEGrowthValue(this)">
                                <label for="radio2" class="selector-item_label">10%</label>
                            </div>
                            <div class="selector-item">
                                <input type="radio" name="radioo" value="20" id="radio3" class="selector-item_radio" onchange="updateOEEGrowthValue(this)">
                                <label for="radio3" class="selector-item_label">20%</label>
                            </div>
                            <div class="selector-item">
                                <input type="radio" name="radioo" value="30" id="radio4" class="selector-item_radio" onchange="updateOEEGrowthValue(this)">
                                <label for="radio4" class="selector-item_label">30%</label>
                            </div>
                            <div class="selector-item">
                                <input type="radio" name="radioo" value="40" id="radio5" class="selector-item_radio" onchange="updateOEEGrowthValue(this)">
                                <label for="radio5" class="selector-item_label">40%</label>
                            </div>
                            <div class="selector-item">
                                <input type="radio" name="radioo" value="50" id="radio6" class="selector-item_radio" onchange="updateOEEGrowthValue(this)">
                                <label for="radio6" class="selector-item_label">50%</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <form class="row g-4 gy-5 justify-content-center" method="post" id="OEE_Form_out">
                            <div class="col-lg-3 col-md-6">
                                <h2 class="mb-3 annualincrease"></h2>
                                <input type="hidden" name="output_annual_increase" id="annualincrease" value="">
                                <h5 class="mb-0">Annual Increase in Productivity</h5>
                            </div>
            
                                <input type="hidden" name="output_cost_implementation" id="costimplementation" value="">

                                <input type="hidden" name="output_total_benefit" id="totalbenefit" value="">
                                
                                <input type="hidden" name="output_email" id="email" value="">

                            <div class="col-lg-3 col-md-6">
                                <h2 class="mb-3 dailyincrease"></h2>
                                <input type="hidden" name="output_daily_increase" id="dailyincrease" value="">
                                <h5 class="mb-0">Daily Increase in Productivity</h5>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h2 class="mb-3 ROI"></h2>
                                <input type="hidden" name="output_roi" id="ROI" value="">
                                <h5 class="mb-0">Return on Investment year 1</h5>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h2 class="mb-3 yearlyincrease"></h2>
                                <input type="hidden" name="output_yearly_increase" id="yearlyincrease" value="">
                                <h5 class="mb-0">Yearly Increase in Machine Hours</h5>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3 justify-content-center">
                            <div class="w-250px">
                                <a href="#" class="text-decoration-none">
                                    <div class="w-100 rounded-3 bg-theme text-white fw-semibold px-5 py-3">Get a Demo</div>
                                </a>
                            </div>
                            <div class="w-250px">
                            <div id="emailResponse"></div>
                                <button type="button" onclick="saveResult(); registerUser()" class="border-0 text-decoration-none w-100 rounded-3 bg-theme text-white fw-semibold px-5 py-3">Get Email</button>
                            </div>
                            <!-- <div class="w-250px">
                                <a href="#" class="text-decoration-none">
                                    <div class="w-100 rounded-3 bg-theme text-white fw-semibold px-5 py-3">Download PDF</div>
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>

    // function oeeOutput() {
    //     var form1 = $("#totalbenefit").text();
    //     var form1 = $("#totalbenefit").text();
    //     var form1 = $("#totalbenefit").text();
    //     var form1 = $("#totalbenefit").text();
    //     var form1 = $("#totalbenefit").text();

    //     $.ajax({
    //         type: "POST",
    //         url: "register.php",
    //         data: form1,
    //         success: function (data) {
    //             $("#response").html(data);
    //             addNumbers();
    //         }
    //     });
    // }

    function registerUser() {
        var formData = $("#OEE_Form").serialize();

        $.ajax({
            type: "POST",
            url: "register.php",
            data: formData,
            success: function (data) {
                $("#response").html(data);
                addNumbers();
            }
        });
    }

    function saveResult() {

        var formData = $("#OEE_Form_out").serialize();
        

        $.ajax({
            type: "POST",
            url: "save_results.php",
            data: formData,
            success: function (data) {
                $("#response").html(data);
                mail();
            }
        });
    }

    function mail() {
    // Fetch the email value from the input field
    var emailvalue = $("#email").val();
    
    // Make an AJAX call to your PHP script with the email data
    $.ajax({
        type: "POST",
        url: "mail.php", // Change this to the path of your PHP email script
        data: { email: emailvalue }, // Pass the email value to the server
        success: function (data) {
            $("#emailResponse").html(data);
            console.log("Email sent successfully");

            alert("Email has been sent successfully");
        },
        error: function (error) {
            console.error("Error sending email: ", error);

            alert("Error sending email. Please try again.");
        }
    });
}
        
        document.addEventListener('DOMContentLoaded', function() {
            var viewResult = document.querySelector('.view-result');
            
            viewResult.addEventListener('click', function() {
            var outputDiv = document.querySelector('.result-section');
            
                outputDiv.classList.add('d-block');
            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            convertCurrency();
        });

        const apiKey = "Xi0wAt0uz97w1Am9aSLS6GUkfSKZG7tl";

//         function convertCurrency() {
//             const runningCostInput = document.getElementById("running_cost");
    
//     // Check if data-currentcurrency attribute is undefined
//     if (typeof runningCostInput.dataset.currentcurrency === 'undefined') {
//         // Set a default value if not defined
//         runningCostInput.setAttribute("data-currentcurrency", "USD");
//     }

//     const fromCurrency = runningCostInput.dataset.currentcurrency;
//     const toCurrency = document.getElementById("to_value").value;
//     const amount = runningCostInput.value;

//     const url = `https://api.apilayer.com/currency_data/convert?apikey=${apiKey}&from=${fromCurrency}&to=${toCurrency}&amount=${amount}`;

//     fetch(url)
//         .then(response => response.json())
//         .then(data => {
//             const convertedAmount = data.result;
//             document.getElementById("running_cost").value = convertedAmount;
//             document.getElementById("running_cost").setAttribute("data-currentcurrency", toCurrency);
//         })
//         .catch(error => console.error(error));

// let currencySymbol = '';
function convertCurrency() {
    const runningCostInput = document.getElementById("running_cost");
    const fromCurrency = runningCostInput.dataset.currentcurrency;
    const toCurrency = document.getElementById("to_value").value;
    const amount = runningCostInput.value;

    const url = `https://api.apilayer.com/currency_data/convert?apikey=${apiKey}&from=${fromCurrency}&to=${toCurrency}&amount=${amount}`;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                const convertedAmount = data.result;
                runningCostInput.value = convertedAmount;
                const convertedRunningCost = parseFloat(convertedAmount);
                runningCostInput.value = convertedRunningCost;
                runningCostInput.setAttribute("data-currentcurrency", toCurrency);
                document.getElementById("selected_currency").value = toCurrency;
                // document.getElementById('currency_symbol').value = currencySymbol;
                // currencySymbol = getCurrencySymbol(toCurrency);
                addNumbers(); // Recalculate after conversion
            } else {
                console.error("Currency conversion failed.");
            }
        })
        .catch(error => {
            console.error("Error during currency conversion:", error);
            runningCostInput.value = ''; // Set a default value if there's an error
        });
}
// Attach the input event listener to the to_value element
        document.getElementById("to_value").addEventListener("input", convertCurrency);
        function updateOEEGrowthValue(radio) {
            OEEGrowth_value = parseFloat(radio.value);
            // You can perform additional actions if needed

            // Call your main calculation function
            addNumbers();
        }

        function addNumbers() {
            const machines = parseFloat(document.getElementById('machines_measured').value);
            const runningCost = parseFloat(document.getElementById('running_cost').value);
            const workingHours = parseFloat(document.getElementById('working_hours').value);
            const workingDays = parseFloat(document.getElementById('working_days').value);
            const currentOEE = parseFloat(document.getElementById('current_OEE').value);

            const selectedCurrency = document.getElementById('to_value').value;
            // currencySymbol = getCurrencySymbol(selectedCurrency);
            // document.getElementById('currency_symbol').value = currencySymbol;
    

//             function getCurrencySymbol(selectedCurrency) {
//     // Map currency codes to symbols
    // switch (selectedCurrency) {
    //     case 'USD':
    //         return 'USD';
    //     case 'INR':
    //         return 'INR';
    //     case 'AED':
    //         return 'AED';
    //     default:
    //         console.error('Invalid currency selected.');
    //         return '';
    // }
// }



            // Simplify radio button handling using a loop
            let OEEGrowth_value;
            for (let i = 1; i <= 6; i++) {
                const radio = document.getElementById(`radio${i}`);
                if (radio.checked) {
                    OEEGrowth_value = parseFloat(radio.value);
                    break;
                }
            }

            // Check if OEEGrowth_value is defined
            if (typeof OEEGrowth_value === 'undefined') {
                console.error('Please select an OEE Growth value.');
                return false;
            }

            // Calculate the result
            const annual_increase = (workingHours - (currentOEE / (currentOEE + OEEGrowth_value) * workingHours)) * runningCost * workingDays * 52 * machines;

            let cost_implementation;
            switch (selectedCurrency) {
                case 'USD':
                    cost_implementation = machines * 1000 + machines * 100 * 12 + 2000 + 500 * 12;
                    break;
                case 'INR':
                    cost_implementation = machines * 83387.20 + machines * 8338.72 * 12 + 166774.40 + 41693.60 * 12;
                    break;
                case 'AED':
                    cost_implementation = machines * 3672.60 + machines * 367.26 * 12 + 7345.20 + 1836.30 * 12;
                    break;
                    
                default:
                    console.error('Invalid currency selected.');
                    return false;
            }

            const total_benefit = annual_increase - cost_implementation;
            const ROI = ( total_benefit / cost_implementation ) * 100;
            const daily_increase = (workingHours - (currentOEE / (currentOEE + OEEGrowth_value) * workingHours)) * runningCost * machines;
            const yearly_increase = (workingHours - (currentOEE / (currentOEE + OEEGrowth_value) * workingHours)) * machines * workingDays * 52;

            const annualIncreaseElement = document.querySelector(".annualincrease");
            annualIncreaseElement.innerHTML = `${selectedCurrency} ${annual_increase.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
            document.getElementById('annualincrease').value = annual_increase.toFixed(2);

            // document.querySelector(".costimplementation").innerHTML = cost_implementation.toFixed(2);
            // document.getElementById('costimplementation').value = cost_implementation.toFixed(2);

            // document.querySelector(".totalbenefit").innerHTML = total_benefit.toFixed(2);
            // document.getElementById('totalbenefit').value = total_benefit.toFixed(2);

            const dailyincreaseElement = document.querySelector(".dailyincrease");
            dailyincreaseElement.innerHTML = `${selectedCurrency} ${daily_increase.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
            document.getElementById('dailyincrease').value = daily_increase.toFixed(2);

            const ROIElement = document.querySelector(".ROI");
            const ROIPercentage = ROI.toFixed(2);

            ROIElement.innerHTML = `${ROIPercentage} %`;
            document.getElementById('ROI').value = ROIPercentage;


            const yearlyIncreaseElement = document.querySelector(".yearlyincrease");
            const yearlyIncreaseHours = yearly_increase.toFixed(2);

            yearlyIncreaseElement.innerHTML = `${yearlyIncreaseHours} Hrs`;
            document.getElementById('yearlyincrease').value = yearlyIncreaseHours;

            return false;
        }

        $(document).ready(function(){
            // When the div with class 'scroll-trigger' is clicked
            $(".scroll-trigger").click(function() {
                // Scroll to the element with the ID 'scroll-target' with a smooth animation
                $('html, body').animate({
                    scrollTop: $("#scroll-target").offset().top
                }, 10); // Adjust the duration (in milliseconds) as needed
            });
        });
    </script>

    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>