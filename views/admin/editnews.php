<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование новости</title>
</head>
<body>
<h1>Редактирование новости</h1>

<div>
    Меню сайта:
    <a href="/">Главная страница</a>
    <a href="/index.php?ctrl=Admin&act=Add">Добавить новость</a>
    <a href="/index.php?ctrl=Admin&act=All">Все новости в админке</a>
    <a href="/index.php?ctrl=Admin&act=Log">Лог ошибок</a>
</div>

<form action="/?ctrl=Admin&act=Edit&id=<?= $item->id; ?>" method="post" enctype="multipart/form-data">
    <p>Название статьи:</p>
    <input type="text" name="title" value="<?= $item->title; ?>">

    <p>Текст статьи:</p>
    <textarea rows="10" cols="70" name="text"><?= $item->text; ?></textarea>


    <p><input type="submit" name="edit" value="Обновить">
   <input type="submit" name="delete" value="Удалить"></p>
</form>


</body>
</html>