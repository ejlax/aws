<?php ob_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>AWS Portal Login by Pearson</title>
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
				<h2 class="formInfo">Pearson AWS Instance Portal Login</h2>
				<p class="formInfo"></p>
			</div>
			<BR/>
			<!-- begin form -->
			<form method=post action= >
				<ul class=mainForm id="mainForm_1">
					<li class="mainForm" id="email">
						<label class="formFieldQuestion">Email Address&nbsp;*&nbsp;<a class=info href=#><img src=imgs/tip_small.png border=0><span class=infobox>The email address you registered with.</span></a></label>
						<input class=mainForm type=text name=email id=email size='20' value=''>
					</li>
					<li class="mainForm" id="password">
						<label class="formFieldQuestion">Password&nbsp;*</label>
						<input class=mainForm type=password name=password id=password size='20' value=''>
					</li>
					<!-- end of this page -->

					<!--  page validation  -->
					<!--  <SCRIPT type=text/javascript>

					function validatePage1()
					{
					retVal = true;
					if (validateField('field_1','fieldBox_1','text',1) == false)
					retVal=false;
					if (validateField('field_2','fieldBox_2','text',1) == false)
					retVal=false;

					if(retVal == false)
					{
					alert('Please correct the errors.  Fields marked with an asterisk (*) are required');
					return false;
					}
					return retVal;
					}

					</SCRIPT> -->

					<!-- end page validaton -->

					<!-- next page buttons -->
					<li class="mainForm">
						<input id="saveForm" class="mainForm" type="submit" value="Log In" />
					</li>
			</form>
			<!-- end of form -->
			<!-- close the display stuff for this page -->
			</ul>
		</div>
		<div id="footer">
			<p class="footer">
				<!-- <a class=footer href=http://phpformgen.sourceforge.net>Generated by phpFormGenerator</a> -->
			</p>
		</div>
	</body>
</html>
<?php
ob_start();
include_once ('connect.php');
include_once ('login/salt.php');
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the runtime 
    session_destroy();   // destroy session data in storage
    echo "ERROR";
}
if (!isset($_SESSION['LAST_ACTIVITY'])) {
session_start();
$_SESSION['LAST_ACTIVITY'] = time(); 
//echo $_SESSION['LAST_ACTIVITY'];// update last activity time stamp
	if (isset($_POST['email']) and isset($_POST['password'])) {
		$user = $_POST['email'];
		$pwd = sha1($_POST['password'].$pepper);
		$sql = "SELECT COUNT(id) FROM users WHERE email='$user' AND password='$pwd'";
		$sql1 = "SELECT salt FROM users WHERE email='$user' AND password='$pwd'";
		$sql2 = "SELECT email,password FROM users WHERE email='$user'";
		$result= mysql_query($sql2,$link);
		$email = mysql_fetch_array($result);
		//echo $sql2."<br>";
		//echo $email[0]; 
		if($email[0] == $user){ 
			$result = mysql_query($sql, $link);
			$result2 = mysql_query($sql1, $link);
			list($salt1) = mysql_fetch_array($result2);
			list($count) = mysql_fetch_array($result);
			if ($count > 0) {
				//setcookie('user',$user,strtotime('+1 day'));
				//setcookie('user', $user);
				$_SESSION['salt'] = $salt1;
				$_SESSION['pwd'] = $pwd;
				$_SESSION['user'] = $user;
				$time = time();
				$_SESSION['loginTime'] = $time;
				$hash = sha1($user.$time.$salt1);
				$_SESSION['hash'] = $hash;
				//setcookie('hash', $hash);
				//echo $_COOKIE['user'];
				header('location:auth_user.php');
				}
			echo "Bad Username or Password. <a href='reset_password.php'>Reset Password?</a><br>";
			}else{
		echo "Bad Username or Password. <a href='reset_password.php'>Reset Password?</a><br>";
		}
	}
}
ob_flush();
$time = getdate();
echo $time[weekday].",&nbsp".$time[month]."&nbsp".$time[mday].",&nbsp".$time[year]."<br>";
echo "<a href='form.php'>Create Account</a>";
?>