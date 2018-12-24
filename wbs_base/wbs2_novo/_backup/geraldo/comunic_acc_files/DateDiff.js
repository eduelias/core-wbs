<!-- Original:  Ronnie T. Moore -->
<!-- Web Site:  The JavaScript Source -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function isValidDate(dateStr) {
// Date validation function courtesty of 
// Sandeep V. Tamhankar (stamhankar@hotmail.com) -->

// Checks for the following valid date formats:
// MM/DD/YY   MM/DD/YYYY   MM-DD-YY   MM-DD-YYYY

var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/; // requires 4 digit year

var matchArray = dateStr.match(datePat); // is the format ok?
if (matchArray == null) {
return false;
}
month = matchArray[1]; // parse date into variables
day = matchArray[3];
year = matchArray[4];
if (month < 1 || month > 12) { // check month range
return false;
}
if (day < 1 || day > 31) {
return false;
}
if ((month==4 || month==6 || month==9 || month==11) && day==31) {
return false;
}
if (month == 2) { // check for february 29th
var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
if (day>29 || (day==29 && !isleap)) {
return false;
   }
}
return true;
}

function isValidTime(timeStr) {
// Time validation function courtesty of 
// Sandeep V. Tamhankar (stamhankar@hotmail.com) -->

// Checks if time is in HH:MM:SS AM/PM format.
// The seconds and AM/PM are optional.

var timePat = /^(\d{1,2}):(\d{2})(:(\d{2}))?(\s?(AM|am|PM|pm))?$/;

var matchArray = timeStr.match(timePat);
if (matchArray == null) {
return false;
}
hour = matchArray[1];
minute = matchArray[2];
second = matchArray[4];
ampm = matchArray[6];

if (second=="") { second = null; }
if (ampm=="") { ampm = null }

if (hour < 0  || hour > 23) {
alert("Hour must be between 1 and 12. (or 0 and 23 for military time)");
return false;
}
if (hour <= 12 && ampm == null) {
if (confirm("Please indicate which time format you are using.  OK = Standard Time, CANCEL = Military Time")) {
alert("You must specify AM or PM.");
return false;
   }
}
if  (hour > 12 && ampm != null) {
alert("You can't specify AM or PM for military time.");
return false;
}
if (minute < 0 || minute > 59) {
alert ("Minute must be between 0 and 59.");
return false;
}
if (second != null && (second < 0 || second > 59)) {
alert ("Second must be between 0 and 59.");
return false;
}
return true;
}

function dateDiff(firstdate, seconddate) {
date1 = new Date();
date2 = new Date();
diff  = new Date();

if (isValidDate(firstdate)) { // Validates first date 
date1temp = new Date(firstdate);
date1.setTime(date1temp.getTime());
}
else return false; // otherwise exits  

if (isValidDate(seconddate)) { // Validates second date 
date2temp = new Date(seconddate);
date2.setTime(date2temp.getTime());
}
else return false; // otherwise exits

// sets difference date to difference of first date and second date

diff.setTime(date2.getTime() - date1.getTime());

timediff = diff.getTime();

//weeks = Math.floor(timediff / (1000 * 60 * 60 * 24 * 7));
//timediff -= weeks * (1000 * 60 * 60 * 24 * 7);

days = Math.floor(timediff / (1000 * 60 * 60 * 24)); 
timediff -= days * (1000 * 60 * 60 * 24);

hours = Math.floor(timediff / (1000 * 60 * 60)); 
timediff -= hours * (1000 * 60 * 60);

mins = Math.floor(timediff / (1000 * 60)); 
timediff -= mins * (1000 * 60);

secs = Math.floor(timediff / 1000); 
timediff -= secs * 1000;

return days; // form should never submit, returns false
}

function getDif(dateString, nowString, dateType) {
/*
   function getDif
   parameters: dateString dateType
   returns: boolean

   dateString is a date passed as a string in the following
   formats:

   type 1 : 19970529
   type 2 : 970529
   type 3 : 29/05/1997
   type 4 : 29/05/97

   dateType is a numeric integer from 1 to 4, representing
   the type of dateString passed, as defined above.

   Returns string containing the age in years, months and days
   in the format yyy years mm months dd days.
   Returns empty string if dateType is not one of the expected
   values.
*/

    if (dateType == 1) {
        var dob = new Date(dateString.substring(0,4),
                            dateString.substring(4,6)-1,
                            dateString.substring(6,8));
        var now = new Date(nowString.substring(0,4),
                            nowString.substring(4,6)-1,
                            nowString.substring(6,8));                            
    }
    else if (dateType == 2) {
        var dob = new Date(dateString.substring(0,2),
                            dateString.substring(2,4)-1,
                            dateString.substring(4,6));
        var now = new Date(nowString.substring(0,2),
                            nowString.substring(2,4)-1,
                            nowString.substring(4,6));
    }
    else if (dateType == 3) {
        var dob = new Date(dateString.substring(6,10),
                            dateString.substring(3,5)-1,
                            dateString.substring(0,2));
        var now = new Date(nowString.substring(6,10),
                            nowString.substring(3,5)-1,
                            nowString.substring(0,2));
    }
    else if (dateType == 4) {
        var dob = new Date(dateString.substring(6,8),
                            dateString.substring(3,5)-1,
                            dateString.substring(0,2));
        var now = new Date(nowString.substring(6,8),
                            nowString.substring(3,5)-1,
                            nowString.substring(0,2));
    }
    else
        return -1;

    var yearNow = now.getYear();
    var monthNow = now.getMonth();
    var dateNow = now.getDate();
        
    var yearDob = dob.getYear();
    var monthDob = dob.getMonth();
    var dateDob = dob.getDate();

    yearAge = yearNow - yearDob;
    
    yearAge = (yearAge > 1900) ? yearAge - 1900 : yearAge;

   if (monthNow >= monthDob)
        var monthAge = monthNow - monthDob;
    else {
        yearAge--;
        var monthAge = 12 + monthNow -monthDob;
    }

    if (dateNow >= dateDob)
        var dateAge = dateNow - dateDob;
    else {
        monthAge--;
        var dateAge = 31 + dateNow - dateDob;

        if (monthAge < 0) {
            monthAge = 11;
            yearAge--; 
        }
    }

//    alert(yearAge + ' years ' + monthAge + ' months ' + dateAge + ' days');
    return yearAge; // + ' years ' + monthAge + ' months ' + dateAge + ' days';
}

//  End -->
