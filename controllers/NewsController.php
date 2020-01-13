<?php



class NewsController
{

    public static function actionAll(){
        $news = News::getAll();

        $view = new View();
        $view->items =  $news;

       $view->display('news/all.php');

    }

    public static function actionOne(){
        $id = $_GET['id'];
        $singleNews = News::getOne($id);

        $view = new View();
        $view->item = $singleNews;
        $view->display('news/one.php');
    }
}