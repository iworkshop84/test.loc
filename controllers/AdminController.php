<?php


class AdminController
{

    public static function actionAdd(){

        if(!empty($_POST)){
            $news = new News();
            $news->title = $_POST['title'];
            $news->text = $_POST['text'];
            $postnews = $news->newsAdd();
            if($postnews){
                header('Location: /index.php?ctrl=Admin&act=Edit&id='.$postnews);
            }
        }

        include __DIR__ . '/../views/admin/addnews.php';
    }

    public static function actionEdit(){

            if(isset($_POST['edit'])){
                $news = new News();
                $news->id = $_GET['id'];
                $news->title = $_POST['title'];
                $news->text = $_POST['text'];

                $postnews = $news->newsEdit();
                if($postnews){
                    header('Location: /index.php?ctrl=Admin&act=Edit&id='. $postnews);
                }
            }

        if(isset($_POST['delete'])){
            $postnews= News::newsDelete($_GET['id']);
            if($postnews){
                header('Location: /index.php');
            }
        }

        $id = $_GET['id'];
        $item = News::getOne($id);

        include __DIR__ . '/../views/admin/editnews.php';
    }

    public static function actionAll(){

        $items = News::getAll();
        $view = new View();
        $view->items =  $items;
        $view->display('admin/all.php');

    }









}