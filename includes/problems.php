<?php
//$problemlist = [];
$problemlist = array();
$subproblemlist = array();
$uparrow = "&uarr;";
$downarrow = "&darr;";
$rightarrow = "&rarr;";

//This is also defined in functions.js.  If you change it here you have to change it there.
abstract class ProblemType {
	const multiplechoice = 0;
	const calculation = 1;
}

function CreateMultipleChoice ($name, $problemtype, $imgsrc, $problemtext, $problemanswer, $problemchoices, $attemptonefeedbackimgsrc, $attemptonefeedback, $problemexplanationimgsrc, $problemexplanation) {
	$problem = array();
	$problem['name'] = $name;
	$problem['problemtype'] = $problemtype;
	$problem['imgsrc'] = $imgsrc;
	$problem['problemtext'] = $problemtext;
	$problem['problemanswer'] = $problemanswer;
	$problem['problemchoices'] = $problemchoices;
	$problem['attemptonefeedback'] = $attemptonefeedback;
	$problem['attemptonefeedbackimgsrc'] = $attemptonefeedbackimgsrc;
	$problem['problemexplanation'] = $problemexplanation;
	$problem['problemexplanationimgsrc'] = $problemexplanationimgsrc;
	return $problem;
}

function CreateCalculation ($name, $problemtype, $imgsrc, $problemtext, $problemanswer, $problemtolerance, $attemptonefeedbackimgsrc, $attemptonefeedback, $problemexplanationimgsrc, $problemexplanation) {
	$problem = array();
	$problem['name'] = $name;
	$problem['problemtype'] = $problemtype;
	$problem['imgsrc'] = $imgsrc;
	$problem['problemtext'] = $problemtext;
	$problem['problemanswer'] = $problemanswer;
	$problem['problemtolerance'] = $problemtolerance;
	$problem['attemptonefeedback'] = $attemptonefeedback;
	$problem['attemptonefeedbackimgsrc'] = $attemptonefeedbackimgsrc;
	$problem['problemexplanation'] = $problemexplanation;
	$problem['problemexplanationimgsrc'] = $problemexplanationimgsrc;
	return $problem;
}
//Begin section 1
$ProblemName = "1.  Chemistry Review";
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/periodic_table.png";
$ProblemText = '<p>Let’s start with a very quick and very brief chemistry review.  If you find yourself having trouble here, please seek additional help on these topics.</p> <p>Amounts of solutes are usually measured in moles.  The number of moles is a function the amount of the substance (grams) and of its molecular weight (grams/mole).</p> <p>Sodium has a molecular weight of 23 g/mol.  Chloride has a molecular weight of 35.5 g/mol.  How much sodium chloride (NaCl) do you need to have 16 moles?</p> <p><b>Enter the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = '936';
$ProblemTolerance = '65';
$AttmeptOne = "<b>Nope.  You need to add the molecular weights for Na and Cl, then multiply by the number of moles.</b>";
$AttmeptOneImgSrc = "./images/periodic_table.png";
$ExplanationImgSrc = "./images/periodic_table.png";
$Explanation = "<p>Let’s see how to calculate it.</p>

<p>You first need to calculate the formula weight for the NaCl.  This is like the molecular weight but its for the compound, not just an element.  In order to do this, you add the molecular weights of the component elements:</p>
Na= 23 g/mol </br>
Cl = 35.5 g/mol</br>
NaCl= 23 + 35.5 = 58.5 g/mol</br>

<p>The grams/mole times the number of moles you want gives you the required weight in grams:</p>

58.5 g/mol (16 mol) = 936 g";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = "1.  Chemistry Review";
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/periodic_table.png";
$ProblemText = '<p>Concentration is the amount of a substance in each unit volume of solution.  If I have 2 moles of something in 1 liter of solution, the concentration is 2 moles/liter (M).</p>
<p>I’ve got 936 g of NaCl which is 16 moles.  How much water do I add to this to obtain a concentration of 160 millimoles/liter (mM)?</p>
<p>Remember that the molecular weight of Na is 23 g/mol and Cl is 35.5 g/mol</p>

<p><b>Enter the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = '100';
$ProblemTolerance = '50';
$AttmeptOne = "<b>Hmmm... 160 mmoles/liter = 16000 millimoles divided by the unknown quantity of liters.</b>";
$AttmeptOneImgSrc = "./images/periodic_table.png";
$ExplanationImgSrc = "./images/periodic_table.png";
$Explanation = "<p>Let’s calculate the answer.</p>

<p>We have 16 moles of NaCl.  We need 160 mmoles/liter.</p>

<p>First we need everything in the relevant units.  16 moles is 16000 millimoles.</p>

<p>160 mmoles/liter = 16000 millimoles divided by the unknown quantity of liters (we’ll call it X):</p>

160 millimoles/liter = 16000 millimoles/X</br>
X=16000 millimoles/(160 millimoles/liter)=100 liters</br>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = "1.  Chemistry Review";
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/periodic_table.png";
$ProblemText = '<p>One more and we’ll move on.</p>
<p>The typical human body has 5 liters of blood with a concentration of 140 mM NaCl.  How many grams of Na are there in the blood?</p>
<p>(Hint:  Molecular weight of Na is 23 g/mol and of Cl is 35.5 g/mol)</p>
A.  16.1 grams</br>
B. 41 grans</br>
C.  41000</br>
<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = '16.1';
$ProblemTolerance = '4';
$AttmeptOne = "<b>No. Remember that I only want the number of grams of Na.</b>";
$AttmeptOneImgSrc = "./images/periodic_table.png";
$ExplanationImgSrc = "./images/periodic_table.png";
$Explanation = "<p>We have 140 millimoles/liter of NaCl.  This means we have 140 mM Na and 140 mM Cl.</p>

<p>140 millimoles/liter Na = 0.140 moles/liter Na</p>

<p>We have 5 liters of blood so:</p>

0.140 moles/liter (5 liters) = 0.7 moles</br>
0.7 moles (23 g/mol) = 16.1 g Na</br>

<p>OK, enough review.</p>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();

// End Section 1
//Begin Section 2

$ProblemName = '2.  Osmolarity';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/osmolarity_generic.png";
$ProblemText = '<p><b>Osmolarity</b> is a measure of the osmoles of solute per liter solution (<em>osmolality</em> is per kg solution).  An osmole is one mole of particles.  A solution with higher osmolarity relative to a reference solution is said to be <em>hyper-osmotic</em>.  A solution with lower osmolarity relative to a reference solution is said to be <em>hypo-osmotic</em>.  A solution with the same osmolarity as a reference solution is said to be <em>iso-osmotic</em>.</p>
<p>Which of these solutions is hypo-osmotic relative to the other listed?</p>
A.  160 mM NaCl<br />
B.  240 mM albumin<br />
<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'B';
$ProblemChoices = 'AB';
$AttmeptOne = "<p><b>Hmmm...  Better think about it and try again.</b></p>
<p>I'm going to be <b>very</b> disappointed if you don't get it right this time.</p>";
$AttmeptOneImgSrc = "./images/osmolarity_generic.png";
$ExplanationImgSrc = "./images/osmolarity_generic.png";
$Explanation = "<p>The osmolarity of the albumin is 240 mOsm/L because there are 240 mM albumin particles in the solution.  The Osmolarity of the NaCl solution is 320 mOsm/L because the Na and the Cl dissociate in solution:</p>

<table>
<tr>
<th></th>
<th>Concentration (mM)</th>
<th>Osmolarity (mOsm/L)</th>
</tr>
<tr>
<td>Na+</td>
<td>160</td>
<td>160</td>
</tr>
<tr>
<td><u>Cl-</u></td>
<td><u>160</u></td>
<td><u>160</u></td>
</tr>
<tr>
<td>Total (NaCl)</td>
<td>320</td>
<td><b><i>320</i></b></td>
</tr>
<tr>
<td>Albumin</td>
<td>240</td>
<td><b><i>240</i></b></td>
</tr>
</table>";
$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();

// End of Section 2
//Begin Section 3
$ProblemName = '3.  Tonicity';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/osmolarity1.png";
$ProblemText = '<p>OK, now it gets slightly more complicated.</p>
<p>You examine a single cell.  The cell has 40 mM protein G in it (protein generally does not cross the cell membrane).  You also have a huge beaker of water which has 20 mM of protein G in it.  You drop the cell into the water.  The cell will:</p>
A.  shrink<br />
B.  swell<br />
C.  not change in volume<br />
<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'B';
$ProblemChoices = 'ABC';
$AttmeptOne = "<b>Think again.</b>  Particles of protein G take up space.  The more of them there are, the more space they take up.  This means that a liter of 40 mM protein G has less space for water than in a liter of 20 mM protein G.  Therefore the concentration of water is greater on the side of the membrane with less protein G per liter volume.

Mother Nature hates concentration gradients for water.  She wants the concentrations to be the same but protein can’t cross the membrane.  Assuming the membrane is permeant to water, what will happen?";
$AttmeptOneImgSrc = "./images/osmolarity1.png";
$ExplanationImgSrc = "./images/tonicity1.png";
$Explanation = "<p>The concentration of protein G should end up being the same on each side of the membrane in this case if at all possible but 
protein G can’t cross the membrane.  However, you will recall from out lesson that almost all biological membranes are very permeable to water.  
If protein G can’t cross, water will.  So instead of G diffusing out of the cell, water will diffuse in and dilute the protein until the concentration, 
and therefore the osmolarity, is the same on both sides (i.e the concentration of protein G is 20 mM on both sides - as well as the concentration of water.  
See below.).<p>  
<p>In this case he volume of the cell will therefore double.  Imagine your cell is initially 1 liter in volume.  Yeah, I know.  Any volume will do.  
This will just make it easy. Just bear in mind that most cell volumes are a lot less that that.  Here's the calculation:</p>
40 millimole/L  X 1L = 40 millimoles protein G in the cell</br>
40 millimoles protein G/ x = 20 millimole/L</br>
x = 40/20 = 2 L</br>
<p>This all emphasizes an important point.  When we measure osmolarity we are actually measuring the gradient of WATER across the membrane. 
If I have a bag which holds 1 L, the space in it will be partially occupied by particles of solute.  The rest of the volume is occupied by water.  
If I have more particles in that 1 L of space (i.e. a higher osmolarity), I must have less water in the bag because there is less space left in 
that 1 L. Nature cannot stand water gradients. Water will therefore diffuse across a membrane from high concentration (low osmolarity, outside our cell) 
to low concentration (high osmolarity, inside our cell) until the concentration of water is the same on both sides of the membrane .</p>

<p>Note that this is a hypotonic solution, that is it made the cell increase in volume and swell.  Had the solution decreased the cell’s volume, it would have been hypertonic.  Finally, if the solution had not changed the cell volume at all, it would have been isotonic.</p>";

$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);
array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//end section 3



//begin section 4
$ProblemName = '4.  Membrane Permeant Substances';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/membrane_permeant1.png";
$ProblemText = '<p>Let\'s start over with the same conditions but let\'s add 140 mM substance H to the solution which we put the cell in.  Substance H can cross the cell membrane.  The situation is as illustrated above.</p>
<p>At this point, no substances have moved.  Relative to the inside of the cell, the solution outside is:</p>
  
A.  hypo-osmotic<br />
B.  iso-osmotic<br />
C.  hyper-osmotic<br />
<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'C';
$ProblemChoices = 'ABC';
$AttmeptOne = "<b>Sorry, that is incorrect.</b>  Remember we are adding up the mOsm/L of solute and determining the osmolarity outside of the cell relative to the inside of the cell.
Assume no water has moved yet.";
$AttmeptOneImgSrc = "./images/membrane_permeant1.png";
$ExplanationImgSrc = "./images/membrane_permeant1.png";
$Explanation = "<p>The mOsm/L on the outside exceeds the number of mOsm/L inside the cell.  The solution is <i>hyperosmotic</i>.

<table>
<tr>
<th>Intracellular</th>
<th>Concentration (mM)</th>
<th>Osmolarity (mOsm/L)</th>
</tr>
<td><u>protein G</u></td>
<td><u>40</u></td>
<td><u>40</u></td>
</tr>
<tr>
<td>Total</td>
<td>40</td>
<td><b><i>40</i></b></td>
</tr>
</table>
</br>
</br>
<table>
<tr>
<th>Extracellular</th>
<th>Concentration (mM)</th>
<th>Osmolarity (mOsm/L)</th>
</tr>
<td>substance H</td>
<td>140</td>
<td><u>140</td>
</tr>
</tr>
<td><u>protein G</u></td>
<td><u>20</u></td>
<td><u>20</u></td>
</tr>
<tr>
<td>Total</td>
<td>160</td>
<td><b><i>160</i></b></td>
</tr>
</table>";

$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = '4.  Membrane Permeant Substances';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/membrane_permeant1.png";
$ProblemText = '<p>Now let\'s crank it up another notch.  The solution outside is:</p>
  
A.  hypotonic<br />
B.  isotonic<br />
C.  hypertonic<br />
<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'A';
$ProblemChoices = 'ABC';
$AttmeptOne = "<p><b>No.  Remember that substance H is membrane permeant.</b></p>";
$AttmeptOneImgSrc = "./images/membrane_permeant1a.png";
$ExplanationImgSrc = "./images/membrane_permeant1a.png";
$Explanation = "<p>Because substance H can cross the membrane, its concentration inside the cell eventually becomes 140 mM.  However, because protein G cannot cross the membrane, water still goes into the cell, thus diluting the contents until the osmolarity equalizes on both sides of the membrane (at 160 mOsm/L).  The cell volume therefore still doubles.  This is what we mean when we say that the tonicity of a solution depends primarily upon the concentration of substances which are not able to cross the membrane.  Enough water must enter or leave the cell to dilute or concentrate these substances until the osmolarity on both sides of the membrane is the same.</p>
<p>Note well that this solution was hyper-osmotic relative to the inside of the cell.  Yet because it causes the cell to swell, it is hypotonic.  You should be able to make the distinction.  The first is a physical property of the solution,  usually described before addition to the cells or infusion into the body.  The second is a biological characteristic which describes the cellular response upon addition or infusion.</p>
<p>Often as physicians you will be performing volume expansion with isotonic solutions because you usually do not want the cells to swell to any great extent.</p>";
$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();

//End section 4

//Begin section 5

$ProblemName = '5.  Case of Dehydration';
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/dehydration.png";
$ProblemText = '<p>Now let\'s take a more practical example.  Note the this is only <em>slightly</em> more practical.  Don\'t take the numbers too seriously in that the actual changes aren\'t quite this extreme.</p>

<p>
A patient comes into the ER, apparently suffering from dehydration.  Assume that the plasma osmolarity is 320 mOsm/L (normal is about 300 mOsm/L).
</p>

<p> What is the osmolarity inside the red blood cells?

<p><b>Enter the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = '320';
$ProblemTolerance = '0';
$AttmeptOne = "<b>Nope.  Remember that cells can\'t stand to have water gradients across their membranes.  Try again.</b>";
$AttmeptOneImgSrc = "./images/dehydration.png";
$ExplanationImgSrc = "./images/dehydration.png";
$Explanation = "<p>Remember that the osmolarity inside and outside the cells must be the same.  Otherwise, the cell volume would be changing.  
Obviously this is not the case as most cells are at a constant volume unless you are in the act of perturbing the system.</p>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = '5.  Case of Dehydration';
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/dehydration.png";
$ProblemText = '<p>The doctor administers 1 L of sterile water (Don\'t actually do this, folks.  It would be bad for your patient and your practice.)
Assume the patient\'s initial blood volume was 5 L and 2 L of it was red blood cells and the rest was plasma.</p>
<p>If the initial osmolarity was 320 mOsm/L, what is the new plasma osmolarity?

<p><b>Enter the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = '267';
$ProblemTolerance = '40';
$AttmeptOne = "<b>No.  Remember that water equilibrates very quickly across the membrane of the red blood cells.  Try again.</b>";
$AttmeptOneImgSrc = "./images/dehydration.png";
$ExplanationImgSrc = "./images/dehydration.png";
$Explanation = "<p>Lets calculate it.  The initial blood volume (cells and plasma) was 5 L:</p>
<p>5 L x 320 mOsm/L = 1600 mOsm total in the blood</p>
<p>Now we add one more liter with no additional solute:</p>
5 L + 1 L = 6 L</br>
1600 mOsm/6 L = 266.7 mOsm/L</br>
<p>Yes, I know.  We only added the water to the plasma.  But the water very quickly equilibrates across the membrane diluting the cellular contents until the osmolarity is the same on both sides.  So you must account for the particles in both the plasma and the red blood cells.</p>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = '5.  Case of Dehydration';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/dehydration.png";
$ProblemText = '<p>Assuming that the total RBC volume was 2 L prior to water administration, what is the new RBC volume?  Remember that the osmolarity dropped from 
320 to 267 mOsm/L.
</p>
  
A.  1.8 L<br />
B.  2.0 L<br />
C.  2.4 L<br />
<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'C';
$ProblemChoices = 'ABC';
$AttmeptOne = "<b>No.  Didn't I just say that we added water to the plasma and that it would quickly equilibrate?  That means it would <i>enter</i> the cells, right?
Better recheck the potential answers and try again.</b>";
$AttmeptOneImgSrc = "./images/dehydration.png";
$ExplanationImgSrc = "./images/dehydration.png";
$Explanation = "<p>First, its obvious that the cells will swell in order for the osmolarity to drop from 320 mOsm/L to 266.7 mOsm/L.  That automatically eliminates 1.8 L and 2 L (which are less than or equal to the initial value of 2 L).</p>
<p>Getting beyond this common sense approach, you should also be able to calculate this:</p>
<p>2 L x 320 mOsm/L = 640 mOsm within the RBCs before water infusion.</p>
<p>The final osmolarity inside the RBCs is 266.7 mOsm/L.  This change in osmolarity was cause by movement of water across the membrane, thus diluting the cellular contents.  Therefore the new volume must be:</p>
<p>640 mOsm/(266.7 mOsm/L)=2.4 L</p>";

$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = '5.  Case of Dehydration';
$ProblemType = ProblemType::calculation;
$ImgSrc = "./images/dehydration.png";
$ProblemText = '<p>The doctor quickly realizes his mistake.  He decides that in order to correct it, he should infuse 1 L of 50o mM sucrose.  Sucrose cannot cross cell membranes.
</p>
<p>Assuming that the blood volume is 6 L and the plasma osmolarity is 266.7 mOsm/L, what will the plasma osmolarity be after infusion of sucrose?</p>  

<p><b>Enter the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = '300';
$ProblemTolerance = '19';
$AttmeptOne = "<b>Nope.  Figure the total mOsm in the blood and divide by the new blood volume.</b>";
$AttmeptOneImgSrc = "./images/dehydration.png";
$ExplanationImgSrc = "./images/dehydration.png";
$Explanation = "<p>Here's the calculation:</p>
Initial mOsm in the blood:</br>
266.7 mOsm/L X 6 L = 1600 mOsm</br>
<p>We have added:</p>
500 mOsm/L X 1 L = 500 mOsm</br>
<p>The new number of mOsm is:</p>
1600 + 500 = 2100 mOsm</br>
<p>The new blood volume is 7 L so:</p>
2100 mOsm/7 L = <b><i>300 mOsm/L</i></b></br>
<p>So we're back to normal</p>";

$NewProblem = CreateCalculation($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemTolerance, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//end section 5

//begin section 6
$ProblemName = '6.  Osmolarity and the Kidney';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/kidney1.png";
$ProblemText = '<p>Osmotic movement of water is very important physiologically and pathophysiologically.  For instance, it is particularly important for correct formulation of urine in the kidney.  The osmotic gradient between the fluid in the lumen of the renal nephron and the fluid in the renal medulla drives water movement across the epithelial wall of the nephron which separates them.
</p>

<p>
Below is a picture of such a epithelial wall.  The lumen of the nephron, where urine is produced, is on the right (B).  The renal medulla is on the left (A).  If I tell you that the osmotic gradient is responsible for concentrating the urine (i.e. it decreases the urine volume) which side of this membrane will have the higher osmolarity?
</p>

<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'A';
$ProblemChoices = 'AB';
$AttmeptOne = "<b>Sorry.  I'm sure you'll get it right this time.</b>";
$AttmeptOneImgSrc = "./images/kidney1.png";
$ExplanationImgSrc = "./images/kidney1a.png";
$Explanation = "<p>In order to concentrate the urine (i.e. decrease the urine volume), water must move from the nephron into the renal medulla.   It therefore flows down its concentration gradient from low osmolarity to high osmolarity.</p>";
$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = '6.  Osmolarity and the Kidney';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/kidney2.png";
$ProblemText = '<p>Sickle cell anemia is a disease of the red blood cells which you will be learning a great deal more about from the molecular biologists here at Rush.  Among the symptoms of the disease is an inability to concentrate urine.
</p>

<p>
Which of the situations depicted below is most likely to represent the situation in the kidney of a sickle cell patient?
</p>

<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'B';
$ProblemChoices = 'AB';
$AttmeptOne = "<b>Yeah, this was a tough one.  Try again.</b>";
$AttmeptOneImgSrc = "./images/kidney2.png";
$ExplanationImgSrc = "./images/kidney2a.png";
$Explanation = "<p>The urine is less concentrated in the sickle cell patient.  That means that there is more fluid and less solute - i.e. that the osmolarity of the urine in the nephron is lower.</p>

<p>As it turns out, the sickle cell patient can’t concentrate his/her urine because they cannot maintain a high enough osmolarity in the renal medulla.  This limits the movement of water out of the nephron because the water concentration is too high in the medulla.  The reasons for this inability to generate an osmotic gradient are not well understood.  I will be glad to discuss it with you but the explanation will likely be more meaningful after you have had cardiovascular and renal physiology.</p>
<p>Please note that as far as the physiology is concerned I do <b><i>not</b></i> expect you to know about sickle cell anemia for this class.  I <b><i>do</i></b> expect you to be able to predict the consequences of an increased or decreased osmolarity in terms of water movement in a system.</p>";
$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);
$subproblemlist = array();
//End of section 6

//Begin section 7
$ProblemName = '7.  Osmolarity in the Capillaries';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/capillary1.png";
$ProblemText = '<p>A "typical" capillary is depicted below with the hydrostatic pressure on each end.
</p>

<p>
  In which direction does blood flow through the capillary?
</p>
A.  Right to left<br />
B.  Left to right<br />
<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'A';
$ProblemChoices = 'AB';
$AttmeptOne = "<b>Nope.  Fluid flows from high pressure to low pressure.  Try again.</b>";
$AttmeptOneImgSrc = "./images/capillary1.png";
$ExplanationImgSrc = "./images/capillary1a.png";
$Explanation = "<p>Fluid always flows from high pressure to low pressure.</p>";
$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = '7.  Osmolarity in the Capillaries';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/capillary2.png";
$ProblemText = '<p>
Now, what if I also told you that the capillary wall is permeable to water and that the tissue hydrostatic pressure outside the capillary in the interstitium is lower than the hydrostatic pressure in the lumen of the capillary?
</p>

<p>At which point is the flow of water across the capillary wall (orange arrows) the greatest?
</p>

<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'B';
$ProblemChoices = 'AB';
$AttmeptOne = "<b>Sorry.  That\'s incorrect.  Fluid flows from high pressure to low pressure.  The bigger the pressure difference, the higher the rate of flow.  Try again.</b>";
$AttmeptOneImgSrc = "./images/capillary2.png";
$ExplanationImgSrc = "./images/capillary2.png";
$Explanation = "<p>The flow of water out of the capillary is highest at the arterial end where the hydrostatic pressure is greatest.  The pressure difference across the wall here is 25-5 or 20 mmHg.  The pressure difference across the wall on the venous side is 15-5 or 10 mmHg.  Thus there is less driving force for water movement at the venous end.  This process is known as filtration and you will learn more about it in cardiovascular physiology.</p>";

$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = "7.  Osmolarity in the Capillaries";
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/capillary3.png";
$ProblemText = '<p>
Opposing the process of filtration in a capillary is the process of reabsorption. Water is reabsorbed when it moves from the tissues back into the capillary lumen (purple arrows).  The process is driven by a difference in the osmolarity between the tissues (i.e. the interstitial space) and the capillary lumen.
</p>

<p>Where is the osmolarity highest??
</p>
A.  in the interstitium</br>
B.  in the capillary lumen</br>

<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'B';
$ProblemChoices = 'AB';
$AttmeptOne = "<b>Sorry.  Only one choice left.  Try again.</b>";
$AttmeptOneImgSrc = "./images/capillary3.png";
$ExplanationImgSrc = "./images/capillary3.png";
$Explanation = "<p>The osmolarity must be higher in the capillary lumen in order for water to move down its concentration gradient.  The difference in osmolarity across the capillary wall is, in fact, very small (only about 0.5%).  It is due to the presence of proteins such as albumin in the blood which cannot cross the capillary wall.  This difference is small but extremely important in capillary fluid dynamics.  The osmotic pressure contributed by non-diffusable protein molecules is known as the oncotic pressure.  That is, the oncotic pressure is higher in the capillary lumen.  We will learn more about this in the cardiovascular section.</p>";
$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

$ProblemName = '7.  Osmolarity in the Capillaries';
$ProblemType = ProblemType::multiplechoice;
$ImgSrc = "./images/capillary3.png";
$ProblemText = '<p>
Given the above, you have a patient who is malnourished and is therefore not producing proteins such as albumin at a rate necessary to maintain its normal concentration in the blood.  You would expect:
</p>
A.  Less fluid in the tissues resulting in apparent dehydration</br>
B.  No change in the amount of fluid in the tissues</br>
C.  Increased fluid in the tissues resulting in swelling</br>

<p><b>Click on the correct answer in the bar at the upper right hand corner of the page and Evaluate.</b></p>';
$ProblemAnswer = 'C';
$ProblemChoices = 'ABC';
$AttmeptOne = "<b>That's incorrect.  Remember that water is usually flowing down its concentration gradient.  Changing albumin concentration will change this gradient.  Try again.</b>";
$AttmeptOneImgSrc = "./images/capillary3.png";
$ExplanationImgSrc = "./images/capillary3.png";
$Explanation = "<p>You would expect tissue swelling.  Decreased albumin in the capillary lumen leads to decreased osmolarity.  That means increased water concentration.  Since in the process of reabsorption the water flows from the interstitium to the capillary down its concentration gradient, increasing water concentration in the capillary lumen will impede this process.  Less reabsorption means that fluid accumulates in the tissues.  This is known as edema.  It is an extremely common symptom of a variety of diseases.  It appears when the fluid balance across the capillary wall which is illustrated below is disrupted in some way.  You will learn much more about edema in the cardiovascular lectures.</p>";
$NewProblem = CreateMultipleChoice($ProblemName, $ProblemType, $ImgSrc, $ProblemText, $ProblemAnswer, $ProblemChoices, $AttmeptOneImgSrc, $AttmeptOne, $ExplanationImgSrc, $Explanation);
array_push($subproblemlist, $NewProblem);

array_push($problemlist,$subproblemlist);

?>
