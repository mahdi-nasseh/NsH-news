<?php

include 'header.php';

use Nshnews\Model\Post;

?>

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- =======================
        Trending START -->
        <section class="py-2">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12 bg-primary bg-opacity-10 p-2 rounded">
                        <div class="d-sm-flex align-items-center text-center text-sm-start">
                            <!-- Title -->
                            <div class="me-3">
                                <span class="badge bg-primary p-2 px-3">اخبار امروز:</span>
                            </div>
                            <!-- Slider -->
                            <div class="tiny-slider arrow-end arrow-xs arrow-white arrow-round arrow-md-none">
                                <div class="tiny-slider-inner"
                                     data-autoplay="true"
                                     data-hoverpause="true"
                                     data-gutter="0"
                                     data-arrow="true"
                                     data-dots="false"
                                     data-items="1">
                                    <!-- Slider items -->
                                    <?php
                                    $toDayPosts = Post::whereDate('created_at', '=', date('Y-m-d'))->get();
                                    if (count($toDayPosts) > 0) {
                                        foreach ($toDayPosts as $post): ?>
                                            <div><a href="single.php?post_id=<?= $post->ID ?>" class="text-reset btn-link"> <?= $post->title ?> </a></div>
                                        <?php endforeach; ?>
                                    <?php } else { ?>
                                        <div><a class="text-reset btn-link">برای امروز خبری ثبت نشده است.</a></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Trending END -->

        <!-- =======================
        Main hero START -->
        <?php
        $lastPosts = Post::orderby('created_at', 'desc')->limit(4)->get();
        ?>
        <section class="pt-4 pb-0 card-grid">
            <div class="container">
                <div class="row g-4">
                    <!-- Left big card -->
                    <div class="col-lg-6">
                        <div class="card card-overlay-bottom card-grid-lg card-bg-scale"
                             style="background-image:url(../uploades/<?= $lastPosts[0]->thumbnail ?>); background-position: center left; background-size: cover;">
                            <!-- Card featured  star -->
                            <!--                            <span class="card-featured" title=""><i class="fas fa-star"></i></span>-->
                            <!-- Card Image overlay -->
                            <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                <div class="w-100 mt-auto">
                                    <!-- Card category -->
                                    <?php foreach ($lastPosts[0]->category as $cat) { ?>
                                        <a href="#" class="badge text-bg-danger mb-2"><i
                                                    class="fas fa-circle me-2 small fw-bold"></i> <?= $cat->name ?> </a>
                                    <?php } ?>
                                    <!-- Card title -->
                                    <h2 class="text-white h1"><a href="single.php?post_id=<?= $lastPosts[0]->ID ?>"
                                                                 class="btn-link stretched-link text-reset"> <?= $lastPosts[0]->title ?> </a>
                                    </h2>
                                    <p class="text-white"> <?= mb_substr($lastPosts[0]->body, 0, 110) ?>... </p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center text-white position-relative">
                                                    <div class="avatar avatar-sm">
                                                        <?php if ($lastPosts[0]->user->thumbnail != NULL): ?>
                                                            <img class="avatar-img rounded-circle"
                                                                 src="assets/images/avatar/<?= $lastPosts[0]->user->thumbnail ?>"
                                                                 alt="avatar">
                                                        <?php else: ?>
                                                            <img class="avatar-img rounded-circle"
                                                                 src="assets/images/avatar/boy-blank-avatar.svg"
                                                                 alt="avatar">
                                                        <?php endif; ?>
                                                    </div>
                                                    <span class="ms-3"><a href="#"
                                                                          class="stretched-link text-reset btn-link"> <?= $lastPosts[0]->user->name . " " . $lastPosts[0]->user->family ?> </a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item"><?= toJalali($lastPosts[0]->created_at) ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right small cards -->
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <!-- Card item START -->
                            <div class="col-12">
                                <div class="card card-overlay-bottom card-grid-sm card-bg-scale"
                                     style="background-image:url(../uploades/<?= $lastPosts[1]->thumbnail ?>); background-position: center left; background-size: cover;">
                                    <!-- Card Image -->
                                    <!-- Card Image overlay -->
                                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                        <div class="w-100 mt-auto">
                                            <!-- Card category -->
                                            <?php foreach ($lastPosts[1]->category as $cat): ?>
                                                <a href="#" class="badge text-bg-info mb-2"><i
                                                            class="fas fa-circle me-2 small fw-bold"></i><?= $cat->name ?></a>
                                            <?php endforeach; ?>
                                            <!-- Card title -->
                                            <h4 class="text-white"><a href="single.php?post_id=<?= $lastPosts[1]->ID ?>"
                                                                      class="btn-link stretched-link text-reset"><?= $lastPosts[1]->title ?></a></h4>
                                            <!-- Card info -->
                                            <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item position-relative">
                                                    <div class="nav-link">با <a href="#"
                                                                                class="stretched-link text-reset btn-link"><?= $lastPosts[1]->user->name . ' ' . $lastPosts[1]->user->family ?></a>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><?= toJalali($lastPosts[1]->created_at) ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card item END -->
                            <!-- Card item START -->
                            <div class="col-md-6">
                                <div class="card card-overlay-bottom card-grid-sm card-bg-scale"
                                     style="background-image:url(../uploades/<?= $lastPosts[2]->thumbnail ?>); background-position: center left; background-size: cover;">
                                    <!-- Card Image overlay -->
                                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                        <div class="w-100 mt-auto">
                                            <!-- Card category -->
                                            <?php foreach ($lastPosts[2]->category as $cat):?>
                                            <a href="#" class="badge text-bg-success mb-2"><i
                                                        class="fas fa-circle me-2 small fw-bold"></i><?= $cat->name ?></a>
                                                <?php endforeach; ?>
                                            <!-- Card title -->
                                            <h4 class="text-white"><a href="single.php?post_id=<?= $lastPosts[2]->ID ?>"
                                                                      class="btn-link stretched-link text-reset"><?= $lastPosts[2]->title ?></a></h4>
                                            <!-- Card info -->
                                            <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item position-relative">
                                                    <div class="nav-link">با <a href="#"
                                                                                class="stretched-link text-reset btn-link"><?= $lastPosts[2]->user->name . ' ' . $lastPosts[2]->user->family ?></a>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><?= toJalali($lastPosts[2]->created_at) ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card item END -->
                            <!-- Card item START -->
                            <div class="col-md-6">
                                <div class="card card-overlay-bottom card-grid-sm card-bg-scale"
                                     style="background-image:url(../uploades/<?= $lastPosts[3]->thumbnail ?>); background-position: center left; background-size: cover;">
                                    <!-- Card Image overlay -->
                                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                        <div class="w-100 mt-auto">
                                            <!-- Card category -->
                                            <?php foreach ($lastPosts[3]->category as $cat):?>
                                            <a href="#" class="badge text-bg-warning mb-2"><i
                                                        class="fas fa-circle me-2 small fw-bold"></i><?= $cat->name ?></a>
                                            <?php endforeach; ?>
                                            <!-- Card title -->
                                            <h4 class="text-white"><a href="single.php?post_id=<?= $lastPosts[3]->ID ?>"
                                                                      class="btn-link stretched-link text-reset"><?= $lastPosts[3]->title ?></a></h4>
                                            <!-- Card info -->
                                            <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item position-relative">
                                                    <div class="nav-link">با <a href="#"
                                                                                class="stretched-link text-reset btn-link"><?= $lastPosts[3]->user->name . ' ' . $lastPosts[3]->user->family ?></a>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><?= toJalali($lastPosts[3]->created_at) ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card item END -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Main hero END -->

        <!-- =======================
        Main content START -->
        <section class="position-relative">
            <div class="container" data-sticky-container>
                <div class="row">
                    <!-- Main Post START -->
                    <div class="col-lg-9">
                        <!-- Title -->
                        <div class="mb-4">
                            <h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i>سایر اخبار</h2>
<!--                            <p>آخرین اخبار، تصاویر، فیلم ها و گزارش های ویژه</p>-->
                        </div>
                        <?php $posts = Post::orderBy('created_at', 'desc')->limit(6)->offset(4)->get(); ?>
                        <div class="row gy-4">
                            <!-- Card item START -->
                            <?php foreach ($posts as $post):?>
                            <div class="col-sm-6">
                                <div class="card">
                                    <!-- Card img -->
                                    <div class="position-relative">
                                        <img class="card-img" src="../uploades/<?= $post->thumbnail ?>" alt="Card image" style="height: 250px">
                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                            <!-- Card overlay bottom -->
                                            <div class="w-100 mt-auto">
                                                <!-- Card category -->
                                                <?php foreach ($post->category as $cat) : ?>
                                                <a href="#" class="badge text-bg-danger mb-2"><i
                                                            class="fas fa-circle me-2 small fw-bold"></i><?= $cat->name ?></a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 pt-3">
                                        <!-- Sponsored Post -->
                                        <a href="#!" class="mb-0 text-body small" tabindex="0" role="button"
                                           data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="focus"
                                           data-bs-placement="top"
                                           data-bs-content="شما این تبلیغ را می بینید زیرا فعالیت شما با مخاطبان مورد نظر سایت ما مطابقت دارد.">
<!--                                            <i class="bi bi-info-circle ps-1"></i> ویژه-->
                                        </a>
                                        <h4 class="card-title mt-2"><a href="single.php?post_id=<?= $post->ID ?>"
                                                                       class="btn-link text-reset"><?= $post->title ?></a></h4>
                                        <p class="card-text"><?= mb_substr($post->body, 0 , 200) ?>...</p>
                                        <!-- Card info -->
                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item">
                                                <div class="nav-link">
                                                    <div class="d-flex align-items-center position-relative">
                                                        <div class="avatar avatar-xs">
                                                            <img class="avatar-img rounded-circle"
                                                                 src="assets/images/avatar/<?= $post->user->thumbnail ?>" alt="avatar">
                                                        </div>
                                                        <span class="ms-3"><a href="#"
                                                                                 class="stretched-link text-reset btn-link"><?= $post->user->name . ' ' . $post->user->family ?></a></span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item"><?= toJalali($post->created_at) ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- Card item END -->
                            <!-- Card item START -->
<!--                            <div class="col-sm-6">-->
<!--                                <div class="card">-->
<!--                                     Card img -->
<!--                                    <div class="position-relative">-->
<!--                                        <img class="card-img" src="assets/images/blog/4by3/06.jpg" alt="Card image">-->
<!--                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--                                             Card overlay Top -->
<!--                                            <div class="w-100 mb-auto d-flex justify-content-end">-->
<!--                                                <div class="text-end ms-auto">-->
<!--                                                     Card format icon -->
<!--                                                    <div class="icon-md bg-white bg-opacity-25 bg-blur text-white rounded-circle"-->
<!--                                                         title="This post has video"><i class="fas fa-video"></i></div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                             Card overlay bottom -->
<!--                                            <div class="w-100 mt-auto">-->
<!--                                                 Card category -->
<!--                                                <a href="#" class="badge text-bg-danger mb-2"><i-->
<!--                                                            class="fas fa-circle me-2 small fw-bold"></i>گردشگری</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="card-body px-0 pt-3">-->
<!--                                        <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset">رازهای-->
<!--                                                کوچک کثیف در مورد صنعت تجارت</a></h4>-->
<!--                                        <p class="card-text">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که-->
<!--                                            لازم-->
<!--                                            است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود-->
<!--                                            ابزارهای-->
<!--                                            کاربردی...</p>-->
<!--                                         Card info -->
<!--                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">-->
<!--                                            <li class="nav-item">-->
<!--                                                <div class="nav-link">-->
<!--                                                    <div class="d-flex align-items-center position-relative">-->
<!--                                                        <div class="avatar avatar-xs">-->
<!--                                                            <img class="avatar-img rounded-circle"-->
<!--                                                                 src="assets/images/avatar/02.jpg" alt="avatar">-->
<!--                                                        </div>-->
<!--                                                        <span class="ms-3">با <a href="#"-->
<!--                                                                                 class="stretched-link text-reset btn-link">میلاد بابایی</a></span>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                            <li class="nav-item">7 دی، 1400</li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <!-- Card item END -->
                            <!-- Card item START -->
<!--                            <div class="col-sm-6">-->
<!--                                <div class="card">-->
<!--                                     Card img -->
<!--                                    <div class="position-relative">-->
<!--                                        <img class="card-img" src="assets/images/blog/4by3/03.jpg" alt="Card image">-->
<!--                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--                                             Card overlay bottom -->
<!--                                            <div class="w-100 mt-auto">-->
<!--                                                 Card category -->
<!--                                                <a href="#" class="badge text-bg-success mb-2"><i-->
<!--                                                            class="fas fa-circle me-2 small fw-bold"></i>اجتماعی</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="card-body px-0 pt-3">-->
<!--                                        <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset">عادات-->
<!--                                                بدی که افراد در صنعت باید آنها را ترک کنند!!!</a></h4>-->
<!--                                        <p class="card-text">دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان-->
<!--                                            رسد-->
<!--                                            وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل-->
<!--                                            دنیای-->
<!--                                            موجود طراحی اساسا...</p>-->
<!--                                         Card info -->
<!--                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">-->
<!--                                            <li class="nav-item">-->
<!--                                                <div class="nav-link">-->
<!--                                                    <div class="d-flex align-items-center position-relative">-->
<!--                                                        <div class="avatar avatar-xs">-->
<!--                                                            <img class="avatar-img rounded-circle"-->
<!--                                                                 src="assets/images/avatar/03.jpg" alt="avatar">-->
<!--                                                        </div>-->
<!--                                                        <span class="ms-3">با <a href="#"-->
<!--                                                                                 class="stretched-link text-reset btn-link">علی علیزاده</a></span>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                            <li class="nav-item">17 تیر، 1400</li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <!-- Card item END -->
                            <!-- Card item START -->
<!--                            <div class="col-sm-6">-->
<!--                                <div class="card">-->
<!--                                     Card img -->
<!--                                    <div class="position-relative">-->
<!--                                        <img class="card-img" src="assets/images/blog/4by3/04.jpg" alt="Card image">-->
<!--                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--                                             Card overlay bottom -->
<!--                                            <div class="w-100 mt-auto">-->
<!--                                                 Card category -->
<!--                                                <a href="#" class="badge text-bg-primary mb-2"><i-->
<!--                                                            class="fas fa-circle me-2 small fw-bold"></i>ورزش</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="card-body px-0 pt-3">-->
<!--                                        <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset">سال-->
<!--                                                2022 رویایی و فوق العاده برای طارمی</a></h4>-->
<!--                                        <p class="card-text">برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف-->
<!--                                            بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و-->
<!--                                            آینده شناخت...</p>-->
<!--                                         Card info -->
<!--                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">-->
<!--                                            <li class="nav-item">-->
<!--                                                <div class="nav-link">-->
<!--                                                    <div class="d-flex align-items-center position-relative">-->
<!--                                                        <div class="avatar avatar-xs">-->
<!--                                                            <div class="avatar-img rounded-circle bg-success">-->
<!--                                                                <span class="text-white position-absolute top-50 start-50 translate-middle fw-bold small">SL</span>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <span class="ms-3">با <a href="#"-->
<!--                                                                                 class="stretched-link text-reset btn-link">سهراب اسدی</a></span>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                            <li class="nav-item">29 مرداد، 1400</li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <!-- Card item END -->
                            <!-- Card item START -->
<!--                            <div class="col-sm-6">-->
<!--                                <div class="card">-->
<!--                                     Card img -->
<!--                                    <div class="position-relative">-->
<!--                                        <img class="card-img" src="assets/images/blog/4by3/05.jpg" alt="Card image"> -->
<!--                                        <div class="card-image position-relative">-->
<!--                                            <img class="card-img" src="assets/images/blog/4by3/05.jpg" alt="Card image">-->
<!--                                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--                                                 Card overlay -->
<!--                                                <div class="w-100 my-auto">-->
<!--                                                     Audio START -->
<!--                                                    <div class="player-wrapper bg-light rounded">-->
<!--                                                        <audio class="player-audio" crossorigin>-->
<!--                                                            <source src="assets/images/videos/audio.mp3"-->
<!--                                                                    type="audio/mp3">-->
<!--                                                        </audio>-->
<!--                                                    </div>-->
<!--                                                     Audio END -->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="card-body px-0 pt-3">-->
<!--                                        <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset">طرح-->
<!--                                                مجلس برای گرفتن مالیات از سفته بازها</a></h4>-->
<!--                                        <p class="card-text">ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد-->
<!--                                            نیاز-->
<!--                                            شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی-->
<!--                                            اساسا مورد استفاده... </p>-->
<!--                                         Card info -->
<!--                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">-->
<!--                                            <li class="nav-item">-->
<!--                                                <div class="nav-link">-->
<!--                                                    <div class="d-flex align-items-center position-relative">-->
<!--                                                        <div class="avatar avatar-xs">-->
<!--                                                            <img class="avatar-img rounded-circle"-->
<!--                                                                 src="assets/images/avatar/05.jpg" alt="avatar">-->
<!--                                                        </div>-->
<!--                                                        <span class="ms-3">با <a href="#"-->
<!--                                                                                 class="stretched-link text-reset btn-link">نازنین لولایی</a></span>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                            <li class="nav-item">11 دی، 1400</li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <!-- Card item END -->
                            <!-- Card item START -->
<!--                            <div class="col-sm-6">-->
<!--                                <div class="card">-->
<!--                                    Card img -->
<!--                                    <div class="position-relative">-->
<!--                                        <img class="card-img" src="assets/images/blog/4by3/12.jpg" alt="Card image">-->
<!--                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">-->
<!--                                             Card overlay bottom -->
<!--                                            <div class="w-100 mt-auto">-->
<!--                                                 Card category -->
<!--                                                <a href="#" class="badge text-bg-danger mb-2"><i-->
<!--                                                            class="fas fa-circle me-2 small fw-bold"></i>اقتصاد</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="card-body px-0 pt-3">-->
<!--                                        <h4 class="card-title"><a href="post-single.html" class="btn-link text-reset">رونمایی-->
<!--                                                از طرح بزرگترین تلسکوپ نوری آسیا</a></h4>-->
<!--                                        <p class="card-text">متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای-->
<!--                                            طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد-->
<!--                                            کرد.-->
<!--                                            در این صورت می توان...</p>-->
<!--                                        Card info -->
<!--                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">-->
<!--                                            <li class="nav-item">-->
<!--                                                <div class="nav-link">-->
<!--                                                    <div class="d-flex align-items-center position-relative">-->
<!--                                                        <div class="avatar avatar-xs">-->
<!--                                                            <img class="avatar-img rounded-circle"-->
<!--                                                                 src="assets/images/avatar/06.jpg" alt="avatar">-->
<!--                                                        </div>-->
<!--                                                        <span class="ms-3">با <a href="#"-->
<!--                                                                                 class="stretched-link text-reset btn-link">زهرا عظیمی</a></span>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                            <li class="nav-item">1 خرداد، 1400</li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <!-- Card item END -->
                            <!-- Load more START -->
                            <div class="col-12 text-center mt-5">
                                <button type="button" class="btn btn-primary-soft">مشاهده بیشتر <i
                                            class="bi bi-arrow-down-circle ms-2 align-middle"></i></button>
                            </div>
                            <!-- Load more END -->
                        </div>
                    </div>
                    <!-- Main Post END -->
                    <!-- Sidebar START -->
                    <div class="col-lg-3 mt-5 mt-lg-0">
                        <div data-sticky data-margin-top="80" data-sticky-for="767">

                            <!-- Social widget START -->
                            <div class="row g-2">
                                <div class="col-4">
                                    <a href="#" class="bg-facebook rounded text-center text-white-force p-3 d-block">
                                        <i class="fab fa-facebook-square fs-5 mb-2"></i>
                                        <h6 class="m-0">1.5K</h6>
                                        <span class="small">طرفدار</span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="#"
                                       class="bg-instagram-gradient rounded text-center text-white-force p-3 d-block">
                                        <i class="fab fa-instagram fs-5 mb-2"></i>
                                        <h6 class="m-0">1.8M</h6>
                                        <span class="small">حامیان</span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="#" class="bg-youtube rounded text-center text-white-force p-3 d-block">
                                        <i class="fab fa-youtube-square fs-5 mb-2"></i>
                                        <h6 class="m-0">22K</h6>
                                        <span class="small">بازدید</span>
                                    </a>
                                </div>
                            </div>
                            <!-- Social widget END -->

                            <!-- Trending topics widget START -->
                            <div>
                                <h4 class="mt-4 mb-3">برگزیده ها</h4>
                                <!-- Category item -->
                                <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded bg-dark-overlay-4 "
                                     style="background-image:url(assets/images/blog/4by3/01.jpg); background-position: center left; background-size: cover;">
                                    <div class="p-3">
                                        <a href="#" class="stretched-link btn-link text-white h5">گردشگری</a>
                                    </div>
                                </div>
                                <!-- Category item -->
                                <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
                                     style="background-image:url(assets/images/blog/4by3/02.jpg); background-position: center left; background-size: cover;">
                                    <div class="bg-dark-overlay-4 p-3">
                                        <a href="#" class="stretched-link btn-link text-white h5">اقتصاد</a>
                                    </div>
                                </div>
                                <!-- Category item -->
                                <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
                                     style="background-image:url(assets/images/blog/4by3/03.jpg); background-position: center left; background-size: cover;">
                                    <div class="bg-dark-overlay-4 p-3">
                                        <a href="#" class="stretched-link btn-link text-white h5">فرهنگ</a>
                                    </div>
                                </div>
                                <!-- Category item -->
                                <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
                                     style="background-image:url(assets/images/blog/4by3/04.jpg); background-position: center left; background-size: cover;">
                                    <div class="bg-dark-overlay-4 p-3">
                                        <a href="#" class="stretched-link btn-link text-white h5">تکنولوژی</a>
                                    </div>
                                </div>
                                <!-- Category item -->
                                <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
                                     style="background-image:url(assets/images/blog/4by3/05.jpg); background-position: center left; background-size: cover;">
                                    <div class="bg-dark-overlay-4 p-3">
                                        <a href="#" class="stretched-link btn-link text-white h5">ورزش</a>
                                    </div>
                                </div>
                                <!-- View All Category button -->
                                <div class="text-center mt-3">
                                    <a href="#" class="text-body text-primary-hover"><u>مشاهده همه</u></a>
                                </div>
                            </div>
                            <!-- Trending topics widget END -->

                            <div class="row">
                                <!-- Recent post widget START -->
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <h4 class="mt-4 mb-3">پربحث ها</h4>
                                    <!-- Recent post item -->
                                    <div class="card mb-3">
                                        <div class="row g-3">
                                            <div class="col-4">
                                                <img class="rounded" src="assets/images/blog/4by3/thumb/01.jpg" alt="">
                                            </div>
                                            <div class="col-8">
                                                <h6><a href="post-single-2.html"
                                                       class="btn-link stretched-link text-reset">خرید
                                                        و فروش ارز در کانال 37 هزار تومانی</a></h6>
                                                <div class="small mt-1">17 بهمن، 1400</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Recent post item -->
                                    <div class="card mb-3">
                                        <div class="row g-3">
                                            <div class="col-4">
                                                <img class="rounded" src="assets/images/blog/4by3/thumb/02.jpg" alt="">
                                            </div>
                                            <div class="col-8">
                                                <h6><a href="post-single-2.html"
                                                       class="btn-link stretched-link text-reset">کاهش
                                                        192 هزار میلیارد تومانی بدهی دولت</a></h6>
                                                <div class="small mt-1">4 مهر، 1400</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Recent post item -->
                                    <div class="card mb-3">
                                        <div class="row g-3">
                                            <div class="col-4">
                                                <img class="rounded" src="assets/images/blog/4by3/thumb/03.jpg" alt="">
                                            </div>
                                            <div class="col-8">
                                                <h6><a href="post-single-2.html"
                                                       class="btn-link stretched-link text-reset">ساخت
                                                        مسکن موتور محرک کاهش تورم</a></h6>
                                                <div class="small mt-1">30 تیر، 1400</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Recent post item -->
                                    <div class="card mb-3">
                                        <div class="row g-3">
                                            <div class="col-4">
                                                <img class="rounded" src="assets/images/blog/4by3/thumb/04.jpg" alt="">
                                            </div>
                                            <div class="col-8">
                                                <h6><a href="post-single-2.html"
                                                       class="btn-link stretched-link text-reset">آشنایی
                                                        با کلید موفقیت نهضت ملی مسکن‌</a></h6>
                                                <div class="small mt-1">29 دی 1400</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Recent post widget END -->

                                <!-- ADV widget START -->
                                <div class="col-12 col-sm-6 col-lg-12 my-4">
                                    <a href="#" class="d-block card-img-flash">
                                        <img src="assets/images/adv.png" alt="">
                                    </a>
                                    <div class="smaller text-end mt-2">تبلیغ در سایت <a href="#"
                                                                                        class="text-body"><u>انتخاب</u></a>
                                    </div>
                                </div>
                                <!-- ADV widget END -->
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar END -->
                </div> <!-- Row end -->
            </div>
        </section>
        <!-- =======================
        Main content END -->

        <!-- Divider -->
        <div class="container">
            <div class="border-bottom border-primary border-2 opacity-1"></div>
        </div>

        <!-- =======================
        Section START -->
        <section class="pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Title -->
                        <div class="mb-4 d-md-flex justify-content-between align-items-center">
                            <h2 class="m-0"><i class="bi bi-megaphone"></i> مطالب پیشنهادی</h2>
                            <a href="#" class="text-body small"><u>مشاهده همه</u></a>
                        </div>
                        <div class="tiny-slider arrow-hover arrow-blur arrow-dark arrow-round">
                            <div class="tiny-slider-inner"
                                 data-autoplay="true"
                                 data-hoverpause="true"
                                 data-gutter="24"
                                 data-arrow="true"
                                 data-dots="false"
                                 data-items-xl="4"
                                 data-items-md="3"
                                 data-items-sm="2"
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
                                                    <div class="icon-md bg-white bg-opacity-10 bg-blur text-white fw-bold rounded-circle"
                                                         title="8.5 rating">8.5
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card overlay bottom -->
                                            <div class="w-100 mt-auto">
                                                <a href="#" class="badge text-bg-info mb-2"><i
                                                            class="fas fa-circle me-2 small fw-bold"></i>گردشگری</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 pt-3">
                                        <h5 class="card-title"><a href="post-single-3.html" class="btn-link text-reset">افزایش
                                                آلودگی هوا در شهرهای پُرجمعیت تا فردا</a></h5>
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
                                            <!-- Card overlay bottom -->
                                            <div class="w-100 mt-auto">
                                                <a href="#" class="badge text-bg-danger mb-2"><i
                                                            class="fas fa-circle me-2 small fw-bold"></i>ورزش</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 pt-3">
                                        <h5 class="card-title"><a href="post-single-3.html" class="btn-link text-reset">آمار
                                                فرزندان حاصل از روش‌های کمک‌ باروری در جهان</a></h5>
                                        <!-- Card info -->
                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item">
                                                <div class="nav-link">
                                                    <div class="d-flex align-items-center position-relative">
                                                        <div class="avatar avatar-xs">
                                                            <div class="avatar-img rounded-circle bg-warning">
                                                                <span class="text-dark position-absolute top-50 start-50 translate-middle fw-bold small">MK</span>
                                                            </div>
                                                        </div>
                                                        <span class="ms-3">با <a href="#"
                                                                                 class="stretched-link text-reset btn-link">رضا مرادی</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">15 خرداد، 1400</li>
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
                                            <!-- Card overlay bottom -->
                                            <div class="w-100 mt-auto">
                                                <a href="#" class="badge text-bg-success mb-2"><i
                                                            class="fas fa-circle me-2 small fw-bold"></i>سیاست</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 pt-3">
                                        <h5 class="card-title"><a href="post-single-3.html" class="btn-link text-reset">عادات
                                                بدی که افراد در صنعت باید آنها را ترک کنند!</a></h5>
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
                                                                                 class="stretched-link text-reset btn-link">سارا حقیقت نژاد</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">1 دی، 1400</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Card item END -->
                                <!-- Card item START -->
                                <div class="card">
                                    <!-- Card img -->
                                    <div class="position-relative">
                                        <img class="card-img" src="assets/images/blog/4by3/10.jpg" alt="Card image">
                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                            <!-- Card overlay Top -->
                                            <div class="w-100 mb-auto d-flex justify-content-end">
                                                <div class="text-end ms-auto">
                                                    <!-- Card format icon -->
                                                    <div class="icon-md bg-white-soft bg-blur text-white rounded-circle"
                                                         title=""><i class="fas fa-image"></i></div>
                                                </div>
                                            </div>
                                            <!-- Card overlay bottom -->
                                            <div class="w-100 mt-auto">
                                                <a href="#" class="badge text-bg-primary mb-2"><i
                                                            class="fas fa-circle me-2 small fw-bold"></i>فرهنگ</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 pt-3">
                                        <h5 class="card-title"><a href="post-single-3.html" class="btn-link text-reset">به
                                                همین دلیل امسال سال استارت آپ ها خواهد بود؟</a></h5>
                                        <!-- Card info -->
                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item">
                                                <div class="nav-link">
                                                    <div class="d-flex align-items-center position-relative">
                                                        <div class="avatar avatar-xs">
                                                            <img class="avatar-img rounded-circle"
                                                                 src="assets/images/avatar/10.jpg" alt="avatar">
                                                        </div>
                                                        <span class="ms-3">با <a href="#"
                                                                                 class="stretched-link text-reset btn-link">نیلوفر راد</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">7 آذر، 1400</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Card item END -->
                                <!-- Card item START -->
                                <div class="card">
                                    <!-- Card img -->
                                    <div class="position-relative">
                                        <img class="card-img" src="assets/images/blog/4by3/11.jpg" alt="Card image">
                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                            <!-- Card overlay bottom -->
                                            <div class="w-100 mt-auto">
                                                <a href="#" class="badge text-bg-warning mb-2"><i
                                                            class="fas fa-circle me-2 small fw-bold"></i>تکنولوژی</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 pt-3">
                                        <h5 class="card-title"><a href="post-single-3.html" class="btn-link text-reset">بهترین
                                                تابلوهای پینترست برای یادگیری در مورد تجارت</a></h5>
                                        <!-- Card info -->
                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                            <li class="nav-item">
                                                <div class="nav-link">
                                                    <div class="d-flex align-items-center position-relative">
                                                        <div class="avatar avatar-xs">
                                                            <img class="avatar-img rounded-circle"
                                                                 src="assets/images/avatar/12.jpg" alt="avatar">
                                                        </div>
                                                        <span class="ms-3">با <a href="#"
                                                                                 class="stretched-link text-reset btn-link">المیرا کرمی</a></span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">7 شهریور، 1400</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Card item END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Section END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->
<?php
include "footer.php";
?>