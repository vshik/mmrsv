<!DOCTYPE html>

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <h4> <p style="display:inline;color:blue" title="Benediction"> मङ्गलम् </p> </h4>
</head>

<body>

<?php
$link = mysql_connect("localhost", "root", "root");
mysql_set_charset('utf8',$link);
/*
mysql_query('SET character_set_results=utf8');
mysql_query('SET names=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query('SET collation_connection=utf8_general_ci');
*/
mysql_select_db("mmrsv");
$result = mysql_query("SELECT * FROM mmrsv where shlokano like '%1.1.%'");

<h5>श्लो. १.१.१ - १.१.२ :</h5>
while ($row = mysql_fetch_array($result)) {
 echo '<tr>';
 echo '<td>'. $row['Shloka'] . '</td>';
}

<hr>

<h5>विवरणम् </h5>
while($row = mysql_fetch_array($result))
{
 echo '<tr>';
 echo '<td>'. $row['ShlokaMeaning'] . '</td>';
}
echo 'bull';

<hr>

<h5>आकरग्रन्थाः </h5>
while($row = mysql_fetch_array($result))
{
 echo '<tr>';
 echo '<td>'. $row['Reference'] . '</td>';
}

<hr>

mysql_free_result($result);

?>
