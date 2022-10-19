<?php
//Step1
 $db = mysqli_connect('localhost','root','root','mmrsv')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <h4> <p style="display:inline;color:blue" title="About author">प्रबन्धृविषयः  </p> </h4>
 <h5>श्लो.  १.२.१ - १.२.६ : <br>

<?php
//Step2
// Change character set to utf8
mysqli_set_charset($db,"utf8");
$query = "SELECT * FROM mmrsv where ChapterS='पीठिका' and SectionS='प्रबन्धृविषयः'";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
 echo $row['Shloka'] <br>;
}
?>

</h5>

<hr>

<h5>विवरणम् </h5>
<?php
//Step2
// Change character set to utf8
mysqli_set_charset($db,"utf8");
$query = "SELECT * FROM mmrsv where ChapterS='पीठिका ' and SectionS='प्रबन्धृविषयः '";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
 echo $row['ShlokaMeaning'] <br>;
}
?>

<h5>

</h5>

<hr>

<h5>आकरग्रन्थाः <br>
<?php
//Step2
// Change character set to utf8
mysqli_set_charset($db,"utf8");
$query = "SELECT * FROM mmrsv where ChapterS='पीठिका ' and SectionS='प्रबन्धृविषयः '";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
 echo $row['Reference'] <br>;
}
?>

</h5>

<hr>

<?php
//Step 4
mysqli_close($db);
?>

</body>
</html>
