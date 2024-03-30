<?php
$expense_day = $_POST["expense_day"];
$name = $_POST["name"];
$expense_type = $_POST["expense_type"];
$price_number = $_POST["price_number"];
$c   = ",";

//文字作成
$str = $expense_day.$c.$name.$c.$expense_type.$c.$price_number;

//File書き込み
$file = fopen("./data.txt","a");	// ファイル読み込み
fwrite($file, $str."\n");
fclose($file);

//入力画面に戻す
header("Location: index.php");
exit;
?>

<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>
<h2>./data/data.txt を確認しましょう！</h2>

<ul>
<li><a href="index.php">戻る</a></li>
</ul>
</body>
</html>