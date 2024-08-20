<?php
include 'header.php';

use Nshnews\Model\Post;

if (isset($_GET['post_id'])) {
    $post = Post::with('user')->find($_GET['post_id']);
} else {
    header('Location: index.php');
}

?>
    <!-- =======================
    Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <!-- Divider -->
        <div class="border-bottom border-primary border-1 opacity-1"></div>

        <!-- ======================= Inner intro START -->
        <section id="item-1" class="pb-3 pb-lg-5">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Image -->
                    <div class="col-md-6 position-relative">
                        <img class="rounded" src="../uploades/<?= $post->thumbnail ?>" alt="Image">
                        <!-- Card format icon -->
                        <h5 class="p-3 pe-4 position-absolute top-0 end-0">
                            <!--					<span class="badge text-bg-success fw-bold rounded-pill"> 8.5 امتیاز</span>-->
                        </h5>
                    </div>
                    <!-- Content -->
                    <div class="col-md-6 mt-4 mt-md-0">
                        <?php foreach ($post->category as $cat) : ?>
                            <a href="#" class="badge bg-light bg-opacity-10 text-danger mb-2"><i
                                        class="fas fa-circle me-2 small fw-bold"></i><?= $cat->name ?></a>
                        <?php endforeach; ?>
                        <span class="ms-2 small">بروزرسانی: <?= toJalali($post->created_at) ?></span>
                        <h1 class="display-6"><?= $post->title ?></h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======================= Inner intro END -->

        <!-- =======================
        Main START -->
        <section class="pt-0">
            <div class="container position-relative" data-sticky-container>
                <div class="row">
                    <!-- Main Content START -->
                    <div class="col-md-12 col-lg-8 mb-5">
                        <p class="lh-lg" style="text-align: justify"><?= $post->body ?></p>

                        <!-- Tags and info START -->
                        <div class="d-md-flex justify-content-between text-center text-md-start my-4">

                            <!-- Info -->
                            <ul class="nav nav-divider align-items-center justify-content-center justify-content-md-end">
                                <li class="nav-item"><i
                                            class="far fa-comment-alt me-1"></i> 5 دیدگاه
                                </li>
<!--                                view system-->
                                <li class="nav-item"><i class="far fa-eye me-1"></i> <?= $post->view()->count(); ?> بازدید</li>
<!--                                like system-->
                                <?php if (!isset($_SESSION['user_id'])): ?>
                                    <li class="nav-item"><a href="single.php?post_id=<?= $post->ID ?>&error=like"><i
                                                    class="bi bi-heart me-1 text-danger"></i></a> <?= $post->like()->count(); ?>
                                        <?php if (isset($_GET['error'])) { ?> <span class="text-danger ms-3">برای پسندیدن خبر ابتدا وارد شوید</span> <?php } ?>
                                    </li>
                                <?php else: ?>
                                <!--                            remove like if exist-->
                                <?php if ($post->like->where('user_id', $post->user->ID)->count()) { ?>
                                <li class="nav-item"><a href="../Controller/like.php?remove_like_id=<?= $post->ID ?>"><i
                                                class="bi bi-heart-fill me-1 text-danger"></i></a> <?= $post->like()->count(); ?>
                                    <?php }else{ ?>
                                    <!--                                add like if it doesn't exist -->
                                <li class="nav-item"><a href="../Controller/like.php?add_like_id=<?= $post->ID ?>"><i
                                                class="bi bi-heart me-1 text-danger"></i></a> <?= $post->like()->count(); ?>
                                    <?php } ?>
                                    <?php endif; ?>
                            </ul>
                        </div>
                        <!-- Tags and info END -->
                    </div>
                    <!-- End Main Content -->

                    <!-- Left sidebar START -->
                    <div class="col-lg-4">
                        <div data-margin-top="80" data-sticky-for="991">
                            <!-- About me -->
                            <div class="bg-light rounded p-3 p-md-4">
                                <div class="d-flex mb-3">
                                    <!-- Avatar -->
                                    <a class="flex-shrink-0" href="#">
                                        <div class="avatar avatar-xl border border-4 border-danger rounded-circle">
                                            <img class="avatar-img rounded-circle"
                                                 src="assets/images/avatar/<?= $post->user->thumbnail ?>"
                                                 alt="avatar">
                                        </div>
                                    </a>
                                    <div class="flex-grow-1 ms-3">
                                        <h3 class="mb-0"><?= $post->user->name . ' ' . $post->user->family ?></h3>
                                        <p><?= $post->user->job ?></p>
                                    </div>
                                </div>
                                <p><?= $post->user->bio ?></p>
                                <a href="author.php?user_id=<?= $post->user->ID ?>" class="btn btn-danger-soft btn-sm">مشاهده
                                    اخبار</a>
                            </div>
                        </div>
                    </div>
                    <!-- Left sidebar END -->
                </div>

                <!-- Related post START -->
                <div class="mt-5">
                    <h2 class="my-3"><i class="bi bi-symmetry-vertical me-2"></i>اخبار مشابه</h2>
                    <div class="tiny-slider arrow-hover arrow-dark arrow-round">
                        <div class="tiny-slider-inner"
                             data-autoplay="true"
                             data-hoverpause="true"
                             data-gutter="24"
                             data-arrow="true"
                             data-dots="false"
                             data-items-xl="2"
                             data-items-xs="1">

                            <!-- Card item START -->
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="assets/images/blog/4by3/07.jpg" alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay Top -->
                                        <div class="w-100 mb-auto d-flex justify-content-end">
                                            <div class="text-end ms-auto">
                                                <!-- Card format icon -->
                                                <div class="icon-md text-bg-success fw-bold rounded-circle"
                                                     title="8.5 rating">8.5
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#" class="badge text-bg-info mb-2"><i
                                                        class="fas fa-circle me-2 small"></i>سیاست</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="post-single-6.html"
                                                              class="btn-link text-reset">طرح مجلس برای گرفتن
                                            مالیات از سفته بازها</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"
                                                             src="assets/images/avatar/07.jpg" alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"
                                                                             class="stretched-link text-reset btn-link">مریم ترابی</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">7 دی، 1400</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card item END -->
                            <!-- Card item START -->
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="assets/images/blog/4by3/08.jpg" alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay Top -->
                                        <div class="w-100 mb-auto d-flex justify-content-end">
                                            <div class="text-end ms-auto">
                                                <!-- Card format icon -->
                                                <div class="icon-md text-bg-warning fw-bold rounded-circle"
                                                     title="5.2 rating">5.2
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#" class="badge text-bg-danger mb-2"><i
                                                        class="fas fa-circle me-2 small"></i>ورزش</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="post-single-6.html"
                                                              class="btn-link text-reset">آمار فرزندان حاصل از
                                            روش‌های کمک‌ باروری</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"
                                                             src="assets/images/avatar/08.jpg" alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"
                                                                             class="stretched-link text-reset btn-link">نگین جوان</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">15 مرداد، 1400</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card item END -->
                            <!-- Card item START -->
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="assets/images/blog/4by3/09.jpg" alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay Top -->
                                        <div class="w-100 mb-auto d-flex justify-content-end">
                                            <div class="text-end ms-auto">
                                                <!-- Card format icon -->
                                                <div class="icon-md text-bg-danger fw-bold rounded-circle"
                                                     title="2.5 rating">2.5
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <a href="#" class="badge text-bg-success mb-2"><i
                                                        class="fas fa-circle me-2 small fw-bold"></i>اقتصاد</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h5 class="card-title"><a href="post-single-6.html"
                                                              class="btn-link text-reset">سال 2022 رویایی و فوق
                                            العاده برای طارمی</a></h5>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle"
                                                             src="assets/images/avatar/09.jpg" alt="avatar">
                                                    </div>
                                                    <span class="ms-3">با <a href="#"
                                                                             class="stretched-link text-reset btn-link">سارا موحد</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">1 مهر، 1400</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card item END -->
                        </div>
                    </div> <!-- Slider END -->
                </div>
                <!-- Related post END -->

                <!-- Comments START -->
                <div class="mt-5">
                    <h3>5 دیدگاه</h3>
                    <!-- Comment level 1-->
                    <div class="my-4 d-flex">
                        <img class="avatar avatar-md rounded-circle float-start me-3"
                             src="assets/images/avatar/01.jpg" alt="avatar">
                        <div>
                            <div class="mb-2">
                                <h5 class="m-0">شادی اسدی</h5>
                                <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر </span>
                                <a href="#" class="text-body fw-normal">پاسخ</a>
                            </div>
                            <p>سایهٔ نیرومندی و ثروت خیال می‌ کنند که می‌توانند در خارج از وطن خود زندگی نمایند
                                و خوشبخت و سرافراز باشند ولی به زودی می‌ فهمند که اشتباه کرده‌ اند و عظمت هر
                                ملتی بر روی خرابه‌ های وطن خودش می‌باشد و بس!</p>
                        </div>
                    </div>
                    <!-- Comment children level 2 -->
                    <div class="my-4 d-flex ps-2 ps-md-3">
                        <img class="avatar avatar-md rounded-circle float-start me-3"
                             src="assets/images/avatar/02.jpg" alt="avatar">
                        <div>
                            <div class="mb-2">
                                <h5 class="m-0">علی قنبرزاده</h5>
                                <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر </span>
                                <a href="#" class="text-body fw-normal">پاسخ</a>
                            </div>
                            <p>وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد در پرتو آن نیرومند می‌شوند و در
                                سایهٔ نیرومندی و ثروت خیال می‌ کنند که می‌توانند در خارج از وطن خود زندگی نمایند
                                و خوشبخت و سرافراز باشند.</p>
                        </div>
                    </div>
                    <!-- Comment children level 3 -->
                    <div class="my-4 d-flex ps-3 ps-md-5">
                        <img class="avatar avatar-md rounded-circle float-start me-3"
                             src="assets/images/avatar/01.jpg" alt="avatar">
                        <div>
                            <div class="mb-2">
                                <h5 class="m-0">مونا شاه حسینی</h5>
                                <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر</span>
                                <a href="#" class="text-body fw-normal">پاسخ</a>
                            </div>
                            <p>در نهایت این مرگ است که باید پیروز شود، زیرا از هنگام تولد بخشی از سرنوشت ما شده
                                و فقط مدت کوتاهی پیش از بلعیدن طعمه اش، با آن بازی می کند.</p>
                        </div>
                    </div>
                    <!-- Comment level 2 -->
                    <div class="my-4 d-flex ps-2 ps-md-3">
                        <img class="avatar avatar-md rounded-circle float-start me-3"
                             src="assets/images/avatar/03.jpg" alt="avatar">
                        <div>
                            <div class="mb-2">
                                <h5 class="m-0">مهرداد نوری</h5>
                                <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر</span>
                                <a href="#" class="text-body fw-normal">پاسخ</a>
                            </div>
                            <p>همان‌ طور که تا آنجا که ممکن است طولانی‌ تر در یک حباب صابون می‌ دمیم تا بزرگتر
                                شود!</p>
                        </div>
                    </div>
                    <!-- Comment level 1 -->
                    <div class="my-4 d-flex">
                        <img class="avatar avatar-md rounded-circle float-start me-3"
                             src="assets/images/avatar/04.jpg" alt="avatar">
                        <div>
                            <div class="mb-2">
                                <h5 class="m-0">رضا کریمی</h5>
                                <span class="me-3 small">21 خرداد، 1400 در 3:00 بعد از ظهر </span>
                                <a href="#" class="text-body fw-normal">پاسخ</a>
                            </div>
                            <p>ما تا آنجا که ممکن است، با علاقه فراوان و دلواپسی زیاد به زندگی ادامه می دهیم،
                                همان‌ طور که تا آنجا که ممکن است طولانی‌ تر در یک حباب صابون می‌ دمیم تا بزرگتر
                                شود، گر چه با قطعیتی تمام می‌ دانیم که خواهد ترکید.</p>
                        </div>
                    </div>

                </div>
                <!-- Comments END -->

                <!-- Reply START -->
                <div>
                    <h3>ثبت دیدگاه</h3>
                    <small>آدرس ایمیل شما منتشر نخواهد شد. فیلدهای الزامی علامت گذاری شده اند *</small>
                    <form class="row g-3 mt-2">
                        <div class="col-md-6">
                            <label class="form-label">نام *</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ایمیل *</label>
                            <input type="email" class="form-control">
                        </div>
                        <!-- custom checkbox -->
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">برای دفعه بعد که نظر دادم
                                    نام و ایمیل من را در این مرورگر ذخیره شود.</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">متن دیدگاه *</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>
                    </form>
                </div>
                <!-- Reply END -->

            </div>
        </section>
        <!-- =======================
        Main END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->
    <script>
        setTimeout(function () {
            console.log('10 seconds passed')
            <?php
                $ip = $_SERVER['REMOTE_ADDR'];
                $lastView = \Nshnews\Model\View::where('ip', $_SERVER['REMOTE_ADDR'])->where('created_at', '>=', date('Y-m-d H:i:s', time()-60))->where('post_id', '=',$post->ID)->orderBy('created_at', 'desc')->first();

                if (!$lastView){
                    \Nshnews\Model\View::create(['ip' => $ip, 'post_id' => $post->ID]);
                }
            ?>
        }, 10000)
    </script>
<?php
include('footer.php');
?>