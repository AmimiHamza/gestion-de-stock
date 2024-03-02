<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-image: url('img/faceg.png');
            background-repeat: no-repeat;
            background-size:  1300px 500px;
        }

        .title {
            font-size: 80px;
            font-weight: bold;
            text-align: center;
            color: red;
            font-family: Arial, sans-serif;
            margin-bottom: 20px;
        }

        .subheading {
            font-size: 24px;
            text-align: center;
            color: black;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
    </style>
     
</head>
<body style="display: flex; align-items: center; justify-content: center; height: 100vh;">
<?php $lg = isset($_GET['lg']) ? $_GET['lg'] : 'Ang';
    switch ($lg) {
        case 'Mr':
            include "constants/cstmr.php";
            $sens='RTL';
            break;
        case 'Fr':
            include "constants/cstfr.php";
            $sens='LTR';
            break;
        case 'Ang':
            include "constants/cstang.php";
            $sens='LTR';
            break;
        case 'Esp':
            include "constants/cstesp.php";
            $sens='LTR';
            break;
        default:
            include "cstfr.php"; // Langue par défaut : Français
            $sens='LTR';
    } ?>
    <h1 class="title"><?php echo titre ;?></h1>
    <p class="subheading"><?php echo stitre ;?></p>
</body>
</html>