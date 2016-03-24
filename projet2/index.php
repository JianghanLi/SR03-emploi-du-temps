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
	var response1 = [], response2 = [];
	var login1 = "", login2 = "";
	function request() {
		login1 = <?php
		$login1=$_POST["login1"];
		echo "'$login1'";
		?>;		
		login2 = <?php
		$login2=$_POST["login2"];
		echo "'$login2'";
		?>;	
		response1 = <?php
		$url = "https://webapplis.utc.fr/Edt_ent_rest/myedt/result?login=" . $login1;
		$html = file_get_contents($url);
		echo $html;
		?>;
		response2 = <?php
		$url = "https://webapplis.utc.fr/Edt_ent_rest/myedt/result?login=" . $login2;
		$html = file_get_contents($url);
		echo $html;
		?>;
		$('input[name="login1"]')[0].value=login1;
		$('input[name="login2"]')[0].value=login2;
		console.log(response1);
		console.log(response2);
	}
	
	function main() {
		request();
		drawTable();		
	}
	</script>

</head>

<body onLoad="main()">
	<title>EMPLOI DU TEMPS UTC</title> 
	<h1>EMPLOI DU TEMPS UTC</h1>
	<p>Étudiants : Luxin ZHANG, Jianghan LI, Mengjia SUI</p>
	<form action="http://tuxa.sme.utc/~sr03p021/" method="POST">
		<p>
			Login: 
			<input type="text" name="login1"/> 
			Vs 
			<input type="text" name="login2"/>
			<input type="submit" class="blue" value="Vas-y!" />
		</p>
	</form>
	<div class="timetable"></div>
</body>
</html>


