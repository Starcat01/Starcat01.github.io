<?php
for ($i = 1; $i <= 10; $i++) {
  if ($i % 2 == 0) {
    echo $i . "-";
  } else {
    echo $i . ".";
  }
}
// Remove the last character (either "-" or ".")
$output = substr(trim(ob_get_clean()), 0, -1);
echo $output;
?>