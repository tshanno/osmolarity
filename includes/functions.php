<?php
/*
Created on May, 2019
PHP Functions File for CircSim Program
Based on Java CircSim program developed by T. Shannon & J. Michael (Rush University)

##Revision History
##2019-05-11 Initial checkin and refactoring.
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
	$returndata['problemtype'] = $problem['problemtype'];
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
	$returndata['problemtype'] = $problem['problemtype'];
	//$problemresponse = (float)$problemresponse;
	if ($problem['problemtype'] === ProblemType::calculation) {
		$upperlimit = (float)$returndata['problemanswer'] + (float)$problem['problemtolerance'];
		$lowerlimit = (float)$returndata['problemanswer'] - (float)$problem['problemtolerance'];
		if (($upperlimit >= (float)$problemresponse) && ($lowerlimit <= (float)$problemresponse)) {
			$returndata['evaluation'] = 'correct';
		} else {
			$returndata['evaluation'] = 'incorrect';
		}
	} else if ($problem['problemtype'] === ProblemType::multiplechoice) {
		if ($problem['problemanswer'] === $problemresponse) {
			$returndata['evaluation'] = 'correct';
		} else {
			$returndata['evaluation'] = 'incorrect';
		}
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
	
}
?>