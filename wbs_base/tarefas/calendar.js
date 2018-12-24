/* VARIABLES FOR FORMATTING */

var TD_date_start = 	'<td class="cal_date">';
var TD_day_start = 		'<td class="cal_day">';
var TD_end = 			'</a></td>';
var TD_empty_end = 		'</td>';
var TD_empty_start = 	'<td class="cal_empty">';
var TD_selected_start = '<td class="cal_selected">';
var TD_today_start = 	'<td class="cal_today">';
var TD_weekend_start = 	'<td class="cal_weekend">';
var TR_start = 			'<tr>';
var TR_end = 			'</tr>';

function showCalendarMonth(showMonth, showYear, selectedDate, target) {
//  DECLARE AND INITIALIZE VARIABLES
	var i = 0;							// used for counters
	var Now = new Date();				// current date
	var Calendar = new Date();
	
	var selectedYear = selectedDate.substring(0,4);
	var selectedMonth = selectedDate.substring(5,7) - 1;
	var selectedDay = selectedDate.substring(8,10);

	var year = showYear;	    		// Returns year
	var month = showMonth - 1;   	    // Returns month (0-11)
	var today = Calendar.getDate();     // Returns day (1-31)
	var weekday = Calendar.getDay();    // Returns day (0-6)

	var DAYS_OF_WEEK = 7;		// "constant" for number of days in a week
	var DAYS_OF_MONTH = 31;		// "constant" for number of days in a month
	var cal;					// Used for printing

	Calendar.setDate(1);		// Start the calendar day at '1'
	Calendar.setMonth(month);	// Start the calendar month at now
	Calendar.setYear(year);		// Start the calendar month at now

/* BEGIN CODE FOR CALENDAR */

	cal = '<table align="center" border="0" cellspacing="1" cellpadding="2" border="0" class="cal_table">' + TR_start;
	cal += '<td colspan="' + DAYS_OF_WEEK + '" class="cal_title">';
	cal += month_of_year[month]  + '   ' + year + TD_end + TR_end;
	cal += TR_start;

// LOOPS FOR EACH DAY OF WEEK
	for (i = 0; i < DAYS_OF_WEEK; i++) {
		cal += TD_day_start + day_of_week[i] + TD_end;
	}

	cal += TR_end;

// FILL IN BLANK GAPS UNTIL FIRST DAY
	if (Calendar.getDay() != 0) {
		cal += TR_start;
	}
	for (i = 0; i < Calendar.getDay(); i++) {
		cal += TD_empty_start + '&nbsp;' + TD_empty_end;
	}

// counting how many days we've shown
	var days_shown = Calendar.getDay();

// LOOPS FOR EACH DAY IN CALENDAR
	for (i = 0; i < DAYS_OF_MONTH; i++) {
		if (Calendar.getDate() > i) {
// RETURNS THE NEXT DAY TO PRINT
			week_day = Calendar.getDay();
		
// START NEW ROW FOR FIRST DAY OF WEEK
			if (week_day == 0) {
				cal += TR_start;
			}
		
			if (week_day != DAYS_OF_WEEK) {
		
// SET VARIABLE INSIDE LOOP FOR INCREMENTING PURPOSES
				var day	= Calendar.getDate();
			
// HIGHLIGHT SELECTED DATE
				if (Calendar.getDate() == selectedDay && month == selectedMonth && year == selectedYear) {
					cal += TD_selected_start + '<a href="javascript:pickDate(' + year + ', ' + zero(month+1,2) + ', ' + zero(day,2) + ', \'' + target + '\');">' + day + '</a>' + TD_end;
				}
// HIGHLIGHT TODAY'S DATE
				else if (today == Calendar.getDate() && month == Now.getMonth() && year == Now.getFullYear()) {
					cal += TD_today_start + '<a href="javascript:pickDate(' + year + ', ' + zero(month+1,2) + ', ' + zero(day,2) + ', \'' + target + '\');">' + day + '</a>' + TD_end;
				}
// COLOR WEEKENDS
				else if (Calendar.getDay() == 0 || Calendar.getDay() == 6) {
					cal += TD_weekend_start + '<a href="javascript:pickDate(' + year + ', ' + zero(month+1,2) + ', ' + zero(day,2) + ', \'' + target + '\');">' + day + '</a>' + TD_end;
				}
// PRINTS DAY
				else {
					cal += TD_date_start + '<a href="javascript:pickDate(' + year + ', ' + zero(month+1,2) + ', ' + zero(day,2) + ', \'' + target + '\');">' + day + '</a>' + TD_end;
				}
			}
			
// END ROW FOR LAST DAY OF WEEK
			if (week_day == DAYS_OF_WEEK) {
				cal += TR_end;
			}
			days_shown++;
		}
		
// INCREMENTS UNTIL END OF THE MONTH
		Calendar.setDate(Calendar.getDate()+1);
		
	}// end for loop

	var extra = 7 - (days_shown % 7);

	for (i = 0; i < extra && extra != 7; i++) {
		cal += TD_empty_start + '&nbsp;' + TD_empty_end;
	}

	cal += '</tr></table>';

//  RETURN CALENDAR
	return cal;
}

function showMonths(howMany, startMonth, startYear, selectedDate, target) {
	var i = 0;
	var Now = new Date();				// current date
	var previousMonth = 0;
	var previousYear = 0;
	var nextMonth = 0;
	var nextYear = 0;
	var content = "";
	startMonth = parseInt(startMonth);
	startYear = parseInt(startYear);
	if (startMonth - 3 < 0) {
		previousMonth = 12 + startMonth - 3;
		previousYear = startYear - 1;
	}
	else {
		previousMonth = startMonth - 3;
		previousYear = startYear;
	}
	if (startMonth + 3 > 12) {
		nextMonth = startMonth + 3 - 12;
		nextYear = startYear + 1;
	}
	else {
		nextMonth = startMonth + 3;
		nextYear = startYear;
	}
	content += '<table width="100%" border="0" cellspacing="0" cellpadding="0" border="0"><tr><td class="cal_arrows">';
	content += '<a href="javascript:showMonths(' + howMany + ', ' + previousMonth + ', ' + previousYear + ', \'' + selectedDate + '\', \'' + target + '\');">&lt;- ' + strPrevious + '</a>';
	content += '</td><td class="cal_arrows" align="right">';
	content += '<a href="javascript:showMonths(' + howMany + ', ' + nextMonth + ', ' + nextYear + ', \'' + selectedDate + '\', \'' + target + '\');">' + strNext + ' -&gt;</a>';
	content += '</td></tr></table>';
	for (i = 0; i < howMany; i++) {
		content += '<p>';
		content += showCalendarMonth(startMonth, startYear, selectedDate, target);
		content += '</p>';
		if (startMonth < 12) {
			startMonth++;
		}
		else {
			startMonth = 1;
			startYear++;
		}
	}
	content += '<p align="center">';
	content += '<select id="jump_month">';
	for (i = 0; i < 12; i++) {
		content += '<option value="' + (i + 1) + '">' + month_of_year[i] + '</option>';
	}
	content += '</select> ';
	content += '<input type="text" size="4" name="jump_year" id="jump_year" value="' + startYear + '"> ';
	content += '<input type="button" name="jump" value=" ' + strGo + ' " onclick="showMonths(' + howMany + ', document.getElementById(\'jump_month\').options[document.getElementById(\'jump_month\').selectedIndex].value, document.getElementById(\'jump_year\').value, \'' + selectedDate + '\', \'' + target + '\');"> ';
	content += '&nbsp; <input type="button" name="jump_today" value="' + strToday + '" onclick="showMonths(' + howMany + ', ' + (Now.getMonth() + 1) + ', ' + Now.getFullYear() + ', \'' + selectedDate + '\', \'' + target + '\');">';
	content += '</p>';
	content += '<p align="center">';
	content += '<table width="100%" border="0" cellspacing="5" cellpadding="0" border="0"><tr>';
	content += TD_today_start + '&nbsp;' + TD_end;
	content += '<td> - ' + strKeyToday + '</td>';
	content += '</tr><tr>';
	content += TD_selected_start + '&nbsp;' + TD_end;
	content += '<td> - ' + strKeySelected + '</td>';
	content += '</tr></table>';
	content += '</p>';
	content += '<p align="center">';
	content += '<table width="100%" border="0" cellspacing="0" cellpadding="0" border="0"><tr><td class="cal_arrows">';
	content += '<a href="javascript:showMonths(' + howMany + ', ' + previousMonth + ', ' + previousYear + ', \'' + selectedDate + '\', \'' + target + '\');">&lt;- ' + strPrevious + '</a>';
	content += '</td><td class="cal_arrows" align="right">';
	content += '<a href="javascript:showMonths(' + howMany + ', ' + nextMonth + ', ' + nextYear + ', \'' + selectedDate + '\', \'' + target + '\');">' + strNext + ' -&gt;</a>';
	content += '</td></tr></table>';
	content += '</p>';

	document.getElementById('cal').innerHTML = content;
}
