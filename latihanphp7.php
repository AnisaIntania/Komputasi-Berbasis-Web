<html>
    <body>
        <?php
        //while
        $i=1;
        while($i<=5){
            echo "The number is ".$i."<br>";
            $i++;
        }

        //do while
        $a=0;
        do{
            $a++;
            echo "Angka ke- ".$a."<br>";
        } while($a<5);

        //for
        for($b=1;$b<=5;$b++){
            echo "Hello World number ".$b."<br>";
        }

        //foreach
        $arr = array("Satu", "Dua", "Tiga");
        foreach($arr as $value){
            echo "Bilangan ke ".$value."<br>";
        }
        ?>
    </body>
</html>