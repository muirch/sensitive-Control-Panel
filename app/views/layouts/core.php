<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>sensitive Control Panel</title>

    <link href="/app/public/imgs/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link href="/vendor/font-awesome/css/all.min.css" rel="stylesheet" />
    <link href="/app/public/css/core.min.css" rel="stylesheet" />
</head>
<body>

    <nav class="navigation">
        <span class="navigation__toggler"><i class="fas fa-bars"></i></span>
        <a class="navigation__brand"><i class="fas fa-code-branch"></i></a>
        <ul class="navigation__list">
            <li class="navigation__item">
                <a class="navigation__link" href="/"><i class="fas fa-server"></i></a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="/settings"><i class="fas fa-cogs"></i></a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="/about"><i class="fas fa-info-circle"></i></a>
            </li>
        </ul>
    </nav>

    <?php echo $content?>

    <script src="/vendor/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="/app/public/js/core.min.js"></script>
</body>
</html>