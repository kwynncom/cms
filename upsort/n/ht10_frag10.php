<table>
<?php	
	$isad = isKwGoo();
	foreach($theps as $i => $o) { 
		$p = $o->p;
?>
		<tr>
			
			<?php if ($isad) {	?>
			
			<td>
				<input type='checkbox' data-p='<?php echo($p); ?>' onclick='onPCk(this);' id='ecb<?php echo($i);?>' />
			</td>
			
			<?php }	?>			
			<td><a href=  '<?php echo($p   ); ?>'><?php echo(self::cutp($p)); ?></a></td>
			<td    data-u='<?php echo($o->U); ?>' class='mono'><?php echo(date(self::ddatef, $o->U)); ?></td>
		</tr>
<?php }	?>
</table>
