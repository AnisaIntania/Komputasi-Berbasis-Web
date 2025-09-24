<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP 4</title>
</head>
<body>
    <?php
    $d = date("D"); //fungsi php date tau sekarang hari apa

    //format hari harus 3 huruf
    if ($d=="Fri")
        echo "Have a nice weekend!"; //klo buka di hari jumat outputnya ini 
    elseif ($d=="Sun")
        echo "Have a nice Sunday!"; //klo buka di hari minggu outputnya ini 
    elseif ($d=="Wed")
        echo "Have a nice Study!"; //output yg ini karna skrng hari rabu
    else 
        echo "Have a nice day!"; 
    ?> 
</body>
</html>