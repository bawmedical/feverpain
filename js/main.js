var result_summary;
var result_score;

$(document).ready(function()
	{
	$("#form1").submit(function() 
		{
		//Validate required fields
		var valid = validate();

		//Store summary (form may change between score and summary)
		result_summary = summarytext();

		//Display score
		if(valid) 
			{
			result_score = scoretext();
			$("#score textarea").val(result_score);
			$("#score textarea").css('height', (result_score.split('\n').length + 1) + 'em');
			$("#score").css('display', 'table');
			$("#summary").css('display', 'none');
			}
		
		return false;
		});
		
	$("#form2").submit(function() 
		{
		//Get prescribing strategy
		var strategy = strategytext();
		
		//Replace score with summary
		var text = result_summary + result_score + strategy;
		$("#summary textarea").val(text);
		$("#summary textarea").css('height', (text.split('\n').length + 2) + 'em');
		$("#score").css('display', 'none');
		$("#summary").css('display', 'table');
		
		return false;
		});
	});

function validate()
	{
	var valid = true;
	var items = ['cough','history','onset','inflamed','pus'];
	for(var i in items) 
		{
		var border = 'none';
		var jqid = 'input[name=' + items[i]+ ']:checked';
		//if($(jqid).val() == '')
		if($(jqid).val() == undefined)
			{
			valid = false;
			border = '2px solid red'; 
			}

		$('input[name=' + items[i]+ ']').parent().css('border', border); 
		}
		
	$("#warning").text(valid ? '' : 'Required field(s)'); 
	
	return valid;
	}
	
function summarytext()
	{	
	var summary = 'Ill for ' + $('input[name=onset]:checked').val() + '\n\n';;
	var value = ($('input[name=sorethroat]:checked').val() == undefined ? '' : $('input[name=sorethroat]:checked').val());
	summary += (value == '' ? '' : value + ' sore throat, ');
	summary += $('input[name=cough]:checked').val() + ' cough or cold symptoms, ';
	value = ($('input[name=aches]:checked').val() == undefined ? '' : $('input[name=aches]:checked').val());
	summary += (value == '' ? '' : value + ' muscle aches');
	summary += '\n' + $('input[name=history]:checked').val() + ' fever in the last 24 hours\n';
	value = ($('input[name=cervical]:checked').val() == undefined ? '' : $('input[name=cervical]:checked').val());
	summary += (value == '' ? '' : 'Cervical glands ' + value + ', ');
	summary += $('input[name=inflamed]:checked').val() + ' inflamed tonsils, ';
	summary += $('input[name=pus]:checked').val() + ' on tonsils\n';
	summary += ($('textarea[name=fever]').val() == '' ? '' : $('textarea[name=fever]').val() + '\n') + '\n';
	
	return summary;
	}

function scoretext()
	{		
	//Calculate score
	var score = 0;
	if($('input[name=cough]:checked').val() == 'No') score += 1;
	if($('input[name=history]:checked').val() == 'History of') score += 1;
	if($('input[name=onset]:checked').val() == '0-3 days') score += 1;
	if($('input[name=inflamed]:checked').val() == 'Severe') score += 1;
	if($('input[name=pus]:checked').val() == 'Pus') score += 1;
	
	//Set apropriate text
	var text = 'FeverPain Clinical Score = ' + score + '\n\n';
	if(score <= 1)
		{
		text += 'A score of 0-1 is associated with 13-18% isolation of streptococcus- close to\nbackground carriage rates.\nA no prescribing strategy is appropriate after discussion';
		}
	else if(score <= 3)
		{
		text += 'A score of 2 or 3 is associated with 34-40% isolation of streptococcus-\nA delayed prescribing strategy is appropriate after discussion';
		}
	else
		{
		text += 'A score of 4 or more is associated with 62-65% isolation of streptococcus-\nConsider an immediate prescribing strategy if symptoms are severe or a short\ndelayed prescribing strategy may be appropriate (48 hours)';
		}
	
	return text;
	}
	
function strategytext()
	{	
	var strategy = '';
	var value = $("#score input[name=strategy]:checked").val();
	if((value != undefined) && (value != ''))
		{
		strategy = '\n\nPrescribing strategy: ' + value;
		if(value == 'Delay prescription by')
			{
			strategy += ' ' + $('select[name=delay]').val() + ' day(s)';
			}
		}
	
	return strategy;
	}	
	
	
$(function() {
	$('a#popopen').click(function(e) 
		{ 
		var element = $('table#' + $(this).attr('popid'));
		element.show();
		element.css('top', e.pageY + parseInt($(this).attr('popy'))).css('left', e.pageX + parseInt($(this).attr('popx')));

		return false; 
		});

	$('a#popclose').click(function(e) 
		{ 
		$('table#' + $(this).attr('popid')).hide();

		return false; 
		});	
	
	/*
	$('a#pophover').hover(function(e) {
		var element = $('table#' + $(this).attr('popid'));
		element.show();
		element.css('top', e.pageY + 0).css('left', e.pageX + 20);
	}, function() {
		$('table#' + $(this).attr('popid')).hide();
	});
	*/
  });	
