<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>View Records</title>
</head>
<body>

<?php
        /* 
         Code to display all data from 'mmrsv' table
        */

        // connect to the database
        include('connect-db.php');

        // get results from database
        $result = mysql_query("SELECT * FROM mmrsv") or die(mysql_error());  

        // set display to unicode
        mysql_query(‘SET CHARACTER SET utf8’);
        mysql_query(“SET SESSION collation_connection =’utf8_general_ci'”);

        // display data in table
        echo "<p><b>View All</b> | <a href='view-paginated.php?page=10'>View Paginated</a></p>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr> <th>Chapter Name</th> <th>Section Name</th> <th>Shloka No.</th> <th>Shloka</th> <th>Shloka Meaning</th> <th>Reference</th> </tr>";

        <?php while($row = mysql_fetch_array($result)) { ?>
        <tr>
        <td> <?php echo $row['ChapterS']; ?></td>
        <td> <?php echo $row['SectionS']; ?></td>
        <td> <?php echo $row['ShlokaNo']; ?></td>
        <td> <?php echo $row['Shloka']; ?></td>
        <td> <?php echo $row['ShlokaMeaning']; ?></td>
        <td> <?php echo $row['Reference']; ?></td>
        <td> <a href=”edit.php?id=<?php echo $row[‘id’]; ?>”>Edit</a> </td>
        <td> <a onClick=”return confirm(‘Sure to delete!’)” href=”delete.php?id=<?php echo $row[‘id’]; ?>”>Delete</a> </td>
        </tr>
        <?php } ?>
        </table>

        /*
        <?php while($row = mysql_fetch_array( $result )) 
        { ?>
                // echo out the contents of each row into a table
                <tr>
                /*
                <pre><?php echo htmlspecialchars($result['ChapterS'], ENT_NOQUOTES, 'UTF-8'); ?></pre>
                <pre><?php echo htmlspecialchars($result['SectionS'], ENT_NOQUOTES, 'UTF-8'); ?></pre>
                <pre><?php echo htmlspecialchars($result['ShlokaNo'], ENT_NOQUOTES, 'UTF-8'); ?></pre>
                <pre><?php echo htmlspecialchars($result['Shloka'], ENT_NOQUOTES, 'UTF-8'); ?></pre>
                <pre><?php echo htmlspecialchars($result['ShlokaMeaning'], ENT_NOQUOTES, 'UTF-8'); ?></pre>
                <pre><?php echo htmlspecialchars($result['Reference'], ENT_NOQUOTES, 'UTF-8'); ?></pre>
                echo '<td><a href="edit.php?id=' . $row['ShlokaNo'] . '">Edit</a></td>';
                echo '<td><a href="delete.php?id=' . $row['ShlokaNo'] . '">Delete</a></td>';
                */
                /*        
                <td> <?php echo $row['ChapterS']; ?></td>
                <td> <?php echo $row['SectionS']; ?></td>
                <td> <?php echo $row['ShlokaNo']; ?></td>
                <td> <?php echo $row['Shloka']; ?></td>
                <td> <?php echo $row['ShlokaMeaning']; ?></td>
                <td> <?php echo $row['Reference']; ?></td>
                <td> <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                <td> <a onClick=”return confirm(‘Sure to delete!’)” href=”delete.php?id=<?php echo $row[‘id’]; ?>”>Delete</a> </td>
                echo "<td><a href='delete.php?id=".$row['id']."'>Delete</a></td>";
                </tr> 
        <?php } ?> 
        </table>
    */

/*
   $connection = mysql_connect('localhost', 'root', 'root'); //The Blank string is the password
   mysql_select_db('mmrsv');

   $query = "SELECT * FROM mmrsv"; //You don't need a ; like you do in SQL
   $result = mysql_query($query);

   echo "<table>"; // start a table tag in the HTML
     while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
   echo "<tr><td>" . $row['ChapterS'] . "</td><td>" . $row['SectionS'] . "</td><td>" . $row['ShlokaNo'] . "</td><td>" . $row['Shloka'] . "</td><td>" . $row['ShlokaMeani$
  }

   echo "</table>"; //Close the table in HTML
   mysql_close(); //Make sure to close out the database connection
*/

?>
<p><a href="new.php">Add a new record</a></p>

</body>
</html>	
