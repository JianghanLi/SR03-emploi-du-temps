<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<html>
<head>
	<link rel="stylesheet" href="./timetablejs.css">
	<script src="lib/jquery-1.12.1.min.js"></script>
	<script src="./timetable.min.js"></script>
	<script type="text/javascript">
	var login = $(".loginInput").val();
	var response;
	function request() {
		var login = $(".loginInput").val();
		response = <?php
		$login=$_POST["login"];
		$url = "https://webapplis.utc.fr/Edt_ent_rest/myedt/result?login=" . $login;
		$html = file_get_contents($url);
		echo $html;
		?>;
		console.log(response);
	}
	function drawTable() {
		var timetable = new Timetable();
		timetable.setScope(8, 20); // optional, only whole hours between 0 and 23
		timetable.addLocations(['LUNDI', 'MARDI', 'MERCREDI', 'JEUDI', 'VENDREDI', 'SAMEDI']);
		
		for (var i = 0; i < response.length; ++i) {
			var event = response[i];
			console.log(event);
			timetable.addEvent(event.uv + event.type, event.day, new Date(2016,1,1,event.begin.split(":")[0],event.begin.split(":")[1]), new Date(2016,1,1,event.end.split(":")[0],event.end.split(":")[1]));
			console.log(timetable);
			
		}
		var renderer = new Timetable.Renderer(timetable);
		renderer.draw('.timetable'); // any css selector
	}
	
	function main() {
		request();
		drawTable();		
	}
	</script>
	


</head>

<body onLoad="main()";>
	<h1>SR03</h1>
	<p>Projet : AFFICHAGE GRAPHIQUE D'UN EMPLOI DU TEMPS D'UN ÉTUDIANT</p>
	<p>Étudiants : Luxin ZHANG, Jianghan LI</p>

	<form action="http://tuxa.sme.utc/~sr03p021/" method="POST">
		<p>
			Login: <input type="text" name="login" class="loginInput"/>
			<input type="submit" value="Submit" />
		</p>
	</form>
	<div class="timetable"></div>

</body>
</html>


