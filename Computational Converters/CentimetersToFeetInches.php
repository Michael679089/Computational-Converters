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

    //Convert Centimeters To Inches
    function convertCentimetersToInches($centimeters){
        $inches = $centimeters/2.54;
        return $inches;
    }
    function convertCentimetersToFeet($centimeters){
        $feet = ($centimeters/2.54)/12;
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
            <h1 class="wrapper p-5">Centimeters To Feet & Inches</h1>
        </div>
    </div>

    <!-- Miles To Kilometers Division -->
    <div class="card border-primary">
        <div class="card-header border-primary bg-primary"> Convert Centimeters </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="card-body">

            <!-- The Form for Miles To Kilometers Input -->
            <div class="row">
                <div class="col-xl-6 col-xs-8">
                    <p>Input Centimeters:</p> <input name="input" type="number" class="form-control border-primary" placeholder="Input Centimeters Distance">
                    <select name="out_measurement" class="my-2 border-primary">
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
                                } else if ($outputMeasurement == "inches") {
                                    print "$input centimeters = ";
                                    print convertCentimetersToInches($input);
                                    print " inches";
                                } else if ($outputMeasurement == "feet") {
                                    print "$input centimeters = ";
                                    print convertCentimetersToFeet($input);
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