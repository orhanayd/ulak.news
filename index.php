<?php
	include("config.php");
	$ulak_api_class = new UlakNews();
	$ulak_class = new UlakClass();

	$all_news = $ulak_api_class->get_news("all");
	$agencies = $ulak_api_class->get_agencies();
	$all_cats = $ulak_api_class->get_cats();
	$most_read = $ulak_api_class->get_most_readed("today", 4);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ulak.news">
	<title>Ulak News | Haberler, Son Dakika Haberleri ve Güncel Haber</title>
	<meta property="og:title" content="Ulak News | Haberler, Son Dakika Haberleri ve Güncel Haber" />

	<meta name="keywords" content="ulak.news, ulak haber, ulak news, ulak, haber, haberler, son dakika, son dakika haber, haber oku, gazete haberleri,gazeteler" />
	<meta property="og:description" content="Ulak news, Haberler, son dakika haberleri, yerel ve dünyadan en güncel gelişmeler, magazin, ekonomi, spor, gündem ve tüm haberleri ulak news'de!" />
	<meta name="description" content="Ulak news, Haberler, son dakika haberleri, yerel ve dünyadan en güncel gelişmeler, magazin, ekonomi, spor, gündem ve tüm haberleri ulak news'de!" />
	<meta property="og:title" content="Ulak News | Haberler, Son Dakika Haberleri ve Güncel Haber" />
	<meta property="og:description" content="Ulak news, Haberler, son dakika haberleri, yerel ve dünyadan en güncel gelişmeler, magazin, ekonomi, spor, gündem ve tüm haberleri ulak news'de!" />
	<meta property="og:image" content="https://ulak.news/img/logo/logo_l.png" />
	<meta property="og:url" content="https://ulak.news" />
	<meta property="og:locale" content="tr_TR" />
	<meta itemprop="isFamilyFriendly" content="true"/>
	<meta name="robots" content="index, follow">
	<meta name="revisit-after" content="1 Days"/>
	<link rel="canonical" href="https://ulak.news" />
	<link rel="alternate" type="application/rss+xml" title="ulak news rss beslemesi" href="https://ulak.news/atom_news.php?cat=sondakika" />

	<!-- icons -->
	<link rel="apple-touch-icon" sizes="57x57" href="img/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">
	
	<link rel="dns-prefetch" href="https://cdn.ulak.news/" />
	<link rel="preconnect" href="https://cdn.ulak.news/" />
	
	<link rel="preload" as="style" type="text/css" href="css/main-style.min.css?v=<?php echo date('Ymd'); ?>">
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
			<div class="highlight-carousel slider-carousel">
				<?php include("./view/slider.php"); ?>
			</div>
		</section>
		<section class="main-content">
			<div class="main-content-wrapper">
				<div class="content-body">
					<div class="content-timeline">
						<!--Timeline header area start -->
						<div class="post-list-header">
							<h1 style="display:none;">Son dakika haberler</h1>
							<h2 style="display:none;">En son haberler</h2>
							<span class="post-list-title">Ulak ile getirilen</span>
							<select id="agency_filter" class="frm-input">
								<option value="all">Tümü</option>
								<?php
									foreach($agencies as $agency){
								?>
									<option value="<?php echo $agency['id']; ?>"><?php echo $agency['title']; ?></option>
								<?php
									}
									unset($agency);
								?>
							</select>
						</div>
						<!--Timeline header area end -->


						<!--Timeline items start -->
						<div class="timeline-items">
							<span class="timeline-items-desc"></span>
							<?php include("./view/timeline.php"); ?>
						</div>
						<!--Timeline items end -->

						<!--Data load more button start  -->
						<!-- <div class="load-more">
							<button class="load-more-button material-button" type="button">
								<i class="material-icons">&#xE5D5;</i>
								<span>Load More</span>
							</button>
						</div> -->
						<!--Data load more button start  -->
					</div>

				</div>
				<div class="content-sidebar">
					<div class="sidebar_inner">
						<?php include("./view/most-read.php"); ?>
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

	<?php include("./view/footer.php"); ?>

	<script src="js/jquery-3.5.1.min.js"></script>

	<!-- Tooltip plugin (zebra) js file -->
	<script src="plugins/zebra-tooltip/zebra_tooltips.min.js"></script>

	<!-- Owl Carousel plugin js file -->
	<script src="plugins/owl-carousel/owl.carousel.min.js"></script>

	<!-- Ideabox theme js file. you have to add all pages. -->
	<script src="js/main-script.js?v=<?php echo date('Ymd'); ?>"></script>
	<script type="text/javascript">

			var $btns = $('#agency_filter').change(function() {
				$('.timeline-items-desc').text("");

				$('.timeline-items > div').hide();

				var agency = $('#agency_filter').val();
				if (agency === 'all') {
					$('.timeline-items > div').fadeIn(450);
				} else {
					var sum = 0;
					$('.'+agency).each(function(){
						sum++;
					});
					if(sum===0){
						$('.timeline-items-desc').html("Ulak bu ajanstan bir haber getiremedi. Başka bir ajans denemeye ne dersin?");
					}
					var $el = $('.' + agency).fadeIn(450);
					$('.timeline-items > div').not($el).hide();
				}
				$btns.removeClass('active');
				$(this).addClass('active');
				$('.timeline-items').fadeIn(450);
			}); 

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