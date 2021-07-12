<?php
	include("config.php");
	$ulak_api_class = new UlakNews();
	$ulak_class = new UlakClass();

	$agencies = $ulak_api_class->get_agencies();
	$all_cats = $ulak_api_class->get_cats();
	$most_read = $ulak_api_class->get_most_readed("today", 4);

	$agency_status = false;
	$agency_data = [];

	if(isset($_GET['agency'])){
		$all_news = $ulak_api_class->get_news($_GET['agency']);
		foreach($agencies as $agency){
			if($agency['id'] === $_GET['agency']){
				$agency_data = $agency;
				$agency_status = true;
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ulak.news">
	<meta name="robots" content="index, follow">

	<?php
		if($agency_status){
	?>

	<title><?php echo $agency_data['title']; ?> yayınladığı haberler | Ulak.news</title>
	<meta property="og:title" content="<?php echo $agency_data['title']; ?> yayınladığı haberler, ilgili haberler, Haberleri" />
	<meta name="keywords" content="<?php echo $agency_data['title']; ?> yayınladığı haberler, ilgili haberler, son dakika haberler" />
	<meta property="og:description" content="<?php echo $agency_data['title']; ?> yayınladığı haberler, son dakika haberler" />
	<meta name="description" content="<?php echo $agency_data['title']; ?> yayınladığı haberler, ilgili haberler, son dakika haberler" />
	<link rel="canonical" href="https://ulak.news/<?php echo $agency_data['seo_link']; ?>" />
	<meta property="og:url" content="https://ulak.news/<?php echo $agency_data['seo_link']; ?>" />
	<meta property="og:image" content="<?php echo $agency_data['image']; ?>" />
	<meta name="twitter:image" content="<?php echo $agency_data['image']; ?>" />
	<?php
		}else{
	?>

	<title>Tüm ajanslar, türkiye haber ajansları | Ulak.news</title>
	<meta property="og:title" content="Tüm ajanslar, türkiye haber ajansları | Ulak.news" />
	<meta name="keywords" content="<?php foreach($agencies as $agency){ echo $agency['title']." haberleri, "; } ?>, tüm ajanslar, ajanslar, türkiye haber ajansları, haber ajanslar, ulak news ajanslar" />
	<meta property="og:description" content="<?php foreach($agencies as $agency){ echo $agency['title']." haberleri, "; } ?>Tüm ajanslar, türkiyeden haber ajanslarının son dakika haberleri | Ulak.news" />
	<meta name="description" content="<?php foreach($agencies as $agency){ echo $agency['title']." haberleri, "; } ?>Tüm ajanslar, türkiyeden haber ajanslarının son dakika haberleri | Ulak.news" />
	<link rel="canonical" href="https://ulak.news/kaynak.html" />
	<meta property="og:url" content="https://ulak.news/kaynak.html" />
	<meta property="og:image" content="https://ulak.news/img/logo/logo_text.png" />
	<meta name="twitter:image" content="https://ulak.news/img/logo/logo_text.png" />
	<?php
		}
	?>
	<meta itemprop="isFamilyFriendly" content="true"/>
	<meta property="og:locale" content="tr_TR" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@ulaknews" />
	<meta name="twitter:creator" content="@ulaknews" />
	<meta property="og:image:width" content="670" />
	<meta property="og:image:height" content="371" />

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
		<?php
			if($agency_status){
				include("./view/agency.php");
			}else{
				include("./view/agencies.php");
			}
		?>
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