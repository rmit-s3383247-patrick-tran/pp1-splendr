<?php
session_start();
$db = mysqli_connect("localhost", "root", "ybk2588098", "accounts" );
$username = $_SESSION["id"];
$get = "SELECT user_id FROM members WHERE username = '$username'";
$result = $db->query($get);
if ($row = mysqli_fetch_assoc($result)) {
	$user_id = $row["user_id"];
}else{
	echo "Not working";
}

if (isset($_POST['pref_btn'])) {
	$height = mysqli_real_escape_string($db, $_POST['height']);
	$jobs = mysqli_real_escape_string($db, $_POST['jobs']);
	$body = mysqli_real_escape_string($db, $_POST['body']);
	$education = mysqli_real_escape_string($db, $_POST['education']);
	$ethnic = mysqli_real_escape_string($db, $_POST['ethnic']);
 	$drink = mysqli_real_escape_string($db, $_POST['drink']);
	$smoke = mysqli_real_escape_string($db, $_POST['smoke']);
	$gamble = mysqli_real_escape_string($db, $_POST['gamble']);
	$religion = mysqli_real_escape_string($db, $_POST['religion']);

	$sql = "INSERT INTO information(user_id, height, jobs, body, education, ethnic, drink, smoke, gamble, religion) VALUES('user_id', 'height', 'jobs', 'body', 'education', 'ethnic', 'drink', 'smoke', 'gamble', 'religion')";
	mysqli_query($db, $sql);
}
 ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/preferencesstyle.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <body>
        <nav>
            <ul>
                <li><a href="#">Matches</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Account</a></li>
            </ul>
        </nav>

        <h1>About Me</h1>
        <div id="pref" class = "preferences">
        <form method = "POST" action ="preference3.php">
					<?php echo $user_id; ?>
            <p>How tall are you?</p>
            <input type="number" name ="height" id="height"/><lable> CM</lable>

            <p>My occupation is</p>
                <select name="jobs">
                    <option></option>
                    <option value="acc">Accountant</option>
                    <option value="asa">Advertising Sales Agent</option>
                    <option value="am">Aircraft Mechanic</option>
                    <option value="ap">Airline Pilot</option>
                    <option value="ass">Airport Security Screener</option>
                    <option value="ara">Airline Reservations Agent</option>
                    <option value="atc">Air Traffic Controller</option>
                    <option value="arc">Architect</option>
                    <option value="am">Auto Mechanic</option>
                    <option value="bt">Bank Teller</option>
                    <option value="bar">Bartender</option>
                    <option value="bt">Biological Technician</option>
                    <option value="be">Biomedical Engineer</option>
                    <option value="ba">Business Analyst</option>
                    <option value="ch">Chef</option>
                    <option value="ce">Chemical Engineer</option>
                    <option value="cw">Childcare Worker</option>
                    <option value="chiro">Chiropractor</option>
                    <option value="cp">Computer Programmer</option>
                    <option value="csa">Computer Systems Analyst</option>
                    <option value="cstruct">Construction </option>
                    <option value="csultant">Consultant</option>
                    <option value="da">Database Administrator</option>
                    <option value="dh">Dental Hygienist</option>
                    <option value="dent">Dentist</option>
                    <option value="dir">Director</option>
                    <option value="diet">Dietitian/Nutritionist</option>
                    <option value="doc">Doctor</option>
                    <option value="ed">Editor</option>
                    <option value="elc">Electrician</option>
                    <option value="epi">Epidemiologist</option>
                    <option value="event">Event/Meeting Planner</option>
                    <option value="fd">Fashion Designer</option>
                    <option value="fa">Financial Advisor</option>
                    <option value="fm">Financial Manager</option>
                    <option value="fire">Firefighter</option>
                    <option value="fit">Fitness Trainer</option>
                    <option value="fa">Flight Attendant</option>
                    <option value="fd">Funeral Director</option>
                    <option value="jd">Judge</option>
                    <option value="gd">Graphic Designer</option>
                    <option value="gc">Guidance Counselor</option>
                    <option value="hair">Hairdressers</option>
                    <option value="hra">Human Resources Assistan</option>
                    <option value="hrm">Human Resources Manager</option>
                    <option value="id">Industrial Designer</option>
                    <option value="id2">Interior Designer</option>
                    <option value="intpret">Interpreter </option>
                    <option value="law">Lawyer</option>
                    <option value="lib">Librarian</option>
                    <option value="manu">Manufacturing </option>
                    <option value="ma">Market Analyst</option>
                    <option value="me">Mechanical Engineer</option>
                    <option value="mlt">Medical Laboratory Technician</option>
                    <option value="model">Model</option>
                    <option value="ot">Occupational Therapist</option>
                    <option value="pmedic">Paramedics</option>
                    <option value="plegal">Paralegal </option>
                    <option value="pt">Personal Trainer</option>
                    <option value="pharm">Pharmacist</option>
                    <option value="pt">Pharmacy Technician</option>
                    <option value="photo">Photographer</option>
                    <option value="pt2">Physical Therapist</option>
                    <option value="plumb">Plumber</option>
                    <option value="po">Police Officer</option>
                    <option value="psw">Postal Service Worker</option>
                    <option value="prod">Producer</option>
                    <option value="pr">Public Relations </option>
                    <option value="recep">Receptionist</option>
                    <option value="ret">Retail </option>
                    <option value="sec">Secretary </option>
                    <option value="sg">Security Guard</option>
                    <option value="sm">Social Media </option>
                    <option value="sw">Social Worker</option>
                    <option value="sd">Software Developer</option>
                    <option value="set">Special Education Teacher </option>
                    <option value="so">Subway Operator</option>
                    <option value="teach">Teacher</option>
                    <option value="vet">Veterinarian</option>
                    <option value="wait">Waiter/Waitress</option>
                    <option value="web">Web Developer </option>
                    <option value="write">Writer</option>
                </select>

            <p>What is your body type?</p>
                <select name="body">
                    <option></option>
                    <option value="slim">Slim</option>
                    <option value="ath">Athletic</option>
                    <option value="avg">Average</option>
                    <option value="over">Overweight</option>
                    <option value="obese">Obese</option>
                </select>


            <p>What is your highest level of education?</p>
                <select name="education">
                    <option></option>
                    <option value="hsg">High School Graduate</option>
                    <option value="cd">Certificate Diploma</option>
                    <option value="bchlr">Bachelor's Degree</option>
                    <option value="mstr">Master's Degree</option>
                    <option value="dctr">Doctorate</option>
                </select>

            <p>What is your ethnicity?</p>
                <select name="ethnic">
                    <option></option>
                    <option value="asn">Asian</option>
                    <option value="blk">Black/African</option>
                    <option value="white">Caucasian</option>
                    <option value="latino">Hispanic</option>
                    <option value="arab">Middle Eastern</option>
                    <option value="othr">Other</option>
                </select>

            <p>How often do you drink?</p>
                <select name="drink">
                    <option></option>
                    <option value="all">All the time</option>
                    <option value="most">Most of the time</option>
                    <option value="some">Sometimes</option>
                    <option value="social">Socially</option>
                    <option value="never">Never</option>
                </select>

            <p>How often do you smoke?</p>
                <select name="smoke">
                    <option></option>
                    <option value="all">All the time</option>
                    <option value="most">Most of the time</option>
                    <option value="some">Sometimes</option>
                    <option value="social">Socially</option>
                    <option value="never">Never</option>
                </select>

            <p>How often do you gamble?</p>
                <select name="gamble">
                    <option></option>
                    <option value="all">All the time</option>
                    <option value="most">Most of the time</option>
                    <option value="some">Sometimes</option>
                    <option value="social">Socially</option>
                    <option value="never">Never</option>
                </select>

            <p>What is your religion?</p>
                <select name="religion">
                    <option></option>
                    <option value="ath">Atheist</option>
                    <option value="agn">Agnostic</option>
                    <option value="budd">Buddhism</option>
                    <option value="cath">Catholic</option>
                    <option value="christ">Christianity</option>
                    <option value="hindu">Hinduism</option>
                    <option value="islam">Islam</option>
                    <option value="jew">Judaism</option>
                    <option value="othr">Other</option>
                </select>

            <div class="nextbtn"><input type ="submit" href="preference3.html" class ="nextbtn" name ="pref_btn" value ="Next"></div>


        </form>
        </div>

		</body>
	</head>
</html>
