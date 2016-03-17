<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<html>
<head>
	<link rel="stylesheet" href="./timetablejs.css">
	<script src="./timetable.min.js"></script>
	<script type="text/javascript">
	var response2 = [ {
		"uv" : "LA93",
		"type" : "TD",
		"day" : "LUNDI",
		"begin" : "10:15",
		"end" : "12:15",
		"room" : "FC201",
		"group" : "Groupe 1"
	}, {
		"uv" : "LA93",
		"type" : "TP",
		"day" : "JEUDI",
		"begin" : "17:30",
		"end" : "18:30",
		"room" : "FA410",
		"group" : "Groupe 1"
	}, {
		"uv" : "LG31",
		"type" : "TD",
		"day" : "LUNDI",
		"begin" : "16:30",
		"end" : "18:30",
		"room" : "FA410",
		"group" : "Groupe 2"
	}, {
		"uv" : "NF26",
		"type" : "Cours",
		"day" : "VENDREDI",
		"begin" : "10:15",
		"end" : "12:15",
		"room" : "FA318",
		"group" : ""
	}, {
		"uv" : "NF26",
		"type" : "TD",
		"day" : "JEUDI",
		"begin" : "8:00",
		"end" : "10:00",
		"room" : "FB100",
		"group" : "Groupe 1"
	}, {
		"uv" : "SY09",
		"type" : "Cours",
		"day" : "MERCREDI",
		"begin" : "10:15",
		"end" : "12:15",
		"room" : "FA106",
		"group" : ""
	}, {
		"uv" : "SY09",
		"type" : "TD",
		"day" : "JEUDI",
		"begin" : "10:15",
		"end" : "12:15",
		"room" : "FB215",
		"group" : "Groupe 3"
	}, {
		"uv" : "SR03",
		"type" : "Cours",
		"day" : "MERCREDI",
		"begin" : "14:15",
		"end" : "16:15",
		"room" : "FA100",
		"group" : ""
	}, {
		"uv" : "SR03",
		"type" : "TD",
		"day" : "JEUDI",
		"begin" : "13:15",
		"end" : "16:15",
		"room" : "FA506",
		"group" : "Groupe 2"
	}, {
		"uv" : "LO17",
		"type" : "Cours",
		"day" : "LUNDI",
		"begin" : "8:00",
		"end" : "10:00",
		"room" : "FA318",
		"group" : ""
	}, {
		"uv" : "LO17",
		"type" : "TD",
		"day" : "LUNDI",
		"begin" : "13:15",
		"end" : "16:15",
		"room" : "FB104",
		"group" : "Groupe 1"
	} ]
	//var login = $(".loginInput").val();
	var response = <?php
		$login="<script type=text/javascript>$(".loginInput").val();</script>";
		$url = "https://webapplis.utc.fr/Edt_ent_rest/myedt/result?login=" + $login;
		$html = file_get_contents($url);
		echo $html;
	?>;
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
	</script>



</head>

<body>
	<h1>SR03</h1>
	<p>Projet : AFFICHAGE GRAPHIQUE D'UN EMPLOI DU TEMPS D'UN ÉTUDIANT</p>
	<p>Étudiants : Luxin ZHANG, Jianghan LI, Mengjia SUI</p>

	Url du webservice: https://webapplis.utc.fr/Edt_ent_rest/myedt/result?login=cmarti04

	<form action="/example/html/form_action.asp" method="get">
		<p>Login: <input type="text" name="login" class="loginInput" /></p>
		<input type="submit" value="Submit" />
	</form>

	<p>请单击确认按钮，输入会发送到服务器上</p>
	<button class="action" onclick="drawTable()">Hello</button>
	<div class="timetable"></div>

</body>
</html>


