<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($ShlokaNo, $Shloka, $ShlokaMeaning, $Reference, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 </head>
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
 <p><strong>Chapter Name:</strong> <?php echo $ChapterS; ?></p>
 <p><strong>Section Name:</strong> <?php echo $SectionS; ?></p>
 <strong>Shloka No.: *</strong> <input type="text" name="ShlokaNo" value="<?php echo $ShlokaNo; ?>"/><br/>
 <strong>Shloka: *</strong> <input type="text" name="Shloka" value="<?php echo $Shloka; ?>"/><br/>
 <strong>Shloka Meaning: *</strong> <input type="text" name="ShlokaMeaning" value="<?php echo $ShlokaMeaning; ?>"/><br/>
 <strong>Reference: *</strong> <input type="text" name="Reference" value="<?php echo $Reference; ?>"/><br/>
 <p>* Required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html> 
 <?php
 }

 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['ShlokaNo']))
 {
 // get form data, making sure it is valid
 $ShlokaNo = $_POST['ShlokaNo'];
 $Shloka = mysql_real_escape_string(htmlspecialchars($_POST['Shloka']));
 $ShlokaMeaning = mysql_real_escape_string(htmlspecialchars($_POST['ShlokaMeaning']));
 $Reference = mysql_real_escape_string(htmlspecialchars($_POST['Reference']));
 // check that firstname/lastname fields are both filled in
 if ($ShlokaNo == '' || $Shloka == '' || $ShlokaMeaning = ''  || $Reference = '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($ShlokaNo, $Shloka, $ShlokaMeaning, $Reference, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE mmrsv SET ShlokaNo='$ShlokaNo', Shloka='$Shloka', ShlokaMeaning='$ShlokaMeaning', Reference='$Reference' WHERE ShlokaNo='$ShlokaNo'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: view.php"); 
 }
 }
 else
 {
 // if the 'ShlokaNo' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['ShlokaNo']) && is_numeric($_GET['ShlokaNo']) && $_GET['ShlokaNo'] > 0)
 {
 // query db
 $id = $_GET['ShlokaNo'];
 $result = mysql_query("SELECT * FROM mmrsv WHERE id=$ShlokaNo")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'ShlokaNo' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $ShlokaNo = $row['ShlokaNo'];
 $Shloka = $row['Shloka'];
 $ShlokaMeaning = $row['ShlokaMeaning'];
 $Reference = $row['Reference'];
 
 // show form
 renderForm($ShlokaNo, $Shloka, $ShlokaMeaning, $Reference, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'ShlokaNo' in the URL isn't valid, or if there is no 'ShlokaNo' value, display an error
 {
 echo 'Error!';
 }
 }
?>
