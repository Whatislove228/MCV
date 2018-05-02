<?php

class BlogController
{
    public function actionIndex()
    {
        require_once (ROOT. "/views/blog/index.php");
        return true;
    }
    public function actionView()
    {
        require_once (ROOT. "/views/blog/view.php");
        return true;
    }

}