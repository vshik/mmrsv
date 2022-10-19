<?php
session_start();
session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/layout.css" />
</head>

<body>

 <div id="top">
    <table width="933" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td><img src="../manameya.jpg" width="933" height="114" border="0" /></td>
     </tr>
    </table>
 </div>

 <div id="bottom">
    <div class="container">
                        <div class="span10 offset1">
                                <div class="row">
                                        <h3>Administration Login Page</h3>
                                </div>

				  <form name="form1" method="post" action="checklogin.php">
 				   <td>

                                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                                    <tr>
                                    <td colspan="3"><strong>Enter Login Details below:</strong></td>
                                    </tr>
                                    <tr>
                                    <td width="78">Username</td>
                                    <td width="6">:</td>
                                    <td width="294"><input name="myusername" type="text" id="myusername"></td>
                                    </tr>
                                    <tr>
				    <td>Password</td>
				    <td>:</td>
				    <td><input type="password" name="mypassword" value="" size="15" maxlength="20"></td>
				    </tr>
				    <tr>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td><input type="submit" name="Submit" value="Login">
                                    <input type="button" onClick="location.href='../'" value='Back to Homepage'>
				    </tr>
				    </table>

				   </td>
				  </form>
                        </div>
    </div> <!-- /"container" -->
 </div> <!-- /"bottom" -->

</body>
</html>
