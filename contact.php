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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact form</title>
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
</head>
<body>
<?php
    if (!empty($_SESSION['validationErrors'])) {
        echo '<p>Contact form has the following errors:</p>';
        foreach ($_SESSION['validationErrors'] as $validationError) {
            echo '<p>' . $validationError . '</p>';
        }
    }
?>
    <form id="myform" action="<?=$_SERVER["SCRIPT_NAME"]?>" method="post">
        <div>
            <label for="uname">Username *:</label><input type="text" name="uname" value="" placeholder="Input your name" required>
        </div>
        <div>
            <label for="umail">Email *:</label><input type="email" name="umail" value="" placeholder="Input your email" required>
        </div>
        <div>
            <label for="utel">Phone *:</label><input type="phone" id="utel" name="utel" value="" placeholder="Input your phone number" required>
        </div>
        <div>
            <label for="ucomm">Comment *:</label><br>
            <textarea name="ucomm" cols="25" rows="4" placeholder="Input your comment" required></textarea>
        </div>
        <input type="submit" value="Add comment">
        <p>* - Required field</p>
    </form>

    <hr>
<?php
    displayComments();
?>


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<script>
    // just for the demos, avoids form submit
    jQuery.validator.setDefaults({
        success: "valid"
    });
    $("#myform").validate({
        rules: {
            utel: {
                required: true,
                phoneUS: true
            }
        }
    });
</script>
</body>
</html>
