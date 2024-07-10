<?php
	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
	echo "<!DOCTYPE HTML><html lang='en'><head>";

	require_once('connection.php');

	$db=new Connection();
	$con=$db->getConnection();
	$stmt = $con->prepare("SELECT * FROM dangers WHERE id>=:id");

	$id='1';
	$stmt->bindValue(':id', $id, PDO::PARAM_STR);
	$stmt->execute();
	$dangers = $stmt->fetchAll();
?>
		<meta charset="utf-8"/>
		<title>PDO Database connection</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	</head>
	<body>
									
		<div class="container">
			<h2>Dangers</h2>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Description</th>
						<th>Danger</th>
						<th>Image</th>
						<th>Longitude</th>
						<th>Latitude</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($dangers as $danger) { 
							echo "<tr><td>".$danger['id']."</td><td>".$danger['description']."</td><td>".$danger['level']."</td><td>".$danger['image']."</td><td>".$danger['longitude']."</td><td>".$danger['latitude']."</td></tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>