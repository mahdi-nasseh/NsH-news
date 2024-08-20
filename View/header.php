<?php
include '../init.php';
use Nshnews\Model\Category;
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>NsH news</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Blogzine">
    <meta name="description" content="قالب وبلاگ و مجله خبری مبتنی بر بوت استرپ">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/tiny-slider/tiny-slider.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/plyr/plyr.css">



    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="assets/css/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
<div class="preloader">
    <div class="loader">
        <div class="sh1"></div>
        <div class="sh2"></div>
    </div>
</div>
<!-- Preloader END -->

<!-- Offcanvas START -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu">
    <div class="offcanvas-header justify-content-end">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column pt-0">
        <div>
            <img class="light-mode-item my-3" src="assets/images/logo.svg" alt="logo">
            <img class="dark-mode-item my-3" src="assets/images/logo-light.svg" alt="logo">
            <p>موضوع وبلاگ، اخبار و مجله نسل بعدی برای شما برای شروع به اشتراک گذاری داستان های خود از امروز! </p>
            <!-- Nav START -->
            <ul class="nav d-block flex-column my-4">
                <li class="nav-item h5">
                    <a class="nav-link" href="index.php">خانه</a>
                <li class="nav-item h5">
                    <a class="nav-link" href="about-us.html">درباره ما</a>
                </li>
                <li class="nav-item h5">
                    <a class="nav-link" href="post-grid.html">خواندنی ها</a>
                </li>
                <li class="nav-item h5">
                    <a class="nav-link" href="contact-us.html">تماس با ما</a>
                </li>
            </ul>
            <!-- Nav END -->
            <div class="bg-primary bg-opacity-10 p-4 mb-4 text-center w-100 rounded">
                <span>پیشنهاد Blogzine</span>
                <h3>پکیج های خبرنامه</h3>
                <p>گزارش بینش مورد اعتماد در سراسر جهان را دریافت کنید. امروز عضو شوید</p>
                <a href="#" class="btn btn-warning">خرید و فعالسازی</a>
            </div>
        </div>
        <div class="mt-auto pb-3">
            <!-- Address -->
            <p class="text-body mb-2 fw-bold">ایران، تهران</p>
            <address class="mb-0">خیابان سعادت آباد، خیابان سرو غربی، مجتمع پارس</address>
            <p class="mb-2">شماره تماس: <a href="#" class="text-body"><u>469-537-2410</u> (مشاوره رایگان)</a></p>
            <a href="#" class="text-body d-block">support@example.com</a>
        </div>
    </div>
</div>
<!-- Offcanvas END -->

<!-- =======================
Header START -->
<header class="navbar-light navbar-sticky header-static">
    <div class="navbar-top d-none d-lg-block small">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center my-2">
                <!-- Top bar left -->
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link ps-0" href="about-us.html">درباره ما</a>
                    </li>
                </ul>
                <!-- Top bar right -->
                <div class="d-flex align-items-center">
                    <!-- Font size accessibility START -->
                    <!--					<div class="btn-group me-3" role="group" aria-label="font size changer">-->
                    <!--						<input type="radio" class="btn-check" name="fntradio" id="font-sm">-->
                    <!--						<label class="btn btn-xs btn-outline-primary mb-0" for="font-sm">A-</label>-->
                    <!--
                    <!--						<input type="radio" class="btn-check" name="fntradio" id="font-default" checked>-->
                    <!--						<label class="btn btn-xs btn-outline-primary mb-0" for="font-default">A</label>-->
                    <!--
                    <!--						<input type="radio" class="btn-check" name="fntradio" id="font-lg">-->
                    <!--						<label class="btn btn-xs btn-outline-primary mb-0" for="font-lg">A+</label>-->
                    <!--					</di    v>-->

                    <!-- Dark mode options START -->
                    <div class="nav-item dropdown mx-2">
                        <!-- Switch button -->
                        <button class="modeswitch" id="bd-theme" type="button" aria-expanded="false"
                                data-bs-toggle="dropdown" data-bs-display="static">
                            <svg class="theme-icon-active">
                                <use href="#"></use>
                            </svg>
                        </button>
                        <!-- Dropdown items -->
                        <ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="light">
                                    <svg width="16" height="16" fill="currentColor"
                                         class="bi bi-brightness-high-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                        <use href="#"></use>
                                    </svg>
                                    روشن
                                </button>
                            </li>
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
                                        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                                        <use href="#"></use>
                                    </svg>
                                    تیره
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active"
                                        data-bs-theme-value="auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-circle-half fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                                        <use href="#"></use>
                                    </svg>
                                    خودکار
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- Dark mode options END -->

                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-twitter-square"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-linkedin"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-youtube-square"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 pe-0 fs-5" href="#"><i class="fab fa-vimeo"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Divider -->
            <div class="border-bottom border-2 border-primary opacity-1"></div>
        </div>
    </div>

    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo START -->
            <a class="navbar-brand" href="index.php">
                <img class="navbar-brand-item light-mode-item" src="assets/images/logo.svg" alt="logo">
                <img class="navbar-brand-item dark-mode-item" src="assets/images/logo-light.svg" alt="logo">
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="text-body h6 d-none d-sm-inline-block">منو</span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Main navbar START -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav navbar-nav-scroll mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">خانه</a></li>
                    <?php
                    $mainCategories = Category::with('children')->where('parent', '=', 0)->get();
                    foreach ($mainCategories as $mainCategory): ?>
                    <?php  $subCategory = Category::where('parent', '=', $mainCategory->ID)    ?>
                        <?php $subCategories = $mainCategory->children;?>
                        <li class="nav-item <?= count($subCategories) == 0 ? '' : 'dropdown' ?>">
                            <a class="nav-link <?= count($subCategories) == 0 ? '' : 'dropdown-toggle' ?>"" href="#" data-bs-toggle="dropdown"> <?php echo $mainCategory->name; ?> </a>
                            <ul class="dropdown-menu">
                            <?php foreach ($subCategories as $subCategory):?>
                            <li> <a  class="dropdown-item" href="#"><?= $subCategory->name ?></a> </li>
                            <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- Main navbar END -->

            <!-- Nav right START -->
            <div class="nav flex-nowrap align-items-center">
                <!-- Nav Button -->
                <div class="nav-item d-none d-md-block">
                    <?php if(!isset($_SESSION['user_id'])):?>
                    <a href="signin.php" class="btn btn-sm btn-danger mb-0 mx-2">ورود / ثبت نام</a>
                    <?php else:?>
                        <a href="dashboard.php" class="btn btn-sm btn-danger mb-0 mx-2">داشبورد</a>
                    <?php endif; ?>
                </div>
                <!-- Nav Search -->
                <div class="nav-item dropdown dropdown-toggle-icon-none nav-search">
                    <a class="nav-link dropdown-toggle" role="button" href="#" id="navSearch" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="bi bi-search fs-4"> </i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow rounded p-2" aria-labelledby="navSearch">
                        <form class="input-group">
                            <input class="form-control border-success" type="search" placeholder="جستجو"
                                   aria-label="Search">
                            <button class="btn btn-success m-0" type="submit">جستجو</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Nav right END -->
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->