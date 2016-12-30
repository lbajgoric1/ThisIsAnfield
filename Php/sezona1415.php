<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> This is Anfield </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	


	<body>
		<div class="red">
			<div class="kolona cetri">
				<?php
					$_XML = simplexml_load_file("../Xml/sezona1415.xml");
					echo $_XML->tekst;
				?>
			</div>
		</div>
	</body>
</html>