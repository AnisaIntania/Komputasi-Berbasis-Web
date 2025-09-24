<?php
$names[0] = "Ani";
$names[1] = "Budi";
echo "Ayah " .$names[0]. " bernama Pak" .$names[1];
echo "<br>";

$usia['Ani'] =10;
$usia['Budi'] =40;
echo "Usia " .$names[0]. " adalah " .$usia['Ani']. " tahun";
echo "<br>";
echo "Usia Pak " .$names[1]. " adalah " .$usia['Budi']. " tahun";

$families = array
    ("Griffin"=>array
        ("Peter", //[0]
        "Lois", //[1]
        "Megan"), //[2]
    "Quagmire"=>array
        ("Glenn"),
    "Brown"=>array
        ("Cleveland",
        "Loretta",
        "Junior")
    );

echo "<br>";
echo "Keluarga " .$families["Griffin"][2];
?>