<?php
	session_start();

	$db = mysqli_connect("localhost", "root", "ybk2588098","accounts");
	if (isset($_POST['register_btn'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password2 = mysqli_real_escape_string($db, $_POST['password2']);
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		$dobm = mysqli_real_escape_string($db, $_POST['dobm']);
		$doby = mysqli_real_escape_string($db, $_POST['doby']);
		$dobd = mysqli_real_escape_string($db, $_POST['dobd']);
		$state = mysqli_real_escape_string($db, $_POST['state']);
		$city = mysqli_real_escape_string($db, $_POST['city']);

		//TODO:Insert date of birth and gender.
		//TODO: Insert password strength bar that indicates how strong or weak the password is
		//TODO: Insert regex pattern that asks for compulsory pfassword combination of upper, lower case alphabet as well as number and password length of 10+
		if ($password == $password2) {
			//create user
			//$password = md5($password); // hash password before storing for security purposes
			$sql = "INSERT INTO members(fname, lname,username, email, password, doby, dobm, dobd, state, city) VALUES('$fname', '$lname', '$username', '$email', '$password', '$doby', '$dobm', '$dobd', '$state', '$city')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			header('Location: welcome.php');
		}else{
			$_SESSION['message'] = "The two passwords do not match!";
		}
//TODO: Run this

	}
?>
<!DOCTYPE html>
<link rel ="stylesheet" type="text/css" href ="style.css">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
	body{
		background-color: white;
		text-align: center;
		font-family: 'Lobster', cursive;
		color: black;
		margin: auto;
	}
</style>
<html>
	<head>
		<body>
			<section class="intro5">
				<div class ="inner5">
					<div class="content5">
						<h1 style ="font-size: 300%; color:#FF3A44;">Register Now!</h1>
						<form method = "post" action = "aztest.php">
						<table>
							<tr>
								<td>First Name</td>
							</tr>
							<tr>
								<td><input type="text" name="fname" class="inputText" placeholder="First Name"></td>
							</tr>
							<tr>
								<td><input type="text" name="lname" class="inputText" placeholder="Last Name"></td>
							</tr>
							<tr>
									<td>Date of Birth</td>
							</tr>
							<tr>
								<td>
									<select name="doby" class ="inputTextdob">
										<option value="1998">1998</option>
										<option value="1997">1997</option>
										<option value="1996">1996</option>
										<option value="1995">1995</option>
										<option value="1994">1994</option>
										<option value="1993">1993</option>
										<option value="1992">1992</option>
										<option value="1991">1991</option>
										<option value="1990">1990</option>
										<option value="1989">1989</option>
										<option value="1988">1988</option>
										<option value="1987">1987</option>
										<option value="1986">1986</option>
										<option value="1985">1985</option>
										<option value="1984">1984</option>
										<option value="1983">1983</option>
										<option value="1982">1982</option>
										<option value="1981">1981</option>
										<option value="1980">1980</option>
										<option value="1979">1979</option>
										<option value="1978">1978</option>
										<option value="1977">1977</option>
										<option value="1976">1976</option>
										<option value="1975">1975</option>
										<option value="1974">1974</option>
										<option value="1973">1973</option>
										<option value="1972">1972</option>
										<option value="1971">1971</option>
										<option value="1970">1970</option>
										<option value="1969">1969</option>
										<option value="1968">1968</option>
										<option value="1967">1967</option>
										<option value="1966">1966</option>
										<option value="1965">1965</option>
										<option value="1964">1964</option>
										<option value="1963">1963</option>
										<option value="1962">1962</option>
										<option value="1961">1961</option>
										<option value="1960">1960</option>
										<option value="1959">1959</option>
										<option value="1958">1958</option>
										<option value="1957">1957</option>
										<option value="1956">1956</option>
										<option value="1955">1955</option>
										<option value="1954">1954</option>
										<option value="1953">1953</option>
										<option value="1952">1952</option>
										<option value="1951">1951</option>
										<option value="1950">1950</option>
										<option value="1949">1949</option>
										<option value="1948">1948</option>
										<option value="1947">1947</option>
										<option value="1946">1946</option>
										<option value="1945">1945</option>
										<option value="1944">1944</option>
										<option value="1943">1943</option>
										<option value="1942">1942</option>
										<option value="1941">1941</option>
										<option value="1940">1940</option>
										<option value="1939">1939</option>
										<option value="1938">1938</option>
										<option value="1937">1937</option>
										<option value="1936">1936</option>
										<option value="1935">1935</option>
										<option value="1934">1934</option>
										<option value="1933">1933</option>
										<option value="1932">1932</option>
										<option value="1931">1931</option>
										<option value="1930">1930</option>
										<option value="1929">1929</option>
										<option value="1928">1928</option>
										<option value="1927">1927</option>
										<option value="1926">1926</option>
										<option value="1925">1925</option>
										<option value="1924">1924</option>
										<option value="1923">1923</option>
										<option value="1922">1922</option>
										<option value="1921">1921</option>
										<option value="1920">1920</option>
										<option value="1919">1919</option>
										<option value="1918">1918</option>
										<option value="1917">1917</option>
										<option value="1916">1916</option>
										<option value="1915">1915</option>
										<option value="1914">1914</option>
										<option value="1913">1913</option>
										<option value="1912">1912</option>
										<option value="1911">1911</option>
										<option value="1910">1910</option>
										<option value="1909">1909</option>
										<option value="1908">1908</option>
										<option value="1907">1907</option>
										<option value="1906">1906</option>
										<option value="1905">1905</option>
										<option value="1904">1904</option>
										<option value="1903">1903</option>
										<option value="1902">1902</option>
										<option value="1901">1901</option>
										<option value="1900">1900</option>
									</select>
									<select name="dobm" class ="inputTextdob">
										<option value="1">Jan</option>
										<option value="2">Feb</option>
										<option value="3">Mar</option>
										<option value="4">Apr</option>
										<option value="5">May</option>
										<option value="6">Jun</option>
										<option value="7">Jul</option>
										<option value="8">Aug</option>
										<option value="9">Sep</option>
										<option value="10">Oct</option>
										<option value="11">Nov</option>
										<option value="12">Dec</option>
									</select>
									<select name="dobd" class ="inputTextdob">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
									</select>
							</td>
							</tr>
							<tr>
							<td>Username: </td>
							</tr>
							<tr>
								<td><input type="text" name="username" class ="inputText"></td>
							</tr>
							<tr>
								<td>Email: </td>
							</tr>
							<tr>
								<td><input type="email" name="email" class="inputText"></td>
							</tr>
							<tr>
								<td>Password: </td>
							</tr>
							<tr>
								<td><input type="password" name="password" class="inputText"></td>
							</tr>
							<tr>
								<td>Confirm Password: </td>
							</tr>
							<tr>
								<td><input type="password" name="password2" class="inputText"></td>
							</tr>
							<tr>
								<td>State</td>
							</tr>
							<tr>
								<td>
								<script type="text/javascript">
									function showfield(name)
									{
									if(name=='act')document.getElementById('city').innerHTML='<select name="actCity" class ="actCity"><option value="">Select One</option><option value="acton">Acton</option><option value="barton">Barton</option><option value="campbell">Campbell</option><option value="canberra">Canberra</option><option value="fyshwick">Fyshwick</option><option value="hall">Hall</option><option value="lyneham">Lyneham</option><option value="oaks estate">Oaks Estate</option><option value="parkes">Parkes</option><option value="tharwa">Tharwa</option><option value="tuggeranong">Tuggeranong</option><option value="uriarra">Uriarra</option><option value="wanniassa">Wanniassa</option></select>';
									else if(name=='nsw')document.getElementById('city').innerHTML='<select name="nswCity" class ="nswCity"><option value="">Select One</option><option value="albury">Albury</option><option value="bathurst">Bathurst</option><option value="central coast">Central Coast</option><option value="coffs harbour">Coffs Harbour</option><option value="dubbo">Dubbo</option><option value="lismore">Lismore</option><option value="maitland">Maitland</option><option value="newcastle">Newcastle</option><option value="nowra">Nowra</option><option value="orange">Orange</option><option value="port macquarie">Port Macquarie</option><option value="richmond">Richmond</option><option value="sydney">Sydney</option><option value="tamworth">Tamworth</option><option value="wagga wagga">Wagga Wagga</option><option value="wollongong">Wollongong</option></select>';
									else if(name=='nt')document.getElementById('city').innerHTML='<select name="ntCity" class ="ntCity"><option value="">Select One</option><option value="alice springs">Alice Springs</option><option value="darwin">Darwin</option><option value="jabiru">Jabiru</option><option value="katherine">Katherine</option><option value="litchfield">Litchfield</option><option value="nhulunbuy">Nhulunbuy</option><option value="palmerston-east arm">Palmerston-East Arm</option><option value="tennant creek">Tennant Creek</option><option value="wadeye/victoria-daly">Wadeye/Victoria-Daly</option><option value="yulara">Yulara</option></select>';
									else if(name=='qld')document.getElementById('city').innerHTML='<select name="qldCity" class ="qldCity"><option value="">Select One</option><option value="brisbane">Brisbane</option><option value="bundaberg">Bundaberg</option><option value="cairns">Cairns</option><option value="gladstone">Gladstone</option><option value="gold coast">Gold Coast</option><option value="hervey bay">Hervey Bay</option><option value="mackay">Mackay</option><option value="rockhampton">Rockhampton</option><option value="sunshine coast">Sunshine Coast</option><option value="toowoomba">Toowoomba</option><option value="townsville">Townsville</option></select>';
									else if(name=='sa')document.getElementById('city').innerHTML='<select name="saCity" class ="saCity"><option value="">Select One</option><option value="adelaide">Adelaide</option><option value="gawler">Gawler</option><option value="mount barker">Mount Barker</option><option value="mount gambier">Mount Gambier</option><option value="port lincoln">Port Lincoln</option><option value="stirling-bridgewater">Stirling-Bridgewater</option><option value="whyalla">Whyalla</option></select>';
									else if(name=='tas')document.getElementById('city').innerHTML='<select name="tasCity" class ="tasCity"><option value="">Select One</option><option value="burnie">Burnie</option><option value="devonport">Devonport</option><option value="george town">George Town</option><option value="hobart">Hobart</option><option value="kingston">Kingston</option><option value="launceston">Launceston</option><option value="new norfolk">New Norfolk</option><option value="sorell">Sorell</option><option value="ulverstone">Ulverstone</option><option value="wynyard">Wynyard</option></select>';
									else if(name=='vic')document.getElementById('city').innerHTML='<select name="vicCity" class ="vicCity"><option value="">Select One</option><option value="ballarat">Ballarat</option><option value="bendigo">Bendigo</option><option value="geelong">Geelong</option><option value="melbourne">Melbourne</option><option value="melton">Melton</option><option value="mildura">Mildura</option><option value="pakenham">Pakenham</option><option value="shepparton">Shepparton</option><option value="sunbury">Sunbury</option><option value="warrnmbool">Warrnmbool</option></select>';
									else if(name=='wa')document.getElementById('city').innerHTML='<select name="waCity" class ="waCity"><option value="">Select One</option><option value="albany">Albany</option><option value="bunbury">Bunbury</option><option value="geraldton">Geraldton</option><option value="kalgoorlie">Kalgoorlie</option><option value="perth">Perth</option><option value="rockingham">Rockingham</option></select>';
									else if(name=='')document.getElementById('city').innerHTML='<select name="" class=""><option value="">Select One</option></select>';
									}
								</script>
								<select name="state" class ="inputText" onchange="showfield(this.options[this.selectedIndex].value)">
										<option value="">Select One</option>
										<option value="act">ACT</option>
										<option value="nsw">NSW</option>
										<option value="nt">NT</option>
										<option value="qld">QLD</option>
										<option value="sa">SA</option>
										<option value="tas">TAS</option>
										<option value="vic">VIC</option>
										<option value="wa">WA</option>
								</select>
								<br>
								</td>
							</tr>
							<tr>
								<td>City</td>
							</tr>
							<tr>
								<td>
									<select id ="city" name="city" class="inputText">
										<option value="">Select One</option>
									</select></td>
							</tr>
						</table>
						<br>
						<input type ="submit" class ="submitbtn" name ="register_btn" value ="register">
						</form>

					</div>
				</div>
			</section>
		</body>
	</head>
</html>
