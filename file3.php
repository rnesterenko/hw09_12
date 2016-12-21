<?php
?>

<?

include("header.php");

?>

<?

include("footer.php");

?>

<?php

$master ="Рассчитаться за покупку";

?>

<?php

if ($master == "Рассчитаться за покупку")
{

    echo "<p>Операции он-лайн</p>";

}

else

{

    echo "<p><a href=\"file3.php\" title=\"Рассчитаться за покупку\">Операции он-лайн</a></p>";

}
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
    <a href="file1.php" title="Отдать нам свои деньги">Буду клиентом</a>|
    <a href="file2.php" title="Операции со своими крокодилами">Распоряжение своими крокодилами</a>|
    <a href="file4.php" title="Скорая помощь клиенту">Кто-нибудь сделайте что-нибудь</a></h3>

<form action="processorder.php" method="GET">
    <table border="0">
        <tr bgcolor="green">
            <td width="150" align="center">Реквизиты получателя</td>
            <td width="150" align="center">Заполняем здесь</td>
        </tr>
        <tr>
            <td>Получатель (наименование)</td>
            <td align="center"><input type="text" name="seller" size="100" maxlength="100"  /> </td>
        </tr>
        <tr>
            <td>Счет получателя</td>
            <td align="center"><input type="text" name="accountqty" size="100" maxlength="100" /> </td>
        </tr>
        <tr>
            <td>МФО банка получателя</td>
            <td align="center"><input type="text" name="bankqty" size="100" maxlength="100" /> </td>
        </tr>
        <tr>
            <td>ЕДРПОУ получателя</td>
            <td align="center"><input type="text" name="codeqty" size="100" maxlength="100" /> </td>
        </tr>
        <tr>
            <td>Наименование платежа</td>
            <td align="center"><input type="text" name="textqty" size="100" maxlength="100" /> </td>
        </tr>
        <tr>
            <td>Сумма платежа</td>
            <td align="center"><input type="text" name="sumqty" size="100" maxlength="100" /> </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Обработать платеж" /></td>
        </tr>
    </table>
</form>
<p><img src="1.jpg" alt="Let's go!"></p>

</body>

</html>