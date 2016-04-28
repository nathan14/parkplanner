window.onload = function() {
  $('#loader').hide();
}	

$(document).ready(function() { 
  $('#page-title-mobile').html('לוח בקרה');
  if(get_cookie('email') === "") {
    window.location.href = "/";
  }
  else if(get_cookie('role') !== '1') {
    window.location.href = "/";
  }
  else {
	$.ajax({
		url: "php/dashboard-calculations.php",
		type: "POST",
		data: {
		},
		cache: false,
		success: function(data) {
		  calculationsPerMonth(data);
		  calculationsPerMonthEN(data);
		},
		error: function() {	
		},
	});
	
	$.ajax({
		url: "php/dashboard-calculations-months.php",
		type: "POST",
		data: {
		},
		cache: false,
		success: function(data) {
		  calculationsMonths(data);
		  calculationsMonthsEN(data);
		},
		error: function() {	
		},
	});
	
	$.ajax({
		url: "php/dashboard-family.php",
		type: "POST",
		data: {
		},
		cache: false,
		success: function(data) {
		  familyStructure(data);
		  familyStructureEN(data);
		},
		error: function() {	
		},
	});
			
	$.ajax({
		url: "php/dashboard-extreme.php",
		type: "POST",
		data: {
		},
		cache: false,
		success: function(data) {
		  extremeLevel(data);
		  extremeLevelEN(data);
		},
		error: function() {	
		},
	});
  } 
});

// Hebrew Charts
function calculationsPerMonth(data) {
  var calculationsPerMonthData = {
	labels : [],
	datasets : [
	  {
		fillColor : "#4D7B9D",
		strokeColor : "rgba(220,220,220,0.8)",
		highlightFill: "#769EBC",
		highlightStroke: "rgba(220,220,220,1)",
		data : []
	  }
	]
  }
  	
  var months = [''];
  var monthsLabels = ['', 'ינו', 'פבר', 'מרץ', 'אפר', 'מאי', 'יונ', 'יול', 'אוג', 'ספט', 'אוק', 'נוב', 'דצמ'];
  for(i = 0; i < data.length; i++) {
    months[data[i].month] = data[i].count;
	calculationsPerMonthData.datasets[0].data[i] = months[i + 1]; // add 1 to avoid month '0'
	calculationsPerMonthData.labels[i] = monthsLabels[i + 1]; // add 1 to avoid month '0'
  }
  
  var ctx  = document.getElementById("calculations-per-month").getContext("2d");
  window.myBar1 = new Chart(ctx).Bar(calculationsPerMonthData, options);
}

function calculationsMonths(data) {
  var calculationsRequestsData = {
	labels : [],
	datasets : [
	  {
		fillColor : "#4D7B9D",
		strokeColor : "rgba(220,220,220,0.8)",
		highlightFill: "#769EBC",
		highlightStroke: "rgba(220,220,220,1)",
		data : []
	  }
	]
  }
  	
  var months = [''];
  var monthsLabels = ['', 'ינו', 'פבר', 'מרץ', 'אפר', 'מאי', 'יונ', 'יול', 'אוג', 'ספט', 'אוק', 'נוב', 'דצמ'];
  for(i = 0; i < data.length; i++) {
    months[data[i].month] = data[i].count;
	calculationsRequestsData.datasets[0].data[i] = months[i + 1]; // add 1 to avoid month '0'
	calculationsRequestsData.labels[i] = monthsLabels[i + 1]; // add 1 to avoid month '0'
  }
  
  var ctx4 = document.getElementById("calculations-requsts-month").getContext("2d");
  window.myBar4 = new Chart(ctx4).Bar(calculationsRequestsData, options);
}

function extremeLevel(data) {
  var extremeLevelData = [
	{
	  color:"#A8C1D5",
	  highlight: "#88AAC6",
	  label: "לא מפחיד בכלל",
	  value: (data[0].count * 1)
	},
	{
	  color: "#4D7B9D",
	  highlight: "#436B89",
	  label: "בינוני",
	  value: (data[1].count * 1)
	},
	{
	  color: "#365770",
	  highlight: "#274052",
	  label: "הכי מפחיד",
	  value: (data[2].count * 1)
	}
  ]
  
  var ctx3 = document.getElementById("extreme-level").getContext("2d");
  window.myBar3 = new Chart(ctx3).Pie(extremeLevelData, options);
}

function familyStructure(data) {
  var familytStructData = {
	labels : ["מבוגרים","ילדים"],
	datasets : [
	  {
		fillColor : "#4D7B9D",
		strokeColor : "rgba(220,220,220,0.8)",
		highlightFill: "#769EBC",
		highlightStroke: "rgba(220,220,220,1)",
		data : []
	  }
	]
  }
  
  familytStructData.datasets[0].data[0] = data[0].adults;
  familytStructData.datasets[0].data[1] = data[0].children;

  var ctx2 = document.getElementById("family-struct").getContext("2d");
  window.myBar2 = new Chart(ctx2).Bar(familytStructData, options);
}

// English Charts
function calculationsPerMonthEN(data) {
  var calculationsPerMonthData = {
	labels : [],
	datasets : [
	  {
		fillColor : "#4D7B9D",
		strokeColor : "rgba(220,220,220,0.8)",
		highlightFill: "#769EBC",
		highlightStroke: "rgba(220,220,220,1)",
		data : []
	  }
	]
  }
  	
  var months = [''];
  var monthsLabels = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  for(i = 0; i < data.length; i++) {
    months[data[i].month] = data[i].count;
	calculationsPerMonthData.datasets[0].data[i] = months[i + 1]; // add 1 to avoid month '0'
	calculationsPerMonthData.labels[i] = monthsLabels[i + 1]; // add 1 to avoid month '0'
  }
  
  var ctx8  = document.getElementById("calculations-per-monthEN").getContext("2d");
  window.myBar8 = new Chart(ctx8).Bar(calculationsPerMonthData, options);
}

function calculationsMonthsEN(data) {
  var calculationsRequestsData = {
	labels : [],
	datasets : [
	  {
		fillColor : "#4D7B9D",
		strokeColor : "rgba(220,220,220,0.8)",
		highlightFill: "#769EBC",
		highlightStroke: "rgba(220,220,220,1)",
		data : []
	  }
	]
  }
  	
  var months = [''];
  var monthsLabels = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  for(i = 0; i < data.length; i++) {
    months[data[i].month] = data[i].count;
	calculationsRequestsData.datasets[0].data[i] = months[i + 1]; // add 1 to avoid month '0'
	calculationsRequestsData.labels[i] = monthsLabels[i + 1]; // add 1 to avoid month '0'
  }
  
  var ctx7 = document.getElementById("calculations-requsts-monthEN").getContext("2d");
  window.myBar7 = new Chart(ctx7).Bar(calculationsRequestsData, options);
}

function extremeLevelEN(data) {
  var extremeLevelData = [
	{
	  color:"#A8C1D5",
	  highlight: "#88AAC6",
	  label: "Not Scary",
	  value: (data[0].count * 1)
	},
	{
	  color: "#4D7B9D",
	  highlight: "#436B89",
	  label: "Medium",
	  value: (data[1].count * 1)
	},
	{
	  color: "#365770",
	  highlight: "#274052",
	  label: "Very Scary",
	  value: (data[2].count * 1)
	}
  ]
  
  var ctx6 = document.getElementById("extreme-levelEN").getContext("2d");
  window.myBar6 = new Chart(ctx6).Pie(extremeLevelData, options);
}

function familyStructureEN(data) {
  var familytStructData = {
	labels : ["Adults","Kids"],
	datasets : [
	  {
		fillColor : "#4D7B9D",
		strokeColor : "rgba(220,220,220,0.8)",
		highlightFill: "#769EBC",
		highlightStroke: "rgba(220,220,220,1)",
		data : []
	  }
	]
  }
  
  familytStructData.datasets[0].data[0] = data[0].adults;
  familytStructData.datasets[0].data[1] = data[0].children;

  var ctx5 = document.getElementById("family-structEN").getContext("2d");
  window.myBar5 = new Chart(ctx5).Bar(familytStructData, options);
}

var options = {
  responsive : true,
  tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
  scaleLineColor: "transparent",
  scaleShowLabels : false,
  scaleShowHorizontalLines: false,
  scaleShowVerticalLines: false,
  scaleShowGridLines : false,
  barShowStroke : false
}

$('#btn-manage-users').click(function() { 
  window.location.href = 'users.php';
});

$('#btn-manage-mail').click(function() { 
  window.location.href = 'sent-items.php';
});

