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

	<title>Kullanım Sözleşmesi | Ulak.news</title>
	<meta property="og:title" content="Kullanım Sözleşmesi | Ulak.news" />
	<meta name="keywords" content="Kullanım Sözleşmesi, kategoriler, ulak news kategorileri" />
	<meta property="og:description" content="Kullanım Sözleşmesi | Ulak.news" />
	<meta name="description" content="Kullanım Sözleşmesi | Ulak.news" />
	<link rel="canonical" href="https://ulak.news/kullanim_sozlesmesi.html" />
	<meta property="og:locale" content="tr_TR" />

	<!-- icons -->
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
							<h1 class="extra-title">Kullanım Sözleşmesi</h1>
							<div class="article-inner">
								<p>
								<strong>Siz Kullanıcılarımıza isteklerine cevap vermek için 7/24 bizimle iletişim kurabilirsiniz.</strong>
                            <br>1- Siteye erişiminizden veya siteyi kullanımınızdan önce lütfen bu sözleşmeyi dikkatle okuyunuz. İşbu sitenin sahibi, Kişisel olarak Orhan AYDOĞDU’ya aittir. İşbu web sitesine; https://www.ulak.news web adresinden ulaşılmaktadır. Siteye erişmekle veya siteyi kullanmakla, aşağıda belirtilen şartlara uymayı kabul etmektesiniz. 
                            <br>
                            ulak.news bu sözleşmede her zaman değişiklik yapabilir ve bu değişiklikler değiştirilmiş sözleşmenin siteye konulmasıyla derhal geçerlilik kazanır. Siz bu değişikliklerden haberdar olmak amacıyla periyodik olarak sözleşmeyi gözden geçirmeyi kabul ederek, siteye devam eden erişiminiz veya devam eden siteyi kullanımınız değiştirilmiş sözleşmeyi kesin olarak kabul ettiğiniz anlamına gelecektir.
                            <br>
                            2- İşbu site ve içeriği olduğu gibi kullanımınıza sunulmaktadır. Bu siteye giriş yapmak ve kullanmakla sitenin içeriği ile ilgili kullanımdan doğacak riskleri üstlenmiş olursunuz. 
                            <br>
                            ulak.news yönetimi site içeriği yada üçüncü şahısların sitelerindeki içeriklerin kullanımı ve kullanım sonuçları hakkında site forum alanları dahil olmak üzere doğruluk, güvenilirlik, kesinlik konularında ya da başka açılardan hiçbir garanti vermez. Aynı şekilde, web sitesinin işletme ve idaresinin hatasız ve kesintisiz olacağı, aksaklıklar kusur ve bozuklulukların düzeltileceği, web sitesinin zarar verici unsurlardan ve virüslerden temizlenmiş olduğu hususunda kullanıcıya herhangi bir öneri ve tavsiyede bulunmamakta ve bu hususlarda kullanıcıya herhangi bir güvence ve teminat verilmemektedir. 
                            <br>
                            İş bu sitede üçüncü şahıslar tarafından idare edilen internet sitelerine bağlantılar ve yönlendiriciler sağlanmakta,üçüncü kişilere ait sitelerdeki içerik kullanılmaktadır. Üçüncü kişilere ait sitelerdeki bilgiler, ürünler ve hizmetler hiçbir şekilde işletilmemekte ve denetlememektedir. Bu sitede ve üçüncü şahıs sitelerindeki içerik olduğu gibi sağlanmaktadır ve yukarıdaki paragrafta belirttiğimiz hususlar dahil hiçbir konuda açık ya da dolaylı hiç bir garanti verilmemektedir. Ayrıca, bu durum üçüncü kişilerin web sitelerinin içeriğinin doğruluğu ve güvenirliğinin onaylandığı anlamına gelmemektedir. Bu nedenle üçüncü kişilerin web sitelerinde yer alan bilgi veya fikir konusunda sorumluluk kabul edilmemektedir. Yine üçüncü kişilerin siteye verdikleri linklerin web içeriklerinin doğruluğu ve güvenilirliğinin tarafımızdan onaylandığı anlamı da asla çıkarılmamalıdır.
                            <br>
                            İşbu web sitesindeki bilgiler sadece kullanıcıyı bilgilendirmek amacı ile sunulmuş olup; hukuki, tıbbi, finansal, yatırım, vergi, muhasebe ve diğer benzeri konularda tavsiye niteliğinde değildir. İşbu web sitesinde yayınlanan bilgilere güvenerek yapacağınız herhangi bir işlemin sorumluluğu tamamen size aittir.
                            <br>
                            3- İş bu web sitesi kullanıcılar arasında gerçek zamanda etkileşim olmasını imkanlı kılan forum alanları içerebilir. Forum alanları için kullanıcılar kendisinden istendiği takdirde, kimlik bilgileri, telefon bilgileri, tebligat adresi, yazışma adresi, eposta, telefon, IP numarası gibi her türlü bilgiyi gerçeğe uygun bir şekilde vermek yükümlülüğündedir.<br>
                            ulak.news forum alanlarına gönderilen mesajları, bilgileri ya da dosyaları denetlemek zorunluluğu yoktur. Ancak, tek taraflı olarak her tür bilgiyi ve malzemeyi, değiştirme, yayınlamayı reddetme ya da yayından kaldırma hakkını ve herhangi bir adli ya da idari isteğe yanıt vermek için her türlü bilgiyi açıklama hakkını her zaman saklı tutar. İşbu web sitesinde yayınlanan her türlü kullanıcı mesajları, yayınlar ve benzeri eklemeler ilgili kişinin kendi görüşlerini yansıtmakta olup sadece kullanıcıyı bağlar. ulak.news  bu görüş ve fikirlerden ve ilgili mesaj, ekleme ve yüklemeler ile her tür diğer içerikten sorumlu değildir. Forum alanlarında yayınlanmış görüşler ulak.news'in kabul ya da reddettiği anlamına gelmez.
                            <br>
                            Forum alanlarını ve iş bu web sitesini kullanırken aşağıdaki şartlara uymayı kabul edersiniz: 
                            <br>
                            - içeriği hukuka aykırı yıldırıcı, tehdit edici, hakaret niteliğinde olan, genel ahlaka aykırı, yakışıksız, edebe aykırı, pornografik, aşağılayıcı, karalayıcı, küfürlü, lekeleyici ve benzeri her türlü bilgi ve görüş, 
                            <br>
                            - suç teşkil edecek veya suça teşvik edici nitelikte veya ulusal ve uluslararası kanunlara aykırı olan veya başkalarının kişisel haklarını zedeleyici, çiğneyici, hakaret edici, özel hayatlarına ve kamu haklarına tecavüz teşkil eden veya fikri mülkiyet hukuku ve ilgili diğer kanunla tarafından korunan telif hakları, patent, tasarım, ticari sır veya diğer fikri mülkiyet hakları ile bunlara ek olarak eser sahibinden izin almaksızın işleme ve derleme eser haklarına karşı ihlal ve tecavüz teşkil eden her türlü yazı, makale, resim, görüntü, fotoğraf, haber, yazılım programı veya benzeri unsurlar, 
                            <br>
                            - kin, nefret, ırkçılık, bağnazlık, başkalarına karşı her türlü fiziki tecavüzü teşvik eden veya küçüklere zararlı olabilecek, rahatsız edici, saldırgan veya başkalarına saldırganlığı teşvik edici, her türlü mesaj, eklemeler ve yayınlar,
                            <br>
                            - küçükleri şiddet ve cinselliğe yönelten, teşvik eden veya kanuna karşı faaliyetler hakkında eğitici bilgi veren, yasadışı silahların üretimi, nasıl yapıldığı, nasıl satıldığı hususunda bilgi veren mesajlar, 
                            <br>
                            - diğer kullanıcılara vermek üzere ve ticari amaçlı veya diğer başka yasal olmayan amaçlar için kullanmak üzere web sitesini kullananların şifre ve kişisel bilgilerini istemek veya almak, 
                            <br>
                            - virüs veya zararlı spamlar içeren veya virüs yaratan her türlü mesaj, ekleme ve yüklemeler , istenmeyen e-mail, zincirleme mektup, davetsiz toplu e-mail veya spam göndermek veya web sitesini ticari amaç için kullanmak, reklam, satış, ticari faaliyetle ilgili unsurlar taşıyan mesaj bırakma, eklemelerde bulunma veya yükleme yapmak, yasaktır. 
                            Aksi takdirde doğabilecek her türlü hukuki ve cezai sorumluluk kullanıcıya aittir. Kullanıcı ulak.news Yönetiminin bu nedenlerle muhatap olacağı her türlü talebi karşılamakla ve ödemek zorunda kalacağı idari ve cezai para cezaları dahil her türlü tazminatı ulak.news’e ödemekle yükümlüdür. 
                            <br>
                            <br>
                            ulak.news yönetimi yukarıda belirtilen kullanım koşullarını dilediği her zaman geliştirebilir ve güncelleyebilir. Kullanıcıların bildirdiği adres, kullanıcılara yapılacak her türlü bildirim için yasal adres kabul edilir. ulak.news kullanıcılarının kimliklerine, adreslerine, hizmet sağlayıcılarına ve benzeri bilgilerine erişemez. ulak.news'in üyelik bölümünde bazı bilgiler istenmektedir, kullanıcılar burada talep edilen bilgileri kendi rızalarıyla verir. Bunun dışında ulak.news donanım ve yazılım bilgilerinizi toplayabilir. Bu bilgiler arasında şunlar yer alır: IP adresiniz, tarayıcı türü, işletim sistemi, etki alan adı, erişim süreleri ve ilgili web adresleri.
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