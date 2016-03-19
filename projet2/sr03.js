	function drawTable() {
		var timetable = new Timetable();
		timetable.setScope(8, 20); // optional, only whole hours between 0 and 23
		timetable.addLocations(['LUNDI', 'MARDI', 'MERCREDI', 'JEUDI', 'VENDREDI', 'SAMEDI']);
		
		for (var i = 0; i < response.length; ++i) {
			var event = response[i];
			timetable.addEvent(event.uv + " " + event.type, event.day, new Date(2016,1,1,event.begin.split(":")[0],event.begin.split(":")[1]), new Date(2016,1,1,event.end.split(":")[0],event.end.split(":")[1]));
			
		}
		var renderer = new Timetable.Renderer(timetable);
		renderer.draw('.timetable'); // any css selector
		changeColor();
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
	
	function main() {
		drawTable();		
	}
