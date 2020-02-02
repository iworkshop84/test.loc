<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>

<div>
    Меню сайта:
    <a href="/">Главная страница</a>
    <a href="/admin/all">Главная страница админки</a>
</div>

<?php foreach ($items as $val): ?>

    <h1><a href="/news/one?id=<?= $val->id; ?>"><?= $val->title; ?></a></h1>
    <div><?= $val->text; ?></div>

<?php endforeach; ?>

</body>
</html>