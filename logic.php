<?php

$error_message = ""; //error message that displays on the page if input invalid
$new_password = "";  // initialize new password variable

/* Validate the input number.  If invalid set error_message.  If not set yet, set to default of 4. */

if(isset($_POST[number_of_words])) {
  $number_of_words = $_POST[number_of_words];
  if (! validate_numWords($number_of_words)) {
    $error_message = "Please enter a number between 1 and 9!";
  };
}
else {
    $number_of_words = '4';
}

// Keep the most recent symbol in the field.  Ran out of time for validation on this
if (isset($_POST[symbol])) {
    $symbol = $_POST[symbol];
}
else {
    $symbol = '@';
}

$words = file_get_contents('./library/WordFile2.txt');

if (isset($words)) {
    $words_array = explode(PHP_EOL,$words);

    $rand_indices = array_rand($words_array,$_POST[number_of_words]);
    $num_words = count($rand_indices);

    if ($num_words == 1) { // just output the word using the index.  rand_indices is a string if only 1 value returned from array_rand
      $new_password = $new_password . $words_array[intval($rand_indices)];
    }
    elseif ($num_words > 1) {
      for ($j = 0; $j < $num_words-1; $j++) {
        $new_password = $new_password . $words_array[$rand_indices[$j]] . "-";
      }
      $new_password = $new_password . $words_array[$rand_indices[$num_words-1]]; // don't want a dash on the end
    }
    else {
      $new_password = ""; // number of words is less than 1 so no password generated
    }

    if ($_POST[add_number]) { // add a number on the end
      $new_password = $new_password . rand(0, 9);
    }

    if ($_POST[add_symbol]) { // add a symbol on the end
      $new_password = $new_password . $_POST[symbol];
    }
  }

  function validate_numWords($numwords) {
    $regexp = "/[1-9]/";
    if (is_numeric($numwords) && strlen($numwords) == 1 && preg_match($regexp,$numwords)) {
      return true;
    }
    else {
      return false;
    }
  }

?>
