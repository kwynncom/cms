<table style='margin-top: 2ex; '>
	<thead>
		<tr><th></th><th>name</th><th>value</th></tr>
	</thead>
	<tbody>
	
<?php foreach($_COOKIE as $k => $v) { ?>
	<tr>
		<td><input type='checkbox' data-ckey='<?php echo($k); ?>' /></td>
		<td><?php echo($k); ?></td><td class='cookv' style='visibility: hidden'><?php echo($v); ?></td>
	</tr>
<?php } ?>
	</tbody>
</table>

<div style='margin-top: 1ex;'>
	<input type='number' style='font-family: monospace; width: 5em;' oninput='checkNum();' id='cexHours' /> <label>hours </label>
	<button onclick='new changeCVs();'>change expiration</button>
</div>

<p>Check the boxes associated with names and then set the number of hours until expiration.  Fractions are fine.  Note these special cases:</p>

<ul>
	<li>0 means the cookie lasts until the browser closes</li>
	<li>negative numbers will expire / delete the cookie(s)</li>
</ul>