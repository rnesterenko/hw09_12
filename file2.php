<?php
?>
<?php

$master ="Операции со своими крокодилами";

?>
<?

include("header.php");

?>

<?

include("footer.php");

?>

<?php

if ($master == "Операции со своими крокодилами")
{

    echo "<p>Распоряжение своими крокодилами</p>";

}

else

{

    echo "<p><a href=\"file2.php\" title=\"Операции со своими крокодилами\">Распоряжение своими крокодилами</a></p>";

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
<h3 align="center"><a href="index.php" title="Главная страница">Главная</a>|
    <a href="file1.php" title="Отдать нам свои деньги">Буду клиентом</a>|
    <a href="file3.php" title="Рассчитаться за покупку">Операции он-лайн</a>|
    <a href="file4.php" title="Скорая помощь клиенту">Кто-нибудь сделайте что-нибудь</a></h3>


<p><img src="1.jpg" alt="Let's go!"></p>

</body>

</html>