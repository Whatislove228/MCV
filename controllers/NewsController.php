<?php

class NewsController
{
    public function actionIndex()
    {
        require_once (ROOT. "/views/news/index.php");
        return true;
    }
    public function actionView()
    {
        require_once (ROOT. "/views/news/view.php");
        return true;
    }

}