<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление новости</title>
</head>
<body>
<h1>Добавление новости</h1>
<div>
    Меню сайта:
    <a href="/">Главная страница</a>
    <a href="/admin/add">Добавить новую новость</a>
    <a href="/admin/all">Все новости в админке</a>
    <a href="/admin/log">Лог ошибок</a>
</div>

<form action="/admin/add" method="post" enctype="multipart/form-data">
    <p>Название статьи:</p>
    <input type="text" name="title">

    <p>Текст статьи:</p>
    <textarea rows="10" cols="70" name="text"></textarea>


    <p><input type="submit" name="send" value="Опубликовать"></p>
</form>


</body>
</html>