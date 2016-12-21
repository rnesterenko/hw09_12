<?php
?>

<?

include("header.php");

?>

<?

include("footer.php");

?>

<html>

<head>

    <meta charset="UTF-8">
    <title>Crocodile-MINI</title>
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

<body>

<body bgcolor="#f0fff0">
<h3 align="center"><a href="index.php" title="Главная страницаи">Главная</a>|
    <a href="file2.php" title="Операции со своими крокодилами">Распоряжение своими крокодилами</a>|
    <a href="file3.php" title="Рассчитаться за покупку">Операции он-лайн</a>|
    <a href="file4.php" title="Скорая помощь клиенту">Кто-нибудь сделайте что-нибудь</a></h3>

<h1 align="center"><span class="letter">К</span>упить крокодила</h1>

<form action="servissorder.php" method="GET">
    <table border="0">
        <tr bgcolor="green">
            <td width="150" align="center">Наименование</td>
            <td width="150" align="center">Количество</td>
        </tr>
        <tr>
            <td>Синий крокодилы</td>
            <td align="center"><input type="text" name="agreementqty" size="100" maxlength="100"  /> </td>
        </tr>
        <tr>
            <td>Зеленый крокодил</td>
            <td align="center"><input type="text" name="audiyqty" size="100" maxlength="100"  /> </td>
        </tr>
        <tr>
            <td>Розовый крокодил</td>
            <td align="center"><input type="text" name="salaryqty" size="100" maxlength="100"  /> </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Оформить заказ" /></td>
        </tr>
    </table>
</form>
<p><img src="1.jpg" alt="Let's go!"></p>

</body>

</html>