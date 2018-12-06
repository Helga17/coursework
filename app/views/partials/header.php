<?php

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Инвентаризация</title>
    <link rel="stylesheet" href="css/stylemaps.css">

    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=PT+Serif+Caption" rel="stylesheet"> -->
    <script src="js/vue.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?region=cn&language=ukr-CN&key=AIzaSyDzsFxCMe9JMR-CoSCyfP6jUiGMuXPTazU"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.5.0/axios.js"></script>
</head>

<header>
    <div class="logo">

    </div>
    <div class="menu">
        <?php $_SESSION['id'] = 4; require_once (__DIR__ . (isset($_SESSION['id']) ? '/nav-bar.php' : '/login-panel.php')); ?>
    </div>
</header>
<body>
