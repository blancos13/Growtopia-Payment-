<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
    if (isset($_POST["growid"])) {
      require "process.php";
      echo $result == ""
        ? "<div class='notify'>Deposit Request Succeful</div>"
        : "<div class='notify'>$result</div>" ;
    }
    ?>

    <form id="orderform" method="post" target="_self">
      <label for="growid">growid:</label>
      <input type="text" name="growid" required value="memekgt"/>

      <label for="world">world:"</label>
      <input type="text" name="world" value="memekgt"/>

      <label for="qty">Deposit Amount</label>
      <input type="number" name="qty" required value="1"/>

      <input type="submit" value="Place Deposit Request"/>
    </form>
  </body>
</html>
