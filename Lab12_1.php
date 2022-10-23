<?php
    $m = $_GET["mango"];
    $o = $_GET["orange"];
    $b = $_GET["banana"];

    $result = ($m*30) + ($o*70) + ($b*30);
    echo "<b>ยอดขาย ".$result." บาท</b>";
?>