<table>
<?php	

	require_once(__DIR__ . '/../dat/vis.php');

	$isad = isKwGoo();
	$vo = new fileVis();
	
	foreach($theps as $i => $o) { 
		$p = $o->p;
		$isv = $vo->isvis($p);
		$cks = $isv ? " checked='checked' " : ''; unset($isv);
?>
		<tr>
			
			<?php if ($isad) {	?>
			
			<td>
				<input type='checkbox' data-p='<?php echo($p); ?>' onclick='onCk(this);' id='ecb<?php echo($i);?>' <?php echo($cks); ?> />
			</td>
			
			<?php }	?>			
			<td><a href=  '<?php echo($p   ); ?>'><?php echo(self::cutp($p)); ?></a></td>
			<td    data-u='<?php echo($o->U); ?>' class='mono'><?php echo(date(self::ddatef, $o->U)); ?></td>
		</tr>
<?php }	?>
</table>
