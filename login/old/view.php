<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>View Records</title>
</head>
<body>

<?php
/* 
	VIEW.PHP
	Displays all data from 'players' table
*/

	// connect to the database
	include('connect-db.php');

	// get results from database
	$result = mysql_query("SELECT * FROM mmrsv") 
		or die(mysql_error());  
		
	// display data in table
	echo "<p><b>View All</b> | <a href='view-paginated.php?page=10'>View Paginated</a></p>";
	
	echo "<table border='1' cellpadding='10'>";
        echo "<tr> <th>Chapter Name</th> <th>Section Name</th> <th>Shloka No.</th> <th>Shloka</th> <th>Shloka Meaning</th> <th>Reference</th> </tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . htmlspecialchars($row['ChapterS'], ENT_NOQUOTES, 'UTF-8') . '</td>';
                echo '<td>' . htmlspecialchars($row['SectionS'], ENT_NOQUOTES, 'UTF-8') . '</td>';
                echo '<td>' . htmlspecialchars($row['ShlokaNo'], ENT_NOQUOTES, 'UTF-8') . '</td>';
                echo '<td>' . htmlspecialchars($row['Shloka'], ENT_NOQUOTES, 'UTF-8') . '</td>';
		echo '<td>' . htmlspecialchars($row['ShlokaMeaning'], ENT_NOQUOTES, 'UTF-8') . '</td>';
		echo '<td>' . htmlspecialchars($row['Reference'], ENT_NOQUOTES, 'UTF-8') . '</td>';
		echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
		echo '<td><a  onClick=”return confirm(‘Sure to delete!’)” href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
?>
<p><a href="new.php">Add a new record</a></p>

</body>
</html>
