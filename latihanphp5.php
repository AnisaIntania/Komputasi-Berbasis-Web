<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP 5</title>
</head>
<body>
    <?php
    $d = date("D");

    switch($d){
        case "Fri":
            echo "Have a nice weekend!";
            break;
        case "Sun":
            echo "Have a nice Sunday!"; 
            break;
        case "Wed":
            echo "Have a nice Study!";
            break; 
        default:
            echo "Have a nice day!";
    }
    echo "<br>";

    $x=2;
    switch($x){
        case 1:
            echo "Number 1";
            break;
        case 2:
            echo  "Number 2";
            break;
        case 3:
            echo "Number 3";
            break;
        default:
            echo "No number between 1 and 3";
    }
    ?>
</body>
</html>