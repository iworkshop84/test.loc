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

    <h1><?= $item->title; ?></h1>
    <div><?= $item->text; ?></div>

</body>
</html>