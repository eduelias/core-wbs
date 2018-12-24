<?php

// Hack to pass authentication to the Tasks iCalendar
// Copyright 2004 Alex King, http://www.alexking.org/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>iCalendar Log In</title>
		<style>
			body {
				background: #e8e8e8;
				text-align: center;
			}
			form {
				margin: 30px auto;
				text-align: left;
				width: 400px;
			}
			fieldset {
				background: #fff;
				border: 1px solid #999;
				padding: 10px 10px 20px 10px;
			}
			legend {
				font-weight: bold;
			}
			p {
				clear: both;
			}
			label {
				display: block;
				float: left;
				padding: 0 10px 0 0;
				text-align: right;
				width: 125px;
			}
			#username_401, #password_401 {
				clear: right;
				display: block;
				float: left;
				margin: 0 0 7px 0;
			}
			#submit {
				clear: both;
				padding: 0 0 0 130px;
			}
		</style>
	</head>
	<body>
		<form method="post" action="<?php print($_SERVER['PHP_SELF'].'?'.$_SERVER["QUERY_STRING"]); ?>">
			<fieldset>
				<legend>iCalendar Log In</legend>
				<p>PHP iCalendar wasn't able to open the specified iCalendar.</p>
				<p>If the iCalendar requires a username/password please enter it below. Otherwise double-check the URL of the iCalendar.</p>
				<p>
					<label for="username_401">Login:</label>
					<input type="text" name="username_401" id="username_401" value="" />
				</p>
				<p>
					<label for="password_401">Password:</label>
					<input type="password" name="password_401" id="password_401" value="" />
				</p>
				<p id="submit">
					<input type="submit" name="submit" value="Log In" />
				</p>
			</fieldset>
		</form>
	</body>
</html>