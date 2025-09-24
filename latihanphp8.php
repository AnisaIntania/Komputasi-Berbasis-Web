<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP 8</title>
</head>
<body>
    <?php
    //fungsi
    function writeMyName(){
        echo "Kai Jim Refnes";
    }

    //dipanggil
    writeMyName();

    echo "<br>";

    function tulisNama($nama){
        echo "Nama saya " .$nama. "<br>";
    }
    tulisNama("Kai Jim Refnes");
    ?>
    
</body>
</html>