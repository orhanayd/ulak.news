<?php
	include("config.php");
	$ulak_news_class = new UlakNews();
	$ulak_class = new UlakClass();

	$all_news = $ulak_news_class->get_news("all", 3);
	$agencies = $ulak_news_class->get_agencies();
	$all_cats = $ulak_news_class->get_cats();
	$most_read = $ulak_news_class->get_most_readed("today", 4);

	$get_id = preg_replace('/\D/', '', $_GET['id']);
	$get_agency = $_GET['agency'];

	$news_data = $ulak_news_class->get_new($get_agency, $get_id);

	$news_status = false;

	if($news_data){
		$news_status = true;
	}
	

?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ulak.news">

	<?php
		if($news_status){
		/**
		 * if news is okey
		 */
	?>

	<title><?php echo strip_tags($news_data['title']); ?> - <?php echo $news_data['agency_title']; ?> | Ulak News</title>
	<meta itemprop="image" content="<?php echo $news_data['image']; ?>" />
	<meta property="og:title" content="<?php echo htmlentities(strip_tags($news_data['title']), ENT_QUOTES); ?> | Ulak News" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo $news_data['image']; ?>" />
	<meta property="og:url" content="https://ulak.news/<?php echo $news_data['seo_link']; ?>" />
	<link rel="image_src" href="<?php echo $news_data['image']; ?>" />
	<meta name="keywords" content="<?php echo strip_tags(str_replace(' ', ', ', htmlentities($news_data['spot'], ENT_QUOTES))); ?>" />
	<meta property="og:description" content="<?php echo htmlentities(strip_tags($news_data['spot']), ENT_QUOTES); ?> | Ulak News" />
	<meta name="description" content="<?php echo htmlentities(strip_tags($news_data['spot']), ENT_QUOTES); ?> | Ulak News" />
	<meta itemprop="dateCreated" content="<?php echo strip_tags($news_data['date']); ?>">
	<meta itemprop="dateModified" content="<?php echo $news_data['saved_date']; ?>">
	<meta name="news_keywords" content="<?php echo strip_tags(str_replace(' ', ', ', htmlentities($news_data['spot'], ENT_QUOTES))); ?>"/>
	<link rel="canonical" href="https://ulak.news/<?php echo $news_data['seo_link']; ?>" />
	<meta name="robots" content="index, follow">
	<script type="application/ld+json"> { "@context": "https://schema.org", "@type": "NewsArticle", "mainEntityOfPage": { "@type": "WebPage", "@id": "https://ulak.news/<?php echo $news_data['seo_link']; ?>" }, "headline": "<?php echo htmlentities(strip_tags($news_data['title']), ENT_QUOTES); ?>", "name": "<?php echo htmlentities(strip_tags($news_data['title']), ENT_QUOTES); ?>", "articleBody": "<?php echo htmlentities(strip_tags(str_replace("\\", "", $news_data['text'])), ENT_QUOTES); ?>", "articleSection": "<?php echo strip_tags($news_data['categories'][0]); ?>", "image": { "@type": "ImageObject", "url": "<?php echo $news_data['image']; ?>", "height": 325, "width": 650 }, "datePublished": "<?php echo gmdate("Y-m-d\TH:i:s\+03:00", $news_data['date_u']); ?>", "dateModified": "<?php echo gmdate("Y-m-d\TH:i:s\+03:00", $news_data['date_u']); ?>", "genre": "news", "wordCount": <?php echo str_word_count($news_data['text']); ?>, "inLanguage": "tr-TR", "keywords": "<?php echo strip_tags(str_replace(' ', ', ', htmlentities($news_data['spot'], ENT_QUOTES))); ?>", "author": { "@type": "Person", "name": "<?php echo $news_data['agency_title']; ?>" }, "publisher": { "@type": "Organization", "name": "Ulak News", "logo": { "@type": "ImageObject", "url": "https://ulak.news/img/ulak/logo_2.webp", "width": 111, "height": 60 } }, "description": "<?php echo htmlentities(strip_tags($news_data['title']), ENT_QUOTES); ?>" } </script>

	<?php
		}else{
		/**
		 * if news not okey
		 */
	?>

	<title>Ulak News | Haberler, Son Dakika Haberleri ve Güncel Haber</title>
	<meta property="og:title" content="Ulak News | Haberler, Son Dakika Haberleri ve Güncel Haber" />
	<meta name="keywords" content="ulak.news, ulak haber, ulak news, ulak, haber, haberler, son dakika, son dakika haber, haber oku, gazete haberleri,gazeteler" />
	<meta property="og:description" content="Ulak news, Haberler, son dakika haberleri, yerel ve dünyadan en güncel gelişmeler, magazin, ekonomi, spor, gündem ve tüm haberleri ulak news'de!" />
	<meta name="description" content="Ulak news, Haberler, son dakika haberleri, yerel ve dünyadan en güncel gelişmeler, magazin, ekonomi, spor, gündem ve tüm haberleri ulak news'de!" />
	<meta itemprop="isFamilyFriendly" content="true"/>
	<meta name="robots" content="noindex, nofollow">
	<?php
		}
	?>
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

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fonts/material-icons.css">

	<!-- Tooltip plugin (zebra) css file -->
	<link rel="stylesheet" type="text/css" href="plugins/zebra-tooltip/zebra_tooltips.min.css">

	<!-- Owl Carousel plugin css file. only used pages -->
	<link rel="stylesheet" type="text/css" href="plugins/owl-carousel/assets/owl.carousel.min.css">

	<!-- Ideabox main theme css file. you have to add all pages -->
	<link rel="stylesheet" type="text/css" href="css/main-style.min.css?v=<?php echo date('Ymd'); ?>">

	<!-- Ideabox responsive css file -->
	<link rel="stylesheet" type="text/css" href="css/responsive-style.min.css?v=<?php echo date('Ymd'); ?>">

	<link rel="manifest" href="manifest.json">
</head>

<body>
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

		<!-- Detail extra post start -->
		<div class="extra-posts">
			<?php include("./view/extra-posts.php"); ?>
		</div>
		<!-- Detail extra post start -->

		<section class="main-content">
			<div class="main-content-wrapper">
				<div class="content-body">
				<?php
					if($news_status){
				?>
					<!-- article body start -->
					<article class="article-wrapper">
						<div class="article-header">
							<div class="breadcrumb">
								<ul>
									<li><a href="/index.php"><span>Ana sayfa</span></a> <i class="material-icons"></i></li>
									<li><a href="/kaynak_<?php echo $news_data['agency']; ?>.html"><span><?php echo $news_data['agency_title']; ?><i class="material-icons"></i></span></a></li>
								</ul>
							</div>

							<div class="article-header-title">
								<h1 class="article-title"><?php echo $news_data['title']; ?></h1>
							</div>

							<div class="article-meta-info">
								<a href="#" class="author-name"><?php echo $news_data['agency_title']; ?></a> —
								<span class="article-post-date"><?php echo $ulak_class->time_since($news_data['date_u']===null ? 0 : $news_data['date_u']); ?></span>
								<span class="article-reading-time"><?php echo $ulak_class->reading_time($news_data['text']===null ? "" : $news_data['text']); ?> okuma süresi</span>
							</div>
							<figure>
								<img style="width: 100%;" alt="<?php echo $news_data['title']; ?>" src="<?php echo $news_data['image']; ?>">	
							</figure>
							
						</div>
						<div class="article-content"> <!-- adbox120 or adbox160 -->
							<div class="article-left-box" style="height: 2641.03px;">
								<div class="article-left-box-inner" style="position: absolute; top: 0px; bottom: auto;">
									<div class="article-share">
										<a rel="noreferrer" style="font-size:0px" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://ulak.news/<?php echo $news_data['seo_link']; ?>&t=<?php echo $news_data['title']; ?>" class="facebook">Facebook</a>
										<a rel="noreferrer" style="font-size:0px" target="_blank" href="https://twitter.com/share?url=https://ulak.news/<?php echo $news_data['seo_link']; ?>&via=ulak_news&text=<?php echo $news_data['title']; ?>" class="twitter">Twitter</a>
									</div>
									<!-- <span class="add-to-favorite" data-zebra-tooltip="" title="Ad to favorite">
										<i class="material-icons"></i>
									</span> -->
									<!-- <ul class="article-emoticons">
										<li>
											<a href="#" class="popular happy"></a><span>13</span>
											<ul>
												<li><a href="#" class="love"></a><span>7</span></li>
												<li><a href="#" class="shocked"></a><span>5</span></li>
												<li><a href="#" class="angry"></a><span>4</span></li>
												<li><a href="#" class="crying"></a><span>1</span></li>
												<li><a href="#" class="sleepy"></a><span>0</span></li>
											</ul>
										</li>										
									</ul> -->
								</div>
							</div>
							<div class="article-inner">
								<?php echo $news_data['text']; ?>
								<!-- article sources area start -->
								<div class="article-source-box">
									<div class="source-item">
										<span class="source-subtitle">Kaynak : </span>
										<span class="source-url"><a rel="noreferrer" href="<?php echo $news_data['url']; ?>" target="_blank"><?php echo $news_data['url']; ?></a></span>
									</div>
								</div>
								<!-- article sources area end -->

								<!-- article tags area start -->
								<!-- <div class="article-tags">
									<span class="tag-subtitle">Tags : </span>
									<a href="#">theme</a><span class="tag-dot"></span>
									<a href="#">template</a><span class="tag-dot"></span>
									<a href="#">mobile ui</a>
								</div> -->
								<!-- article tags area end -->
							</div>

							<!--this is important for the left ad box or share box fixer -->
							<div id="endOfTheArticle"></div>

							<!-- More article unit start -->
							<div class="more-article">
								<div class="w-header">
									<div class="w-title">Bu haber ile ilgili</div>
									<div class="w-seperator"></div>
								</div>
								<div class="more-posts">
									<?php include("./view/related-news.php"); ?>
								</div>
							</div>
							<!-- More article unit end -->

							<!-- article comment area start -->
							<div class="article-comments">
								<div class="w-header">
									<div class="w-title">Bu haberi yorumla</div>
									<div class="w-seperator"></div>
								</div>
								<div class="comment-form">
									<form id="comment-form">
										<div class="comment-columns">
											<div class="frm-row columns column-2">
												<input require type="text" autocomplete="off" name="name" placeholder="Adınız" class="frm-input">
											</div>
										</div>
										<div class="frm-row">
											<textarea require class="frm-input" name="text" autocomplete="off" rows="4" placeholder="Yorumunuz..."></textarea>
										</div>
										<div class="frm-row">
											<div class="comment-form-notice columns column-4">
												<div>Yorum yaparak Kullanım Şartları, Topluluk Şartları ve Sorumluluk Reddi Beyanınını kabul etmiş sayılırsınız.<br/>1 dakika da en fazla 1 yorum gönderebilirsiniz.</div>
												<!-- <div>You are commenting as a visitor, you can <a href="#" data-modal="loginModal">login</a> or <a href="#" data-modal="registerModal">register</a></div> -->
											</div>
											<div class="columns column-2">
												<button onClick="addComment();" type="button" class="addCommentButton frm-button full material-button">Gönder</button>
											</div>
											<div class="clearfix"></div>
										</div>
				
									</form>
								</div>

								<div class="w-header">
									<div class="w-title">Yorumlar (<span id="comment-total">0</span>)</div>
									<div class="w-seperator"></div>
								</div>

								<div class="all-comments">

									<!-- comment item start -->
									<!-- <div class="comment-item">
										<div class="comment-avatar">
											<span class="comment-img"><img src="img/user.png" width="50" height="50"></span>
										</div>
										<div class="comment-content">
											<div class="comment-header">
												<span class="author-name">Visitor</span> - 
												<span class="comment-date">3 hours ago</span>
											</div>
											<div class="comment-wrapper">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
											</div>
											<div class="comment-meta">
												<span class="replay-button">Replay</span>
												<button type="button" class="comment-vote up-vote"><i class="material-icons"></i> <span class="vote-count">+7</span></button>
												<button type="button" class="comment-vote down-vote"><i class="material-icons"></i> <span class="vote-count">-1</span></button>
											</div>
										</div> -->
									</div>
									<!-- comment item end -->
									
								</div>
							</div>
							<!-- article comment area start -->

						</div>
					</article>
					<?php
					}else{
					?>
						<?php include("./view/404.php"); ?>
					<?php
					}
					?>
					<!-- article body end -->
					<div class="content-sidebar">
						<div class="sidebar_inner" style="position: absolute; top: 0px;">
							<?php include("./view/most-read.php"); ?>
							<div class="seperator"></div>
							<!-- 
							<a href="#" class="widget-ad-box">
								<img src="img/adbox300x250.png" width="300" height="250">
							</a> -->
						</div>
					</div>
				</div>
			</div>
		</section>

	</main>
	<!--Main container end -->

	<?php include("./view/footer.php"); ?>

	<script src="js/jquery-3.5.1.min.js"></script>

	<!-- Tooltip plugin (zebra) js file -->
	<script src="plugins/zebra-tooltip/zebra_tooltips.min.js"></script>

	<!-- Owl Carousel plugin js file -->
	<script src="plugins/owl-carousel/owl.carousel.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@13.0.1/dist/lazyload.min.js"></script>

	<!-- Ideabox theme js file. you have to add all pages. -->
	<script src="js/main-script.min.js"></script>

	<script type="text/javascript">
	// Initialize LazyLoad inside the callback
	new LazyLoad({
                    elements_selector: ".lazyload"
                });
	var id = <?php echo $get_id; ?>;
	var agency = "<?php echo $get_agency; ?>";

		function addComment(){
			let form_data = $('#comment-form').serializeArray();
			let values = {};
			
			form_data.map(input=>{
				values[input.name] = input.value;
			});
			$.ajax({
				type: 'POST',
				url: 'api.php?process=addComment',
				async: true,
				data: {
					agency: agency,
					id: id,
					name: values.name,
					text: values.text
				},
				timeout: 2000,
				beforeSend: function () {
					$(".addCommentButton").prop('disabled', true);
					console.log("Before...");
				},
				success: function (result) {
					if (result.status) {
						$("#comment-form")[0].reset();
						getComment();
					} else {
						alert(result.desc);
					}
				},
				error: function (data) {
					alert("Yorum eklerken hata oluştu");
				},
				complete: function (data) {
					$(".addCommentButton").prop("disabled", null);
					console.log("Process OK");
				}
			});
		}

		function getComment(){
			$.ajax({
				type: 'GET',
				url: 'api.php',
				async: true,
				data: {
					process: "getComments",
					agency: agency,
					id: id
				},
				timeout: 2000,
				beforeSend: function () {
					$('.all-comments').html('Yükleniyor...');
				},
				success: function (result) {
					if (result.status) {       
						$('.all-comments').html('');
						console.log(result.result.length)
						$('#comment-total').text(result.result.length);
						result.result.map(comment=>{
							$('.all-comments').append(`
									<div class="comment-item">
										<div class="comment-avatar">
											<span class="comment-img"><img src="img/user.png" width="50" height="50"></span>
										</div>
										<div class="comment-content">
											<div class="comment-header">
												<span class="author-name">`+comment.name+`</span> - 
												<span class="comment-date">`+comment.date+`</span>
											</div>
											<div class="comment-wrapper">
												`+comment.text+`
											</div>
											<div class="comment-meta">
											</div>
									</div>
							`);
						})
					} else {
						$('.all-comments').html(result.desc);
					}
				},
				error: function (data) {
					$('.all-comments').html('Yorumlar yüklenirken hata oldu.');
				},
				complete: function (data) {
					console.log("Get Comment Process OK");
				}
			});
		}

		//widget carousel initialize
		$('#widgetCarousel').owlCarousel({
		    dots:true,
		    nav:false,
		    items:1
		});

		getComment();

	</script>



</body></html>