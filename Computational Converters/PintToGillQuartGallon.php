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

    // Function to convert Pint to Gill in the form
    function convertPintToGill($pint) {
        $gill = $pint * 4;
        return $gill;
    }
    // Function to convert Pint to Quart in the Form
    function convertPintToQuart($pint) {
        $quart = $pint * 2;
        return $quart;
    }
    //Function to convert Pint to Gallon in the form
    function convertPintToGallon($pint){
        $gallon = $pint * 0.5;
        return $gallon;
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
            <h1 class="wrapper p-5">Pint to Gills, Quarts, & Gallons</h1>
        </div>
    </div>

    <!-- Pint to Gills,Quarts, and Gallons Division -->
    <div class="card border-primary">
        <div class="card-header border-primary bg-primary"> Convert </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="card-body">

            <!-- The Form to convert the amount of Pint as Input to Gills, Quarts, and Gallons as Output -->
            <div class="row">
                <div class="col-xl-6 col-xs-8">
                    <p>Input Number:</p> <input name="input" type="number" class="form-control border-primary" placeholder="Input number">
                    <select name="out_measurement" class="my-2 border-primary">
                        <option value="gill">gills</option>
                        <option value="quart">quarts</option>
                        <option value="gallon">gallons</option>
                    </select>
                </div>
                <div class="col-xl-6 col-xs-8">
                    <p>Output</p>
                    <div class="card border-primary">
                        <div class="card-header border-primary" id="status">Status</div>
                        <div class="card-body">
                            <!-- This will print out the output -->
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (empty($input)) {
                                    print "input is empty";
                                } else if ($outputMeasurement == "gill") {
                                    print "$input pint = ";
                                    print convertPintToGill($input);
                                    print " gills";
                                } else if ($outputMeasurement == "quart"){
                                    print "$input pint = ";
                                    print convertPintToQuart($input);
                                    print " quarts";
                                } else if ($outputMeasurement == "gallon"){
                                    print "$input pint = ";
                                    print convertPintToGallon($input);
                                    print " gallons";                                    
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