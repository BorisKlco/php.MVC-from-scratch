<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/logo.png">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>Light - <?= $title ?></title>
</head>

<body class="h-full">
    <?php
    if (file_exists(VIEWS_PATH . 'header.php')) {
        include VIEWS_PATH . 'header.php';
    } ?>
    <main>
        <div class="mx-auto max-w-4xl px-4 py-6">
            <?php include $slot; ?>
        </div>
    </main>

</body>

</html>