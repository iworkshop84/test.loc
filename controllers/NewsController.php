<?php


class NewsController
{
    public static function actionAll()
    {
        $news = News::orderGetAll('posttime','DESC');
        if(empty($news)){
            throw new BaseException('Ничего не найдено',2);
        }

        $view = new View();
        $view->items = $news;
        $view->display('news/all.php');
    }


    public static function actionOne()
    {
        $singleNews = News::getOneByColumn('id',  $_GET['id']);
        if(!$singleNews){
            throw new BaseException('Указанной статьи на сайте нет',2);
        }

        $view = new View();
        $view->item = $singleNews;
        $view->display('news/one.php');
    }
}