<?php
/** @var array $arg */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?= $arg['name'] ?></title></head>
<body>
<?= $arg['text'] ?>
<footer>
    <div style="position: absolute;">
        <p><a href="/list/">Назад</a></p>
        <p>Страницы</p>
        <p>
        <?php for ($i = 1; $i <= $arg['pages']; $i++): ?>
                <a href="#pf<?= $i ?>"><?= $i ?></a>
            <?php if($i%10==0):?></p><p><?php endif;?>
        <?php endfor; ?>
        </p>
    </div>
</footer>
</body>
</html>


