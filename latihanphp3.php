<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP 3</title>
</head>
<body>
    <?php
    $d = date("D"); //fungsi php date tau sekarang hari apa
    if ($d=="Fri")
        echo "Have a nice weekend!"; 
    else 
        echo "Have a nice day!"; //output yg ini karna skrng hari rabu
    ?>
</body>
</html>