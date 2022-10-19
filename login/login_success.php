<?php
session_start();
if(!session_is_registered(myusername)){
header("location:main_login.php");
}
?>

<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>MMRSV - Admin Control</title>
  <link href="css/layout.css" rel="stylesheet">
</head>

 <body>
 <div id="top">
  <table width="933" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td><img src="../manameya.jpg" width="933" height="114" border="0" /></td>
   </tr>

  <table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
  <tr class="tablerow">
  <td align="center"> <h4> <b>Welcome to मानमेय Admin Control. Click here to <a href="logout.php" tite="Logout">Logout. </b> </h4> </td>
  </table>
 </div>

 <div id="bottom">
  <?php
   include('view.php');
  ?>
 </div>

 </body>

</html>
