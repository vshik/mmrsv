<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h6>MMRSV Create/Update/Delete Page</h6>
    		</div>
			<div class="row">
				<p>
				   <a href="create.php" class="btn btn-success">Create</a>
				</p>

				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Chapter Name</th>
		                  <th>Section Name</th>
		                  <th>Shloka No.</th>
		                  <th>Shloka </th>
		                  <th>Shloka Meaning</th>
		                  <th>Reference </th>
		                  <th>Action </th>
		                </tr>
		              </thead>
		              <tbody>
                              <?php
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM mmrsv';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['ChapterS'] . '</td>';
							   	echo '<td>'. $row['SectionS'] . '</td>';
							   	echo '<td>'. $row['ShlokaNo'] . '</td>';
							   	echo '<td>'. $row['Shloka'] . '</td>';
							   	echo '<td>'. $row['ShlokaMeaning'] . '</td>';
							   	echo '<td>'. $row['Reference'] . '</td>';
							   	echo '<td width=150>';
                                                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                                               // echo '<a class="btn btn-success" href=\"update.php?id=".$row['id']."\">Update</a>';
                                                               // echo '&nbsp;';
                                                               // echo '<a class="btn btn-danger" href=\"delete.php?id=".$row['id']."\">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
			       </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
