<?php
	include("config.php");
	$ulak_api_class = new UlakNews();
	$ulak_class = new UlakClass();

	$all_cats = $ulak_api_class->get_cats();
	$agencies = $ulak_api_class->get_agencies();
	$most_read = $ulak_api_class->get_most_readed("today", 4);

	$search_status = false;
	$cat_data = [];
	$desc = "";
	$q = "";
	$sort = 1;
	$regex = 0;

	if(isset($_GET['q'])){
		$q = strip_tags(htmlentities($_GET['q']));
		$sortable = [1, 2, 3];
		if(isset($_GET['sort'])){
			if(in_array($_GET['sort'], $sortable)){
				$sort = $_GET['sort'];
			}
		}
		if(isset($_GET['regex'])){
			$regex = 1;
		}
		if(isset($_COOKIE['search'])){
			$desc = "<strong>Aramanız sıraya alınmış, Lütfen bir kaç saniye sonra tekrar deneyin...</strong>";
		}else{
			$all_news = $ulak_api_class->search_news(strip_tags($q), $regex, $sort);
			if($all_news !== false){
				if($all_news === null){
					setcookie("search", "yes", time() + 2*60, "/");
					$desc = "<strong>Aramanız sıraya alındı, Lütfen bir kaç saniye sonra tekrar deneyin...</strong>";
				}else{
					$search_status = true;
					$desc = "<strong>".$q."</strong> ilgili arama sonuçları";
					if(count($all_news)<1){
						$search_status = false;
						$desc = "Sonuç bulunamadı. Gelişmiş arama olan Regex'i denediniz mi?";
					}
				}
			}else{
				$desc = "Arama yapılamadı.";
			}
		}
	}else{
		$all_cats = $ulak_api_class->get_cats();
		$desc = "Ulak ile istediğinizi arayın.";
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
		if($search_status){
	?>

	<title><?php echo $q; ?> ile ilgili haberler | Ulak.news</title>
	<meta property="og:title" content="<?php echo $q; ?> ile ilgili haberler, Haberleri" />
	<meta name="keywords" content="<?php echo $q; ?> ile ilgili haberler, son dakika haberler" />
	<meta property="og:description" content="<?php echo $q; ?>, ile ilgili haberler, son dakika haberler" />
	<meta name="description" content="<?php echo $q; ?> ile ilgili haberler, son dakika haberler" />
	<meta name="robots" content="index, follow">

	<?php
		}else{
	?>
	<title>Ulak News ile Gelişmiş Haber Arama | Ulak.news</title>
	<meta property="og:title" content="Ulak News Gelişmiş Haber Arama | Ulak.news" />
	<meta name="keywords" content="haber ara, detaylı haber ara, haber arama, türkiye haber ara, tüm haberlerde arama" />
	<meta property="og:description" content="Ulak News Gelişmiş Haber Arama | Ulak.news" />
	<meta name="description" content="Ulak News Gelişmiş Haber Arama | Ulak.news" />
	<meta name="robots" content="noindex, nofollow">

	<?php
		}
	?>
	<link rel="canonical" href="https://ulak.news/arama.html" />
	<link rel="alternate" type="application/rss+xml" title="ulak news rss beslemesi" href="https://ulak.news/atom_news.php?cat=sondakika" />

	<!-- Ideabox main theme css file. you have to add all pages -->
	<link rel="stylesheet" type="text/css" href="css/main-style.min.css?v=<?php echo date('Ymd'); ?>">
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />
	<!-- Ideabox responsive css file -->

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
                            <div class="post-list-header">
                                <span class="post-list-title">Gelişmiş Arama</span><br/>
									<!-- Arama tarih aralığı:
									<div style="border: 1px solid #727cf5; width: 230px;" class="date datepicker dashboard-date" id="dashboardDates" >
										<span class="input-group-addon bg-transparent"></span>
										<i class="material-icons">event</i>
									</div> -->
									<div class="search">
										<form action="arama.php" class="search-form" onsubmit="return validate('q', 3)">
											<input type="text" autocomplete="off" min="1" value="<?php echo $q; ?>" require name="q" id="q" placeholder="Aramak istediğiniz Haber içeriği hakkında bir şeyler girebilirsiniz...">
											<input type="submit" value="Ara">
									</div>
											<input type="checkbox" name="regex" value="1" id="regex" <?php if($regex===1){ echo "checked"; } ?>><label for="regex"> Regex</label>
											<select onchange="this.form.submit()" id="sort" name="sort" class="frm-input">
												<option <?php echo ($sort==1 ? 'selected' : ''); ?> value="1">En iyi eşleşen</option>
												<option <?php echo ($sort==2 ? 'selected' : ''); ?> value="2">En Yeni</option>
												<option <?php echo ($sort==3 ? 'selected' : ''); ?> value="3">En Eski</option>
											</select>

										</form>
                            </div>
							<div class="timeline-items">
                                <span class="timeline-items-desc"><?php echo $desc; ?></span><br/>
							<?php
								if(isset($search_status)){
									include("./view/timeline_other.php");
								}
							?>
                            </div>
                        </div>
    
                    </div>
                    <div class="content-sidebar">
                        <div class="sidebar_inner">
                            <?php include("./view/most-read.php"); ?>
                            <div class="seperator"></div>
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
	<script type="text/javascript" src="js/moment.min.js"></script>
	<script type="text/javascript" src="js/moment-timezone.min.js"></script>
	<script type="text/javascript" src="js/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />

	<script>
		var start = moment().locale("tr").startOf('day');
		var end = moment().locale("tr").endOf('day');

		$(function() {

			async function cb(start, end) {
				let formated_start = start.format('YYYY.MM.DD');
				let formated_end = end.format('YYYY.MM.DD');
				let startX = parseInt(start.locale("tr").format('X'));
				let endX = parseInt(end.locale("tr").format('X'));

				await $('#dashboardDates span').html(formated_start + ' - ' + formated_end);

			}

			$('#dashboardDates').daterangepicker({
				startDate: start,
				endDate: end,
				maxDate: start,
				autoApply: true,
				ranges: {
					'Bugün': [moment().locale("tr").startOf('day'), moment().locale("tr").locale("tr").endOf('day')],
					'Dün': [moment().locale("tr").subtract(1, 'days'), moment().locale("tr").subtract(1, 'days')],
					'Son 7 gün': [moment().locale("tr").subtract(6, 'days'), moment().locale("tr")],
					'Son 30 gün': [moment().locale("tr").subtract(29, 'days'), moment().locale("tr")],
					'Bu ay': [moment().locale("tr").startOf('month'), moment().locale("tr").endOf('month')],
					'Geçen ay': [moment().locale("tr").subtract(1, 'month').startOf('month'), moment().locale("tr").subtract(1, 'month').endOf('month')]
				},
				"locale": {
					"format": "YYYY.MM.DD",
					"separator": " - ",
					"applyLabel": "Uygula",
					"cancelLabel": "Çıkış",
					"fromLabel": "Başlangıç",
					"toLabel": "Bitiş",
					"customRangeLabel": "Özeltarih",
					"weekLabel": "H",
					"daysOfWeek": [
						"Paz",
						"Pzt",
						"Sal",
						"Çar",
						"Per",
						"Cum",
						"Cmt"
				],
				"monthNames": [
					"Ocak",
					"Şubat",
					"Mart",
					"Nisan",
					"Mayıs",
					"Haziran",
					"Temmuz",
					"Ağustos",
					"Eylül",
					"Ekim",
					"Kasım",
					"Aralık"
				],
				"firstDay": 1
			},
			}, cb);

			cb(start, end);

		});

	</script>

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