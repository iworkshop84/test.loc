<?php



class NewsController
{

    public static function actionAll(){
        $items = News::getAll();

        $view = new View();
        $view->display('news/all.php', $items);

        //$view->display('news/all.php');
        //var_dump($items);
        //include __DIR__ . '/../views/news/all.php';
    }

    public static function actionOne(){
        $id = $_GET['id'];
        $item = News::getOne($id);

        $view = new View();
        $view->display('news/one.php', $item);

       // include __DIR__ . '/../views/news/one.php';
    }
}