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
    <a href="/admin/add">Добавить новую новость</a>
    <a href="/admin/all">Все новости в админке</a>
    <a href="/admin/log">Лог ошибок</a>
</div>

<?php foreach ($items as $val): ?>

    <p>
        <b>Редактировать:</b> <a href="/admin/edit?id=<?= $val->id; ?>"><?= $val->title; ?></a>................
        <b>Дата публикации:</b> <?= $val->posttime; ?>................
        <b>Дата обновления:</b> <?= $val->updatetime; ?>
    </p>


<?php endforeach; ?>


</body>
</html>