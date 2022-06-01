
<form method="post" action="">
<input type="text" name="Growid">
<input type="submit" name="button"
>
</form>


<?php
 if(isset($_POST["button"]))
 {
     $sql="insert into order(growid)values('".$_POST["growid"]. "')";
     echo "New Deposit Request";
     $result=mysqli_query($connect,$sql);
     if($result)
     {
         echo  "order has been added";
     }
     else
     {
         echo "something wrong";
     }
  }
 ?>
