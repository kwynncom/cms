<table>
<?php	

	require_once(__DIR__ . '/../dat/vis.php');
	
	$vo = new fileVis();
	
	foreach($theps as $i => $a) { 
		// $o = (object)$a;
		
		$o = $a;
		$p = $o['p'];
		$isv = $vo->isvis($p);
		$cks = $isv ? " checked='checked' " : ''; unset($isv);
		
?>
		<tr>
			
			<?php if ($this->isad && $this->isav) {	?>
			
			<td>
				<input type='checkbox' data-p='<?php echo($p); ?>' onclick='onCk(this);' id='ecb<?php echo($i);?>' <?php echo($cks); ?> />
			</td>
			
			<?php }	?>			
			<td><a href=  '<?php echo($p   ); ?>'><?php echo(self::cutp($p)); ?></a></td>
			<td    data-u='<?php echo($o['U']); ?>' class='mono'><?php echo(date(self::ddatef, $o['U'])); ?></td>
		</tr>
<?php }	?>
</table>
