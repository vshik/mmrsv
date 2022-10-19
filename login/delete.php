<?php
	include('database.php');
        $id = (int)$_GET['id'];

        if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM mmrsv WHERE id = $id";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: login_success.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
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
    <div class="container">
    			<div class="span10 offset1">
    				<div class="row">
		    			<h6>Delete a MMRSV Record</h6>
		    		</div>

	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error">Are you sure you want to delete the record?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Yes</button>
						  <a class="btn" href="login_success.php">No</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
 </div> <!-- /bottom -->

 </body>
</html>
