<?php
/**
 * Class Admin
 * @author iworkshop84
 */
namespace App\Controllers;

use App\Models\News;
//use App\Classes\View;
use App\Classes\ErrorLog;

class Admin
{

    public static function actionAdd()
    {
        if(!empty($_POST))
        {
            $news = new News();
            $news->title = $_POST['title'];
            $news->text = $_POST['text'];
            $news->posttime = date('Y-m-d H-i-s', time());

            $postnews = $news->save();
            if($postnews)
            {
                header('Location: /admin/edit?id='.$postnews);
            }
        }

        $view = new \View();
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

                $postnews = $news->save();
                if($postnews)
                {
                    header('Location: /admin/edit?id='. $postnews);
                }
            }

            if(isset($_POST['delete']))
            {
                $news = new News();
                $res = $news->delete('id', $_GET['id']);
                if($res)
                {
                    header('Location:  /admin/all');
                }
            }

            $item = News::getOneByColumn('id', $_GET['id']);

            $view = new \View();
            $view->item =  $item;
            $view->display('admin/editnews.php');
    }


    public static function actionAll()
    {
        $items = News::orderGetAll('posttime', 'DESC');

        $view = new \View();
        $view->items = $items;
        $view->display('admin/all.php');

    }


    public static function actionLog()
    {
        $errors = ErrorLog::readLog();

        $view = new \View();
        if(!empty($errors)){
            $view->items = $errors;
        }else{
            $view->items = [];
        }

        $view->display('admin/erroradmin.php');
    }

}