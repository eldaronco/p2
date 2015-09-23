<?php
error_reporting(E_ALL);
// ini_set('display_errors',1);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>xkcd Style Password Generator</title>
    <link rel='stylesheet' href='./css/bootstrap.min.css'>
    <link rel='stylesheet' href='./css/style.css'>
    <?php require 'logic.php'; ?>
  </head>
  <body>
    <div class = "container">
      <h1>What is an xkcd password generator?</h1>
      <h4 class="text-info">This is a password generator inspired by the xkcd webcomic.  The password will consist of real words connected by a dash - easy to remember and hard to crack.<br>
      <br>Select the number of words and whether or not you would like a special symbol or a number at the end of your new password.  Enjoy!</h4>
      <hr>
      <form method='POST' action='index.php'>
        <table class = "table">
          <tr><td><label for="number_of_words">How many words in the password? </label></td>
              <td><input id="number_of_words" type="text" value="<?php echo $number_of_words; ?>" name="number_of_words" maxlength="1" size="1">  (Max 9)</td>
          </tr>
          <tr><td colspan = "2"><input id="add_number" type="checkbox" name="add_number"><label for="add_number">Include a number?</label></td></tr>
          <tr><td><input id="add_symbol" type="checkbox" name="add_symbol"><label for="add_symbol">Include a symbol?</label></td>
              <td><label for="symbol">Symbol to use: </label><input id="symbol" type="text" value="<?php echo $symbol ?>" name="symbol" maxlength="1" size = "1"></td>
          </tr>
          <tr><td colspan = "2"><input type='submit' value='Get Password'></td></tr>
        </table>
      </form>
      <div class = "result_box">
        <p>
          Password is <?php echo $new_password ?>
        </p>
      </div>

      <div class = "error_box">
        <p>
          <?php if (strlen($error_message) != 0) echo "***" . $error_message . "***"; ?>
        </p>
      </div>
    </div>
  </body>
</html>
