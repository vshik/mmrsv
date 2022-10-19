<?php

	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( null==$id ) {
		header("Location: login_success.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$ChapterSError = null;
		$SectionSError = null;
		$ShlokaNoError = null;
                $ShlokaError = null;
                $ShlokaMeaningError = null;
                $ReferenceError = null;

		// keep track post values
		$ChapterS = $_POST['ChapterS'];
		$SectionS = $_POST['SectionS'];
		$ShlokaNo = $_POST['ShlokaNo'];
                $Shloka = $_POST['Shloka'];
                $ShlokaMeaning = $_POST['ShlokaMeaning'];
                $Reference = $_POST['Reference'];

		// validate input
		$valid = true;
		if (empty($ChapterS)) {
			$ChapterSError = 'Please enter Chapter Name';
			$valid = false;
		}

		if (empty($SectionS)) {
			$SectionSError = 'Please enter Section Name';
			$valid = false;
		}

		if (empty($ShlokaNo)) {
			$ShlokaNoError = 'Please enter Shloka Number';
			$valid = false;
		}

                if (empty($Shloka)) {
                        $ShlokaError = 'Please enter Shloka';
                        $valid = false;
                }

                if (empty($ShlokaMeaning)) {
                        $ShlokaMeaningError = 'Please enter Shloka Meaning';
                        $valid = false;
                }
		/*
                if (empty($Reference)) {
                        $ReferenceError = 'Please enter Reference';
                        $valid = false;
                }
		*/
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE mmrsv set ChapterS = ?, SectionS = ?, ShlokaNo = ?, Shloka = ?, ShlokaMeaning = ?, Reference = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($ChapterS,$SectionS,$ShlokaNo,$Shloka,$ShlokaMeaning,$Reference,$id));
			Database::disconnect();
			header("Location: login_success.php");
		}
                } else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM mmrsv where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$ChapterS = $data['ChapterS'];
		$SectionS = $data['SectionS'];
		$ShlokaNo = $data['ShlokaNo'];
	        $Shloka = $data['Shloka'];
                $ShlokaMeaning = $data['ShlokaMeaning'];
                $Reference = $data['Reference'];
         	Database::disconnect();
	        }
?>


<!DOCTYPE html>
<html lang="en">
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
    <table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
     <tr class="tablerow">
      <td align="center"> <h4> <b>Welcome to मानमेय Admin Control. Click here to <a href="logout.php" tite="Logout">Logout. </b> </h4> </td>
     </table>
 </div>

 <div id="bottom">
    <div class="container">
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>MMRSV Update Record Page</h3>
		    		</div>

	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					  <div class="control-group <?php echo !empty($ChapterSError)?'error':'';?>">
					    <label class="control-label">Chapter Name</label>
					    <div class="controls">
                                                <input name="ChapterS" type="text"  placeholder="Chapter Name" value="<?php echo !empty($ChapterS)?$ChapterS:'';?>">
					      	<?php if (!empty($ChapterSError)): ?>
					      		<span class="help-inline"><?php echo $ChapterSError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($SectionSError)?'error':'';?>">
					    <label class="control-label">Section Name</label>
					    <div class="controls">
					      	<input name="SectionS" type="text" placeholder="Section Name" value="<?php echo !empty($SectionS)?$SectionS:'';?>">
					      	<?php if (!empty($SectionSError)): ?>
					      		<span class="help-inline"><?php echo $SectionSError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($ShlokaNoError)?'error':'';?>">
					    <label class="control-label">Shloka Number</label>
					    <div class="controls">
					      	<input name="ShlokaNo" type="text"  placeholder="Shloka Number" value="<?php echo !empty($ShlokaNo)?$ShlokaNo:'';?>">
					      	<?php if (!empty($ShlokaNoError)): ?>
					      		<span class="help-inline"><?php echo $ShlokaNoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                                         <div class="control-group <?php echo !empty($ShlokaError)?'error':'';?>">
                                            <label class="control-label">Shloka</label>
                                            <div class="controls">
                                                <textarea name="Shloka" rows="2" cols="50" style="overflow-y:scroll"><?php echo !empty($Shloka)?$Shloka:'';?></textarea>
                                                <?php if (!empty($ShlokaError)): ?>
                                                        <span class="help-inline"><?php echo $ShlokaError;?></span>
                                                <?php endif;?>
                                            </div>
                                          </div>
                                         <div class="control-group <?php echo !empty($ShlokaMeaningError)?'error':'';?>">
                                            <label class="control-label">Shloka Meaning</label>
                                            <div class="controls">
                                                <textarea name="ShlokaMeaning" rows="2" cols="50" style="overflow-y:scroll"><?php echo !empty($ShlokaMeaning)?$ShlokaMeaning:'';?></textarea>
                                                <?php if (!empty($ShlokaMeaningError)): ?>
                                                        <span class="help-inline"><?php echo $ShlokaMeaningError;?></span>
                                                <?php endif;?>
                                            </div>
                                          </div>
                                         <div class="control-group <?php echo !empty($ReferenceError)?'error':'';?>">
                                            <label class="control-label">Reference</label>
                                            <div class="controls">
                                                <textarea name="Reference" rows="2" cols="50" style="overflow-y:scroll"><?php echo !empty($Reference)?$Reference:'';?></textarea>
                                                <?php if (!empty($ReferenceError)): ?>
                                                        <span class="help-inline"><?php echo $ReferenceError;?></span>
                                                <?php endif;?>
                                            </div>
                                          </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn" href="login_success.php">Back</a>
					  </div>
				</form>
			</div>
    </div> <!-- /container -->
  </div> <!-- /bottom -->

  </body>
</html>
