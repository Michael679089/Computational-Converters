<!DOCTYPE html>
<html lang="en">

<head>
    <title> Test </title>
    <!-- Bootstrap_5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<!-- PHP Functions -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $input = $_POST['input'];
    $outputMeasurement = $_POST["out_measurement"];

    // Convert Kilometers to Miles and Miles to Kilometers
    function convertKilometersToMiles($kilometers)
    {
        // 1 Kilometer = 100,000 Centimeters
        $miles = ((($kilometers * 100000) / 2.54) / 12) / 5280;
        return $miles;
    }
    function convertMilesToKilometers($miles)
    {
        $kilometers = ((($miles * 5280) / 12) / 2.54) / 100000;
        return $kilometers;
    }
    // Convert Centimeters to Miles and Miles to Centimeters 
    function convertCentimetersToMiles($centimeters)
    {
        // 1 Centimeter = 0.00000621 mile
        $miles = (($centimeters / 2.54) / 12) / 5280;
        return $miles;
    }
    function convertMilesToCentimeters($miles)
    {
        $centimeters =  (($miles * 5280) * 12) * 2.54;
        return $centimeters;
    }
    // Convert Inches to Miles and Miles to Inches
    function convertInchesToMiles($inches)
    {
        // 1 Inch = 2.54 centimeters, 1 foot = 12 inches
        $miles = ($inches / 12) / 5280;
        return $miles;
    }
    function convertMilesToInches($miles)
    {
        $inches = ($miles * 5280) * 12;
        return $inches;
    }
    // Convert Feet to Miles and Miles to Feet
    function convertFeetToMiles($feet)
    {
        // 1 Mile = 5280 feet
        $miles =  ($feet / 5280);
        return $miles;
    }
    function convertMilesToFeet($miles)
    {
        $feet = $miles * 5280;
        return $feet;
    }
}
?>

<body>
    <!-- NAVBAR -->
    <div class="bg-gradient-grey">
        <div class="container-fluid text-center py-5" id="myContainerFluid">
            <a href="index.php">
                <button type="button" class="btn" id="btn-home">
                    <img class="logo-img" src="images/back-arrow.png" alt="back-arrow">
                    <p class="lead" id="btn-text">Home</p>
                </button>
            </a>
            <h1 class="wrapper p-5">Miles To 
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    if (empty($input)) {
                    } else if ($outputMeasurement == "kilometers") {
                        print " Kilometers";
                    } else if ($outputMeasurement == "centimeters") {
                        print " Centimeters";
                    } else if ($outputMeasurement == "inches") {
                        print " Inches";
                    } else if ($outputMeasurement == "feet") {
                        print " Feet";
                    };
                };
            ?>
            </h1>
        </div>
    </div>

    <!-- Miles To Kilometers Division -->
    <div class="card border-primary">
        <div class="card-header border-primary bg-primary"> Convert </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="card-body">

            <!-- The Form for Miles To Kilometers Input -->
            <div class="row">
                <div class="col-xl-6 col-xs-8">
                    <p>Input Miles:</p> <input name="input" type="number" class="form-control border-primary" placeholder="Input amount of Miles">
                    <select name="out_measurement" class="my-2 border-primary">
                        <option value="kilometers">kilometers</option>
                        <option value="centimeters">centimeters</option>
                        <option value="inches">inches</option>
                        <option value="feet">feet</option>
                    </select>
                </div>
                <div class="col-xl-6 col-xs-8">
                    <p>Output</p>
                    <div class="card border-primary">
                        <div class="card-header border-primary">Status</div>
                        <div class="card-body">
                            <!-- This will print out the output -->
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($input)) {
                                    print "input is empty";
                                } else if ($outputMeasurement == "kilometers") {
                                    print "$input miles = ";
                                    print convertMilesToKilometers($input);
                                    print " Kilometers";
                                } else if ($outputMeasurement == "centimeters") {
                                    print "$input miles = ";
                                    print convertMilesToCentimeters($input);
                                    print " centimeters";
                                } else if ($outputMeasurement == "inches") {
                                    print "$input miles = ";
                                    print convertMilesToInches($input);
                                    print " inches";
                                } else if ($outputMeasurement == "feet") {
                                    print "$input miles = ";
                                    print convertMilesToFeet($input);
                                    print " feet";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="my-5 p-2 px-5 btn-round">
        </div>
        </form>

    </div>
    <!-- Ending of Form -->

    
</body>

<script>
    $(document).ready(function() {

        // Hover the btn-home button to do extend to the right.
        $("#btn-home").mouseenter(function() {
            $("#btn-text").slideUp();
            window.setTimeout(function() {
                // do whatever you want to do
                $("#btn-text").animate({opacity: "1"}, {queue: false});
                $("#btn-text").animate({paddingLeft: "20px"});
                $("#btn-text").fadeIn();
                $("#btn-text").css("display", "inline-block");
                $("#btn-text").css("visibility", "visible");
            }, 1000);
        });
        $("#btn-home").mouseleave(function() {
            $("#btn-text").animate({
                opacity: "0"
            }, {
                duration: 200,
                queue: false
            });
            $("#btn-text").animate({
                paddingLeft: "0px"
            }, {
                duration: 200,
                queue: false
            });
            $("#btn-text").slideDown();
        });
    });
</script>
</html>