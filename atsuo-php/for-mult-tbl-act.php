<?php 

for ($row = 1; $row <= 10; $row++) {
    for ($col = 1; $col <= 10; $col++) {
        $product = $row * $col;
        echo sprintf("%03d", $product) . "\t"; 
    }
    echo "<br>";
}
?>
