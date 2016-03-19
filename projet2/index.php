<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<html>
<head>
	<link rel="stylesheet" href="style/timetablejs.css">
	<link rel="stylesheet" href="style/button.css">
	<link rel="stylesheet" href="style/jianghanStyle.css">
	<script src="lib/timetable.min.js"></script>
	<script src="lib/jquery-1.12.1.min.js"></script>
	<script type="text/javascript" src="drawTable.js"></script>
	<script type="text/javascript">
	var response;
	function request() {
		response = <?php
		$login=$_POST["login"];
		$url = "https://webapplis.utc.fr/Edt_ent_rest/myedt/result?login=" . $login;
		$html = file_get_contents($url);
		echo $html;
		?>;
		console.log(response);
	}
	
	function main() {
		request();
		drawTable();		
	}
	</script>

</head>

<body onLoad="main()">
	<h1>EMPLOI DU TEMPS UTC</h1>
	<p>Étudiants : Luxin ZHANG, Jianghan LI</p>
	<form action="http://tuxa.sme.utc/~sr03p021/" method="POST">
		<p>
			Login: <input type="text" name="login"/>
			<input type="submit" class="blue" value="Vas-y!" />
		</p>
	</form>
	<div class="timetable"></div>
</body>
</html>


