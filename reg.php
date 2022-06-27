<?php
    include('path.php');
    include('app/controllers/profiles.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CheOvito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="assets/css/main.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/assets/images/branding/favicon.png">

</head>
<body>

<!--TODO №4 сделать рабочую регистрацию и вход-->
<div class="py-3 container w-100 text-center">
    <form class="w-50 mx-auto" method="post" action="reg.php">
        <a href="<?php echo BASE_URL ?>">
            <img class="mb-4" src="assets/images/branding/img_2.png" alt=""
                                               width="200px"></a>
        <h1 class="h3 mb-3 fw-normal">Форма регистрации</h1>

        <div class="form-floating py-1">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Имя">
            <label for="first_name">Имя</label>
        </div>
        <div class="form-floating py-1">
            <input type="text" class="form-control" id="second_name" name="second_name" placeholder="Фамилия">
            <label for="second_name">Фамилия</label>
        </div>
        <div class="form-floating py-1">
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Номер телефона">
            <label for="phone">Номер телефона</label>
        </div>
        <div class="form-floating py-1">
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <label for="email">Электронная почта</label>
        </div>
        <div class="form-floating py-1">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Пароль">
            <label for="floatingPassword">Пароль</label>
        </div>
        <div class="form-floating py-1">
            <input type="password" class="form-control" id="floatingPassword" name="duplicate_password"
                   placeholder="Продублируйте пароль">
            <label for="floatingPassword">Продублируйте пароль</label>
        </div>
        <!--TODO №7 добавить регистрацию с фото-->
        <div class="py-1">
            <button class="w-40 btn btn-lg btn-outline-primary py-1" name="button_reg" type="submit">
                Зарегистрироваться
            </button>
        </div>
        <div class="py-1 mt-3">
            <a href="<?php echo BASE_URL ?>">
                <button class="w-30 btn btn-lg btn-outline-secondary py-1" type="button">На главную</button>
            </a>
        </div>
        <p class="mt-2 mb-3 text-muted">© 2022</p>
    </form>
</div>

</body>
</html>