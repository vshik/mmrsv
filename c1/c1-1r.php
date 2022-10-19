<?php
 $db = mysqli_connect('localhost','root','root','mmrsv')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <h4> <p style="display:inline;color:blue" title="Benediction"> मङ्गलम् </p> </h4>
 <h5> श्लो.  १.१.१ - १.१.२ : </h5>

<?php
// Change character set to utf8
mysqli_set_charset($db,"utf8");
$query = "select * from mmrsv where ChapterS='पीठिका ' and SectionS='मङ्गलम्'";
mysqli_query($db, $query) or die('Error querying database.');

$result1 = mysqli_query($db, $query);
$result2 = mysqli_query($db, $query);
$result3 = mysqli_query($db, $query);

while ($rowS = mysqli_fetch_assoc($result1)) {
 echo '<td><font size="2" >' . $rowS['Shloka'] . '</font></td>';
 echo '<br/>';
}
?>

</h5>

<hr>

<h5>विवरणम् </h5>
<?php
while ($rowM = mysqli_fetch_assoc($result2)) {
 echo '<td><font size="2" >' . $rowM['ShlokaMeaning'] . '</font></td>';
 echo '<br/>';
}
?>
<h5>

</h5>

<hr>

<h5>आकरग्रन्थाः </h5>
<?php
while ($rowR = mysqli_fetch_assoc($result3)) {
 echo '<td><font size="2" >' . $rowR['Reference'] . '</font></td>';
 echo '<br/>';
}
?>

</h5>

<hr>

<?php
mysqli_close($db);
?>

</body>
</html>
