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
                header('Location: /index.php');

            }
        }

        include __DIR__ . '/../views/admin/addnews.php';
    }

}