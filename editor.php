<!DOCTYPE html>
<html lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<meta name='viewport' content='width=device-width, initial-scale=1.0' />

<style>
    body     { padding: 0; margin: 0 }
    textarea { height: 95vh; width: 99vw;  padding: 0; margin: 0; }
    #hdiv    { height:  3vh; }
</style>

<script src='js/input.js'></script>

<title>page editor</title>
</head>
<body>
    <div id='hdiv'>header div</div>
    <textarea oninput='KW_TA_INO.input(this.value);'>
<?php echo file_get_contents('base.html'); ?>
    </textarea>

</body>
</html>