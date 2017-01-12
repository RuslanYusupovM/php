<?php

require __DIR__ . '/autoload.php';

if (!isset($_GET['id'])) {
    die();
} else {
    $article = \App\Models\Article::findById($_GET['id'])[0];
}

?>

<h1><?php echo $article->title; ?></h1>
<p><?php echo $article->text; ?></p>

