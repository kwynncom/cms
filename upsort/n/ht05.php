<div>
<?php
	require_once('/opt/kwynn/isKwGoo.php');

	$ikg = isKwGoo();
	if ($ikg) {
?>
	<label> <input type='radio' name='visMode' value='admin'   /> 	admin    </label>
	<label style='padding-left: 2ex; '> <input type='radio' name='visMode' value='enduser' /> 	end user </label>
	
<?php } ?> 
</div>