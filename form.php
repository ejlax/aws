<?php ob_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Registration Form</title>
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

	<body onLoad="collapseAll()">

		<div id="mainForm">

			<div id="formHeader">
				<h2 class="formInfo">Pearson AWS Portal Registration Form</h2>
				<p class="formInfo"></p>
			</div>
			<BR/>
			<!-- begin form -->
			<form method=post enctype=multipart/form-data action='' onSubmit="return validatePage1();">
				<ul class=mainForm id="mainForm_1">
					<li class="mainForm" id="fieldBox_1">
						<label class="formFieldQuestion">First Name&nbsp;*</label>
						<input class=mainForm type=text name=firstName id=firstName size='20' value=''>
					</li>
					<li class="mainForm" id="fieldBox_2">
						<label class="formFieldQuestion">Last Name&nbsp;*</label>
						<input class=mainForm type=text name=lastName id=lastName size='20' value=''>
					</li>
					<li class="mainForm" id="fieldBox_3">
						<label class="formFieldQuestion">Your Email Address:&nbsp;*</label>
						<input class=mainForm type=text name=email id=email size='20' value=''>
					</li>
					<li class="mainForm" id="fieldBox_4">
						<label class="formFieldQuestion">Your Employee ID:&nbsp;*</label>
						<input class=mainForm type=text name=employeeId id=employeeId size='20' value=''>
					</li>
					<li class="mainForm" id="fieldBox_5">
						<label class="formFieldQuestion">Password&nbsp;*</label>
						<input class=mainForm type=password name=password id=password size='20' value=''>
					</li>
					<li class="mainForm" id="fieldBox_6">
						<label class="formFieldQuestion">Cost Center&nbsp;*&nbsp;<a class=info href=#><img src=imgs/tip_small.png border=0><span class=infobox>Please select your cost center for billing and other accounting purposes</span></a></label>
						<select class=mainForm name=costCenter id=costCenter>
							<option value=''></option>
							<option value="69333">Implementation Services</option>
							<option value="69101">Cloud Operations</option>
							<option value="69501">SIS Operations</option>
							<option value="69555">Quality Assurance</option>
							<option value="69599">Development</option>
						</select>
					</li>
					<!-- end of this page -->
					<!-- page validation -->
					<SCRIPT type=text/javascript>
						<!--
						function validatePage1() {
							retVal = true;
							if (validateField('firstName', 'fieldBox_1', 'text', 1) == false)
								retVal = false;
							if (validateField('lastName', 'fieldBox_2', 'text', 1) == false)
								retVal = false;
							if (validateField('email', 'fieldBox_3', 'text', 1) == false)
								retVal = false;
							if (validateField('employeeId', 'fieldBox_4', 'text', 1) == false)
								retVal = false;
							if (validateField('password', 'fieldBox_5', 'password', 1) == false)
								retVal = false;
							if (validateField('costCenter', 'fieldBox_6', 'menu', 1) == false)
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
						<input id="saveForm" class="mainForm" type="submit" value="Submit" />
					</li>
			</form>
			<!-- end of form -->
			<!-- close the display stuff for this page -->
			</ul>
		</div>
		<div id="footer">
			<p class="footer">
				<!--  <a class=footer href=http://phpformgen.sourceforge.net>Generated by phpFormGenerator</a> -->
			</p>
		</div>
	</body>
</html>
<?php
//ssession_start();
include_once('connect.php');
include_once('salt.php');
if(isset($_POST['firstName']) and isset($_POST['lastName']) and isset ($_POST['email']) and isset($_POST['employeeId']) and isset($_POST['password']) and isset($_POST['costCenter'])){
	$fname=$_POST['firstName'];
	$lname=$_POST['lastName'];
	$email=$_POST['email'];
	$employeeId=$_POST['employeeId'];
	$cCenter=$_POST['costCenter'];
	$pwd=sha1($_POST['password'].$pepper);
	$sql="INSERT INTO users(firstName,lastName,email,employeeId,password,salt) VALUES('$fname','$lname','$email','$employeeId','$pwd','$salt')";
	//echo $sql."<br>";
	mysql_query($sql,$link);
	//$_SESSION['empId'] = $employeeId;
	//$_SESSION['cCenter'] = $cCenter;
	header('location:confirm.php');//goto new location
}
ob_flush();
?>