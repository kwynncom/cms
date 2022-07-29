<?php	foreach($theps as $o) { 
			$p = $o->p;
?>
		<tr>
			<td><a href='<?php echo($p);?>'><?php echo(self::cutp($p));?></a></td>
			<td data-u='<?php echo($o->U); ?>' class='mono'><?php echo(date(self::ddatef, $o->U)); ?></td>
		</tr>
<?php	}	?>
