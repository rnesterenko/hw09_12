<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ваш заказ</title>
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
<h2 align="center"><span class="letter">Р</span>езультаты заказа</h2>
<p><img src="3.gif" alt="OOOoo!"></p>

<?php


$agreementqty= $_GET['agreementqty'];
$audiyqty= $_GET['audiyqty'];
$salaryqty= $_GET['salaryqty'];

define('agreementprice', 200);
define('auditprice', 500);
define('salarprice', 100);


echo '<p>Заказ обработан в';
echo date('H:i, jS F Y');
echo '</p>';

echo "<p>Суммарный заказ</p>";

echo "Синих крокодилов: $agreementqty <br />";
echo "Зеленых крокодилов: $audiyqty <br />";
echo "Розовых крокодилов: $salaryqty <br />";

?>
<p><img src="1.jpg" alt="Let's go!"></p>
</body>

</html>


