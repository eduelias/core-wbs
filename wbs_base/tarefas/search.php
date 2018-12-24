<div class="groupBorder"<?
// hack to handle weird spacing with IE and mozilla
	global $HTTP_SERVER_VARS;
	if (strstr(strtolower($HTTP_SERVER_VARS["HTTP_USER_AGENT"]), "msie") != false) {
		print(' style="width: 100%;"');
	}
?>>
	<div class="groupHeader"><? print($language->search["form_title"]); ?></div>
	<div class="groupDescription">
		<? print($language->search["instructions"]); ?>
	</div>
	<table width="100%" cellpadding="0" cellspacing="7" border="0">
	<form name="search" action="index.php" method="get" onsubmit="validate = validateSearchCriteria(); if (validate != true) { alert(validate); return false; }">
		<tr>
			<td colspan="2">
				<input type="text" name="text_query" value="<? if (!empty($_REQUEST["text_query"])) { echo $_REQUEST["text_query"]; } ?>" size="50">
			</td>
			<td width="100%">
				<input type="submit" name="submit" value="<? print($language->search["search_button"]); ?>">
			</td>
		</tr>
		<tr>
			<td width="1%">
				<input type="checkbox" name="include_completed" value="1" <? if (isset($_REQUEST["include_completed"]) && $_REQUEST["include_completed"] == 1) { echo "checked"; } ?>>
			</td>
			<td>
				<span class="hand" onclick="toggleCheckbox(document.search.include_completed);"><? print($language->search["include_completed"]); ?></a>
			</td>
			<td align="right" valign="bottom">
				<a href="javascript:toggleDiv('search_more');"><? print($language->search["more_options"]); ?></a>
			</td>
		</tr>
	</table>
	<div id="search_more" style="border-top: 1px solid #ccc; display: none; padding: 7px;<?
// hack to handle weird spacing with IE and mozilla
	global $HTTP_SERVER_VARS;
	if (strstr(strtolower($HTTP_SERVER_VARS["HTTP_USER_AGENT"]), "msie") != false) {
		print(' width: 100%;');
	}
?>">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr valign="top">
				<td width="50%">
					<table width="100%" cellpadding="0" cellspacing="5">
						<tr>
							<td width="1%">
								<div class="search_label">
									<? print($language->form["id"]); ?>
								</div>
							</td>
							<td>
								<input name="search_ID" type="text" value="<? if (!empty($_REQUEST["search_ID"])) { echo $_REQUEST["search_ID"]; } ?>" class="one_pixel_border" style="width: 50px;">
							</td>
						</tr>
					</table>
					<table width="100%" cellpadding="0" cellspacing="5">
						<tr>
							<td width="1%">
								<div class="search_label">
									<? print($language->form["parent"]); ?>
								</div>
							</td>
							<td>
								<input name="search_parent" type="text" value="<? if (!empty($_REQUEST["search_parent"])) { echo $_REQUEST["search_parent"]; } ?>" class="one_pixel_border" style="width: 50px;">
								<img src="images/icon_lookup.gif" align="absbottom" height="16" width="16" alt="<? print($language->icons["parent_picker"]); ?>" title="<? print($language->icons["parent_picker"]); ?>" class="hand" onclick="showPicker('parent_search');">
							</td>
						</tr>
					</table>
					<table width="100%" cellpadding="0" cellspacing="5" class="groupTable">
						<tr valign="top">
							<td width="1%">
								<div class="search_label">
									<? print($language->form["status"]); ?>
								</div>
							</td>
							<td>
								<div class="group<? if (empty($_REQUEST["search_status"]) || $_REQUEST["search_status"] == "range") { echo "Active"; } ?>" id="status_0" onclick="setSelectedRadioButton(document.search.search_status, 'range');toggleGroupBackground(this,'status_');">
								<table width="100%" cellpadding="0" cellspacing="5">
									<tr>
										<td width="1%">
											<input type="radio" name="search_status" value="range" <? if (empty($_REQUEST["search_status"]) || $_REQUEST["search_status"] == "range") { echo "checked"; } ?>>
										</td>
										<td width="1%">
											<div class="search_label_group">
												<? print($language->search["more_than"]); ?>
											</div>
										</td>
										<td>
											<input name="search_status_more" type="text" value="<? if (!empty($_REQUEST["search_status_more"])) { echo $_REQUEST["search_status_more"]; } ?>" class="one_pixel_border" style="width: 25px;" maxlength="3"> %
										</td>
									</tr>
									<tr>
										<td width="1%">
											&nbsp;
										</td>
										<td width="1%">
											<div class="search_label_group">
												<? print($language->search["less_than"]); ?>
											</div>
										</td>
										<td>
											<input name="search_status_less" type="text" value="<? if (!empty($_REQUEST["search_status_less"])) { echo $_REQUEST["search_status_less"]; } ?>" class="one_pixel_border" style="width: 25px;" maxlength="3"> %
										</td>
									</tr>
								</table>
								</div>
								<div class="group<? if (isset($_REQUEST["search_status"]) && $_REQUEST["search_status"] == "exact") { echo "Active"; } ?>" id="status_1" onclick="setSelectedRadioButton(document.search.search_status, 'exact');toggleGroupBackground(this,'status_');">
								<table width="100%" cellpadding="0" cellspacing="5">
									<tr>
										<td width="1%">
											<input type="radio" name="search_status" value="exact" <? if (!empty($_REQUEST["search_status"]) && $_REQUEST["search_status"] == "exact") { echo "checked"; } ?>>
										</td>
										<td width="1%">
											<div class="search_label_group">
												<? print($language->search["exactly"]); ?>
											</div>
										</td>
										<td>
											<input name="search_status_exact" type="text" value="<? if (!empty($_REQUEST["search_status_exact"])) { echo $_REQUEST["search_status_exact"]; } ?>" class="one_pixel_border" style="width: 25px;" maxlength="3"> %
										</td>
									</tr>
								</table>
								</div>
							</td>
						</tr>
					</table>
					<table width="100%" cellpadding="0" cellspacing="5">
						<tr>
							<td width="1%">
								<div class="search_label">
									<? print($language->form["url"]); ?>
								</div>
							</td>
							<td>
								<input type="text" name="search_URL" value="<? if (!empty($_REQUEST["search_URL"])) { echo $_REQUEST["search_URL"]; } ?>" class="one_pixel_border" style="width: 200px;">
							</td>
						</tr>
					</table>
				</td>
				<td width="50%">
					<table width="100%" cellpadding="0" cellspacing="5">
						<tr>
							<td width="1%">
								<div class="search_label">
									<? print($language->form["sticky_label"]); ?>
								</div>
							</td>
							<td width="1%">
									<img src="images/icon_container.gif" height="16" width="14" alt="">
							</td>
							<td>
<?
if (!empty($_REQUEST["search_container"])) {
	$selected = $_REQUEST["search_container"];
}
else {
	$selected = "";
}
$temp = array(array(""
                   ,"-----"
                   )
             ,array("yes"
                   ,$language->data["yes"]
                   )
             ,array("no"
                   ,$language->data["no"]
                   )
             );
print_dropdown("search_container", $temp, $selected, "", "");
?>
							</td>
						</tr>
					</table>
					<table width="100%" cellpadding="0" cellspacing="5">
						<tr>
							<td width="1%">
								<div class="search_label">
									<? print($language->form["priority"]); ?>
								</div>
							</td>
							<td width="1%"><input type="checkbox" name="search_priority_lowest" value="1" <? if (isset($_REQUEST["search_priority_lowest"]) && $_REQUEST["search_priority_lowest"] == 1) { echo "checked"; } ?>></td>
							<td width="1%"><img src="images/icon_priority_1.gif" height="16" width="13" alt="<? print($language->variable($language->icons["priority"], get_friendly_priority(1))); ?>" title="<? print($language->variable($language->icons["priority"], get_friendly_priority(1))); ?>" class="hand" onclick="toggleCheckbox(document.search.search_priority_lowest);"></td>
							<td><span class="hand" onclick="toggleCheckbox(document.search.search_priority_lowest);"><? print(get_friendly_priority(1)); ?></span></td>
						</tr>
						<tr>
							<td width="1%">&nbsp;</td>
							<td width="1%"><input type="checkbox" name="search_priority_low" value="1" <? if (isset($_REQUEST["search_priority_low"]) && $_REQUEST["search_priority_low"] == 1) { echo "checked"; } ?>></td>
							<td width="1%"><img src="images/icon_priority_2.gif" height="16" width="13" alt="<? print($language->variable($language->icons["priority"], get_friendly_priority(2))); ?>" title="<? print($language->variable($language->icons["priority"], get_friendly_priority(2))); ?>" class="hand" onclick="toggleCheckbox(document.search.search_priority_low);"></td>
							<td><span class="hand" onclick="toggleCheckbox(document.search.search_priority_low);"><? print(get_friendly_priority(2)); ?></span></td>
						</tr>
						<tr>
							<td width="1%">&nbsp;</td>
							<td width="1%"><input type="checkbox" name="search_priority_medium" value="1" <? if (isset($_REQUEST["search_priority_medium"]) && $_REQUEST["search_priority_medium"] == 1) { echo "checked"; } ?>></td>
							<td width="1%"><img src="images/icon_priority_3.gif" height="16" width="13" alt="<? print($language->variable($language->icons["priority"], get_friendly_priority(3))); ?>" title="<? print($language->variable($language->icons["priority"], get_friendly_priority(3))); ?>" class="hand" onclick="toggleCheckbox(document.search.search_priority_medium);"></td>
							<td><span class="hand" onclick="toggleCheckbox(document.search.search_priority_medium);"><? print(get_friendly_priority(3)); ?></span></td>
						</tr>
						<tr>
							<td width="1%">&nbsp;</td>
							<td width="1%"><input type="checkbox" name="search_priority_high" value="1" <? if (isset($_REQUEST["search_priority_high"]) && $_REQUEST["search_priority_high"] == 1) { echo "checked"; } ?>></td>
							<td width="1%"><img src="images/icon_priority_4.gif" height="16" width="13" alt="<? print($language->variable($language->icons["priority"], get_friendly_priority(4))); ?>" title="<? print($language->variable($language->icons["priority"], get_friendly_priority(4))); ?>" class="hand" onclick="toggleCheckbox(document.search.search_priority_high);"></td>
							<td><span class="hand" onclick="toggleCheckbox(document.search.search_priority_high);"><? print(get_friendly_priority(4)); ?></span></td>
						</tr>
						<tr>
							<td width="1%">&nbsp;</td>
							<td width="1%"><input type="checkbox" name="search_priority_highest" value="1" <? if (isset($_REQUEST["search_priority_highest"]) && $_REQUEST["search_priority_highest"] == 1) { echo "checked"; } ?>></td>
							<td width="1%"><img src="images/icon_priority_5.gif" height="16" width="13" alt="<? print($language->variable($language->icons["priority"], get_friendly_priority(5))); ?>" title="<? print($language->variable($language->icons["priority"], get_friendly_priority(5))); ?>" class="hand" onclick="toggleCheckbox(document.search.search_priority_highest);"></td>
							<td><span class="hand" onclick="toggleCheckbox(document.search.search_priority_highest);"><? print(get_friendly_priority(5)); ?></span></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="5" class="groupTable">
			<tr valign="top">
				<td width="1%">
					<div class="search_label">
						<? print($language->form["date_due"]); ?>
					</div>
				</td>
				<td>
					<div class="group<? if (empty($_REQUEST["search_date_due"]) || $_REQUEST["search_date_due"] == "range") { echo "Active"; } ?>" id="date_due_0" onclick="setSelectedRadioButton(document.search.search_date_due, 'range');toggleGroupBackground(this,'date_due_');">
					<table width="100%" cellpadding="0" cellspacing="5">
						<tr>
							<td width="1%">
								<input type="radio" name="search_date_due" value="range" <? if (empty($_REQUEST["search_date_due"]) || $_REQUEST["search_date_due"] == "range") { echo "checked"; } ?>>
							</td>
							<td width="1%">
								<div class="search_label_group">
									<? print($language->search["after"]); ?>
								</div>
							</td>
							<td>
<?

if (!empty($_REQUEST["search_date_due_after_month"])) {
	$selected = $_REQUEST["search_date_due_after_month"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 13; $i++) {
$temp[] = array(substr($i+100,1)
		   ,$i
		   );
}
$month = get_dropdown("search_date_due_after_month", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_due_after_day"])) {
	$selected = $_REQUEST["search_date_due_after_day"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 32; $i++) {
$temp[] = array(substr($i+100,1)
               ,$i
               );
}
$day = get_dropdown("search_date_due_after_day", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_due_after_year"])) {
	$selected = $_REQUEST["search_date_due_after_year"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = $custom->year_min; $i <= $custom->year_max_existing; $i++) {
	$temp[] = array($i
				   ,$i
				   );
}
$year = get_dropdown("search_date_due_after_year", $temp, $selected, "", "");
for ($i = 0; $i < strlen($custom->date_format); $i++) {
	$temp = substr($custom->date_format, $i, 1);
	switch ($temp) {
		case "y":
			print($year);
			break;
		case "m":
			print($month);
			break;
		case "d":
			print($day);
			break;
	}
}
?>
								<input type="button" value="<? print($language->form["choose_date"]); ?>" onclick="showPicker('date_search_after',selectedDate('search','search_date_due_after'));">
								<input type="button" value="<? print($language->form["clear_date"]); ?>" onclick="setSelectToValue(document.search.search_date_due_after_month, ''); setSelectToValue(document.search.search_date_due_after_day, ''); setSelectToValue(document.search.search_date_due_after_year, '');">
							</td>
						</tr>
						<tr>
							<td width="1%">
								&nbsp;
							</td>
							<td width="1%">
								<div class="search_label_group">
									<? print($language->search["before"]); ?>
								</div>
							</td>
							<td>
<?
if (!empty($_REQUEST["search_date_due_before_month"])) {
	$selected = $_REQUEST["search_date_due_before_month"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 13; $i++) {
$temp[] = array(substr($i+100,1)
		   ,$i
		   );
}
$month = get_dropdown("search_date_due_before_month", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_due_before_day"])) {
	$selected = $_REQUEST["search_date_due_before_day"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 32; $i++) {
$temp[] = array(substr($i+100,1)
               ,$i
               );
}
$day = get_dropdown("search_date_due_before_day", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_due_before_year"])) {
	$selected = $_REQUEST["search_date_due_before_year"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = $custom->year_min; $i <= $custom->year_max_existing; $i++) {
	$temp[] = array($i
				   ,$i
				   );
}
$year = get_dropdown("search_date_due_before_year", $temp, $selected, "", "");
for ($i = 0; $i < strlen($custom->date_format); $i++) {
	$temp = substr($custom->date_format, $i, 1);
	switch ($temp) {
		case "y":
			print($year);
			break;
		case "m":
			print($month);
			break;
		case "d":
			print($day);
			break;
	}
}
?>
								<input type="button" value="<? print($language->form["choose_date"]); ?>" onclick="showPicker('date_search_before',selectedDate('search','search_date_due_before'));">
								<input type="button" value="<? print($language->form["clear_date"]); ?>" onclick="setSelectToValue(document.search.search_date_due_before_month, ''); setSelectToValue(document.search.search_date_due_before_day, ''); setSelectToValue(document.search.search_date_due_before_year, '');">
							</td>
						</tr>
					</table>
					</div>
					<div class="group<? if (isset($_REQUEST["search_date_due"]) && $_REQUEST["search_date_due"] == "exact") { echo "Active"; } ?>" id="date_due_1" onclick="setSelectedRadioButton(document.search.search_date_due, 'exact');toggleGroupBackground(this,'date_due_');">
					<table width="100%" cellpadding="0" cellspacing="5">
						<tr>
							<td width="1%">
								<input type="radio" name="search_date_due" value="exact" <? if (isset($_REQUEST["search_date_due"]) && $_REQUEST["search_date_due"] == "exact") { echo "checked"; } ?>>
							</td>
							<td width="1%">
								<div class="search_label_group">
									<? print($language->search["exactly"]); ?>
								</div>
							</td>
							<td>
<?
if (!empty($_REQUEST["search_date_due_month"])) {
	$selected = $_REQUEST["search_date_due_month"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 13; $i++) {
$temp[] = array(substr($i+100,1)
		   ,$i
		   );
}
$month = get_dropdown("search_date_due_month", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_due_day"])) {
	$selected = $_REQUEST["search_date_due_day"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 32; $i++) {
$temp[] = array(substr($i+100,1)
               ,$i
               );
}
$day = get_dropdown("search_date_due_day", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_due_year"])) {
	$selected = $_REQUEST["search_date_due_year"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = $custom->year_min; $i <= $custom->year_max_existing; $i++) {
	$temp[] = array($i
				   ,$i
				   );
}
$year = get_dropdown("search_date_due_year", $temp, $selected, "", "");
for ($i = 0; $i < strlen($custom->date_format); $i++) {
	$temp = substr($custom->date_format, $i, 1);
	switch ($temp) {
		case "y":
			print($year);
			break;
		case "m":
			print($month);
			break;
		case "d":
			print($day);
			break;
	}
}
?>
								<input type="button" value="<? print($language->form["choose_date"]); ?>" onclick="showPicker('date_search',selectedDate('search','search_date_due'));">
								<input type="button" value="<? print($language->form["clear_date"]); ?>" onclick="setSelectToValue(document.search.search_date_due_month, ''); setSelectToValue(document.search.search_date_due_day, ''); setSelectToValue(document.search.search_date_due_year, '');">
							</td>
						</tr>
					</table>
					</div>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="5">
			<tr valign="top">
				<td width="1%">
					<div class="search_label">
						<? print($language->form["date_modified"]); ?>
					</div>
				</td>
				<td>
					<div class="group<? if (empty($_REQUEST["search_date_modified"]) || $_REQUEST["search_date_modified"] == "range") { echo "Active"; } ?>" id="date_modified_0" onclick="setSelectedRadioButton(document.search.search_date_modified, 'range');toggleGroupBackground(this,'date_modified_');">
					<table width="100%" cellpadding="0" cellspacing="5">
						<tr>
							<td width="1%">
								<input type="radio" name="search_date_modified" value="range" <? if (empty($_REQUEST["search_date_modified"]) || $_REQUEST["search_date_modified"] == "range") { echo "checked"; } ?>>
							</td>
							<td width="1%">
								<div class="search_label_group">
									<? print($language->search["after"]); ?>
								</div>
							</td>
							<td>
<?

if (!empty($_REQUEST["search_date_modified_after_month"])) {
	$selected = $_REQUEST["search_date_modified_after_month"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 13; $i++) {
$temp[] = array(substr($i+100,1)
		   ,$i
		   );
}
$month = get_dropdown("search_date_modified_after_month", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_modified_after_day"])) {
	$selected = $_REQUEST["search_date_modified_after_day"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 32; $i++) {
$temp[] = array(substr($i+100,1)
               ,$i
               );
}
$day = get_dropdown("search_date_modified_after_day", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_modified_after_year"])) {
	$selected = $_REQUEST["search_date_modified_after_year"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = $custom->year_min; $i <= $custom->year_max_existing; $i++) {
	$temp[] = array($i
				   ,$i
				   );
}
$year = get_dropdown("search_date_modified_after_year", $temp, $selected, "", "");
for ($i = 0; $i < strlen($custom->date_format); $i++) {
	$temp = substr($custom->date_format, $i, 1);
	switch ($temp) {
		case "y":
			print($year);
			break;
		case "m":
			print($month);
			break;
		case "d":
			print($day);
			break;
	}
}
?>
								<input type="button" value="<? print($language->form["choose_date"]); ?>" onclick="showPicker('date_modified_search_after',selectedDate('search','search_date_modified_after'));">
								<input type="button" value="<? print($language->form["clear_date"]); ?>" onclick="setSelectToValue(document.search.search_date_modified_after_month, ''); setSelectToValue(document.search.search_date_modified_after_day, ''); setSelectToValue(document.search.search_date_modified_after_year, '');">
							</td>
						</tr>
						<tr>
							<td width="1%">
								&nbsp;
							</td>
							<td width="1%">
								<div class="search_label_group">
									<? print($language->search["before"]); ?>
								</div>
							</td>
							<td>
<?
if (!empty($_REQUEST["search_date_modified_before_month"])) {
	$selected = $_REQUEST["search_date_modified_before_month"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 13; $i++) {
$temp[] = array(substr($i+100,1)
		   ,$i
		   );
}
$month = get_dropdown("search_date_modified_before_month", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_modified_before_day"])) {
	$selected = $_REQUEST["search_date_modified_before_day"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 32; $i++) {
$temp[] = array(substr($i+100,1)
               ,$i
               );
}
$day = get_dropdown("search_date_modified_before_day", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_modified_before_year"])) {
	$selected = $_REQUEST["search_date_modified_before_year"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = $custom->year_min; $i <= $custom->year_max_existing; $i++) {
	$temp[] = array($i
				   ,$i
				   );
}
$year = get_dropdown("search_date_modified_before_year", $temp, $selected, "", "");
for ($i = 0; $i < strlen($custom->date_format); $i++) {
	$temp = substr($custom->date_format, $i, 1);
	switch ($temp) {
		case "y":
			print($year);
			break;
		case "m":
			print($month);
			break;
		case "d":
			print($day);
			break;
	}
}
?>
								<input type="button" value="<? print($language->form["choose_date"]); ?>" onclick="showPicker('date_modified_search_before',selectedDate('search','search_date_modified_before'));">
								<input type="button" value="<? print($language->form["clear_date"]); ?>" onclick="setSelectToValue(document.search.search_date_modified_before_month, ''); setSelectToValue(document.search.search_date_modified_before_day, ''); setSelectToValue(document.search.search_date_modified_before_year, '');">
							</td>
						</tr>
					</table>
					</div>
					<div class="group<? if (isset($_REQUEST["search_date_modified"]) && $_REQUEST["search_date_modified"] == "exact") { echo "Active"; } ?>" id="date_modified_1" onclick="setSelectedRadioButton(document.search.search_date_modified, 'exact');toggleGroupBackground(this,'date_modified_');">
					<table width="100%" cellpadding="0" cellspacing="5">
						<tr>
							<td width="1%">
								<input type="radio" name="search_date_modified" value="exact" <? if (isset($_REQUEST["search_date_modified"]) && $_REQUEST["search_date_modified"] == "exact") { echo "checked"; } ?>>
							</td>
							<td width="1%">
								<div class="search_label_group">
									<? print($language->search["exactly"]); ?>
								</div>
							</td>
							<td>
<?
if (!empty($_REQUEST["search_date_modified_month"])) {
	$selected = $_REQUEST["search_date_modified_month"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 13; $i++) {
$temp[] = array(substr($i+100,1)
		   ,$i
		   );
}
$month = get_dropdown("search_date_modified_month", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_modified_day"])) {
	$selected = $_REQUEST["search_date_modified_day"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = 1; $i < 32; $i++) {
$temp[] = array(substr($i+100,1)
               ,$i
               );
}
$day = get_dropdown("search_date_modified_day", $temp, $selected, "", "");

if (!empty($_REQUEST["search_date_modified_year"])) {
	$selected = $_REQUEST["search_date_modified_year"];
}
else {
	$selected = "";
}
$temp = array(array("",""));
for ($i = $custom->year_min; $i <= $custom->year_max_existing; $i++) {
	$temp[] = array($i
				   ,$i
				   );
}
$year = get_dropdown("search_date_modified_year", $temp, $selected, "", "");
for ($i = 0; $i < strlen($custom->date_format); $i++) {
	$temp = substr($custom->date_format, $i, 1);
	switch ($temp) {
		case "y":
			print($year);
			break;
		case "m":
			print($month);
			break;
		case "d":
			print($day);
			break;
	}
}
?>
								<input type="button" value="<? print($language->form["choose_date"]); ?>" onclick="showPicker('date_modified_search',selectedDate('search','search_date_modified'));">
								<input type="button" value="<? print($language->form["clear_date"]); ?>" onclick="setSelectToValue(document.search.search_date_modified_month, ''); setSelectToValue(document.search.search_date_modified_day, ''); setSelectToValue(document.search.search_date_modified_year, '');">
							</td>
						</tr>
					</table>
					</div>
				</td>
			</tr>
		</table>
	</div>
		<input type="hidden" name="sort" value="<? if (!empty($_REQUEST["sort"])) { echo $_REQUEST["sort"]; } else { echo "title"; } ?>">
		<input type="hidden" name="screen" value="search">
		<input type="hidden" name="action" value="search">
	</div>
</div>
<img src="images/clear.gif" height="10" width="1">
<?
if (isset($_REQUEST["text_query"]) || isset($_REQUEST["list"])) {
	print_task_list($tasks, $language->search["results_title"], $screen, $_REQUEST["sort"], $return_query);
}
?>