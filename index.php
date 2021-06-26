<?php
	session_start();
	$bar0	 = '';
	$bar1	 = '';
	$bar2	 = '';
	$bar3	 = '';
	$title	 = '';


if(isset($_SESSION['barcode'])){
	$bar0	 = $_SESSION['barcode'][0];
	$bar1	 = $_SESSION['barcode'][1];
	$bar2	 = $_SESSION['barcode'][2];
	$bar3	 = $_SESSION['barcode'][3];
	$imgh	 = $bar1 + 20;
	$title	 = ': '.$bar0;
if($bar2 == 'Yes'){
	$true = true;
}else{
	$true = '';
}}
if(isset($_GET['STYLE'])){header("Content-type: text/css");?>
body {
	margin:0px;
	margin:50px auto;
	width: 500px;
	height: 100%; 
	float:center;
	text-decoration: none;
	color: rgb(0, 128, 128);
	font:normal 12px/20px "Liberation sans", Arial, Helvetica, sans-serif;

}.div{
	width: 400px;
	float:left;
	padding:50px;
	border:1px solid rgb(0, 128, 128);
	overflow:hidden;
}.divi{
	width: 100%;
	height: <?=$imgh;?>px; 
	margin-left:-10px;
	margin-bottom:20px;
	background: url(?BARCODE) no-repeat center center;
	float:left;
}span{
	width: 180px;
	float:left;
	padding:0px 0px;
	margin:10px 90px 0px 90px;
	overflow:hidden;
	background:#FFFFFF;
	font:bold 12px/20px "Liberation sans", Arial, Helvetica, sans-serif;
}

input, select{
	width: 200px;
	float:left;
	padding:5px 10px;
	margin:0px 90px 5px 90px;
	border:1px solid rgb(0, 128, 128);
	overflow:hidden;
	background:#FFFFFF;
}[type=submit]{
	color: #FFFFFF;
	font:bold 12px/20px "Liberation sans", Arial, Helvetica, sans-serif;
	background:rgb(0, 128, 128);
}

<?php }else{?>
<?php if(isset($_GET['BARCODE'])){
if(isset($_SESSION['barcode'])){
if(isset($_SESSION['SAVE'])){
	$SAVE	 = $_SESSION['SAVE'];
	unset($_SESSION['SAVE']);
	header("location:");
}else{	$SAVE	 = '';}
	require_once 'barcode.php';
}}else{
if(isset($_POST['barcode'])){
	$sizeh = $_POST['sizeh'];
	$text = $_POST['text'];
	$code = $_POST['code'];
if(empty($sizeh)){
	$sizeh = 40;
}
	$_SESSION['barcode']	 = array($_POST['barcode'], $sizeh, $text, $code);
	header("location:");
}
if(isset($_POST['SAVE'])){
	$_SESSION['SAVE']	 = 'img/BARCODE_'.$bar0.'-'.$bar1.'-'.$bar2.'-'.$bar3.'.png';
	header("location:");
}
if(isset($_POST['CLOSE'])){
	unset($_SESSION['barcode']);
	header("location:");
}}?>

<?php if(!isset($_GET['BARCODE'])){?>
<html><title>Create Barcode <?=$title;?></title>
<head>
<style>@import url("?STYLE");</style>
</head>
<body>

<div class='div'>

<?php if(isset($_SESSION['barcode'])){?>
<div class='divi'></div>
<form method="post" action=""><input type="submit" name="SAVE" value="SAVE BARCODE"></form>
<form method="post" action=""><input type="submit" name="CLOSE" value="EXIT"></form>
<?php }?>

<form method="post" action="">
<span>Barcode Text</span>
	<input type="text" name="barcode" value="<?=$bar0;?>">
<span>Barcode Height</span>
	<input type="number" name="sizeh" value="<?=$bar1;?>">
<span>Barcode Text Display</span>
	<select name="text">
<?php if(isset($_SESSION['barcode'])){?>
		<option value="<?=$bar2;?>"><?=$bar2;?></option>
<?php }?>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	<select>
<span>Barcode Code Type</span>
	<select name="code">
<?php if(isset($_SESSION['barcode'])){?>
		<option value="<?=$bar3;?>"><?=$bar3;?></option>
<?php }?>
		<option value="39">39</option>
		<option value="128">128</option>
	<select>
	<input type="submit"  value="GENERATE">
</form>


</div>
</body>
</html>
<?php }}?>












