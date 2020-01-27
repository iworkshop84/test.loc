<?php


class AdminController
{

    public static function actionAdd()
    {
        if(!empty($_POST))
        {
            $news = new News();
            $news->title = $_POST['title'];
            $news->text = $_POST['text'];
            $news->posttime = date('Y-m-d H-i-s', time());

            $postnews = $news->insert();
            if($postnews)
            {
                header('Location: /index.php?ctrl=Admin&act=Edit&id='.$postnews);
            }
        }

        $view = new View();
        $view->display('admin/addnews.php');
    }


    public static function actionEdit()
    {
            if(isset($_POST['edit']))
            {
                $news = new News();
                $news->id = $_GET['id'];
                $news->title = $_POST['title'];
                $news->text = $_POST['text'];

                $postnews = $news->update();
                if($postnews)
                {
                    header('Location: /index.php?ctrl=Admin&act=Edit&id='. $postnews);
                }
            }

            if(isset($_POST['delete']))
            {
                $news = new News();
                $res = $news->delete('id', $_GET['id']);
                //$postnews= News::delete('id', $_GET['id']);
                if($res)
                {
                    header('Location:  /index.php?ctrl=Admin&act=All');
                }
            }

            $item = News::getOneByColumn('id', $_GET['id']);

            $view = new View();
            $view->item =  $item;
            $view->display('admin/editnews.php');
    }


    public static function actionAll()
    {
        $items = News::orderGetAll('posttime', 'DESC');

        $view = new View();
        $view->items =  $items;
        $view->display('admin/all.php');

    }

}