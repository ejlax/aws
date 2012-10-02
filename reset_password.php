<?php
//"Password reset file";
ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>AWS Portal Password Reset</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link href="style.css" rel="stylesheet" type="text/css">
		<!-- calendar stuff -->
		<link rel="stylesheet" type="text/css" href="calendar/calendar-blue2.css" />
		<script type="text/javascript" src="calendar/calendar.js"></script>
		<script type="text/javascript" src="calendar/calendar-en.js"></script>
		<script type="text/javascript" src="calendar/calendar-setup.js"></script>
		<!-- END calendar stuff -->
		<!-- expand/collapse function -->
		<SCRIPT type=text/javascript>
			<!--
			function collapseElem(obj) {
				var el = document.getElementById(obj);
				el.style.display = 'none';
			}

			function expandElem(obj) {
				var el = document.getElementById(obj);
				el.style.display = '';
			}

			//-->
		</SCRIPT>
		<!-- expand/collapse function -->

		<!-- expand/collapse function -->
		<SCRIPT type=text/javascript>
			<!--

			// collapse all elements, except the first one
			function collapseAll() {
				var numFormPages = 1;

				for ( i = 2; i <= numFormPages; i++) {
					currPageId = ('mainForm_' + i);
					collapseElem(currPageId);
				}
			}

			//-->
		</SCRIPT>
		<!-- expand/collapse function -->

		<!-- validate -->
		<SCRIPT type=text/javascript>
			<!--
			function validateField(fieldId, fieldBoxId, fieldType, required) {
				fieldBox = document.getElementById(fieldBoxId);
				fieldObj = document.getElementById(fieldId);

				if (fieldType == 'text' || fieldType == 'textarea' || fieldType == 'password' || fieldType == 'file' || fieldType == 'phone' || fieldType == 'website') {
					if (required == 1 && fieldObj.value == '') {
						fieldObj.setAttribute("class", "mainFormError");
						fieldObj.setAttribute("className", "mainFormError");
						fieldObj.focus();
						return false;
					}

				} else if (fieldType == 'menu' || fieldType == 'country' || fieldType == 'state') {
					if (required == 1 && fieldObj.selectedIndex == 0) {
						fieldObj.setAttribute("class", "mainFormError");
						fieldObj.setAttribute("className", "mainFormError");
						fieldObj.focus();
						return false;
					}

				} else if (fieldType == 'email') {
					if ((required == 1 && fieldObj.value == '') || (fieldObj.value != '' && !validate_email(fieldObj.value))) {
						fieldObj.setAttribute("class", "mainFormError");
						fieldObj.setAttribute("className", "mainFormError");
						fieldObj.focus();
						return false;
					}

				}

			}

			function validate_email(emailStr) {
				apos = emailStr.indexOf("@");
				dotpos = emailStr.lastIndexOf(".");

				if (apos < 1 || dotpos - apos < 2) {
					return false;
				} else {
					return true;
				}
			}

			function validateDate(fieldId, fieldBoxId, fieldType, required, minDateStr, maxDateStr) {
				retValue = true;

				fieldBox = document.getElementById(fieldBoxId);
				fieldObj = document.getElementById(fieldId);
				dateStr = fieldObj.value;

				if (required == 0 && dateStr == '') {
					return true;
				}

				if (dateStr.charAt(2) != '/' || dateStr.charAt(5) != '/' || dateStr.length != 10) {
					retValue = false;
				} else// format's okay; check max, min
				{
					currDays = parseInt(dateStr.substr(0, 2), 10) + parseInt(dateStr.substr(3, 2), 10) * 30 + parseInt(dateStr.substr(6, 4), 10) * 365;
					//alert(currDays);

					if (maxDateStr != '') {
						maxDays = parseInt(maxDateStr.substr(0, 2), 10) + parseInt(maxDateStr.substr(3, 2), 10) * 30 + parseInt(maxDateStr.substr(6, 4), 10) * 365;
						//alert(maxDays);
						if (currDays > maxDays)
							retValue = false;
					}

					if (minDateStr != '') {
						minDays = parseInt(minDateStr.substr(0, 2), 10) + parseInt(minDateStr.substr(3, 2), 10) * 30 + parseInt(minDateStr.substr(6, 4), 10) * 365;
						//alert(minDays);
						if (currDays < minDays)
							retValue = false;
					}
				}

				if (retValue == false) {
					fieldObj.setAttribute("class", "mainFormError");
					fieldObj.setAttribute("className", "mainFormError");
					fieldObj.focus();
					return false;
				}
			}

			//-->
		</SCRIPT>
		<!-- end validate -->
	</head>
	<h3>
	<div id="top"> 
		<a class="menu_top" href="form.php">Create Account</a> / 
		<a class="menu_top" href="login.php">Login</a> 
		<!--  <a class="menu_top" href="reset_password.php">Reset Password</a> / -->
	</div>
	</h3>
	<body onLoad="collapseAll()">
		<div id="mainForm">
			<div id="formHeader">
				<h2 class="formInfo">Pearson AWS Instance Portal Password Reset</h2>
				<p class="formInfo"></p>
			</div>
			<BR/>
			<!-- begin form -->
			<form method=post action='' onSubmit="return validatePage1();">
				<ul class=mainForm id="mainForm_1">
					<li class="mainForm" id="fieldBox_1">
						<label class="formFieldQuestion">New&nbsp;Password&nbsp*&nbsp;<a class=info href=#><img src=imgs/tip_small.png border=0><span class=infobox>The email address you registered with.</span></a></label>
						<input class=mainForm type=password name=new_password id=new_password size='20' value=''>
					</li>
					<li class="mainForm" id="fieldBox_2">
						<label class="formFieldQuestion">Verify&nbsp;Password&nbsp;*</label>
						<input class=mainForm type=password name=verify_password id=verify_password size='20' value=''>
					</li>
					<li class="mainForm" id="fieldBox_3">
						<label class="formFieldQuestion">Verify&nbsp;EmployeeID&nbsp;*</label>
						<input class=mainForm type=text name=employeeId id=employeeId size='20' value=''>
					</li>
					<!-- end of this page -->

					<!--  page validation  -->
					<SCRIPT type=text/javascript>
						<!--
						function validatePage1() {
							retVal = true;
							if (validateField('new_password', 'fieldBox_1', 'password', 1) == false)
								retVal = false;
							if (validateField('verify_password', 'fieldBox_2', 'password', 1) == false)
								retVal = false;
							if (validateField('employeeId', 'fieldBox_3', 'text', 1) == false)
								retVal = false;
							if (retVal == false) {
								alert('Please correct the errors.  Fields marked with an asterisk (*) are required');
								return false;
							}
							return retVal;
						}
						//-->
					</SCRIPT>

					<!-- end page validaton -->

					<!-- next page buttons -->
					<li class="mainForm">
						<input id="saveForm" class="mainForm" type="submit" value="Reset Password" />
					</li>
			</form>
			<!-- end of form -->
			<!-- close the display stuff for this page -->
			</ul>
		</div>
				<script type="text/javascript" src="js/nav.js"></script>
	</body>
</html>
<?php
session_start();
include_once ('connect.php');
include_once ('login/salt.php');
if (isset($_POST['new_password']) and isset($_POST['verify_password']) and isset($_POST['employeeId'])) {
	$empId = ($_POST['employeeId']);
	$new_pwd = sha1($_POST['new_password'].$pepper);
	$verify_pwd = sha1($_POST['verify_password'].$pepper);
	if ($new_pwd == $verify_pwd){
		$sql = "SELECT DISTINCT id FROM users WHERE employeeId='$empId'";
		$result = mysql_query($sql,$link);
		//echo $sql."<br>";
		list($id)=mysql_fetch_array($result);
		//echo $id."<br>";
		$query = "SELECT password FROM users WHERE id=$id";
		$result = mysql_query($query);
		list($old_pwd)=mysql_fetch_array($result);
		$query = "UPDATE users SET password='$new_pwd' WHERE id=$id";
		mysql_query($query,$link);
		$query = "SELECT password FROM users WHERE id=$id";
		$result = mysql_query($query,$link);
		list($new_pwd) = mysql_fetch_array($result);
		//echo $query."<br>";
		if ($new_pwd == $verify_pwd) {
			echo "Your new password has been successfully changed. You may now <a href='login.php'>login</a><p></p>";
			}
	}else{
		echo "<b>Passwords do not match. Please re-enter your new password.<b>";
	} 
}
ob_flush();
$time = getdate();
echo $time[weekday].",&nbsp".$time[month]."&nbsp".$time[mday].",&nbsp".$time[year]."<br>";
?>


