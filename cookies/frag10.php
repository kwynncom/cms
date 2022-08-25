<?php $cks = kwifs($_COOKIE, 0);
	if (!$cks) { ?>

<p>no cookies - nothing to do - the settings on this page are irrelevant</p>


<?php } 
else {

?>

<table style='margin-top: 2ex; '>

	<thead><tr><th></th><th>name</th><th>value</th></tr></thead>

	<tbody>
<?php foreach($_COOKIE as $k => $v) { ?>
	<tr>
		<td><span><input type='checkbox' data-ckey='<?php echo($k); ?>' /></span></td>
		<td><?php echo($k); ?></td><td class='cookv' style='visibility: hidden'><?php echo($v); ?></td>
	</tr>
<?php } ?>
	</tbody>
</table>
<?php } ?>
