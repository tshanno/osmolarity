/*
  Created on Mon Oct 24 2018
  Javascript File for CircSim Program
  Based on Java CircSim program developed by T. Shannon & J. Michael (Rush University)

  ##Revision History
  ## 10/24/2018: Initial Scripting
  @CodingAuthor: Brenden Hoff (Aeterna Holdings LLC; brendenhoff@aeternaholdings.com)
*/

$(document).ready(function(){
    var subproblemid;
    var pagecount;
    var shownewsectionalert = true;
    var shownextproblemalert = true;

    $("#feedback").html("<p>This is a very simple wizard-type program with which most of you are probably familiar.  Use the buttons on the upper right hand corner of the screen to navigate through it.</p> <p>The purpose is to help you with the concept of diffusion of water and cell volume regulation.  Students have traditionally struggled with this.  Hopefully you will be more comfortable with the concepts involved by the time you finish this tutorial.</p> <p>Please select a section from the list on the right.  It is recommended that you start with the \"Chemistry Review\"</p> <p>Please note that there are frequently multiple problems in each section.  Use the \"Next\" button in the upper right hand corner to move to the next problem in each section</p>");
    function setImageVisible(id, imgsrc, visible) {	
	var img = document.getElementById(id);
	img.src = imgsrc;
	img.style.visibility = (visible ? 'visible' : 'hidden');
    }

    function LoadProblem(problemid) {
	$.post('./includes/functions.php?fn=LoadProblem',{ProblemID: problemid, SubproblemID: subproblemid}).done(function(data){
	    console.log('After loadproblem = ' + subproblemid);
	    var results = JSON.parse(data);
	    var Attempts = 0;
	    attempts = Attempts.toString(10);
	    $("#checkanswers").attr("submitcount", attempts);
	    $("#problemid").val(problemid);
	    ResetProblemInterface(results);
	});
	
    }

    function ResetProblemInterface(results) {
	$("#feedback").html(results['problemtext']);
	$("#problemname").html(results['name']);
	$('#checkanswers').attr('disabled',false);
	$('#nextproblem').attr('disabled',true);
	setImageVisible('problemimage',results['imgsrc'],'visible');
	document.getElementById("A").checked = false;
	document.getElementById("B").checked = false;
	document.getElementById("C").checked = false;
	if (results['problemchoices'] == "AB") {
	    document.getElementById("C").disabled = true;
	    document.getElementById("label_C").className = 'disabled';
	} else {
	    document.getElementById("C").disabled = false;
	    document.getElementById("label_C").className = 'label';
	}
    }
    
    function EvaluateAnswer(problemid, problemresponse, attempts) {
	$.post('./includes/functions.php?fn=CheckAnswers',{ProblemID: problemid, SubproblemID: subproblemid, ProblemResponse: problemresponse, Attempts: attempts}).done(function(data){
	    $("#problemid").val(problemid);
	    var results = JSON.parse(data);
	    console.log(results);
	    attempts = attempts + 1;
	    var Attempts = attempts.toString(10);
	    var Feedback = $("#feedback").html();
	    $("#checkanswers").attr("submitcount", Attempts);
	    
	    if (results['evaluation'] == 'incorrect'){
		if (attempts < 2) {
		    Feedback = results['attemptonefeedback'] + "<p>Please try again</p>" + Feedback;
		    setImageVisible('problemimage',results['attemptonefeedbackimgsrc'],'visible');
		} else {
		    Feedback = "<p><b>Sorry, that's incorrect.</b><p>" + results['problemexplanation'];
		    setImageVisible('problemimage',results['problemexplanationimgsrc'],'visible');
		    if (pagecount < results['count']) {
			if (shownextproblemalert) {
			    alert("Sorry, that's incorrect.  Please read the explanation and be sure to click \"Next\" at the upper right hand corner of the page to load the next problem in this section.");
			    shownextproblemalert = false;
			}
			subproblemid = subproblemid + 1;
			$('#nextproblem').attr('disabled',false);
			$('#checkanswers').attr('disabled',true);
			Feedback = Feedback + '<p><b>Please click "Next" at the top of the page to move to the next problem in this section.</b></p>';
		    } else {
			if (shownewsectionalert && (problemid != (parseInt(results['sectioncount'],10) - 1))) {
			    alert("Sorry, that's incorrect.  Please read the explanation and choose another section on the left.");
			    shownewsectionalert = false;
			}
			$('#checkanswers').attr('disabled',true);
			if (problemid != (parseInt(results['sectioncount'],10) - 1)) {
			    Feedback = Feedback + '<p><b>Please choose another section on the left.</b></p>';
			} else {
			    Feedback = Feedback + '<p><b>Nice work.  Bye.</b></p>';
			}
		    }

		}
	    } else {
		Feedback = "<p><b>Correct!</b></p>" + results['problemexplanation'];
		setImageVisible('problemimage',results['problemexplanationimgsrc'],'visible');
		if (pagecount < results['count']) {
		    if (shownextproblemalert) {
			alert("Correct.  Please be sure to click \"Next\" at the upper right hand corner of the page to load the next problem in this section.");
			shownextproblemalert = false;
		    }
		    subproblemid = subproblemid + 1;
		    $('#nextproblem').attr('disabled',false);
		    $('#checkanswers').attr('disabled',true);
		    Feedback = Feedback + '<p><b>Please click "Next" at the top of the page to move to the next problem in this section.</b></p>';
		} else {
		    if (shownewsectionalert && (problemid != (parseInt(results['sectioncount'],10) - 1))) {
			alert("Correct.  Please read the explanation and choose another section on the left.");
			shownewsectionalert = false;
		    }
		    $('#checkanswers').attr('disabled',true);
		    if (problemid != (parseInt(results['sectioncount'],10) - 1)) {
			Feedback = Feedback + '<p><b>Please choose another section on the left.</b></p>';
		    } else {
			Feedback = Feedback + '<p><b>Nice work.  Bye.</b></p>';
		    }
		}
	    }
	    $("#feedback").html(Feedback);
	});
    }
    

    //This loads the list of problems	
    $("#menu").load('./includes/functions.php?fn=LoadMenu');
    
    //This loads the requested problem
    $(document).on('click',"button.problemselection",function() {
	var problemid = $(this).attr('problemid');
	$("button.problemselection").attr('activeproblem',0);
	$(this).attr('activeproblem',1);
	subproblemid = 0;
	pagecount = 1;
	LoadProblem(problemid);
    });

    $(document).on('click',"#nextproblem",function(){
	var ProblemID = $("#problemid").val();
	problemid = parseInt(ProblemID,10);
	pagecount = pagecount + 1;
	LoadProblem(problemid);
    });
    
    //This adjusts the answer value by clicking the button.
    $(document).on('click',"button.answer, button.wronganswer",function() {
	switch($(this).val()) {
	case "n":
	    $(this).html("&uarr;");
	    $(this).val("u");
	    break;
	case "u":
	    $(this).html("&darr;");
	    $(this).val("d");
	    break;
	case "d":
	    $(this).html("0");
	    $(this).val("n");
	    break;
	default:
	    alert("unknown error");
	    
	}
    });
    
    //This submits the form data to the function php page for analyzing answers
    $(document).on('click',"#checkanswers",function(){
	
	var ProblemID = parseInt($("#problemid").val(),10);
	var Attempts = parseInt($("#checkanswers").attr("submitcount"),10);
	var ProblemResponse = "Reponse did not register"
	
	if (document.getElementById("A").checked == true) {
	    ProblemResponse = "A";
	} else if (document.getElementById("B").checked == true) {
	    ProblemResponse = "B";
	} else if (document.getElementById("C").checked == true) {
	    ProblemResponse = "C";	
	}

	EvaluateAnswer(ProblemID, ProblemResponse, Attempts);

    });
    

    //This allows the popup box to open when clicked on
    $(document).on("click","input.openpopup",function(){
	var divid = $(this).attr("divid");
	$('#' + divid).show();
    });
    
    //These functions allows the popup box to close when exit is pressed.	
    $(document).on("click",".popupCloseButton", function() {
	var divid = $(this).attr("divid");
	$('#' + divid).hide();
    });
    
    //This starts the tutorial mode for the first problem.
    $(document).on("click","#tutorialmode", function() {
	var currentproblem = $("#problemid").val();
	if (currentproblem!='') {
	    var confirmtutorial = confirm("This will start a guided walkthrough of problem #1. You will lose your progress on your current problem. Continue?");
	}
	else {
	    var confirmtutorial = confirm("This will start a guided walkthrough of problem #1. Continue?");
	}
	if (confirmtutorial) {
	    $("button.problemselection").attr('activeproblem',0);
	    $("button.problemselection[problemid='0']").attr('activeproblem',1);
	    StartTutorial();
	}
    });
});
