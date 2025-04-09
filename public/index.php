<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"  rel="stylesheet" />
</head>
<body>
    <div class="container">
        <?php 
        require_once '../vendor/autoload.php';

        $loader = new \Twig\Loader\FilesystemLoader('../views');

        $twig = new \Twig\Environment($loader);

        $url = $_SERVER["REQUEST_URI"];

        $title = "";
        $template = "";
        $context = [];

        // тут теперь просто заполняю значение переменных
        if ($url == "/") {
            $title = "Главная";
            $template = "main.twig";
        } elseif (preg_match("#^/GLaDOS/image#", $url)) {
            $title = "ГЛэДОС";
            $template = "base_image2.twig";
            $context['image'] = "/images/GLaDOS.gif";
        } elseif (preg_match("#^/GLaDOS/info#", $url)) {
            $title = "ГЛэДОС";
            $template = "GLaDOS_info.twig";
        } elseif (preg_match("#^/GLaDOS#", $url)) {
            $title = "ГЛэДОС";
            $template = "GLaDOS.twig";
        } elseif (preg_match("#/wheatley/image#", $url)) {
            $title = "Уитли";
            $template = "base_image1.twig";
            $context['image'] = "../images/wheatley.jpg";
        } elseif (preg_match("#/wheatley/info#", $url)) {
            $title = "Уитли";
            $template = "wheatley_info.twig";
        } elseif (preg_match("#/wheatley#", $url)) {
            $title = "Уитли";
            $template = "wheatley.twig";
        }

        $context['title'] = $title;

        // ну и рендерю
        echo $twig->render($template, $context);
        ?>
    </div> 
</body>
</html>