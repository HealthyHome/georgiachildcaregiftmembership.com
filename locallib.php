<?
//-----------------------------------------------------------------------------------------------------------------
// PrintValidationErrors
//-----------------------------------------------------------------------------------------------------------------

function PrintValidationErrors($Validate)
{
	if (! $Validate->Error()) { return; }
	
?>
<div id="ErrorDiv">
	The following error(s) have occurred:<br />
	<ul id="ErrorList">
<?
	foreach($Validate->Errors as $Error)
	{
?>
		<li><? print $Error; ?></li>
<?
	}
?>
	</ul>
<span class="ErrorText">
 <a href="#" onClick="forms[0].submit();" class="ErrorText">Click here</a> to return to the previous page and correct the error(s).
 </span>
</div>
<?
}
?>