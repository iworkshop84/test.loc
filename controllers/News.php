<?php
namespace App\Controllers;

use App\Models\News as NewsModel;
use App\Classes\BaseException;
use App\Classes\View;

class News
{
    public static function actionAll()
    {
        $news = NewsModel::orderGetAll('posttime','DESC');
        if(empty($news)){
            throw new BaseException('Ничего не найдено',2);
        }

        $view = new View();
        $view->items = $news;
        $view->display('news/all.php');
    }


    public static function actionOne()
    {
        $singleNews = NewsModel::getOneByColumn('id',  $_GET['id']);

        if(!$singleNews){
            throw new BaseException('Указанной статьи на сайте нет',2);
        }

        $view = new View();
        $view->item = $singleNews;
        $view->display('news/one.php');
    }
}