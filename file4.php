<?php
?>

<?

include("header.php");

?>

<?

include("footer.php");

?>

<?php

$master ="Скорая помощь клиенту";

?>
<?php

if ($master == "Скорая помощь клиенту")
{

    echo "<p>Кто-нибудь сделайте что-нибудь</p>";

}

else

{

    echo "<p><a href=\"file4.php\" title=\"Скорая помощь клиенту\">Кто-нибудь сделайте что-нибудь</a></h3></p>";

}
?>


    <?php


    session_start();

    date_default_timezone_set('Europe/Kiev');


    $commentsFile = __DIR__ . DIRECTORY_SEPARATOR . 'contact.dat';

    $_SESSION['validationErrors'] = [];

    function getComments() {
        global $commentsFile;
        $sData = false;
        if (file_exists($commentsFile)) {
            $sData = file_get_contents($commentsFile);
        }
        $aComm = [];
        if ($sData !== false) {
            $aComm = unserialize($sData);
        }
        return $aComm;
    }

    function antimat($str) {
        if (!empty($str))
            return str_replace([
                'hro',
                'pth',
                'comment',
            ], [
                'bro',
                'Heroyam Slava!',
                '',
            ], $str);
    }

    function displayComments() {
        $comm = getComments();
        $outHtml = '';
        if (!empty($comm)) {
            foreach ($comm as $k => $co) {
                $outHtml .= '<div class="comment' . $k . '"><a href="mailto:' . $co['umail'] . '">' . $co['uname'] . '</a> added comment on ' . $co['addDtTm'] . ' phone: ' . $co['utel'] . '<br>' . antimat($co['ucomm']) . '</div>';
            }
        }
        echo $outHtml;
    }

    function saveFormData($newData) {
        $oldComments = getComments();
        global $commentsFile;
        $newData['addDtTm'] = date('Y-m-d H:i:s');
        $allComments = array_merge([0 => $newData], $oldComments);
        $serData = serialize($allComments);
        file_put_contents($commentsFile, $serData);
    }

    if (!empty($_POST)) {
        if (empty($_POST['uname'])) {
            $_SESSION['validationErrors'][] = 'Error: input name!';
        }
        if (empty($_POST['umail'])) {
            $_SESSION['validationErrors'][] = 'Error: input email!';
        }
        if (!filter_var($_POST['umail'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['validationErrors'][] = 'Error: wrong email value!';
        }
        if (empty($_POST['utel'])) {
            $_SESSION['validationErrors'][] = 'Error: empty phone number!';
        }
        $_POST['utel'] = preg_replace('/\D/', '', $_POST['utel']);
        if (strlen($_POST['utel']) < 10) {
            $_SESSION['validationErrors'][] = 'Error: phone number should have 10 digits!';
        }
        if (empty($_POST['ucomm'])) {
            $_SESSION['validationErrors'][] = 'Error: comments!';
        }
        if (empty($_SESSION['validationErrors'])) {
            saveFormData($_POST);
            if (!headers_sent()) {
                header('Location: ' . $_SERVER["SCRIPT_NAME"] . '?' . rand(10, 99));
                exit;
            }
        }
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
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
</head>

<body>

<body bgcolor="#f0fff0">
<h3 align="center"><a href="index.php" title="Главная страницаи">Главная</a>|
    <a href="file1.php" title="Отдать нам свои деньги">Буду клиентом</a>|
    <a href="file2.php" title="Операции со своими крокодилами">Распоряжение своими крокодилами</a>|
    <a href="file3.php" title="Рассчитаться за покупку">Операции он-лайн</a>

    <h3 align="center">Если Вашему разуму необходимо вторжение в наш - задайте свой вопрос.</h3>

    <?php
    if (!empty($_SESSION['validationErrors'])) {
        echo '<p>Не все написали, заполняйте внимательнее:</p>';
        foreach ($_SESSION['validationErrors'] as $validationError) {
            echo '<p>' . $validationError . '</p>';
        }
    }
    ?>
    <form align="center" id="myform" action="<?=$_SERVER["SCRIPT_NAME"]?>" method="post">
        <div>
            <label for="uname">Ваше имя *:</label><input type="text" name="uname" value=""  size="30" maxlength="30" placeholder="введите Ваше имя" required>
        </div>
        <div>
            <label for="umail">Email *:</label><input type="email" name="umail" value=""  size="30" maxlength="30" placeholder="введите Ваш мейл" required>
        </div>
        <div>
            <label for="utel">Телефон *:</label><input type="phone" id="utel" name="utel" value=""  size="30" maxlength="30" placeholder="Введите Ваш номер телефона" required>
        </div>
        <div>
            <label for="ucomm">Вопрос *:</label><br>
            <textarea name="ucomm" cols="50" rows="10"  placeholder="Задайте вопрос" required></textarea>
        </div>
        <input type="submit" value="Спросить">
        <p>* - Туда необходимо чего-нибудь умное напечатать</p>
    </form>

    <hr>
    <?php
    displayComments();
    ?>


<p><img src="1.jpg" alt="Let's go!"></p>

</body>

</html>
