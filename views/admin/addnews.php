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
    <a href="/index.php?ctrl=Admin&act=Add">Добавить новость</a>
    <a href="/index.php?ctrl=Admin&act=All">Все новости в админке</a>
    <a href="/index.php?ctrl=Admin&act=Log">Лог ошибок</a>

</div>

<form action="/?ctrl=Admin&act=Add" method="post" enctype="multipart/form-data">
    <p>Название статьи:</p>
    <input type="text" name="title">

    <p>Текст статьи:</p>
    <textarea rows="10" cols="70" name="text"></textarea>


    <p><input type="submit" name="send" value="Опубликовать"></p>
</form>


</body>
</html>