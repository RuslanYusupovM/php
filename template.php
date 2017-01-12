<ul>
    <?php foreach ($data as $article) :?>
    <li>
        <a href="/article.php?id=<?php echo $article->id; ?>"><?php echo $article->title?></a>
    </li>
<?php endforeach; ?>
</ul>