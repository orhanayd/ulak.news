<?php
	include("config.php");
	$ulak_api_class = new UlakNews();
	$ulak_class = new UlakClass();

	$agencies = $ulak_api_class->get_agencies();
	$most_read = $ulak_api_class->get_most_readed("today", 4);

	$cat_status = false;
	$cat_data=[];

	if(isset($_GET['kategori'])){
		$_GET['kategori'] = strip_tags($_GET['kategori']);
		$all_cats = $ulak_api_class->get_cats();
		$all_news = $ulak_api_class->get_cat_news($_GET['kategori']);
		if(count($all_news)>0){
			$cat_data['title']=base64_decode($_GET['kategori']);
			$cat_status = true;
		}
	}else{
		$all_cats = $ulak_api_class->get_cats(10000);
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
		if($cat_status){
	?>

	<title><?php echo $cat_data['title']; ?> ile ilgili haberler | Ulak.news</title>
	<meta property="og:title" content="<?php echo $cat_data['title']; ?> ile ilgili haberler, Haberleri" />
	<meta name="keywords" content="<?php echo $cat_data['title']; ?> ile ilgili haberler, son dakika haberler" />
	<meta property="og:description" content="<?php echo $cat_data['title']; ?>, ile ilgili haberler, son dakika haberler" />
	<meta name="description" content="<?php echo $cat_data['title']; ?> ile ilgili haberler, son dakika haberler" />
	<link rel="canonical" href="https://ulak.news/kategori.html?kategori=<?php echo base64_encode($cat_data['title']); ?>" />
	<meta property="og:url" content="https://ulak.news/kategori.html?kategori=<?php echo base64_encode($cat_data['title']); ?>" />
	<meta name="twitter:title" content="<?php echo $cat_data['title']; ?> ile ilgili haberler, Haberleri"" />

	<?php
		}else{
	?>
	<title>Tüm kategoriler | Ulak.news</title>
	<meta property="og:title" content="Tüm kategoriler | Ulak.news" />
	<meta name="keywords" content="tüm kategoriler, kategoriler, ulak news kategorileri" />
	<meta property="og:description" content="Tüm kategoriler | Ulak.news" />
	<meta name="description" content="Tüm kategoriler | Ulak.news" />
	<link rel="canonical" href="https://ulak.news/kategori.html" />
	<meta property="og:url" content="https://ulak.news/kategori.html" />
	<meta name="twitter:title" content="Tüm kategoriler | Ulak.news" />

	<?php
		}
	?>
	<meta property="og:locale" content="tr_TR" />
	<meta property="og:image" content="https://ulak.news/img/logo/logo_l.png" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@ulaknews" />
	<meta name="twitter:creator" content="@ulaknews" />
	<meta name="twitter:image" content="https://ulak.news/img/logo/logo_l.png" />
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
			if($cat_status){
				include("./view/cat.php");
			}else{
				include("./view/cats.php");
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