<div>
<?php
	require_once('/opt/kwynn/isKwGoo.php');

	$ikg = isKwGoo();
	if ($ikg) {
?>
	<label> <input type='checkbox' id='adminToggle' checked='checked'  onclick='onCk(this);' /> 	Admin on?    </label>
	
<?php } ?> 
</div>