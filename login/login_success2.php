<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="mmrsv"; // Database name

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MMRSV - Admin Control</title>
</head>

<body>
<table width="933" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="../manameya.jpg" width="933" height="114" border="0" />
</td>
</tr>

<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tablerow">
<td align="center">
	<b>Welcome to मानमेय Admin Control. Click here to <a href="logout.php" tite="Logout">Logout. </b>
</td>
</table>

# Init the MySQL Connection
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

# Prepare the SELECT Query
  $selectSQL = 'SELECT * FROM `mmrsv`';
  Execute the SELECT Query
  if( !( $selectRes = mysql_query( $selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
  <table border="2">
   <thead>
    <tr>
      <th>ChapterS</th>
      <th>SectionS</th>
      <th>ShlokaNo</th>
      <th>Shloka</th>
      <th>ShlokaMeaning</th>
      <th>ChapterE</th>
      <th>SectionE</th>
      <th>Reference</th>
    </tr>
   </thead>
  <tbody>
      if( mysql_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="8">No Rows Returned</td></tr>';
      }else{
        while( $row = mysql_fetch_assoc( $selectRes ) ){
          echo "<tr><td>{$row['ChapterS']}</td><td>{$row['SectionS']}</td><td>{$row['ShlokaNo']}</td><td>{$row['Shloka']}</td><td>{$row['ShlokaMeaning']}</td><td>{$row['ChapterE']}</td><td>{$row['SectionE']}</td><td>{$row['Reference']}</td></tr>\n";
        }
      }
  </tbody>
</table>
  }

</body>
</html>

?>
