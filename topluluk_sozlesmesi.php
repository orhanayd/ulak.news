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

	<title>Topluluk Sözleşmesi | Ulak.news</title>
	<meta property="og:title" content="Topluluk Sözleşmesi | Ulak.news" />
	<meta name="keywords" content="Topluluk Sözleşmesi, kategoriler, ulak news kategorileri" />
	<meta property="og:description" content="Topluluk Sözleşmesi | Ulak.news" />
	<meta name="description" content="Topluluk Sözleşmesi | Ulak.news" />
	<link rel="alternate" type="application/rss+xml" title="ulak news rss beslemesi" href="https://ulak.news/atom_news.php?cat=sondakika" />
	<link rel="canonical" href="https://ulak.news/topluluk_sozlesmesi.html" />

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
							<h1 class="extra-title">Topluluk Sözleşmesi</h1>
							<div class="article-inner">
								<p>
								<strong>Siz Kullanıcılarımıza isteklerine cevap vermek için 7/24 bizimle iletişim kurabilirsiniz.</strong><br>
                           ulak.news’teki kullanıcı hesapları veya sosyal ağ hesaplarıyla kullanıcıların tescil edilmesi ve yetkilendirilmesi aşağıdaki kuralların kullanıcılar tarafından bilindiğini ve kabul edildiğini gösterir: <br> 
													 Kullanıcılar ulusal ve uluslararası kurallara riayet etmek, görüşmelerdeki diğer katılımcı ve gönderilerde adı geçen kişilere karşı saygılı davranmak zorundadır. Site yönetimi, sitenin genel kullanımı dışındaki herhangi bir dilde yapılan her türlü yorumu silme hakkına sahiptir. <br>
													 <br> ulak.news’un bütün dillerdeki yayınlarına gönderilen her türlü yorum üzerinde oynama yapılabilir. <br>
													 <br> Kullanıcı yorumları aşağıdaki durumlar halinde silinecektir; <br>
													 <br> Mevcut gönderiyle alakalı değilse. <br>
													 <br> Herhangi bir ırkçı, etnik, cinsiyetçi, dini veya içtimai esasa dayalı nefret söylemi ve ayrımcılık içeriyor ise veya azınlık hakları ihlal ediliyorsa. <br>
													 <br> Ruhsal veya başka bir yönden zarar vererek, çocuk hakları ihlal ediliyorsa, <br><br> 
													 Herhangi bir aşırı düşünce içeriyor veya yasa dışı eylemlere teşvik ediyorsa. <br>
													 <br> Başka kullanıcılara, kişilere veya özel kuruluşa yönelik tehdit, itibara zarar verme veya ticari şöhret zedelemeye yönelik bir söylem içeriyorsa. <br>
													 <br> ulak.news’e yönelik saygısızca bir söylem veya aşağılama içeriyorsa. <br><br> 
													 Özel hayatın gizliliği ihlal ediliyor, üçüncü kişilerin onayı olmaksızın kişisel bilgiler yayınlanıyor veya haberleşme gizliliği ihlal ediliyorsa. <br><br
													 > Hayvanlara yönelik şiddet, işkenceden bahsediliyor veya bu tarz görüntüleri barındırıyorsa. <br>
													 <br> İntihar yöntemlerine ilişkin söylemler veya buna yönelik bir teşvik içeriyorsa. <br><br> 
													 Ticari amaç güdüyor, yasadışı siyasi kuruluş reklamı veya uygunsuz bir reklam içeriyor, ya da bu çeşit bilgi barındıran başka bir çevrimiçi kaynağa bağlantı gösteriliyorsa. <br><br>
													  Yetkilendirilmeksizin üçüncü kişilerin hizmetleri veya ürünlerin tanıtımı yapılıyorsa. <br><br>
														Küfür, saldırı veya türevlerini içeren veya bu tanımlamaya uyan herhangi bir sözcüğe yönelik ipuçları içeriyorsa. <br><br> 
														Spam içeriyor, spam barındıran toplu mail hizmetlerinin ve çabuk zengin olma planı bulunduran içeriklerin reklamı yapılıyorsa. <br><br>
														Uyuşturucu madde kullanımına teşvik ediliyor, bu maddelerin kullanımı ve üretimine yönelik bilgi içeriyorsa. <br><br>
														Virüs veya kötü amaçlı yazılım içeriyorsa. <br><br>
														Aynı temalı birçok yorumun gönderildiği örgütlü bir hareket planının parçasıysa (flash mob). <br><br> 
														Birçok tutarsız ve ilgisiz iletiyle tartışma sekmesi altında yığılma yaratıyorsa (flood yapma). <br><br> 
														Görgü kurallarına aykırı, her türlü saldırgan, küçük düşürücü ve kötüye kullanım bulunduran bir söylem barındırıyorsa (trolleme). <br><br> 
														Dilin standart kurallarına uygunsuz bir şekilde yazılmışsa (Çoğunlukla veya tamamen büyük harfle ya da cümle cümle ayırmamak gibi). <br><br> 
														Kullanıcı bu kurallardan herhangi birini ihlal eder veya sözü geçenlere yönelik ihlal belirtisi gösteren davranışta bulunursa, site yönetimi kullanıcının sayfaya erişimini engelleyebilir veya hiçbir bilgilendirme yapmaksızın kullanıcının hesabını silebilir. <br>
								</p>	
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