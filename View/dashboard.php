<?php
include '../init.php';
use Nshnews\Model\User;
$user = User::where('ID','=',$_SESSION['user_id'])->first();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
	<title>Dashboard</title>

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
			if(el != 'undefined' && el != null) {
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

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/apexcharts/css/apexcharts.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/overlay-scrollbar/css/OverlayScrollbars.min.css">

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
<!-- =======================
Header START -->
<header class="navbar-light navbar-sticky header-static border-bottom navbar-dashboard">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand me-3" href="index.php">
				<img class="navbar-brand-item light-mode-item" src="assets/images/logo.svg" alt="logo">			
				<img class="navbar-brand-item dark-mode-item" src="assets/images/logo-light.svg" alt="logo">			
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="text-body h6 d-none d-sm-inline-block">منو</span>
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Main navbar START -->
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav navbar-nav-scroll mx-auto">

					<!-- Nav item 1 Demos -->
					<li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door me-1"></i>پیشخوان</a></li>

					<!-- Nav item 2 Post -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-pencil me-1"></i>اخبار</a>
						<ul class="dropdown-menu" aria-labelledby="postMenu">
							<!-- dropdown submenu -->
							<li> <a class="dropdown-item" href="dashboard-post-list.html">لیست</a> </li>
							<li> <a class="dropdown-item" href="dashboard-post-categories.html">دسته بندی</a> </li>
							<li> <a class="dropdown-item" href="dashboard-post-create.html">ایجاد</a> </li>
							<li> <a class="dropdown-item" href="dashboard-post-edit.html">ویرایش</a> </li>
						</ul>
					</li>

					<!-- Nav item 3 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-folder me-1"></i>صفحات</a>
						<ul class="dropdown-menu" aria-labelledby="pagesMenu">
							<li> <a class="dropdown-item" href="dashboard-author-list.html">لیست نویسندگان</a></li>
							<li> <a class="dropdown-item" href="dashboard-author-single.html">جزئیات نویسنده</a></li>
							<li> <a class="dropdown-item" href="dashboard-edit-profile.html">ویرایش حساب کاربری</a></li>
							<li> <a class="dropdown-item" href="dashboard-reviews.html">نظرات</a></li>
							<li> <a class="dropdown-item" href="dashboard-settings.html">تنظیمات</a></li>
							<li class="dropdown-divider"></li>
							<li> <a class="dropdown-item" href="#" target="_blank"> <i class="text-warning fa-fw bi bi-life-preserver me-2"></i>پشتیبانی</a></li>
							<li> <a class="dropdown-item" href="../rtl/docs/index.html" target="_blank"> <i class="text-danger fa-fw bi bi-card-text me-2"></i>داکیومنت</a></li>
							<li class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="../ltr/index.html" target="_blank"> <i class="text-info fa-fw bi bi-toggle-off me-2"></i>نسخه LTR</a></li>
							<li><a class="dropdown-item" href="#" target="_blank"> <i class="text-success fa-fw bi bi-cloud-download-fill me-2"></i>خرید قالب</a> </li>
						</ul>
					</li>
				</ul>
				
				<!-- Search dropdown START -->
				<div class="nav my-3 my-xl-0 px-4 px-lg-1 flex-nowrap align-items-center">
					<div class="nav-item w-100">
						<form class="position-relative">
							<input class="form-control pe-5 bg-transparent" type="search" placeholder="جستجو" aria-label="Search">
							<button class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
						</form>
					</div>
				</div>
				<!-- Search dropdown END -->
			</div>
		  <!-- Main navbar END -->

			<!-- Nav right START -->
			<div class="nav flex-nowrap align-items-center">

				<!-- Notification dropdown START -->
				<div class="nav-item ms-2 ms-md-3 dropdown">
					<!-- Notification button -->
					<a class="btn btn-primary-soft btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
						<i class="bi bi-bell fa-fw"></i>
					</a>
					<!-- Notification dote -->
					<span class="notif-badge animation-blink"></span>

					<!-- Notification dropdown menu START -->
					<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
						<div class="card bg-transparent">
							<div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center">
								<h6 class="m-0">نوتیفیکیشن <span class="badge bg-danger bg-opacity-10 text-danger ms-2">2 خبر</span></h6>
								<a class="small" href="#">حذف</a>
							</div>
							<div class="card-body p-0">
								<ul class="list-group list-unstyled list-group-flush">
									<!-- Notif item -->
									<li>
										<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
											<div class="me-3">
												<div class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
												</div>
											</div>
											<div>
                        <h6 class="mb-1">ثبت نام یک کاربر</h6>
												<span class="small"> <i class="bi bi-clock"></i> 3 دقیقه پیش</span>
											</div>
										</a>
									</li>

									<!-- Notif item -->
									<li>
										<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
											<div class="me-3">
												<div class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
												</div>
											</div>
											<div>
												<h6 class="mb-1">حذف یک حساب کاربری</h6>
												<span class="small"> <i class="bi bi-clock"></i> 6 دقیقه پیش</span>
											</div>
										</a>
									</li>

									<!-- Notif item -->
									<li>
										<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
											<div class="me-3">
												<div class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
												</div>
											</div>
											<div>
												<h6 class="mb-1">ثبت دیدگاه جدید</h6>
												<span class="small"> <i class="bi bi-clock"></i> 10 دقیقه پیش</span>
											</div>
										</a>
									</li>

									<!-- Notif item -->
									<li>
										<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
											<div class="me-3">
												<div class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
												</div>
											</div>
											<div>
												<h6 class="mb-1">بروزرسانی تنظیمات کاربری</h6>
												<span class="small"> <i class="bi bi-clock"></i> دیروز</span>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<!-- Button -->
							<div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
								<a href="#" class="stretched-link">مشاهده تمام فعالیت ها</a>
							</div>
						</div>
					</div>
					<!-- Notification dropdown menu END -->
				</div>
				<!-- Notification dropdown END -->

				<!-- Profile dropdown START -->
				<div class="nav-item ms-2 ms-md-3 dropdown">
					<!-- Avatar -->
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/<?= $user->thumbnail ?>" alt="avatar">
					</a>

					<!-- Profile dropdown START -->
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/<?= $user->thumbnail ?>" alt="avatar">
								</div>
								<div>
									<a class="h6 mt-2 mt-sm-0" href="#"><?= $user->getFullName() ?></a>
									<p class="small m-0"><?= $user->email ?></p>
								</div>
							</div>
							<hr>
						</li>
						<!-- Links -->
						<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>ویرایش</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>تنظیمات</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>راهنما</a></li>
						<li><a class="dropdown-item" href="../Controller/auth.php?logout"><i class="bi bi-power fa-fw me-2"></i>خروج</a></li>
						<li class="dropdown-divider mb-3"></li>
						<li>
							<div class="dropdown-item">
								<div class="modeswitch m-0" id="darkModeSwitch">
									<div class="switch"></div>
								</div>
							</div>
						</li>
					</ul>
					<!-- Profile dropdown END -->
				</div>
				<!-- Profile dropdown END -->

			<!-- Nav right END -->
			</div>
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================
Main contain START -->
<section class="py-4">
	<div class="container">
		<div class="row g-4">

			<div class="col-12">
				<!-- Counter START -->
				<div class="row g-4">
					
					<!-- Counter item -->
					<div class="col-sm-6 col-lg-3">
						<div class="card card-body border p-3">
							<div class="d-flex align-items-center">
								<!-- Icon -->
								<div class="icon-xl fs-1 bg-success bg-opacity-10 rounded-3 text-success">
									<i class="bi bi-people-fill"></i>
								</div>
								<!-- Content -->
								<div class="ms-3">
									<h3>134K</h3>
									<h6 class="mb-0">بازدید صفحه</h6>
								</div>
							</div>
						</div>
					</div>

					<!-- Counter item -->
					<div class="col-sm-6 col-lg-3">
						<div class="card card-body border p-3">
							<div class="d-flex align-items-center">
								<!-- Icon -->
								<div class="icon-xl fs-1 bg-primary bg-opacity-10 rounded-3 text-primary">
									<i class="bi bi-file-earmark-text-fill"></i>
								</div>
								<!-- Content -->
								<div class="ms-3">
									<h3>180</h3>
									<h6 class="mb-0">اخبار جدید</h6>
								</div>
							</div>
						</div>
					</div>

					<!-- Counter item -->
					<div class="col-sm-6 col-lg-3">
						<div class="card card-body border p-3">
							<div class="d-flex align-items-center">
								<!-- Icon -->
								<div class="icon-xl fs-1 bg-danger bg-opacity-10 rounded-3 text-danger">
									<i class="bi bi-suit-heart-fill"></i>
								</div>
								<!-- Content -->
								<div class="ms-3">
									<h3>2150</h3>
									<h6 class="mb-0">لایک</h6>
								</div>
							</div>
						</div>
					</div>

					<!-- Counter item -->
					<div class="col-sm-6 col-lg-3">
						<div class="card card-body border p-3">
							<div class="d-flex align-items-center">
								<!-- Icon -->
								<div class="icon-xl fs-1 bg-info bg-opacity-10 rounded-3 text-info">
									<i class="bi bi-bar-chart-line-fill"></i>
								</div>
								<!-- Content -->
								<div class="ms-3">
									<h3>84K</h3>
									<h6 class="mb-0">بازدیدکننده</h6>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- Counter END -->
			</div>

			<div class="col-xl-8">
				<!-- Chart START -->
				<div class="card border h-100">

					<!-- Card header -->
					<div class="card-header p-3 border-bottom">
						<h4 class="card-header-title mb-0">بازدید هفته</h4>
					</div>
					<!-- Card body -->
					<div class="card-body">
						<!-- Apex chart -->
						<div id="apexChartTrafficStats" class="mt-2"></div>
					</div>
				</div>
				<!-- Chart END -->
			</div>

			<div class="col-md-6 col-xxl-4">
				<!-- Latest blog START -->
				<div class="card border h-100">
					<!-- Card header -->
					<div class="card-header border-bottom p-3">
						<h5 class="card-header-title mb-0">آخرین اخبار</h5>
					</div>

					<!-- Card body START -->
					<div class="card-body p-3">

						<div class="row">
							<!-- Blog item -->
							<div class="col-12">
								<div class="d-flex align-items-center position-relative">
									<img class="w-60 rounded" src="assets/images/blog/1by1/01.jpg" alt="product">
									<div class="ms-3">
										<a href="#" class="h6 stretched-link">رازهای کوچک کثیف در مورد صنعت تجارت</a>
										<p class="small mb-0">17 تیر، 1400</p>
									</div>
								</div>
							</div>

							<!-- Divider -->
							<hr class="my-3">

							<!-- Blog item -->
							<div class="col-12">
								<div class="d-flex align-items-center position-relative">
									<img class="w-60 rounded" src="assets/images/blog/1by1/02.jpg" alt="product">
									<div class="ms-3">
										<a href="#" class="h6 stretched-link">فیلم‌های بالیوودی الگوی ضدانقلاب شده!</a>
										<p class="small mb-0">11 دی، 1400</p>
									</div>
								</div>
							</div>

							<!-- Divider -->
							<hr class="my-3">

							<!-- Blog item -->
							<div class="col-12">
								<div class="d-flex align-items-center position-relative">
									<img class="w-60 rounded" src="assets/images/blog/1by1/03.jpg" alt="product">
									<div class="ms-3">
										<a href="#" class="h6 stretched-link">عادات بدی که افراد در صنعت باید آنها را ترک کنند!</a>
										<p class="small mb-0">1 خرداد، 1400</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Card body END -->

					<!-- Card footer -->
					<div class="card-footer border-top text-center p-3">
						<a href="#">مشاهده همه</a>
					</div>

				</div>
				<!-- Latest blog END -->
			</div>

			<div class="col-md-6 col-xxl-4">
				<!-- Recent comment START -->
				<div class="card border h-100">
					<!-- Card header -->
					<div class="card-header border-bottom p-3">
						<h5 class="card-header-title mb-0">آخرین نظرات</h5>
					</div>

					<!-- Card body START -->
					<div class="card-body p-3">

						<div class="row">
							<!-- Comment item -->
							<div class="col-12">
								<div class="d-flex align-items-center position-relative">
									<!-- Avatar -->
									<div class="avatar avatar-lg flex-shrink-0">
										<img class="avatar-img rounded-2" src="assets/images/avatar/06.jpg" alt="avatar">
									</div>
									<!-- Info -->
									<div class="ms-3">
										<p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد... </a></p>
										<div class="d-flex justify-content-between">
											<p class="small mb-0">با الهام کریمی</p>
										</div>
									</div>
								</div>
							</div>

							<!-- Divider -->
							<hr class="my-3">

							<!-- Comment item -->
							<div class="col-12">
								<div class="d-flex align-items-center position-relative">
									<!-- Avatar -->
									<div class="avatar avatar-lg flex-shrink-0">
										<img class="avatar-img rounded-2" src="assets/images/avatar/08.jpg" alt="avatar">
									</div>
									<!-- Info -->
									<div class="ms-3">
										<p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد... </a></p>
										<div class="d-flex justify-content-between">
											<p class="small mb-0">با سارا موحد</p>
										</div>
									</div>
								</div>
							</div>

							<!-- Divider -->
							<hr class="my-3">

							<!-- Comment item -->
							<div class="col-12">
								<div class="d-flex align-items-center position-relative">
									<!-- Avatar -->
									<div class="avatar avatar-lg flex-shrink-0">
										<img class="avatar-img rounded-2" src="assets/images/avatar/04.jpg" alt="avatar">
									</div>
									<!-- Info -->
									<div class="ms-3">
										<p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد </a></p>
										<div class="d-flex justify-content-between">
											<p class="small mb-0">با سهراب رضایی</p>
										</div>
									</div>
								</div>
							</div>

							<!-- Divider -->
							<hr class="my-3">

							<!-- Comment item -->
							<div class="col-12">
								<div class="d-flex align-items-center position-relative">
									<!-- Avatar -->
									<div class="avatar avatar-lg flex-shrink-0">
										<img class="avatar-img rounded-2" src="assets/images/avatar/05.jpg" alt="avatar">
									</div>
									<!-- Info -->
									<div class="ms-3">
										<p class="mb-1"> <a class="h6 fw-normal stretched-link" href="#"> وقتی ثروت‌ های بزرگ به دست برخی مردم می‌افتد </a></p>
										<div class="d-flex justify-content-between">
											<p class="small mb-0">با نگین جوان</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Card body END -->
				</div>
				<!-- Recent comment END -->
			</div>

			<div class="col-md-6 col-xxl-4">
				<!-- Notice board START -->
				<div class="card border h-100">
					<!-- Card header -->
					<div class="card-header border-bottom d-flex justify-content-between align-items-center  p-3">
						<h5 class="card-header-title mb-0">نوتیفیکیشن ها</h5>
            <!-- Dropdown button -->
						<div class="dropdown text-end">
							<a href="#" class="btn border-0 p-0 mb-0" role="button" id="dropdownShare3" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-three-dots fa-fw"></i>
							</a>
							<!-- dropdown button -->
							<ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare3">
								<li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square fa-fw me-2"></i>ویرایش</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-trash fa-fw me-2"></i>حذف</a></li>
							</ul>
						</div>
					</div>

					<!-- Card body START -->
					<div class="card-body p-3">
						<div class="custom-scrollbar h-350">
							<div class="row">
								<!-- Notice board item -->
								<div class="col-12">
									<div class="d-flex justify-content-between position-relative">
										<div class="d-sm-flex">
											<div class="icon-lg bg-warning bg-opacity-15 text-warning rounded-2 flex-shrink-0">
												<i class="fas fa-user-tie fs-5"></i>
											</div>
											<!-- Info -->
											<div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
												<h6 class="mb-0"><a href="#" class="stretched-link">ثبت نام نویسنده جدید</a></h6>
												<p class="mb-0">پسرک گفت بیا این کفشا رو بپوش…</p>
												<span class="small">5 دقیقه پیش</span>
											</div>
										</div>
									</div>
								</div>

								<!-- Divider -->
								<hr class="my-3">

								<!-- Notice board item -->
								<div class="col-12">
									<div class="d-flex justify-content-between position-relative">
										<div class="d-sm-flex">
											<div class="icon-lg bg-success bg-opacity-10 text-success rounded-2 flex-shrink-0">
												<i class="bi bi-chat-left-quote-fill fs-5"></i>
											</div>
											<!-- Info -->
											<div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
												<h6 class="mb-0"><a href="#" class="stretched-link">افزودن 5 خبر جدید</a></h6>
												<p class="mb-0">پسرک گفت بیا این کفشا رو بپوش…</p>
												<span class="small">4 ساعت پیش</span>
											</div>
										</div>
									</div>
								</div>

								<!-- Divider -->
								<hr class="my-3">

								<!-- Notice board item -->
								<div class="col-12">
									<div class="d-flex justify-content-between position-relative">
										<div class="d-sm-flex">
											<div class="icon-lg bg-danger bg-opacity-10 text-danger rounded-2 flex-shrink-0">
												<i class="bi bi-bell-fill fs-5"></i>
											</div>
											<!-- Info -->
											<div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
												<h6 class="mb-0"><a href="#" class="stretched-link">5 ثبت نام جدید در خبرنامه</a></h6>
												<p class="mb-0">پسرک گفت بیا این کفشا رو بپوش…</p>
												<span class="small">4 ساعت پیش</span>
											</div>
										</div>
									</div>
								</div>

								<!-- Divider -->
								<hr class="my-3">

								<!-- Notice board item -->
								<div class="col-12">
									<div class="d-flex justify-content-between position-relative">
										<div class="d-sm-flex">
											<div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-2 flex-shrink-0"><i class="fas fa-globe fs-5"></i></div>
											<!-- Info -->
											<div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
												<h6 class="mb-0"><a href="#" class="stretched-link">بروزرسانی ویژگی های جدید</a></h6>
												<span class="small">3 روز پیش</span>
											</div>
										</div>
									</div>
								</div>
							</div><!-- Row END -->
						</div>
					</div>
					<!-- Card body END -->

					<!-- Card footer -->
					<div class="card-footer border-top text-center p-3">
						<a href="#">مشاهده همه</a>
					</div>

				</div>
				<!-- Notice board END -->
			</div>

			<div class="col-md-6 col-xxl-4">
				<div class="card border h-100">

					<!-- Card header -->
					<div class="card-header border-bottom d-flex justify-content-between align-items-center p-3">
						<h5 class="card-header-title mb-0">آمار بازدید</h5>
						<a href="#" class="btn btn-sm btn-link p-0 mb-0 text-reset">مشاهده همه</a>
					</div>

					<!-- Card body START -->
					<div class="card-body p-4">
						<!-- Chart -->
						<div class=" mx-auto">
							<div id="apexChartTrafficSources"></div>
						</div>
						<!-- Content -->
						<ul class="list-inline text-center mt-3">
							<li class="list-inline-item pe-2"><i class="text-primary fas fa-circle pe-1"></i> مرورگر </li>
							<li class="list-inline-item pe-2"><i class="text-success fas fa-circle pe-1"></i> وب سایت </li>
							<li class="list-inline-item pe-2"><i class="text-danger fas fa-circle pe-1"></i> شبکه های اجتماعی </li>
							<li class="list-inline-item pe-2"><i class="text-warning fas fa-circle pe-1"></i> سایر </li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-12">
				<!-- Blog list table START -->
				<div class="card border bg-transparent rounded-3">
					<!-- Card header START -->
					<div class="card-header bg-transparent border-bottom p-3">
						<div class="d-sm-flex justify-content-between align-items-center">
							<h5 class="mb-2 mb-sm-0">لیست اخبار <span class="badge bg-primary bg-opacity-10 text-primary">105</span></h5>
							<a href="#" class="btn btn-sm btn-primary mb-0">ثبت خبر جدید</a>
						</div>
					</div>
					<!-- Card header END -->

					<!-- Card body START -->
					<div class="card-body">

						<!-- Search and select START -->
						<div class="row g-3 align-items-center justify-content-between mb-3">
							<!-- Search -->
							<div class="col-md-8">
								<form class="rounded position-relative">
									<input class="form-control pe-5 bg-transparent" type="search" placeholder="جستجو" aria-label="Search">
									<button class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
								</form>
							</div>

							<!-- Select option -->
							<div class="col-md-3">
								<!-- Short by filter -->
								<form>
									<select class="form-select z-index-9 bg-transparent" aria-label=".form-select-sm">
										<option value="">مرتب سازی</option>
										<option>رایگان</option>
										<option>جدیدترین</option>
										<option>قدیمی ترین</option>
									</select>
								</form>
							</div>
						</div>
						<!-- Search and select END -->

						<!-- Blog list table START -->
						<div class="table-responsive border-0">
							<table class="table align-middle p-4 mb-0 table-hover table-shrink">
								<!-- Table head -->
								<thead class="table-dark">
									<tr>
										<th scope="col" class="border-0 rounded-start">عنوان خبر</th>
										<th scope="col" class="border-0">نام نویسنده</th>
										<th scope="col" class="border-0">تاریخ انتشار</th>
										<th scope="col" class="border-0">دسته بندی</th>
										<th scope="col" class="border-0">وضعیت</th>
										<th scope="col" class="border-0 rounded-end">عملیات</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0">
									<!-- Table item -->
									<tr>
										<!-- Table data -->
										<td>
											<h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">حضور ایرانسل در رویداد فناورانه خودروهای آینده</a></h6>
										</td>
										<!-- Table data -->
										<td>
											<h6 class="mb-0"><a href="#">مریم ترابی</a></h6>
										</td>
										<!-- Table data -->
										<td>22 آذر، 1400</td>
										<!-- Table data -->
										<td>
											<a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>فیلم</a>
										</td>
										<!-- Table data -->
										<td>
											<span class="badge bg-success bg-opacity-10 text-success mb-2">فعال</span>
										</td>
										<!-- Table data -->
										<td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                        <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                      </div>
										</td>
									</tr>

									<!-- Table item -->
									<tr>
										<!-- Table data -->
										<td>
											<h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">رازهای کوچک کثیف در مورد صنعت تجارت</a></h6>
										</td>
										<!-- Table data -->
										<td>
											<h6 class="mb-0"><a href="#">المیرا کرمی</a></h6>
										</td>
										<!-- Table data -->
										<td>19 تیر، 1400</td>
										<!-- Table data -->
										<td>
											<a href="#" class="badge text-bg-info mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>سیاست</a>
										</td>
										<!-- Table data -->
										<td>
											<span class="badge bg-warning bg-opacity-15 text-warning mb-2">پیش نویس</span>
										</td>
										<!-- Table data -->
										<td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                        <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                      </div>
										</td>
									</tr>

									<!-- Table item -->
									<tr>
										<!-- Table data -->
										<td>
											<h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">طرح مجلس برای گرفتن مالیات از سفته بازها</a></h6>
										</td>
										<!-- Table data -->
										<td>
											<h6 class="mb-0"><a href="#">مهدی رضایی</a></h6>
										</td>
										<!-- Table data -->
										<td>11 دی، 1400</td>
										<!-- Table data -->
										<td>
											<a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>ورزش</a>
										</td>
										<!-- Table data -->
										<td>
											<span class="badge bg-success bg-opacity-10 text-success mb-2">فعال</span>
										</td>
										<!-- Table data -->
										<td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                        <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                      </div>
										</td>
									</tr>

									<!-- Table item -->
									<tr>
										<!-- Table data -->
										<td>
											<h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">رونمایی از طرح بزرگترین تلسکوپ نوری آسیا</a></h6>
										</td>
										<!-- Table data -->
										<td>
											<h6 class="mb-0"><a href="#">نیلوفر راد</a></h6>
										</td>
										<!-- Table data -->
										<td>22 آذر، 1400</td>
										<!-- Table data -->
										<td>
											<a href="#" class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>گردشگری</a>
										</td>
										<!-- Table data -->
										<td>
											<span class="badge bg-success bg-opacity-10 text-success mb-2">فعال</span>
										</td>
										<!-- Table data -->
										<td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                        <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                      </div>
										</td>
									</tr>

									<!-- Table item -->
									<tr>
										<!-- Table data -->
										<td>
											<h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">عادات بدی که افراد در صنعت باید آنها را ترک کنند!</a></h6>
										</td>
										<!-- Table data -->
										<td>
											<h6 class="mb-0"><a href="#">سهراب احمدی</a></h6>
										</td>
										<!-- Table data -->
										<td>6 آبان، 1400</td>
										<!-- Table data -->
										<td>
											<a href="#" class="badge text-bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>بین الملل</a>
										</td>
										<!-- Table data -->
										<td>
											<span class="badge bg-danger bg-opacity-10 text-danger mb-2">غیرفعال</span>
										</td>
										<!-- Table data -->
										<td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                        <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                      </div>
										</td>
									</tr>

									<!-- Table item -->
									<tr>
										<!-- Table data -->
										<td>
											<h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">سال 2022 رویایی و فوق العاده برای طارمی</a></h6>
										</td>
										<!-- Table data -->
										<td>
											<h6 class="mb-0"><a href="#">علی صادقی</a></h6>
										</td>
										<!-- Table data -->
										<td>14 بهمن، 1400</td>
										<!-- Table data -->
										<td>
											<a href="#" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>اقتصاد</a>
										</td>
										<!-- Table data -->
										<td>
											<span class="badge bg-success bg-opacity-10 text-success mb-2">فعال</span>
										</td>
										<!-- Table data -->
										<td>
                      <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                        <a href="dashboard-post-edit.html" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                      </div>
										</td>
									</tr>

								</tbody>
								<!-- Table body END -->
							</table>
						</div>
						<!-- Blog list table END -->

						<!-- Pagination START -->
						<div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
							<!-- Content -->
							<p class="mb-sm-0 text-center text-sm-start">نمایش 1 تا 8 از 20</p>
							<!-- Pagination -->
							<nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
								<ul class="pagination pagination-sm pagination-bordered mb-0">
									<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبل</a>
									</li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item active"><a class="page-link" href="#">2</a></li>
									<li class="page-item disabled"><a class="page-link" href="#">..</a></li>
									<li class="page-item"><a class="page-link" href="#">15</a></li>
									<li class="page-item">
										<a class="page-link" href="#">بعد</a>
									</li>
								</ul>
							</nav>
						</div>
						<!-- Pagination END -->
					</div>
				</div>
				<!-- Blog list table END -->
			</div>
		</div>
	</div>
</section>
<!-- =======================
Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer class="mb-3">
  <div class="container">
    <div class="card card-body bg-light">
      <div class="row align-items-center justify-content-between">
        <div class="col-lg-6">
          <!-- Copyright -->
          <div class="text-center text-lg-start">©2022 ارائه شده در سایت <a href="https://www.rtl-theme.com/" class="text-reset btn-link" target="_blank">راست چین</a>
          </div>
        </div>
        <div class="col-lg-6 d-sm-flex align-items-center justify-content-center justify-content-lg-end">
          <!-- Language switcher -->
          <div class="dropup me-0 me-sm-3 mt-3 mt-md-0 text-center text-sm-end">
            <a class="dropdown-toggle text-body" href="#" role="button" id="languageSwitcher" data-bs-toggle="dropdown" aria-expanded="false">
              زبان
            </a>
            <ul class="dropdown-menu min-w-auto" aria-labelledby="languageSwitcher">
              <li><a class="dropdown-item" href="#">فارسی</a></li>
              <li><a class="dropdown-item" href="#">انگلیسی </a></li>
              <li><a class="dropdown-item" href="#">فرانسوی</a></li>
            </ul>
          </div>
          <!-- Links -->
          <ul class="nav text-center text-sm-end justify-content-center justify-content-center mt-3 mt-md-0">
            <li class="nav-item"><a class="nav-link" href="#">شرایط</a></li>
            <li class="nav-item"><a class="nav-link" href="#">قوانین</a></li>
            <li class="nav-item"><a class="nav-link pe-0" href="#">کوکی</a></li>
          </ul>
        </div>
      </div>
    </div>
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

<!-- Vendors -->
<script src="assets/vendor/apexcharts/js/apexcharts.min.js"></script>
<script src="assets/vendor/overlay-scrollbar/js/OverlayScrollbars.min.js"></script>

<!-- Template Functions -->
<script src="assets/js/functions.js"></script>

</body>

</html>