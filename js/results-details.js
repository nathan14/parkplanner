function setResultDetails() {
  var days 	= get_cookie('total_days');
  var adt 	= get_cookie('total_adults');
  var chl 	= get_cookie('num_of_children');
  var ext 	= get_cookie('extreme');
  var date	= get_cookie('arrival_date');
    
  var start_date_day = date.substring(0, 2);
  var start_date_month = date.substring(3, 5);
  var start_date_year = date.substring(6, 10);
  var start_date = "";
  start_date += start_date_day + '/' + start_date_month + '/' + start_date_year;
  var startdate = start_date.toString('dd/MM/yyyy');
  var end_date = Date.parse(startdate).add(parseInt((days-1))).days();
  endDate = end_date.toString('dd/MM/yyyy');  
  
  if(chl !== '0') {
    adt += ' + ' + chl;
  }
  extString = '<span lang="he">';
  
  if(ext === 'medium') {
    extString += 'בינוני';
  }
  else if(ext === 'scary') {
    extString += 'הכי מפחיד';
  }
  else {
    extString += 'לא מפחיד';
  }
  
  extString += '</span>';
    
  $('#result-details-dates').html('<i class="fa fa-calendar"></i> ' + startdate);
  $('#result-details-family').html('<i class="fa fa-users"></i> ' + adt);
  $('#result-details-extreme').html('<i class="fa fa-bolt"></i> ' + extString);
}