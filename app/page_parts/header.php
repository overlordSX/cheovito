<?php include("path.php");?>

<nav class="py-2 bg-light">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2">
                <li><a href="<?php echo BASE_URL?>"><img src="../../assets/images/branding/img_2.png" width="200px"></a></li>

                <!--TODO №3 сделать ссылки на категории основные 4-5 штук-->
                <li><a href="#" class="nav-link px-2 text-black">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-black">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-black">About</a></li>
            </ul>

            <!--            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">-->
            <!--                <input type="search" class="form-control form-control-white text-black bg-white" placeholder="Поиск..." aria-label="Поиск">-->
            <!--            </form>-->

            <div class="text-end">
                <a href="<?php echo LOGIN_URL?>">
                    <button type="button" class="btn btn-outline-dark me-2">Вход и регистрация</button>
                </a>
                <a href="create_ad.php">
                    <button type="button" class="btn btn-primary">Подать объявление</button>
                </a>
            </div>
        </div>
    </div>
</nav>

<header class="py-2 bg-white text-black">
    <div class="container">
        <div class="row d-flex flex-wrap">
            <div class="btn-group" role="group">
                <div class="col-auto btn-group">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Категория
                    </button>
                    <!--TODO №1 тут категории через php выводить-->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                    </ul>
                </div>

                <div class="col-6">
                    <form role="search">
                        <input type="search" class="form-control" placeholder="Поиск..." aria-label="Поиск">
                    </form>
                </div>

                <div class="col-auto btn-group">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Город
                    </button>
                    <!--TODO №2 тут категории через php выводить-->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                    </ul>
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary">Найти</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row row-cols-auto">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        только в названиях
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckChecked">
                        только с фото
                    </label>
                </div>
            </div>
        </div>
    </div>
</header>

