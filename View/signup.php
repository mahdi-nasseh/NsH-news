<?php
include 'header.php';

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Inner intro START -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                    <!-- alert for auth -->
                    <?php if (isset($_REQUEST['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            لطفا همه مقادیر را پر کنید.
                            <a href="signup.php">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="bg-primary bg-opacity-10 rounded p-4 p-sm-5">
                        <h2>ثبت نام در سایت </h2>
                        <!-- Form START -->
                        <form class="mt-4" action="../Controller/auth.php" method="post">
                            <!-- name and family -->
                            <div class="mb-3 d-flex gap-2">
                                <div style="width: 50%;">
                                    <label class="form-label" for="exampleInputEmail1">نام</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="username_help" placeholder="نام" name="name">
                                </div>
                                <div style="width: 50%;">
                                    <label class="form-label" for="exampleInputEmail1">نام خانوادگی</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="username_help" placeholder="نام خانوداگی" name="family">
                                </div>
                            </div>
                            <!-- username -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">نام کاربری</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="username_help" placeholder="نام کاربری" name="username">
                                <small id="username_help"
                                       class="form-text text-danger <?= isset($error['username']) ? 'd-block' : 'd-none' ?>"><?= $error['username'] ?></small>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">پست الکترونیکی</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="ایمیل" name="email">
                                <small id="emailHelp"
                                       class="form-text text-danger <?= isset($error['email']) ? 'd-block' : 'd-none' ?>"><?= $error['email'] ?></small>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword1">رمز عبور</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                       placeholder="*********" aria-describedby="passHelp">
                                <small id="passHelp"
                                       class="form-text text-danger <?= isset($error['password']) ? 'd-block' : 'd-none' ?>"><?= $error['password'] ?></small>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">تایید رمز عبور</label>
                                <input type="password" class="form-control" id="exampleInputPassword2"
                                       name="password_check" placeholder="*********" aria-describedby="checkPassHelp">
                                <small id="checkPassHelp"
                                       class="form-text text-danger <?= isset($error['password']) ? 'd-block' : 'd-none' ?>"><?= $error['password'] ?></small>
                            </div>
                            <!-- Button -->
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success" name="signup">ثبت نام</button>
                                </div>
                                <div class="col-sm-8 text-sm-end">
                                    <span>آیا قبلا ثبت نام کرده اید؟ <a href="signin.php"><u>ورود</u></a></span>
                                </div>
                            </div>
                        </form>
                        <!-- Form END -->
                        <!--                        <hr>-->
                        <!-- Social-media btn -->
                        <!--                        <div class="text-center">-->
                        <!--                            <p>برای دسترسی سریع با شبکه اجتماعی خود وارد شوید</p>-->
                        <!--                            <ul class="list-unstyled d-sm-flex mt-3 justify-content-center">-->
                        <!--                                <li class="mx-2">-->
                        <!--                                    <a href="#" class="btn bg-facebook d-inline-block"><i-->
                        <!--                                                class="fab fa-facebook-f me-2"></i> ورود Facebook</a>-->
                        <!--                                </li>-->
                        <!--                                <li class="mx-2">-->
                        <!--                                    <a href="#" class="btn bg-google d-inline-block"><i class="fab fa-google me-2"></i>-->
                        <!--                                        ورود با google</a>-->
                        <!--                                </li>-->
                        <!--                            </ul>-->
                        <!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer class="pb-0">
    <div class="container">
        <hr>
        <!-- Widgets START -->
        <div class="row pt-5">
            <!-- Footer Widget -->
            <div class="col-md-6 col-lg-4 mb-4">
                <img class="light-mode-item" src="assets/images/logo.svg" alt="logo">
                <img class="dark-mode-item" src="assets/images/logo-light.svg" alt="logo">
                <p class="mt-3">این قالب مبتنی بر بوت استرپ 5 برای همه انواع سایت های مجله خبری و وبلاگ مناسب است.</p>
                <div class="mt-4">©2022 ارائه شده در سایت <a href="https://www.rtl-theme.com/"
                                                             class="text-reset btn-link" target="_blank">راست چین</a>
                </div>
            </div>

            <!-- Footer Widget -->
            <div class="col-md-6 col-lg-3 mb-4">
                <h5 class="mb-4">لینک های مفید</h5>
                <div class="row">
                    <div class="col-6">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link pt-0" href="#">درباره ما</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">داشبورد</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">تماس با ما</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">خرید قالب</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">پشتیبانی</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link pt-0" href="#">اخبار</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">بین الملل <span
                                            class="badge text-bg-danger ms-2">2</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="#">تکنولوژی</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">اقتصاد</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">سیاست</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer Widget -->
            <div class="col-sm-6 col-lg-3 mb-4">
                <h5 class="mb-4">پربیننده ترین</h5>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-primary-soft">گردشگری</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-warning-soft">اقتصاد</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-success-soft">بورس</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-danger-soft">قیمت طلا</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-info-soft">فناوری و اطلاعات</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-primary-soft">قیمت ارز امروز</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-warning-soft">مگامنو</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-success-soft">ورزش</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-danger-soft">کووید</a></li>
                    <li class="list-inline-item"><a href="#" class="btn btn-sm btn-info-soft">فرهنگ</a></li>
                </ul>
            </div>

            <!-- Footer Widget -->
            <div class="col-sm-6 col-lg-2 mb-4">
                <h5 class="mb-4">شبکه های اجتماعی</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link pt-0" href="#"><i
                                    class="fab fa-facebook-square fa-fw me-2 text-facebook"></i>Facebook</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i
                                    class="fab fa-twitter-square fa-fw me-2 text-twitter"></i>Twitter</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i
                                    class="fab fa-linkedin fa-fw me-2 text-linkedin"></i>Linkedin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i
                                    class="fab fa-youtube-square fa-fw me-2 text-youtube"></i>YouTube</a></li>
                </ul>
            </div>
        </div>
        <!-- Widgets END -->
    </div>
</footer>

<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Template Functions -->
<script src="assets/js/functions.js"></script>

</body>

</html>