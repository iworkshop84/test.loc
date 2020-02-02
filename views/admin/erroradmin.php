<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Логи ошибок сайта</title>
</head>
<body>
<h1>Лог ошибок сайта</h1>
<div>
    Меню сайта:
    <a href="/">Главная страница</a>
    <a href="/admin/add">Добавить новую новость</a>
    <a href="/admin/all">Все новости в админке</a>
    <a href="/admin/log">Лог ошибок</a>
</div>
<?php $count = 1;?>
<?php foreach ($items as $val): ?>

    <p>
        <b><?= $count++; ?>) </b>
        <b>Дата: </b><?= $val[0]; ?>
        <b>Мой код: </b><?= $val[1]; ?>
        <b>Сообщение: </b><?= $val[2]; ?>
        <b>Файл вызова: </b><?= $val[3]; ?>
        <b>Строка вызова: </b><?= $val[4]; ?>
        <b>Класс вызова: </b><?= $val[5]; ?>

    </p>

<?php endforeach; ?>


</body>
</html>