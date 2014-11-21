<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>FeverPain</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="css/main.css" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/main.js?v2"></script>
</head>

<body>

<form id="form1">
<table id="formtable">
	<tr><th class="title" colspan="2">
		<div id="hits">Hit Count: 
		<?php
		$hits = file_get_contents('hits.txt') + 1;
		echo $hits;
		file_put_contents('hits.txt', $hits);
		?> 
		</div>
		Fever PAIN Clinical Score<br />
		<a id="popopen" popid="pop_bg" popx="20" popy="0" href="#">Background Information</a><br />
		<div id="guide">Further guidance on the treatment of respiratory infection is available from the <a href="http://www.hpa.org.uk/webc/HPAwebFile/HPAweb_C/1279888711402" target="_blank">Health Protection Agency</a></div>
		<a id="popopen" popid="pop_shortcut" popx="20" popy="0" href="#">How to create a desktop shortcut for this site</a><br />
		</th>
	</tr>
	<tr><th colspan="2">History</th></tr>
	<tr class="row0"><td>Sore throat</td><td>
		<input type="radio" name="sorethroat" value="No" />None
		<input type="radio" name="sorethroat" value="Mild" />Mild
		<input type="radio" name="sorethroat" value="Moderate" />Moderate
		<input type="radio" name="sorethroat" value="Severe" />Severe
		<input type="radio" name="sorethroat" value="" />No answer	
	</td></tr>
	<tr class="row1"><td>Cough or Cold symptoms</td><td>
		<input type="radio" name="cough" value="No" />None
		<input type="radio" name="cough" value="Mild" />Mild
		<input type="radio" name="cough" value="Moderate" />Moderate
		<input type="radio" name="cough" value="Severe" />Severe<span>*</span>
	</td></tr>
	<tr class="row0"><td>Muscle aches</td><td>
		<input type="radio" name="aches" value="No" />None
		<input type="radio" name="aches" value="Mild" />Mild
		<input type="radio" name="aches" value="Moderate" />Moderate
		<input type="radio" name="aches" value="Severe" />Severe
		<input type="radio" name="aches" value="" />No answer	
	</td></tr>
	<tr class="row1"><td>History of Fever in last 24 hours</td><td>
		<input type="radio" name="history" value="History of" />Yes
		<input type="radio" name="history" value="No" />No<span>*</span>
	</td></tr>
	<tr class="row0"><td>Onset of illness</td><td>
		<input type="radio" name="onset" value="0-3 days" />0-3 days
		<input type="radio" name="onset" value="4-7 days" />4-7 days
		<input type="radio" name="onset" value="7+ days" />7+ days<span>*</span>
	</td></tr>
	<tr><th colspan="2">Examination</th></tr>
	<tr class="row0"><td>Cervical glands</td><td>
		<input type="radio" name="cervical" value="Normal" />None
		<input type="radio" name="cervical" value="1-2cm" />1-2cm
		<input type="radio" name="cervical" value="> 2cm" />> 2cm
		<input type="radio" name="cervical" value="" />No answer
	</td></tr>
	<tr class="row1"><td>Inflamed tonsils</td><td>
		<input type="radio" name="inflamed" value="No" />None
		<input type="radio" name="inflamed" value="Mild" />Mild
		<input type="radio" name="inflamed" value="Moderate" />Moderate
		<input type="radio" name="inflamed" value="Severe" />Severe<span>*</span>
	</td></tr>	
	<tr class="row0"><td>Pus on tonsils</td><td>
		<input type="radio" name="pus" value="Pus" />Yes
		<input type="radio" name="pus" value="No pus" />No<span>*</span>
	</td></tr>
	<tr class="row1"><td>Fever present<br /><div class="annot">Type in here the temperature and any other free text needed for the summary</div></td><td><textarea name="fever"></textarea></td></tr>
	<tr><td colspan="2" class="nopad"><button type="submit">Display Score</button></td></tr>
</table>
</form>

<div id="warning"></div>

<form id="form2">
<table id="score">
	<tr><th id="title" class="title" colspan="2">Score</th></tr>
	<tr><td colspan="2" class="nopad"><textarea></textarea></td></tr>
	<tr class="row0" id="strategy"><td>Prescribing strategy (if required)<br /></td><td>
		<input type="radio" name="strategy" value="No prescription" />No prescription<br />
		<input type="radio" name="strategy" value="Delay prescription by" /><a id="popopen" popid="pop_delay" popx="20" popy="-550" href="#">Delay prescription</a> by
			<select name="delay"><option value="">---</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select> day(s)<br />
		<input type="radio" name="strategy" value="Immediate prescription" />Immediate prescription<br />
		<input type="radio" name="strategy" value="" />No answer</td></tr>
	<tr id="butsummary"><td colspan="2" class="nopad"><button type="submit">Display Summary</button></td></tr>		
</table>
</form>

<table id="summary">
	<tr><th id="title" class="title" colspan="2">Summary<br /><a id="popopen" popid="pop_copy" popx="20" popy="-210" href="#">How to Copy & Paste this summary</a></th></tr>
	<tr><td colspan="2"><textarea></textarea></td></tr>
</table>

<table id="pop_bg" class="popup">
	<tr><th class="title">Fever PAIN score - Background</th></tr>
	<tr><td>
		<p>
		The Fever PAIN score was derived from a cohort study including 1760 adults and children aged 3 and over. The score was tested in a trial comparing three prescribing strategies, empirical delayed prescribing, use of the score to direct prescribing or combination of the score with use of a near patient test (NPT) for streptococcus. Using  the score resulted in more rapid symptom resolution and reduced prescribing of antibiotics  (both reduced by one third).  The addition of the NPT did not confer any additional benefit.
		</p>
		The score consist of five items:
		<ul>
		<li>Fever during previous 24 hours;</li>
		<li>Purulence;</li>
		<li>Attend rapidly (<=3 days);</li>
		<li>very Inflamed tonsils;</li>
		<li>No cough/coryza (FeverPAIN)</li>
		</ul>
		<p>Using the sore throat tool enables rapid calculation of the score, gives a treatment guide and provides a summary to cut and paste in the notes.</p>
	</td></tr>
	<tr><td>
		<p>Published papers:
		<ol>
		<li>Little P, Stuart B, Hobbs FD, Butler CC, Hay AD, Delaney B, et al. Antibiotic prescription strategies for acute sore throat: a prospective observational cohort study. Lancet Infect Dis. 2014.</li>
		<li>Little P, Hobbs FR, Moore M, Mant D, Williamson I, McNulty C, et al. PRImary care Streptococcal Management (PRISM) study: in vitro study, diagnostic cohorts and a pragmatic adaptive randomised controlled trial with nested qualitative study and cost-effectiveness study. Health Technol Assess. 2014;18(6):1-102.<br /><a href="http://eprints.soton.ac.uk/361649/" target="_blank">http://eprints.soton.ac.uk/361649/</a>
		</li>
		<li>Little P, Moore M, Hobbs FD, Mant D, McNulty C, Williamson I, et al. PRImary care Streptococcal Management (PRISM) study: identifying clinical variables associated with Lancefield group A beta-haemolytic streptococci and Lancefield non-Group A streptococcal throat infections from two cohorts of patients presenting with an acute sore throat. BMJ Open. 2013;3(10):e003943.</li>
	</td></tr>
	<tr><td class="close"><a id="popclose" popid="pop_bg" href="#">Close</a></td></tr>
</table>

<table id="pop_delay" class="popup">
	<tr><th class="title">Delay Prescription - Further Information</th></tr>
	<tr><td>
		<p>
		Delayed prescribing does not simply mean the issue of a prescription with vague wording about delay but should include:
		<ol>
		<li>Information on the natural history of the illness<p>‘Sore throats typically last 7-10 days in total but you should start to feel better after about the 5th day’</p></li>
		<li>Information about the benefit of antibiotics <p>‘Antibiotics on average reduce the duration of symptoms by about 12 hours’</p></li>
		<li>Then summarise <p>‘Sore throats will get better on their own if you leave your body to fight off the bugs and antibiotics are of limited help. Some people find it useful to have an antibiotic prescription to cash in if the symptoms are getting worse or not improving as expected- would you be interested in this’</p></li>
		<li>An explanation of the delay, the precise delay will depend on the severity of the illness and how long the symptoms have been present already but be explicit and be prepared to negotiate<p>‘You have already been ill for 3 days so I would expect you to start to improve within a couple of days, if you are not improving after 5 days then cash in the prescription’</p></li>
		<li>Summarise and safety net<p>‘So in summary then we would expect this illness to last 6-10 days on average and antibiotics are unlikely to have much effect on this. I have given you a prescription and you are in charge of when to take this. I suggest you wait about 5 days before cashing in the prescription but of course if you get much  worse in the meantime you can cash it in earlier or get back in touch with me’</p></li>
		</ol>
		</p>
		Evidence from trials suggest that prescription uptake is reduced to about 30% from 90% using this strategy, patients given a delayed prescription have high satisfaction levels and are less likely to re-consult than those given an immediate prescription with no effect on recovery rates
		<a href="http://www.bmj.com/content/314/7082/722" target="_blank">http://www.bmj.com/content/314/7082/722</a><br />
		<a href="http://www.bmj.com/content/315/7104/350" target="_blank">http://www.bmj.com/content/315/7104/350</a>
		<p>A <a href="pdfs/Patient-Antibiotic-leaflet.pdf" target="_blank">patient hand out</a> to aid delayed prescribing is available on the <a href="http://www.rcgp.org.uk/clinical-and-research/target-antibiotics-toolkit.aspx" target="_blank">RCGP Target website</a></p>
		</td></tr>
	<tr><td class="close"><a id="popclose" popid="pop_delay" href="#">Close</a></td></tr>
</table>

<table id="pop_copy" class="popup">
	<tr><th class="title">Copy & Paste Instructions</th></tr>
	<tr><td>
		<p>
		To copy all the summary information to the clipboard:
		<ul>
		<li>Click in the summary text box</li>
		<li>Ctrl+A or R-Mouse > Select all</li>
		<li>Ctrl+C or R-Mouse > Copy</li>
		</ul>
		To paste the summary information from the clipboard:
		<ul>
		<li>Select destination</li>
		<li>Ctrl+V or R-Mouse > Paste</li>
		</ul>
		</p>
		</td></tr>
	<tr><td class="close"><a id="popclose" popid="pop_copy" href="#">Close</a></td></tr>
</table>

<table id="pop_shortcut" class="popup">
	<tr><th class="title">Create Desktop Shortcut</th></tr>
	<tr><td>
		<p>
		To create a desktop shortcut to this site:
		<ul>
		<li>Simply drag the icon from the browser address box to the desktop</li>		
		</ul>
		Alternatively, using the Create Shortcut wizard:
		<ul>
		<li>R-Mouse click on your Desktop and select New > Shortcut</li>
		<li>For the location use: https://ctu1.phc.ox.ac.uk/feverpain</li>
		<li>Click &lt;Next&gt;</li>
		<li>For the shortcut name use: FeverPAIN Clinical Score</li>
		<li>Click &lt;Finish&gt;</li>
		</ul>
		</p>
		</td></tr>
	<tr><td class="close"><a id="popclose" popid="pop_shortcut" href="#">Close</a></td></tr>
</table>

</body>
</html>
