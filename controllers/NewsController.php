<?php


class NewsController
{
    public static function actionAll()
    {
        $news = News::orderGetAll('posttime','DESC');

        $view = new View();
        $view->items =  $news;
        $view->display('news/all.php');
    }


    public static function actionOne()
    {
        $singleNews = News::getOneByColumn('id',  $_GET['id']);

        $view = new View();
        $view->item = $singleNews;
        $view->display('news/one.php');
    }
}