<?php

  $user[0][0][0] = 0;
  $user[0][3][0] = 3;
  $user[0][2][0] = 1;
  $user[5][0][0] = 7;


  //Encode the array into a JSON string.
  $encodedString  = json_encode($user);


 //Save the JSON string to a text file.
 file_put_contents('user.txt', $encodedString);


  //Retrieve the data from our text file.
  $fileContents = file_get_contents('user.txt');

  //Convert the JSON string back into an array.
  $decoded = json_decode($fileContents, true);

  //The end result.
  var_dump($decoded);

?>


<?php
