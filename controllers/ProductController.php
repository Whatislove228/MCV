<?php



class ProductController
{

    public function actionView($productId,$page = 1)
    {
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
        }
        $categories = array();
        $categories = Category::getCategoriesList();
        $product = Product::getProductById($productId);
        $commentList = array();
        $commentList = Comment::showComment($productId,$page);
        $count = Comment::countCommentByProductId($productId);
        $pagination = new Pagination($count,$page,6,'page-');
        require_once(ROOT . '/views/product/view.php');
        return true;
    }

    public function actionComment($productId)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $product = Product::getProductById($productId);
        $userComment = false;
        $result = false;
        $errors = false;
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = array();
            $user = User::getUserById($userId);
            $userName = $user['name'];
            $userComment = $_POST['text-area'];
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if(!Comment::checkComment($userComment)) {
                $errors[] = "Comment должен быть";
            }
            if ($errors == false) {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $result = Product::commentSave($productId,$userId, $userName, $userComment);

            }
            $url = $_SERVER['HTTP_REFERER'];
            header("Location: $url");

            require_once(ROOT . "/views/product/view.php");

        } else {
            // Если гость, поля формы останутся пустыми
            $_SESSION['errors'] = "Вы не авторизованы!";
            $url = $_SERVER['HTTP_REFERER'];
            header("Location: $url");
        }

        return true;
    }

    public function actionRespect($productId,$id)
    {
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $commentList = array();
            $commentList = Comment::showComment($productId);
            Comment::respect($productId, $id);
            $url = $_SERVER['HTTP_REFERER'];
            header("Location: $url");
            require_once(ROOT . "/views/product/view.php");
        }
        else {
            // Если гость, поля формы останутся пустыми
            $_SESSION['errors'] = "Вы не авторизованы!";
            $url = $_SERVER['HTTP_REFERER'];
            header("Location: $url");
        }
            return true;
    }

    public function actionUsercomment($userId,$page = 1)
    {
        $commentList = array();
        $commentList = Comment::userComment($userId,$page);
        $count = Comment::countCommentByUserId($userId);
        $pagination = new Pagination($count,$page,10,'page-');
        require_once (ROOT. '/views/user/usercomment.php');
        return true;
    }
}