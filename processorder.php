<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Результаты платежа</title>
    <style>
        P {
            text-indent: 20px;
            text-align: center;
            color: rgb(13, 20, 151);
        }
        .letter {
            color: #051297;
            font-size: 200%;
        }
    </style>
</head>
<body bgcolor="#f0fff0">
<h1 align="center"><span class="letter">К</span>рокодил МИНИ</h1>
<h2 align="center"><span class="letter">С</span>татус платежа</h2>

<?php


$seller= $_GET['seller'];
$accountqty= $_GET['accountqty'];
$bankqty= $_GET['bankqty'];
$codeqty= $_GET['codeqty'];
$textqty= $_GET['textqty'];
$sumqty= $_GET['sumqty'];

echo '<p>Платеж обработан в';
echo date('H:i, jS F Y');
echo '</p>';

echo "<p>Оплата согласно реквизитов</p>";

echo "Получатель: $seller <br />";
echo "Счет Получателя: $accountqty <br />";
echo "Банк Получателя: $bankqty <br />";
echo "Код ЕДРПОУ: $codeqty <br />";
echo "Назначение платежа: $textqty <br />";
echo "Сумма платежа: $sumqty <br />";

?>
<p><img src="1.jpg" alt="Let's go!"></p>
</body>

</html>


