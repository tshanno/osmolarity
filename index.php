<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
?>
<!DOCTYPE html>
<html>
<head>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src='./includes/functions.js'></script>
	<link rel="stylesheet" href="./includes/stylesheet.css">
	<title>Osmolarity and Cell Volume</title>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<p class='alignleft'>
			<span class='label' id='programname'>Osmolarity and Cell Volume</span>
			<input type='submit' class='openpopup' id='opendirections' value='Directions' divid='directions' />
			<input type='submit' class='openpopup' id='openabout' value='About' divid='about' />
			</p>
			<p class='alignright'>
			<input type="hidden" id="A" name="choice" value="A"><span class='label' id='label_A' value='enabled' hidden=true>A</span> 
  			<input type="hidden" id="B" name="choice" value="B"><span class='label' id='label_B' value='enabled' hidden=true>B</span> 
			<input type="hidden" id="C" name="choice" value="C"><span class='label' id='label_C' value='enabled' hidden=true>C</span>
			<span class='label' id='label_numeral' hidden=true >Answer:</span><input type="hidden" id="numberanswer" name="numeral" value=0 step="any">
			<input type='submit' id='checkanswers' value='Evaluate' submitcount='0' disabled=true/>
			<input type='submit' id='nextproblem' value='Next' disabled=true /> 
			</p>
			<div style="clear: both;"></div>
		</div>
		<div id="menu"></div>
		<div id="main">
			<input type='hidden' id='problemid' value='' />
			<input type='hidden' id='subproblemid' value='' />
			<input type='hidden' id='shownewsectionalert' value=true />
			<input type='hidden' id='shownextproblemalert' value=true />
			<div id='problemname'></div>
			<div id='problemstem'></div>
			<div id='problemimagediv'>
			<img id='problemimage' />
			</div>
			<div id='feedback'></div>
			<div class='hover_popup' id='directions'>
				<span class='popup_helper'></span>
				<div>
					<div class='popupCloseButton' divid='directions'>X</div>
					<p>This is a very simple wizard-type program with which most of you are probably familiar.  Use the buttons on the upper right hand corner of the screen to navigate through it.</p>
					<p>The purpose is to help you with the concept of diffusion of water and cell volume regulation.  Students have traditionally struggled with this.  Hopefully you will be more comfortable 
					with the concepts involved by the time you finish this tutorial.</p>
					<p>Please select a section from the list on the right.  It is recommended that you start with the "Chemistry Review"</p> <p>Please note that there are frequently multiple problems in each section.  Use the "Next" button in the upper right hand corner to move to the next problem in each section</p>
				</div>
			</div>
			<div class='hover_popup' id='about'>
				<span class='popup_helper'></span>
				<div>
					<div class='popupCloseButton' divid='about'>X</div>
					Osmolarity and Cell Volume Regulation<br />
					version 1.1<br /><br />
					Designed and written by Thomas R. Shannon<br /><br />
					Rush University<br />
					Chicago, IL<br /><br />
					Some of the problems are based upon those designed by Richard Levis
				</div>
			</div>
			<div class='hover_popup' id='about'>
				<span class='popup_helper'></span>
				<div>
					<div class='popupCloseButton' divid='about'>X</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
