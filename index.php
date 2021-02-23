<!--
	//////////////////////////
	//		Engine by		//
	//	  crosman-web.hu	//
	//////////////////////////
-->
<html>
	<head>
		<title>Port ellenőrző</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
<body>
<div class="container">
<br />
<div class="card bg-light mb-3">
	<div class="card-header">Port ellenőrzés</div>
	<div class="card-body">
		<?php

		if (!empty($_GET["port"]) AND !empty($_GET["ip"])) {
			$port = $_GET["port"];
			$ip = $_GET["ip"];
			//echo "Beküldött ip és port: $ip:$port <br />";
			
			// IP PORT ELLENŐRZÉSE
			$kapcsolat = @fsockopen($ip, $port);

			if (is_resource($kapcsolat)) {
				?>
					<div class="alert alert-dismissible alert-success">
					  <strong>A szerver elérhető! (<?=$ip?>:<?=$port?>)</strong>
					</div>
				<?php
			} else {
				?>
					<div class="alert alert-dismissible alert-warning">
					  <strong>A szerver nem elérhető! (<?=$ip?>:<?=$port?>)</strong>
					</div>
				<?php
			}

		}

		?>
		<form method="GET" action="index.php">
			<input class="form-control" type="text" placeholder="IP" name="ip" />
			<br />
			<input class="form-control" type="text" placeholder="PORT" name="port" />
			<br />
			<input class="btn btn-success" type="submit" value="Küldés" />
		</form>
	</div>
</div>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="http://crosman-web.hu/">crosman-web.hu</a></li>
  <li class="breadcrumb-item active">IP és Port ellenőrző script</li>
</ol>
</div>
</body>
</html>