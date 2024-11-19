<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title><?= $title ?></title>
</head>

<body class="h-full">
    <?php
    if (file_exists(VIEWS_PATH . 'header.php')) {
        include VIEWS_PATH . 'header.php';
    }
    include $slot;
    ?>
</body>

</html>