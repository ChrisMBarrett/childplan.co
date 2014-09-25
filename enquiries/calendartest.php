	<!DOCTYPE html>
	<html>
	<head>
		<title>Minimum Setup</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/calendar.css">
	</head>
	<body>

		<div id="calendar"></div>

		<script type="text/javascript" src="../javascript/jquery-1.11.0.js"></script>
		<script type="text/javascript" src="../javascript/underscore-min.js"></script>
		<script type="text/javascript" src="../javascript/calendar.js"></script>
		<script type="text/javascript">
			var calendar = $("#calendar").calendar(
				{
					tmpl_path: "/tmpls/",
					events_source: function () { return []; }
				});			
		</script>
	</body>
	</html>