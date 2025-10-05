<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- bedanya sama POST kalo GET  inputannya bakal tampil jg di URL -->
    Welcome <?php echo $_GET["name"];?>.<br />
    Selamat datang <?php echo $_REQUEST["name"];?>.<br />
    You are <?php echo $_GET["age"];?> years old. <br />
    Anda <?php echo $_REQUEST["age"];?> tahun.
</body>
</html>