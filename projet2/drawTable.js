function drawTable() {
	var timetable = new Timetable();
	timetable.setScope(8, 20); // optional, only whole hours between 0 and 23
	if(response1.length > 0 && response2.length > 0) {
		addLocation(timetable, login1, login2);
		addEvent(timetable, response1, login1)
		addEvent(timetable, response2, login2)
	} else {
		addLocation(timetable);
		addEvent(timetable, response1, "");
		addEvent(timetable, response2, "");
	}
	var renderer = new Timetable.Renderer(timetable);
	renderer.draw('.timetable'); // any css selector
	changeColor();
}

function addLocation(timetable, daySuffix1, daySuffix2) {
	if (daySuffix1 && daySuffix2) {
		timetable.addLocations([
			'LUN ' + daySuffix1, 'LUN ' + daySuffix2, 
			'MAR ' + daySuffix1, 'MAR ' + daySuffix2, 
			'MER ' + daySuffix1, 'MER ' + daySuffix2, 
			'JEU ' + daySuffix1, 'JEU ' + daySuffix2,  
			'VEN ' + daySuffix1, 'VEN ' + daySuffix2, 
			'SAM ' + daySuffix1, 'SAM ' + daySuffix2]);		
	} else {
		timetable.addLocations(['LUN ', 'MAR ', 'MER ', 'JEU ', 'VEN ', 'SAM ']);
	}
	
}

function addEvent(timetable, response, daySuffix) {
	for (var i = 0; i < response.length; ++i) {
		var event = response[i];
		console.log(event);
		console.log(daySuffix);
		console.log(event.day.slice(0,3) + " " + daySuffix);
		timetable.addEvent(
			event.uv + " " + event.type + " " + event.begin,
			event.day.slice(0,3) + " " + daySuffix, 
			new Date(2016,1,1,event.begin.split(":")[0],event.begin.split(":")[1]), 
			new Date(2016,1,1,event.end.split(":")[0],event.end.split(":")[1]));			
	}
}

function changeColor() {
	var eventList = document.getElementsByClassName("time-entry");
	var colorInd = 0;
	var palette = {};
	for(var i = 0; i < eventList.length; ++i) {
		var title = eventList[i].getAttribute("title");
		var cours = title.split(" ")[0];
		if (palette[cours] == undefined) {
			colorInd = colorInd + 1;
			palette[cours] = colorInd;
		}
		eventList[i].classList.add("eventColor" + palette[cours]);			
	}		
}