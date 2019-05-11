<?php
/*
Created on Mon Oct 24 2018
PHP Functions File for CircSim Program
Based on Java CircSim program developed by T. Shannon & J. Michael (Rush University)

##Revision History

*/

require_once './problems.php';
// require_once './tutorial.php';

function LoadMenu() {
	global $problemlist;
	$i=0;
	foreach ($problemlist as $problem) {
		echo "<button class='problemselection' problemid='$i' >" . $problem[0]['name'] . "</button>";
		$i++;
	}
	
}

function LoadProblem($problemid, $subproblemid) {
	global $problemlist;
	//$returndata = [];
	$problem = $problemlist[$problemid][$subproblemid];
	$returndata['name'] = $problem['name'];
	$returndata['imgsrc'] = $problem['imgsrc'];
	$returndata['problemtext'] = $problem['problemtext'];
	$returndata['problemanswer'] = $problem['problemanswer'];
	$returndata['problemchoices'] = $problem['problemchoices'];
	echo json_encode($returndata);
	//echo $returndata;
}

function CheckAnswers($problemid, $subproblemid, $problemresponse, $attempts) {
	global $problemlist;
	//$returndata = [];
	$problem = $problemlist[$problemid][$subproblemid];
	$returndata['count'] = count($problemlist[$problemid]);
	$returndata['sectioncount'] = count($problemlist);
	$returndata['evaluation'] = "no evaluation";
	$returndata['problemanswer'] = $problem['problemanswer'];
	$returndata['attemptonefeedback'] = $problem['attemptonefeedback'];
	$returndata['problemresponse'] = $problemresponse;
	$returndata['problemexplanation'] = $problem['problemexplanation'];
	$returndata['attemptonefeedbackimgsrc'] = $problem['attemptonefeedbackimgsrc'];
	$returndata['problemexplanationimgsrc'] = $problem['problemexplanationimgsrc'];
	if ($problem['problemanswer'] === $problemresponse) {
		$returndata['evaluation'] = 'correct';
	} else {
		$returndata['evaluation'] = 'incorrect';
	}
	echo json_encode($returndata);
}

if (isset($_GET['fn'])) {
	if ($_GET['fn']=='LoadMenu') {
		LoadMenu();
	}
	
	if($_GET['fn']=='LoadProblem') {
		LoadProblem($_POST['ProblemID'], $_POST['SubproblemID']);
	}
	
	if ($_GET['fn']=='CheckAnswers') {
		CheckAnswers($_POST['ProblemID'], $_POST['SubproblemID'], $_POST['ProblemResponse'],  $_POST['Attempts']);
	}
	
	/* if ($_GET['fn']=='TutorialStart') {
		$initialinstructions = "First we will do the direct response.  Remember that this is the response that the system would have if there were no reflexes present (we will do the reflex response next).<br /><br />
		Recall that most of the blood in the body is located in the venous system. Loss of blood would, therefore, result in a decrease in central blood volume (CBV).  Recall that compliance is equal to volume/pressure.  
		Assuming the compliance doesn't change, the pressure should therefore decrease in proportion to the decrease in volume.  Central venous pressure (CVP) therefore decreases.  This is what we call the 'initial change'.  
		So the first variable in our table above which we have changed is the CVP.<br /><br />
		Press the 'Evaluate' button in the toolbar.  This checks to make sure the value entered is correct and allows you to either correct the value if it is incorrect or to proceed to the next variable if it is.";
		echo $initialinstructions;
	}
	
	if ($_GET['fn']=='TutorialComplete') {
		//echo LookupProblemAnswers(0)['solution'];
		echo LookupProblemAnswers(0);
	}
	
	if ($_GET['fn']=='TutorialProgress') {
		$directresponse = json_decode($_POST['DirectResponse'],true);
		$reflexresponse = json_decode($_POST['ReflexResponse'],true);
		$steadystate = json_decode($_POST['SteadyState'],true);
		TutorialProgress($_POST['TutorialStep'],$directresponse,$reflexresponse,$steadystate,$_POST['Attempts']);
	} */
}
?>