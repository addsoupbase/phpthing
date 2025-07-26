<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    if ($_SERVER['HTTP_HOST'] !== 'localhost:8000') {
        echo '<base href="https://addsoupbase.github.io/marbles/play/">';
    } else {
        echo  '<base href="http://localhost:3000/marbles/play/">';
    }
    ?>

    <?php
    $fail = '';
    $id = htmlspecialchars($_GET['level']);
    $str = file_get_contents("./levels/" . $id . "/info.json");
    $data = json_decode($str);
    $title = htmlspecialchars($data->title);
    $author = htmlspecialchars($data->author);
    if ($str && $title && $author && $data) {
    } else $fail =
'<form id="form">
<div>
<input placeholder="Enter Level Id..." class="cute-green" name="levelid" required="">
</div>
<div>
<button class="cute-green-button">Enter</button>
</div>
</form>
<div class="loader centerx" id="loader" style="display: none;">
</div>
<h2 style="display: none;">Level Title</h2>
<cite style="display: none;" id="message">By Author</cite>
<a id="play" class="cute-green-button" style="display: none;">Play!</a>';
    ?>
    <?php if ($str): ?>
        <title><?= $title ?> by <?= $author ?> - Marbles</title>
    <?php else: ?>
        <title>Choose a level - Marbles</title>
    <?php endif ?>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../animations.css">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="en">
    <meta property="og:locale" content="en_US">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta name="twitter:creator" content="addsoupbase">
    <meta name="author" content="addsoupbase">
    <meta property="profile:username" content="addsoupbase">
    <meta name="robots" content="index">
    <meta name="theme-color" content="#28a745">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://marbles.deno.dev/">
    <?php if ($str): ?>
        <meta property="og:description" content="<?= $title ?> by <?= $author ?>">
    <?php else: ?>
        <meta property="og:description" content="Race your friends as marbles!">
    <?php endif ?>
    <?php if ($str): ?>
        <meta property="og:title" content="<?= $title ?>">
    <?php else: ?>
        <meta property="og:title" content="Marbles">
    <?php endif ?>
    <meta property="og:site_name" content="Marbles">
    <meta property="og:image:height" content="500">
    <meta property="og:image:width" content="750">
    <meta property="og:image" content="your icon here.png">
    <meta name="description" content="Marbles">
    <meta property="og:image:type" content="image/png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://marbles.deno.dev/?level=<?= $id ?>">
    <?php if ($str): ?>
        <meta name="twitter:title" content="<?= $title ?> by <?= $author ?>">
    <?php else: ?>
        <meta name="twitter:title" content="Marbles">
    <?php endif ?>
    <meta name="twitter:description" content="Marbles">
    <meta name="twitter:image" content="Twitter icon thing.png">
    <link rel="canonical" href="https://marbles.deno.dev/?level=<?= $id ?>">
    <link rel="icon" type="image/x-icon" href="https://addsoupbase.github.io/favicon.ico">
    <script>
        location.host === 'addsoupbase.github.io' && location.replace('https://marbles.deno.dev' + location.pathname + location.search)
    </script>
    <script src="../../silence.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/pathseg@1.2.1/pathseg.min.js"></script>
</head>

<body style="display:flex">
    <noscript>
        You have a really bad browser :&lpar;
    </noscript>
    <script nomodule>
        alert('You have a really bad browser :(')
    </script>
    <main>
        <div id="overlay" class="center mainmenu" aria-busy="true" style="display: none;" role="alertdialog">
            <h1 id="title">
                <?php if ($str) echo 'Loading...';
                else echo 'Choose a level';
                ?>
            </h1>
            <?= $fail ?>
        </div>
        <canvas id="can-vas" width="0" height="0" style="cursor:wait;"></canvas>
        <touch-joystick class="center" style="display:none" id="mobile-joystick"></touch-joystick>
        </div>
        <!-- <script src="matter.min.js"></script> -->
    </main>
    <script src="./setup.js" type="module"></script>
</body>

</html>
