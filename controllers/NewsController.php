<?php



class NewsController
{

    public static function actionAll(){
        $items = News::getAll();
        include __DIR__ . '/../views/news/all.php';
    }

}