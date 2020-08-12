<?php
/** @var array $arg */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Список книг</title></head>
<body>
<div>
    <table>
        <tbody>
        <tr>
            <th>книга</th>
            <th>автор</th>
        </tr>
        <?php foreach ($arg['list'] as $book): ?>
            <tr>
                <td><a href="/read?id=<?= $book['id'] ?>"><?= $book['book_name'] ?></a></td>
                <td><?= $book['author_name'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div>
    <form name="search" method="get" action="search">
        <p><b>Название</b><br>
            <label>
                <input type="text" value="<?= $arg['book'] ?>" name='book'>
            </label>
        </p>
        <p><b>Автор</b><br>
            <label>
                <input type="text" value="<?= $arg['author'] ?>" name='author'>
            </label>
        </p>
        <p>
            <input type="submit" value="Найти">
        </p>
    </form>
</div>
</body>
</html>


