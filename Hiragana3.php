<!--
Notice to Demonstrator,
This code works in Google chrome
UPDATED firefox loads into the quiz and is the same as chrome otherwise
if you do not update firefox the audio is not compatible with the browser and will not play
the quiz will show up at the bottom of the table if you use Internet explorer 11
It is untested in other browsers as there are too many to go checking everything
Thank you,
Cian.
-->

<?php
	
?>

<html>
	<link href='https://fonts.googleapis.com/css?family=Allerta Stencil' rel='stylesheet'>
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	
	<style>
		
		html {
			background-color: #1fcecb;
			text-align: center;
			font-family: sans-serif;
		}
		
		h1 {
			color: #000000;
			font-family: 'Allerta Stencil';
			line-height: 260px;
			margin-bottom: 0px;
			margin-top: 20px;
			text-shadow: 0 1px 1px #fff;
			font-size: 70px;
		}
		
		h2 {
			color: #C0C0C0;
			text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
		}
		
		table {
			margin: auto;
		}
		
		td {
			text-align: center;
			font-size: 200%;
		}
		
		td.gap {
			opacity: 0;
		}
		
		img {
			width: 150px;
			height: 150px;
		}
		
		.static {
			position:absolute;
			background: white;
			filter: drop-shadow(2px 2px 2px black);
		}
		
		td.credits {
			font-size: 75%;
		}
		
		.static:hover {
			opacity:0;
		}
		
		table.creds { 
			border: 1px solid black;
		}
		
		.tab {
		  overflow: hidden;
		  background-color: #1fcecb;
		}

		.tab button {
		  background-color: #C0C0C0;
		  float: left;
		  border: none;
		  outline: none;
		  cursor: pointer;
		  width: 32%;
		  transition: 0.3s;
		  height: 35px;
		}

		.tab button:hover {
		  background-color: #ddd;
		}

		.tab button.active {
		  background-color: #ccc;
		}

		.tabcontent {
		  display: none;
		  padding: 6px 12px;
		  border-top: none;
		}
		
		.quiztab {
		  overflow: hidden;
		  background-color: #1fcecb;
		}

		.quiztab button {
		  background-color: #C0C0C0;
		  float: left;
		  border: none;
		  outline: none;
		  cursor: pointer;
		  transition: 0.3s;
		}

		.quiztab button:hover {
		  background-color: #ddd;
		}

		.quiztab button.active {
		  background-color: #ccc;
		}
		
		form {
			background-color:#1fcecb;
		}
		
		h3.romajiQ {
			margin-bottom: 0px;
			margin-top: 0px;
			font: 400 100px/1.3 'Oleo Script', Helvetica, sans-serif;
			font-weight: lighter;
		}
		
		.submit {
			border: none;
			background-color: #C0C0C0;
			color: white;
			text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
		}
		
		.quizTabContent {
			text-align: left;
			margin-left: 20%;
		}
		
		button {
			width: 10%;
			border: none;
		}
		
		.res {
			color: #C0C0C0;
			text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
		}
	</style>
	<script type="text/javascript">
		window.vcount = 0;
		window.kcount = 0;
		window.scount = 0;
		window.tcount = 0;
		window.ncount = 0;
		window.hcount = 0;
		window.mcount = 0;
		window.rcount = 0;
		window.ywcount = 0;
		
		function PlayA(track)
		{
			var audio = new Audio(track+'.mp3');
			audio.play();
		}
		function openTab(evt, tabName) {

		  var i, tabcontent, tablinks;

		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		  }
		  
		  tabcontent = document.getElementsByClassName("quizTabContent");
		  for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		  }

		  tablinks = document.getElementsByClassName("tablinks");
		  for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }

		  document.getElementById(tabName).style.display = "block";
		  evt.currentTarget.className += " active";
		}
		function openquizTab(evt, tabName) {
			
		  var i, tabcontent, tablinks;

		  tabcontent = document.getElementsByClassName("quizTabContent");
		  for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		  }

		  tablinks = document.getElementsByClassName("quiztablinks");
		  for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }

		  document.getElementById(tabName).style.display = "block";
		  evt.currentTarget.className += " active";
		}
		function scrollTop() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
		function quizAnswers(type){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
					document.getElementById(type+"Grade").innerHTML =this.responseText;
				}
			};
			
			vcount = 0;
			kcount = 0;
			scount = 0;
			tcount = 0;
			ncount = 0;
			hcount = 0;
			mcount = 0;
			rcount = 0;
			ywcount = 0;
			
			var vs = [3,2,3,1,0,1,2,3,2,0];
			var ks = [3,1,2,0,3,1,2,3,0,3];
			var ss = [0,1,3,3,1,1,2,3,1,3];
			var ts = [3,2,3,1,0,1,2,3,2,0];
			var ns = [3,1,2,0,3,1,2,3,0,3];
			var hs = [0,1,3,3,1,1,2,3,1,3];
			var ms = [3,2,3,1,0,1,2,3,2,0];
			var rs = [3,1,2,0,3,1,2,3,0,3];
			var yws = [0,1,3,3,1,1,2,3,1,3];
			
			
			
			for(var i = 0;i<10;i++) {
				var index = type+(i+1);
				if(type==='v') {
					if(document.getElementsByName(index)[vs[i]].checked===true)
					{
						vcount++;
					}
				}
				if(type==='k') {
					if(document.getElementsByName(index)[ks[i]].checked===true)
					{
						kcount++;
					}
				}
				if(type==='s') {
					if(document.getElementsByName(index)[ss[i]].checked===true)
					{
						scount++;
					}
				}
				if(type==='t') {
					if(document.getElementsByName(index)[ts[i]].checked===true)
					{
						tcount++;
					}
				}
				if(type==='n') {
					if(document.getElementsByName(index)[ns[i]].checked===true)
					{
						ncount++;
					}
				}
				if(type==='h') {
					if(document.getElementsByName(index)[hs[i]].checked===true)
					{
						hcount++;
					}
				}
				if(type==='m') {
					if(document.getElementsByName(index)[ms[i]].checked===true)
					{
						mcount++;
					}
				}
				if(type==='r') {
					if(document.getElementsByName(index)[rs[i]].checked===true)
					{
						rcount++;
					}
				}
				if(type==='yw') {
					if(document.getElementsByName(index)[yws[i]].checked===true)
					{
						ywcount++;
					}
				}
			}
			if(type==='v') {
				xhttp.open("Get", "quiz.php?v1="+vcount+"&type='v'", true);
				xhttp.send();
			}
			if(type==='k') {
				xhttp.open("Get", "quiz.php?v1="+kcount+"&type='k'", true);
				xhttp.send();
			}
			if(type==='s') {
				xhttp.open("Get", "quiz.php?v1="+scount+"&type='s'", true);
				xhttp.send();
			}
			if(type==='t') {
				xhttp.open("Get", "quiz.php?v1="+tcount+"&type='t'", true);
				xhttp.send();
			}
			if(type==='n') {
				xhttp.open("Get", "quiz.php?v1="+ncount+"&type='n'", true);
				xhttp.send();
			}
			if(type==='h') {
				xhttp.open("Get", "quiz.php?v1="+hcount+"&type='h'", true);
				xhttp.send();
			}
			if(type==='m') {
				xhttp.open("Get", "quiz.php?v1="+mcount+"&type='m'", true);
				xhttp.send();
			}
			if(type==='r') {
				xhttp.open("Get", "quiz.php?v1="+rcount+"&type='r'", true);
				xhttp.send();
			}
			if(type==='yw') {
				xhttp.open("Get", "quiz.php?v1="+ywcount+"&type='yw'", true);
				xhttp.send();
			}
		}
		function login(type,score) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
					document.getElementById(type+"signin").innerHTML =this.responseText;
				}
			};
			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			
			xhttp.open("Get","login.php?v1="+score+"&type="+type+"&username="+username+"&password="+password,true);
			xhttp.send();
			
		}
		function register(type,score) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
					document.getElementById(type+"signin").innerHTML =this.responseText;
				}
			};
			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			
			xhttp.open("Get","register.php?v1="+score+"&type="+type+"&username="+username+"&password="+password,true);
			xhttp.send();
			
		}
		function scoresheet() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(this.readyState==4&&this.status==200) {
					document.getElementById("current").innerHTML = this.responseText;
				}
			};
			
			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			
			xhttp.open("Get","userData.php?username="+username+"&password="+password,true);
			xhttp.send();
		}
		function tiles() {
			var tbl = document.getElementById("tiles");
			var letters = [['a','i','u','e','o'],
						['ka','ki','ku','ke','ko'],
						['sa','shi','su','se','so'],
						['ta','chi','tsu','te','to'],
						['na','ni','nu','ne','no'],
						['ha','hi','fu','he','ho'],
						['ma','mi','mu','me','mo'],
						['ya','','yu','','yo'],
						['ra','ri','ru','re','ro'],
						['wa','','','','wo'],
						['n','','','','']];
			
			
			for(var i = 0;i<11;i++) {
				var tbr = document.createElement('tr');
				for(var j = 0;j<5;j++) {
					if(letters[i][j]==='') {
						var tbd = document.createElement('td');
						tbd.setAttribute('class','gap');
						tbr.appendChild(tbd);
					}
					else {
						var tbd = document.createElement('td');
						tbd.innerHTML = '<img class="static" src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-'+letters[i][j]+'.png")"><img class="active" src="'+letters[i][j]+'.gif">';
						tbd.setAttribute('onClick','PlayA("'+letters[i][j]+'")');
						tbr.appendChild(tbd);
					}
				}
				tbl.appendChild(tbr);
				
				var tbrr = document.createElement('tr');
				
				for(var k = 0;k<5;k++) {
					if(letters[i][k]==='') {
						var tbd = document.createElement('td');
						tbd.setAttribute('class','gap');
						tbrr.appendChild(tbd);
					}
					else {
						var tbd = document.createElement('td');
						tbd.innerHTML = letters[i][k];
						tbrr.appendChild(tbd);
					}
				}
				tbl.appendChild(tbr);
				tbl.appendChild(tbrr);
			}
		}
		function start() {
			tiles();
			openTab(event, 'hiraganaTable');
		}
	</script>
	<title>Hiragana</title>
	<h1>Hiragana tutor</h1>
	<body onload="start()">
	
	<div class="tab">
		<button class="tablinks" onclick="openTab(event, 'hiraganaTable')">Learn Hiragana</button>
		<button class="tablinks" onclick="openTab(event, 'quiz')">Hiragana Quiz</button>
		<button class="tablinks" onclick="openTab(event, 'current');scoresheet();">Current user data</button>
	</div>
	<div id="current" class="tabContent" style="color: #C0C0C0;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;align: left;">
		Complete a quiz and log in to view user data! 
	</div>
	<div class="tabContent" id="hiraganaTable">
		<p>To see the brush order hover the mouse over a tile</p>
		<p>To hear the pronunciation of a particular tile simply click on it</p>
		<br></br>
		<br></br>
			<table id="tiles" class="tiles">
			<!--display table here-->
			</table>
		<br></br>
		<br></br>
		<table class="creds" width="100%" ID="Table2" style="margin: 0px;">
			<tr>
				<td class="credits">
				<p>Credits for Hiragana images: </p>
				<p>www.japanesewordswriting.com</p>
				</td>
				<td class="credits">
				<p>Credits for Hiragana Gifs: </p>
				<p>upload.wikimedia.org</p>
				</td>
				<td class="credits">
				<p>Credits for Hiragana Audio: </p>
				<p>guidetojapanese.org</p>
				</td>
				<td class="credits">
				<p>Credits for both imported fonts:</p>
				<p>fonts.googleapis.com</p>
				</td>
			</tr>
		</table>
	</div>
	<div class="tabContent" id="quiz">
		<h2 align="left">Quiz catagory:</h2>
		<div class="quiztab" align="center">
			<button class="quiztablinks" onclick="openquizTab(event, 'V')">Vowels</button>
			<button class="quiztablinks" onclick="openquizTab(event, 'K')">K</button>
			<button class="quiztablinks" onclick="openquizTab(event, 'S')">S</button>
			<button class="quiztablinks" onclick="openquizTab(event, 'T')">T</button>
			<button class="quiztablinks" onclick="openquizTab(event, 'N')">N</button>
			<button class="quiztablinks" onclick="openquizTab(event, 'H')">H</button>
			<button class="quiztablinks" onclick="openquizTab(event, 'M')">M</button>
			<button class="quiztablinks" onclick="openquizTab(event, 'R')">R</button>
			<button class="quiztablinks" onclick="openquizTab(event, 'Y')">Y/W</button>
		</div>
		<div class="quizTabContent" id="V">
			
				<h2>Question 1</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-e.png">
				<br>
				<input type="radio" name="v1" value="a">a
				<br>
				<input type="radio" name="v1" value="i">i
				<br>
				<input type="radio" name="v1" value="u">u
				<br>
				<input type="radio" name="v1" value="e">e
				<br>
				<h2>Question 2</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-u.png">
				<br>
				<input type="radio" name="v2" value="a">a
				<br>
				<input type="radio" name="v2" value="e">e
				<br>
				<input type="radio" name="v2" value="u">u
				<br>
				<input type="radio" name="v2" value="i">i
				<br>
				<h2>Question 3</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-o.png">
				<br>
				<input type="radio" name="v3" value="i">i
				<br>
				<input type="radio" name="v3" value="u">u
				<br>
				<input type="radio" name="v3" value="e">e
				<br>
				<input type="radio" name="v3" value="o">o
				<br>
				<h2>Question 4</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-i.png">
				<br>
				<input type="radio" name="v4" value="a">a
				<br>
				<input type="radio" name="v4" value="i">i
				<br>
				<input type="radio" name="v4" value="e">e
				<br>
				<input type="radio" name="v4" value="o">o
				<br>
				<h2>Question 5</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-a.png">
				<br>
				<input type="radio" name="v5" value="a">a
				<br>
				<input type="radio" name="v5" value="i">i
				<br>
				<input type="radio" name="v5" value="u">u
				<br>
				<input type="radio" name="v5" value="o">o
				<br>
				<h2>Question 6</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">e</h3>
				<br>
				<input type="radio" name="v6" value="a"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-a.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v6" value="e"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-e.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v6" value="o"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-o.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v6" value="u"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-u.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 7</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">a</h3>
				<br>
				<input type="radio" name="v7" value="u"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-u.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v7" value="i"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-i.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v7" value="a"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-a.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v7" value="o"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-o.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 8</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">o</h3>
				<br>
				<input type="radio" name="v8" value="a"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-a.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v8" value="i"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-i.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v8" value="u"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-u.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v8" value="o"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-o.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 9</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">u</h3>
				<br>
				<input type="radio" name="v9" value="e"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-e.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v9" value="a"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-a.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v9" value="u"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-u.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v9" value="i"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-i.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 10</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">i</h3>
				<br>
				<input type="radio" name="v10" value="i"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-i.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v10" value="e"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-e.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v10" value="o"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-o.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="v10" value="u"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-u.png" style="height:20px;width:20px;">
				<br>
				<br>
				<input type="button" onClick="quizAnswers('v')" value="Submit">
			<p></p>
			<p></p>
			<div id="vGrade" class="res">
			
			</div>
			<div id="vsignin" class="sign">
			
			</div>
				
			</div>
		</div>
		<div class="quizTabContent" id="K">
			
				<h2>Question 1</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ko.png">
				<br>
				<input type="radio" name="k1" value="ka">ka
				<br>
				<input type="radio" name="k1" value="ki">ki
				<br>
				<input type="radio" name="k1" value="ke">ke
				<br>
				<input type="radio" name="k1" value="ko">ko
				<br>
				<h2>Question 2</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ke.png">
				<br>
				<input type="radio" name="k2" value="ka">ka
				<br>
				<input type="radio" name="k2" value="ke">ke
				<br>
				<input type="radio" name="k2" value="ko">ko
				<br>
				<input type="radio" name="k2" value="ki">ki
				<br>
				<h2>Question 3</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ka.png">
				<br>
				<input type="radio" name="k3" value="ki">ki
				<br>
				<input type="radio" name="k3" value="ku">ku
				<br>
				<input type="radio" name="k3" value="ka">ka
				<br>
				<input type="radio" name="k3" value="ko">ko
				<br>
				<h2>Question 4</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ku.png">
				<br>
				<input type="radio" name="k4" value="ku">ku
				<br>
				<input type="radio" name="k4" value="ki">ki
				<br>
				<input type="radio" name="k4" value="ke">ke
				<br>
				<input type="radio" name="k4" value="ko">ko
				<br>
				<h2>Question 5</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ki.png">
				<br>
				<input type="radio" name="k5" value="ka">ka
				<br>
				<input type="radio" name="k5" value="ku">ku
				<br>
				<input type="radio" name="k5" value="ke">ke
				<br>
				<input type="radio" name="k5" value="ki">ki
				<br>
				<h2>Question 6</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ki</h3>
				<br>
				<input type="radio" name="k6" value="ka"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ka.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k6" value="ki"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ki.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k6" value="ko"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ko.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k6" value="ku"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ku.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 7</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ka</h3>
				<br>
				<input type="radio" name="k7" value="ku"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ku.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k7" value="ki"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ki.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k7" value="ka"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ka.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k7" value="ke"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ke.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 8</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ko</h3>
				<br>
				<input type="radio" name="k8" value="ka"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ka.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k8" value="ki"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ki.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k8" value="ku"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ku.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k8" value="ko"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ko.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 9</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ke</h3>
				<br>
				<input type="radio" name="k9" value="ke"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ke.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k9" value="ka"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ka.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k9" value="ku"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ku.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k9" value="ki"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ki.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 10</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ku</h3>
				<br>
				<input type="radio" name="k10" value="ki"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ki.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k10" value="ke"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ke.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k10" value="ko"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ko.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="k10" value="ku"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ku.png" style="height:20px;width:20px;">
				<br>
				<br>
				<input type="button" onClick="quizAnswers('k')" value="Submit">
			<p></p>
			<p></p>
			<div id="kGrade" class="res">
			
			</div>
			<div id="ksignin" class="sign">
			
			</div>
				
			</div>
		</div>
		<div class="quizTabContent" id="S">
			
				<h2>Question 1</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-sa.png">
				<br>
				<input type="radio" name="s1" value="sa">sa
				<br>
				<input type="radio" name="s1" value="shi">shi
				<br>
				<input type="radio" name="s1" value="se">se
				<br>
				<input type="radio" name="s1" value="su">su
				<br>
				<h2>Question 2</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-se.png">
				<br>
				<input type="radio" name="s2" value="sa">sa
				<br>
				<input type="radio" name="s2" value="se">se
				<br>
				<input type="radio" name="s2" value="so">so
				<br>
				<input type="radio" name="s2" value="shi">shi
				<br>
				<h2>Question 3</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-shi.png">
				<br>
				<input type="radio" name="s3" value="sa">sa
				<br>
				<input type="radio" name="s3" value="su">su
				<br>
				<input type="radio" name="s3" value="se">se
				<br>
				<input type="radio" name="s3" value="shi">shi
				<br>
				<h2>Question 4</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-so.png">
				<br>
				<input type="radio" name="s4" value="su">su
				<br>
				<input type="radio" name="s4" value="shi">shi
				<br>
				<input type="radio" name="s4" value="se">se
				<br>
				<input type="radio" name="s4" value="so">so
				<br>
				<h2>Question 5</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-su.png">
				<br>
				<input type="radio" name="s5" value="sa">sa
				<br>
				<input type="radio" name="s5" value="su">su
				<br>
				<input type="radio" name="s5" value="se">se
				<br>
				<input type="radio" name="s5" value="shi">shi
				<br>
				<h2>Question 6</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">se</h3>
				<br>
				<input type="radio" name="s6" value="sa"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-sa.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s6" value="se"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-se.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s6" value="so"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-so.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s6" value="su"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-su.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 7</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">so</h3>
				<br>
				<input type="radio" name="s7" value="su"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-su.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s7" value="shi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-shi.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s7" value="so"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-so.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s7" value="se"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-se.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 8</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">shi</h3>
				<br>
				<input type="radio" name="s8" value="sa"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-sa.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s8" value="su"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-su.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s8" value="se"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-se.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s8" value="shi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-shi.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 9</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">sa</h3>
				<br>
				<input type="radio" name="s9" value="se"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-se.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s9" value="sa"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-sa.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s9" value="so"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-so.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s9" value="shi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-shi.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 10</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">su</h3>
				<br>
				<input type="radio" name="s10" value="shi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-shi.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s10" value="sa"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-sa.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s10" value="se"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-se.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="s10" value="su"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-su.png" style="height:20px;width:20px;">
				<br>
				<br>
				<input type="button" onClick="quizAnswers('s')" value="Submit">
			<p></p>
			<p></p>
			<div id="sGrade" class="res">
			
			</div>
			<div id="ssignin" class="sign">
			
			</div>
				
			</div>
			<div class="quizTabContent" id="T">
			
				<h2>Question 1</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-te.png">
				<br>
				<input type="radio" name="t1" value="ta">ta
				<br>
				<input type="radio" name="t1" value="chi">chi
				<br>
				<input type="radio" name="t1" value="tsu">tsu
				<br>
				<input type="radio" name="t1" value="te">te
				<br>
				<h2>Question 2</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-tsu.png">
				<br>
				<input type="radio" name="t2" value="ta">ta
				<br>
				<input type="radio" name="t2" value="te">te
				<br>
				<input type="radio" name="t2" value="tsu">tsu
				<br>
				<input type="radio" name="t2" value="chi">chi
				<br>
				<h2>Question 3</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-to.png">
				<br>
				<input type="radio" name="t3" value="chi">chi
				<br>
				<input type="radio" name="t3" value="tsu">tsu
				<br>
				<input type="radio" name="t3" value="te">te
				<br>
				<input type="radio" name="t3" value="to">to
				<br>
				<h2>Question 4</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-chi.png">
				<br>
				<input type="radio" name="t4" value="ta">ta
				<br>
				<input type="radio" name="t4" value="chi">chi
				<br>
				<input type="radio" name="t4" value="te">te
				<br>
				<input type="radio" name="t4" value="to">to
				<br>
				<h2>Question 5</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ta.png">
				<br>
				<input type="radio" name="t5" value="ta">ta
				<br>
				<input type="radio" name="t5" value="chi">chi
				<br>
				<input type="radio" name="t5" value="tu">tu
				<br>
				<input type="radio" name="t5" value="to">to
				<br>
				<h2>Question 6</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">te</h3>
				<br>
				<input type="radio" name="t6" value="ta"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ta.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t6" value="te"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-te.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t6" value="to"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-to.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t6" value="tsu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-tsu.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 7</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ta</h3>
				<br>
				<input type="radio" name="t7" value="tsu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-tsu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t7" value="chi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-chi.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t7" value="ta"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ta.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t7" value="to"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-to.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 8</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">to</h3>
				<br>
				<input type="radio" name="t8" value="ta"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ta.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t8" value="chi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-chi.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t8" value="tsu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-tsu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t8" value="to"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-to.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 9</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">tsu</h3>
				<br>
				<input type="radio" name="t9" value="te"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-te.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t9" value="ta"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ta.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t9" value="tsu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-tsu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t9" value="chi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-chi.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 10</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">chi</h3>
				<br>
				<input type="radio" name="t10" value="chi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-chi.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t10" value="te"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-te.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t10" value="to"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-to.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="t10" value="tsu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-tsu.png" style="height:20px;width:20px;">
				<br>
				<br>
				<input type="button" onClick="quizAnswers('t')" value="Submit">
			<p></p>
			<p></p>
			<div id="tGrade" class="res">
			
			</div>
			<div id="tsignin" class="sign">
			
			</div>
				
			</div>
		</div>
		<div class="quizTabContent" id="N">
			
				<h2>Question 1</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-no.png">
				<br>
				<input type="radio" name="n1" value="na">na
				<br>
				<input type="radio" name="n1" value="ni">ni
				<br>
				<input type="radio" name="n1" value="ne">ne
				<br>
				<input type="radio" name="n1" value="no">no
				<br>
				<h2>Question 2</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-n.png">
				<br>
				<input type="radio" name="n2" value="na">na
				<br>
				<input type="radio" name="n2" value="n">n
				<br>
				<input type="radio" name="n2" value="no">no
				<br>
				<input type="radio" name="n2" value="ni">ni
				<br>
				<h2>Question 3</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-na.png">
				<br>
				<input type="radio" name="n3" value="ni">ni
				<br>
				<input type="radio" name="n3" value="nu">nu
				<br>
				<input type="radio" name="n3" value="na">na
				<br>
				<input type="radio" name="n3" value="no">no
				<br>
				<h2>Question 4</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-nu.png">
				<br>
				<input type="radio" name="n4" value="nu">nu
				<br>
				<input type="radio" name="n4" value="ni">ni
				<br>
				<input type="radio" name="n4" value="ne">ne
				<br>
				<input type="radio" name="n4" value="no">no
				<br>
				<h2>Question 5</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ni.png">
				<br>
				<input type="radio" name="n5" value="na">na
				<br>
				<input type="radio" name="n5" value="nu">nu
				<br>
				<input type="radio" name="n5" value="ne">ne
				<br>
				<input type="radio" name="n5" value="ni">ni
				<br>
				<h2>Question 6</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ni</h3>
				<br>
				<input type="radio" name="n6" value="na"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-na.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n6" value="ni"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ni.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n6" value="no"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-no.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n6" value="nu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-nu.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 7</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">na</h3>
				<br>
				<input type="radio" name="n7" value="nu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-nu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n7" value="ni"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ni.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n7" value="na"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-na.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n7" value="ne"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ne.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 8</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">no</h3>
				<br>
				<input type="radio" name="n8" value="na"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-na.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n8" value="ni"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ni.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n8" value="nu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-nu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n8" value="no"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-no.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 9</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ne</h3>
				<br>
				<input type="radio" name="n9" value="ne"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ne.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n9" value="na"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-na.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n9" value="nu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-nu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n9" value="ni"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ni.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 10</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">nu</h3>
				<br>
				<input type="radio" name="n10" value="ni"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ni.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n10" value="ne"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ne.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n10" value="no"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-no.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="n10" value="nu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-nu.png" style="height:20px;width:20px;">
				<br>
				<br>
				<input type="button" onClick="quizAnswers('n')" value="Submit">
			<p></p>
			<p></p>
			<div id="nGrade" class="res">
			
			</div>
			<div id="nsignin" class="sign">
			
			</div>
				
			</div>
		</div>
		<div class="quizTabContent" id="H">
			
				<h2>Question 1</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ha.png">
				<br>
				<input type="radio" name="h1" value="sa">ha
				<br>
				<input type="radio" name="h1" value="hi">hi
				<br>
				<input type="radio" name="h1" value="he">he
				<br>
				<input type="radio" name="h1" value="fu">fu
				<br>
				<h2>Question 2</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-he.png">
				<br>
				<input type="radio" name="h2" value="ha">ha
				<br>
				<input type="radio" name="h2" value="he">he
				<br>
				<input type="radio" name="h2" value="ho">ho
				<br>
				<input type="radio" name="h2" value="hi">hi
				<br>
				<h2>Question 3</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-hi.png">
				<br>
				<input type="radio" name="h3" value="ha">ha
				<br>
				<input type="radio" name="h3" value="fu">fu
				<br>
				<input type="radio" name="h3" value="he">he
				<br>
				<input type="radio" name="h3" value="hi">hi
				<br>
				<h2>Question 4</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ho.png">
				<br>
				<input type="radio" name="h4" value="fu">fu
				<br>
				<input type="radio" name="h4" value="hi">hi
				<br>
				<input type="radio" name="h4" value="he">he
				<br>
				<input type="radio" name="h4" value="ho">ho
				<br>
				<h2>Question 5</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-fu.png">
				<br>
				<input type="radio" name="h5" value="ha">ha
				<br>
				<input type="radio" name="h5" value="fu">fu
				<br>
				<input type="radio" name="h5" value="he">he
				<br>
				<input type="radio" name="h5" value="hi">hi
				<br>
				<h2>Question 6</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">he</h3>
				<br>
				<input type="radio" name="h6" value="ha"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ha.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h6" value="he"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-he.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h6" value="ho"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ho.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h6" value="fu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-fu.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 7</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ho</h3>
				<br>
				<input type="radio" name="h7" value="fu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-fu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h7" value="hi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-hi.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h7" value="ho"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ho.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h7" value="he"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-he.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 8</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">hi</h3>
				<br>
				<input type="radio" name="h8" value="ha"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ha.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h8" value="fu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-fu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h8" value="he"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-he.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h8" value="hi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-hi.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 9</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ha</h3>
				<br>
				<input type="radio" name="h9" value="he"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-he.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h9" value="ha"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ha.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h9" value="ho"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ho.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h9" value="hi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-hi.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 10</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">fu</h3>
				<br>
				<input type="radio" name="h10" value="hi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-hi.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h10" value="ha"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ha.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h10" value="he"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-he.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="h10" value="fu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-fu.png" style="height:20px;width:20px;">
				<br>
				<br>
				<input type="button" onClick="quizAnswers('h')" value="Submit">
			<p></p>
			<p></p>
			<div id="hGrade" class="res">
			
			</div>
			<div id="hsignin" class="sign">
			
			</div>
				
			</div>
			<div class="quizTabContent" id="M">
			
				<h2>Question 1</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-me.png">
				<br>
				<input type="radio" name="m1" value="ma">ma
				<br>
				<input type="radio" name="m1" value="mi">mi
				<br>
				<input type="radio" name="m1" value="mu">mu
				<br>
				<input type="radio" name="m1" value="me">me
				<br>
				<h2>Question 2</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mu.png">
				<br>
				<input type="radio" name="m2" value="ma">ma
				<br>
				<input type="radio" name="m2" value="me">me
				<br>
				<input type="radio" name="m2" value="mu">mu
				<br>
				<input type="radio" name="m2" value="mi">mi
				<br>
				<h2>Question 3</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mo.png">
				<br>
				<input type="radio" name="m3" value="mi">mi
				<br>
				<input type="radio" name="m3" value="mu">mu
				<br>
				<input type="radio" name="m3" value="me">me
				<br>
				<input type="radio" name="m3" value="mo">mo
				<br>
				<h2>Question 4</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mi.png">
				<br>
				<input type="radio" name="m4" value="ma">ma
				<br>
				<input type="radio" name="m4" value="mi">mi
				<br>
				<input type="radio" name="m4" value="me">me
				<br>
				<input type="radio" name="m4" value="mo">mo
				<br>
				<h2>Question 5</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ma.png">
				<br>
				<input type="radio" name="m5" value="ma">ma
				<br>
				<input type="radio" name="m5" value="mi">mi
				<br>
				<input type="radio" name="m5" value="mu">mu
				<br>
				<input type="radio" name="m5" value="mo">mo
				<br>
				<h2>Question 6</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">me</h3>
				<br>
				<input type="radio" name="m6" value="ma"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ma.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m6" value="me"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-me.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m6" value="mo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mo.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m6" value="mu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mu.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 7</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ma</h3>
				<br>
				<input type="radio" name="m7" value="mu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m7" value="mi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mi.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m7" value="ma"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ma.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m7" value="mo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mo.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 8</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">mo</h3>
				<br>
				<input type="radio" name="m8" value="ma"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ma.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m8" value="mi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mi.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m8" value="mu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m8" value="mo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mo.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 9</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">mu</h3>
				<br>
				<input type="radio" name="m9" value="me"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-me.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m9" value="ma"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-a.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m9" value="mu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m9" value="mi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mi.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 10</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">mi</h3>
				<br>
				<input type="radio" name="m10" value="mi"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mi.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m10" value="me"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-me.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m10" value="mo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mo.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="m10" value="mu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-mu.png" style="height:20px;width:20px;">
				<br>
				<br>
				<input type="button" onClick="quizAnswers('m')" value="Submit">
			<p></p>
			<p></p>
			<div id="mGrade" class="res">
			
			</div>
			<div id="msignin" class="sign">
			
			</div>
				
			</div>
		</div>
		<div class="quizTabContent" id="R">
			
				<h2>Question 1</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ro.png">
				<br>
				<input type="radio" name="r1" value="ra">ra
				<br>
				<input type="radio" name="r1" value="ri">ri
				<br>
				<input type="radio" name="r1" value="re">re
				<br>
				<input type="radio" name="r1" value="ro">ro
				<br>
				<h2>Question 2</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-re.png">
				<br>
				<input type="radio" name="r2" value="ra">ra
				<br>
				<input type="radio" name="r2" value="re">re
				<br>
				<input type="radio" name="r2" value="ro">ro
				<br>
				<input type="radio" name="r2" value="ri">ri
				<br>
				<h2>Question 3</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ra.png">
				<br>
				<input type="radio" name="r3" value="ri">ri
				<br>
				<input type="radio" name="r3" value="ru">ru
				<br>
				<input type="radio" name="r3" value="ra">ra
				<br>
				<input type="radio" name="r3" value="ro">ro
				<br>
				<h2>Question 4</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ru.png">
				<br>
				<input type="radio" name="r4" value="ru">ru
				<br>
				<input type="radio" name="r4" value="ri">ri
				<br>
				<input type="radio" name="r4" value="re">re
				<br>
				<input type="radio" name="r4" value="ro">ko
				<br>
				<h2>Question 5</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ri.png">
				<br>
				<input type="radio" name="r5" value="ra">ra
				<br>
				<input type="radio" name="r5" value="ru">ru
				<br>
				<input type="radio" name="r5" value="re">re
				<br>
				<input type="radio" name="r5" value="ri">ri
				<br>
				<h2>Question 6</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ri</h3>
				<br>
				<input type="radio" name="r6" value="ra"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ra.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r6" value="ri"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ri.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r6" value="ro"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ro.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r6" value="ru"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ru.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 7</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ra</h3>
				<br>
				<input type="radio" name="r7" value="ru"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ru.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r7" value="ri"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ri.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r7" value="ra"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ra.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r7" value="re"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-re.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 8</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ro</h3>
				<br>
				<input type="radio" name="r8" value="ra"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ra.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r8" value="ri"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ri.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r8" value="ru"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ru.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r8" value="ro"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ro.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 9</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">re</h3>
				<br>
				<input type="radio" name="r9" value="re"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-re.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r9" value="ra"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ra.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r9" value="ru"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ru.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r9" value="ri"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ri.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 10</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ru</h3>
				<br>
				<input type="radio" name="r10" value="ri"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ri.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r10" value="re"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-re.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r10" value="ro"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ro.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="r10" value="ru"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ru.png" style="height:20px;width:20px;">
				<br>
				<br>
				<input type="button" onClick="quizAnswers('r')" value="Submit">
			<p></p>
			<p></p>
			<div id="rGrade" class="res">
			
			</div>
			<div id="rsignin" class="sign">
			
			</div>
				
			</div>
		</div>
		<div class="quizTabContent" id="Y">
			
				<h2>Question 1</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ya.png">
				<br>
				<input type="radio" name="yw1" value="ya">ya
				<br>
				<input type="radio" name="yw1" value="wa">wa
				<br>
				<input type="radio" name="yw1" value="wo">wo
				<br>
				<input type="radio" name="yw1" value="yu">yu
				<br>
				<h2>Question 2</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wo.png">
				<br>
				<input type="radio" name="yw2" value="ya">ya
				<br>
				<input type="radio" name="yw2" value="wo">wo
				<br>
				<input type="radio" name="yw2" value="yo">yo
				<br>
				<input type="radio" name="yw2" value="wa">wa
				<br>
				<h2>Question 3</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wa.png">
				<br>
				<input type="radio" name="yw3" value="ya">ya
				<br>
				<input type="radio" name="yw3" value="yu">yu
				<br>
				<input type="radio" name="yw3" value="wo">wo
				<br>
				<input type="radio" name="yw3" value="wa">wa
				<br>
				<h2>Question 4</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-yo.png">
				<br>
				<input type="radio" name="yw4" value="yu">yu
				<br>
				<input type="radio" name="yw4" value="wo">wo
				<br>
				<input type="radio" name="yw4" value="wa">wa
				<br>
				<input type="radio" name="yw4" value="yo">yo
				<br>
				<h2>Question 5</h2>
				<h3>Match the hiragana to the corresponding romaji</h3>
				<img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-yu.png">
				<br>
				<input type="radio" name="yw5" value="ya">ya
				<br>
				<input type="radio" name="yw5" value="yu">yu
				<br>
				<input type="radio" name="yw5" value="wo">wo
				<br>
				<input type="radio" name="yw5" value="wa">wa
				<br>
				<h2>Question 6</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">wo</h3>
				<br>
				<input type="radio" name="yw6" value="ya"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ya.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw6" value="wo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wo.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw6" value="yo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-yo.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw6" value="yu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-yu.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 7</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">yo</h3>
				<br>
				<input type="radio" name="yw7" value="yu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-yu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw7" value="wa"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wa.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw7" value="yo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-yo.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw7" value="wo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wo.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 8</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">wa</h3>
				<br>
				<input type="radio" name="yw8" value="ya"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ya.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw8" value="yu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-yu.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw8" value="wo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wo.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw8" value="wa"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wa.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 9</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">ya</h3>
				<br>
				<input type="radio" name="yw9" value="wo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wo.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw9" value="ya"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ya.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw9" value="yo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-yo.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw9" value="wa"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wa.png" style="height:20px;width:20px;">
				<br>
				<h2>Question 10</h2>
				<h3>Match the romaji to the corresponding hiragana</h3>
				<h3 style="font-size:100;" class = "romajiQ">yu</h3>
				<br>
				<input type="radio" name="yw10" value="wa"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wa.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw10" value="ya"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-ya.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw10" value="wo"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-wo.png" style="height:20px;width:20px;">
				<br>
				<input type="radio" name="yw10" value="yu"><img src="http://www.japanesewordswriting.com/wp-content/uploads/2010/09/hiragana-yu.png" style="height:20px;width:20px;">
				<br>
				<br>
				<input type="button" onClick="quizAnswers('yw')" value="Submit">
			<p></p>
			<p></p>
			<div id="ywGrade" class="res">
			
			</div>
			<div id="ywsignin" class="sign">
			
			</div>
				
			</div>
		</div>
	</div>
	</body>
</html>