<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>



<?php foreach ($items as $val): ?>

    <h1><?= $val->title; ?></h1>
    <div><?= $val   ->text; ?></div>

<?php endforeach; ?>

</body>
</html>