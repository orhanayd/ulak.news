<?php
	include("config.php");
	$ulak_api_class = new UlakNews();
	$ulak_class = new UlakClass();

	$agencies = $ulak_api_class->get_agencies();
	$most_read = $ulak_api_class->get_most_readed("today", 4);
	$all_cats = $ulak_api_class->get_cats();

	$cat_status = false;
	$cat_data=[];

?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ulak.news">
	<meta name="robots" content="index, follow">

	<title>İletişim | Ulak.news</title>
	<meta property="og:title" content="İletişim | Ulak.news" />
	<meta name="keywords" content="İletişim, kategoriler, ulak news kategorileri" />
	<meta property="og:description" content="İletişim | Ulak.news" />
	<meta name="description" content="İletişim | Ulak.news" />
	<link rel="canonical" href="https://ulak.news/iletisim.html" />
	<meta property="og:locale" content="tr_TR" />
	<link rel="alternate" type="application/rss+xml" title="ulak news rss beslemesi" href="https://ulak.news/atom_news.php?cat=sondakika" />
	
	<!-- Ideabox main theme css file. you have to add all pages -->
	<link rel="stylesheet" type="text/css" href="css/main-style.min.css?v=<?php echo date('Ymd'); ?>">

	<link rel="manifest" href="manifest.json">
	<?php include("./view/head-under.php"); ?>
</head>

<body>
	<?php include("./view/body-under.php"); ?>
	
	<!-- header start -->
	<header class="header">
		<?php include("./view/header.php"); ?>
	</header>
	<!-- header end -->


	<!-- Left sidebar menu start -->
	<div class="sidebar">
		<?php include("./view/sidebar.php"); ?>
	</div>
	<!-- Left sidebar menu end -->

	<!--Main container start -->
	<main class="main-container">
			<section class="main-highlight">
            </section>
            <section class="main-content">
                <div class="main-content-wrapper">
                    <div class="content-body">
                        <div class="content-timeline">
						<div class="article-content">
							<h1 class="extra-title">İletişim</h1>
							<div class="article-inner">
								<p>Ulak News ile 7/24 iletişim kurabilirsiniz: 
								<script type="text/javascript">
                                    document.write('info@' + 'ulak.news');
                                </script> <br/><br/>
								Bir haberin doğrulundan şüphe ediyorsanız yada kaynağındaki güncellemeden dolayı sitemizdeki bir haberin güncellenmesini istiyorsanız lütfen bizimle e-posta yoluyla iletişime geçin.<br/>
								<p>Sitemizdeki bir içerikle ilgili <i><strong>hukuki</strong></i> bir durum söz konusu olduğunda da elektronik posta yoluyla bize bilgi iletmeniz halinde talebinize ivediklikle yanıt verilecektir ve işleminiz öncelikli olarak yapılacaktır.</p>	
							</div>

							<!--this is important for the left ad box or share box fixer -->
							<div id="endOfTheArticle"></div>

						</div>
                        </div>
    
                    </div>
                    <div class="content-sidebar">
                        <div class="sidebar_inner">
						<ul>
							<li>
								<a href="./hakkimizda.html"><span class="menu-label">Hakkımızda</span></a>
							</li>
							<li>
								<a href="./iletisim.html"><span class="menu-label">İletişim</span></a>
							</li>
							<li>
								<a href="./reddi_beyan.html"><span class="menu-label">Reddi Beyan</span></a>
							</li>
							<li>
								<a href="./topluluk_sozlesmesi.html"><span class="menu-label">Topluluk Sözleşmesi</span></a>
							</li>
							<li>
								<a href="./kullanim_sozlesmesi.html"><span class="menu-label">Kullanım Sözleşmesi</span></a>
							</li>
						</ul>
                            <div class="seperator"></div>
                            <!-- 
                            <a href="#" class="widget-ad-box">
                                <img src="img/adbox300x250.png" width="300" height="250">
                            </a> -->
                        </div>
                    </div>
                </div>
            </section>
	</main>

	<script src="js/jquery-3.5.1.min.js"></script>

	<!-- Tooltip plugin (zebra) js file -->
	<script src="plugins/zebra-tooltip/zebra_tooltips.min.js"></script>

	<!-- Owl Carousel plugin js file -->
	<script src="plugins/owl-carousel/owl.carousel.min.js"></script>

	<!-- Ideabox theme js file. you have to add all pages. -->
	<script src="js/main-script.js?v=<?php echo date('Ymd'); ?>"></script>
	<script type="text/javascript">

		//Owl carousel initializing
		$('#postCarousel').owlCarousel({
		    loop:true,
		    dots:true,
		    nav:true,
		    navText: ['<span><i class="material-icons">&#xE314;</i></span>','<span><i class="material-icons">&#xE315;</i></span>'],
		    items:1,
		    margin:20
		});

		//widget carousel initialize
		$('#widgetCarousel').owlCarousel({
		    dots:true,
		    nav:false,
		    items:1
		});



	</script>

</body>

</html>
