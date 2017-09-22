<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
	font-family: Verdana;
	margin:0;
	padding:0;
}
.loader{
	position: absolute;
	display:block;
	top:0;
	left:0;
	bottom:0;
	right:0;
	width: 100%;
	height:100%;
	background: rgba(0,0,0,.5);
	font-size:2.5em;
	display:none;
}
.loader span{
	position:relative;
	display:block;
	width:100%;
	text-align:center;
	margin-top:25%;
	transform:translateY(-50%);
}
.msg-error{
	color: #f00;
}
.msg-done{
	line-height:3.2em;
	color: #00f;
}
form{
	display:block;
	width:100%;
	background:#222;
	padding:10px 25px;
	color: #fff;
}
.message{
	padding: 0 30px;
}
</style>
</head>
<body>

<form method="POST">
<label>Podaj adres strony <span>bez protokołu ( http:// )</span></label>
<input id="adres" name="address" type="text" placeholder="http://">
<input type="submit" value="Wczytaj">
</form>

<div class="loader"><span class="msg-error"></span><span class="msg-done"></span></div>
<?php
	if( $_POST ){
	$pageSrc = file_get_contents('http://'.$_POST['address']);
	$noScript = preg_replace('/<script\s(.+?)>(.+?)<\/script>/is', '', $pageSrc);
	$noScript2 = preg_replace('/<script>(.+?)<\/script>/is', '', $noScript);
	$noStyle = preg_replace("/<style\s(.+?)>(.+?)<\/style>/is", "", $noScript2);
	echo '<div class="message">'.strip_tags( $noStyle ).'</div>';
	}
?>

<script src="ptt.js"></script>
</body>
</html>