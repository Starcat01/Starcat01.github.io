<?php
  // Array to store numbers
  $numbers = array(10, 5, 20, 8, 15, 1, 25, 12);

  // Initialize largest number to the first element
  $largestNumber = $numbers[0];

  // Loop through the array to find the largest number
  for ($i = 1; $i < count($numbers); $i++) {
    if ($numbers[$i] > $largestNumber) {
      $largestNumber = $numbers[$i];
    }
  }

  // Print the largest number
  echo "The largest number is: " . $largestNumber . " <br>  in array : " . implode(", ", $numbers);
?>

