<div>
<?php
	require_once('/opt/kwynn/isKwGoo.php');

	if ($this->isad) {
		require_once(__DIR__ . '/../dat/vis.php');
		$iacs = $this->isav ? " checked='checked' " : '';
			
?>
		<label> <input type='checkbox' id='adminToggle' <?php echo($iacs); ?>  onclick='onCk(this);' /> 	Admin on?    </label>
	
<?php 
		unset($iacs);
	} 
?> 
</div>