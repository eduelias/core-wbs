Tasks Jr.

"keep stuff organized and get it done."
http://www.kingdesign.net/tasks-jr/

-----------------------------------------------------------------

What it is:

A web based, hierarchical task manager/to-do list/lightweight project manager.

Who it's for:

Anyone who is comfortable installing and configuring PHP & MySQL and wants to manage their tasks/projects from a central spot. Also, for someone who wants to view their tasks in an iCalendar enabled calendar.

Features:

* Dynamic hierarchical view of your tasks - expand/collapse tree using client side JavaScript
* Scheduling due dates and associating URLs with tasks
* iCalendar of your tasks (scheduled tasks can go into the calendar or task list)
* Mobile version for easy access with a PDA (beta)

What it costs:

This is donationware. You can download and use it for free with no obligation. If you end up using it a lot and find it useful please consider making a donation (~$20 or whatever you feel it is worth) to encourage future development.

Why I built it:

I needed both a hierarchical to-do list/task manager and a central place to store my tasks. I didn't find one that I liked, so this is the result.

I like being able to look at my scheduled tasks in a calendar view. Instead of building yet another semi-functional calendar view, I created an iCalendar view that can be used with the included PHP iCalendar software or a calendar application like Apple's iCal or Mozilla Calendar. Microsoft Outlook is supposed to support iCalendars in the next version.

Platform independence was important for me as I run this on a Mac at home (for development and testing), on Windows at work (for my to-do list/projects there) and on Linux on my hosted web server (my personal task list). Having the option to run on Windows, Mac, Unix and Linux is just really convenient and keeps lots of options open for the future.

You are free to modify, customize, upgrade the application as you see fit for your personal use. Refer to the license agreement (LICENSE.TXT) for more details.

Enjoy.


Tech Notes:

Platform Independent, runs on Windows, Unix and Mac OS X
Uses free open source database (MySQL) and scripting engine (PHP)
Integration with PHP iCalendar (included)


Requirements:

A Windows, Unix, Linux or Mac OS X system with Apache (or IIS for Windows), PHP and MySQL installed.

PHP is available from:		http://www.php.net/
MySQL is available from:	http://www.mysql.com/

Mac OS X Resources:

If you are running Mac OS X, you can get nicely wrapped versions of PHP and MySQL complete with detailed installation instructions from Marc Liyanage

PHP: 	http://www.entropy.ch/software/macosx/php/
MySQL: 	http://www.entropy.ch/software/macosx/mysql/


Installation:

see the included documentation or view it online:

 http://www.kingdesign.net/tasks-jr/documentation/


Tested System Compatibility:

Mac OS X 10.1.5 - 10.3.8
Windows 2000
Linux running Apache 1.3.26
PHP version 4.1+
MySQL version 3.23.47 - 4.0

Keyboard Shortcuts (English):

On Windows, the modifier is the "Alt" key, on Mac, the modifier is the "Ctrl" key.

	H - Home Screen
	T - New Task Screen
	A - Search Screen
	S - Save Button
	U - Upcoming Tasks Screen
	R - History Screen
	C - Launch PHP iCalendar
	E - Set focus to Title field if it exists


Known Issues:

- Must have a "modern" browser to use main version, old browsers can use PDA/mobile version.
- Several bugs in Safari cause rendering issues. The biggest problem is that buttons don't have labels and the year value isn't set in the date picker. 


Copyright (c) 2002-2005 King Design, Alex King. All rights reserved.
