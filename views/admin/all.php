<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Показать все новости</title>
</head>
<body>
<h1>Показать все новости</h1>
<div>
    Меню сайта:
    <a href="/">Главная страница</a>
    <a href="/index.php?ctrl=Admin&act=Add">Добавить новую новость</a>
    <a href="/index.php?ctrl=Admin&act=All">Все новости в админке</a>
</div>

<?php foreach ($items as $val): ?>

    <p>
        <b>Редактировать:</b> <a href="/?ctrl=Admin&act=Edit&id=<?= $val->id; ?>"><?= $val->title; ?></a>................
        <b>Дата публикации:</b> <?= $val->posttime; ?>................
        <b>Дата обновления:</b> <?= $val->updatetime; ?>
    </p>


<?php endforeach; ?>


</body>
</html>