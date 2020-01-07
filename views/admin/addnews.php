<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление новости</title>
</head>
<body>

<form action="/?ctrl=Admin&act=Add" method="post" enctype="multipart/form-data">
    <p>Название статьи:</p>
    <input type="text" name="title">

    <p>Текст статьи:</p>
    <textarea rows="10" cols="70" name="text"></textarea>


    <p><input type="submit" name="send" value="Опубликовать"></p>



</body>
</html>