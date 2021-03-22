<?php
	include("config.php");
	$pass = false;
	$keyAuth = "";
	if(isset($_GET['admin'])){
		if($_GET['admin']===$_ENV['admin_key']){
			$pass = true;
			$keyAuth = $_ENV['statskey'];
		}
	}
	$ulak_api_class = new UlakNews();
	$ulak_class = new UlakClass();

	$agencies = $ulak_api_class->get_agencies();
	$most_read = $ulak_api_class->get_most_readed("today", 4);
	$all_cats = $ulak_api_class->get_cats();

	$cat_status = false;
	$cat_data=[];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ulak.news">
	<title>Analizlerimiz | Ulak News</title>
	<meta property="og:title" content="Analizlerimiz | Ulak News" />
	<meta property="og:description" content="Haberlerle ilgili verilerin analizlerini bu sayfadan takip edebilirsiniz." />
	<meta name="description" content="Haberlerle ilgili verilerin analizlerini bu sayfadan takip edebilirsiniz." />
	<meta property="og:title" content="İstatistikler | Ulak News" />
	<meta property="og:description" content="Haberlerle ilgili verilerin analizlerini bu sayfadan takip edebilirsiniz." />
	<meta property="og:image" content="https://ulak.news/img/logo/logo_l.png" />
	<meta property="og:url" content="https://ulak.news" />
	<meta property="og:locale" content="tr_TR" />
	<meta itemprop="isFamilyFriendly" content="true" />
	<meta name="robots" content="noindex, nofollow">

	<link rel="canonical" href="https://ulak.news" />
	<link rel="alternate" type="application/rss+xml" title="ulak news rss beslemesi" href="https://ulak.news/atom_news.php?cat=sondakika" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,900&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<!-- Ideabox main theme css file. you have to add all pages -->
	<link rel="stylesheet" type="text/css" href="css/main-style.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />

	<!-- Ideabox responsive css file -->
	<link rel="stylesheet" type="text/css" href="css/responsive-style.css">
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

	<!--Main container start -->
	<main class="main-container">
		<!-- <section class="main-highlight">
			<div class="post-list-header">
				<span class="post-list-title">İstatistikler</span>
			</div>
		</section> -->

		<section class="main-content">
			<div class="main-content-wrapper">
				<div class="content-body-full">
					<div class="content-timeline">
						<!--Timeline header area start -->
						<div class="post-list-header">
							<span class="post-list-title">Analizlerimiz</span><br>
							<div class="post-lists">

								<!-- özet -->
								<div class="columns column-2">
									<div class="post-list-item">
										<div class="post-bottom">
											<a href="#" class="read-more"><span id="newsTotal">Yükleniyor...</span> - Toplam Haber</a>
										</div>
									</div>
								</div>

								<div class="columns column-2">
									<div class="post-list-item">
										<div class="post-bottom">
											<a href="#" class="read-more"><span id="commentsTotal">Yükleniyor...</span> - Toplam Yorum</a>
										</div>
									</div>
								</div>

								<div class="columns column-2">
									<div class="post-list-item">
										<div class="post-bottom">
											<a href="#" class="read-more"><span id="emojiTotal">Yükleniyor...</span> - Toplam Emoji</a>
										</div>
									</div>
								</div>

								<div class="columns column-2">
									<div class="post-list-item">
										<div class="post-bottom">
											<a href="#" class="read-more"><span id="agencyTotal">Yükleniyor...</span> - Toplam Ajans</a>
										</div>
									</div>
								</div>

							</div>
							<hr/>
							<div style="border: 1px solid #727cf5; width: 230px;" class="date datepicker dashboard-date" id="dashboardDates" >
								<span class="input-group-addon bg-transparent"></span>
								<i class="material-icons">event</i>
							</div>
							<span class="">* Günlük okunma sayıları 07.09.2020 tarihinden itibaren alınabilir. Geçmiş tarih için sadece günlük yayınlanan haberlerin toplam okunma sayısı alınabilir.</span>
						</div>
						<!--Timeline header area end -->

						<hr/>

						<div class="post-lists">

							<!-- özet -->
							<div class="columns column-3">
								<div class="post-list-item">
									<div class="post-top columns">
										<div id="stats" style="height: 100%; width: 100%;"></div>
									</div>
									<div class="post-bottom">
										<div class="post-meta">
											<a href="#" class="read-more">Seçtiğiniz tarih aralığında yayınlanan haberlere göre <strong>özet istatistikler.</strong></a>
										</div>
									</div>
								</div>
							</div>

							<div class="columns column-3">
								<div class="post-list-item">
									<div class="post-top">
										<div style="height: 100%; width: 100%" id="mostWord"></div>
									</div>
									<div class="post-bottom">
										<div class="post-meta">
											<a href="#" class="read-more">Seçtiğiniz tarih aralığında yayınlanmiş haberlerde <strong>en çok kullanılan kelimeler.</strong></a>
										</div>
									</div>
								</div>
							</div>

							<div class="columns column-3">
								<div class="post-list-item">
									<div class="post-top">
										<div id="agencyReadsChart" style="height: 100%; width: 100%;"></div>
									</div>
									<div class="post-bottom">
										<div class="post-meta">
											<a href="#" class="read-more">Seçtiğiniz tarih aralığında yayınlanan haberlere göre <strong>ajansların okunma sayıları.</strong></a>
										</div>
									</div>
								</div>
							</div>

							<div class="columns column-3">
								<div class="post-list-item">
									<div class="post-top">
										<div id="agencyTotalChart" style="height: 100%; width: 100%;"></div>
									</div>
									<div class="post-bottom">
										<div class="post-meta">
											<a href="#" class="read-more">Seçtiğiniz tarih aralığına göre <strong>ajansların haber yayınlama grafiği.</strong></a>
										</div>
									</div>
								</div>
							</div>

							<div class="columns column-3">
								<div class="post-list-item">
									<div class="post-top">
										<div id="catsChart" style="height: 100%; width: 100%;"></div>
									</div>
									<div class="post-bottom">
										<div class="post-meta">
											<a href="#" class="read-more">Seçtiğiniz tarih aralığında yayınlanmiş haberlere göre <strong>kategorilerinin okunma ve haber sayıları.</strong></a>
										</div>
									</div>
								</div>
							</div>

							<div class="columns column-3">
								<div class="post-list-item">
									<div class="post-top">
										<div id="mostNews" style="height: 100%; width: 100%;"></div>
									</div>
									<div class="post-bottom">
										<div class="post-meta">
											<a href="#" class="read-more">Seçtiğiniz tarih aralığında yayınlanmiş haberlere göre <strong>en çok okunan haberler.</strong></a>
										</div>
									</div>
								</div>
							</div>
							
						</div>

						<!--Data load more button start  -->
						<div style="display: none;" class="load-more">
							<button class="load-more-button material-button" type="button">
								<i class="material-icons">&#xE5D5;</i>
								<span>Load More</span>
							</button>
						</div>
						<!--Data load more button start  -->
					</div>

				</div>
			</div>
		</section>

	</main>

	<div class="overlay"></div>

	<script src="js/jquery-3.5.1.min.js"></script>
	<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
	<script src="js/charts.js"></script>
	<script src="js/anychart-base.min.js"></script>
	<script src="js/anychart-tag-cloud.min.js"></script>
	<script type="text/javascript" src="js/moment.min.js"></script>
	<script type="text/javascript" src="js/moment-timezone.min.js"></script>
	<script type="text/javascript" src="js/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />

	<!-- Tooltip plugin (zebra) js file -->
	<script src="plugins/zebra-tooltip/zebra_tooltips.min.js"></script>

	<!-- Ideabox theme js file. you have to add all pages. -->
	<script src="js/main-script.js?v=<?php echo date('Ymd'); ?>"></script>
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

			agency(startX, endX);
			mostCats(startX, endX);
			mostNews(startX, endX);
			mostWords(startX, endX);
			countStats(startX, endX);
			countTotal(startX, endX);
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


<script>

	function divLoading(divid){
		let loadingdiv = `<div style="left: 0px; top: 0px; width: 100%; height: 100%; z-index: 9999; background: url('./img/loading.gif') 50% 50% no-repeat rgb(249,249,249);"></div>`;
		$('#'+divid).html(loadingdiv);
	}

	function addSymbols(e) {
		var suffixes = ["", "K", "M", "B"];
		var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

		if(order > suffixes.length - 1)                	
			order = suffixes.length - 1;

		var suffix = suffixes[order];      
		return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
	}

	function toggleDataSeries(e) {
		if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		} else {
			e.dataSeries.visible = true;
		}
		e.chart.render();
	}

	function explodePie (e) {
		if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
			e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
		} else {
			e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
		}
		e.chart.render();
	}

	function calculatePercentage(chart) {
		var dataPoint = chart.options.data[0].dataPoints;
		var total = dataPoint[0].y;
		for(var i = 0; i < dataPoint.length; i++) {
			if(i == 0) {
				chart.options.data[0].dataPoints[i].percentage = 100;
			} else {
				chart.options.data[0].dataPoints[i].percentage = ((dataPoint[i].y / total) * 100).toFixed(2);
			}
		}
	}



	/**
	 * en çok okunan haberler için image set
	 */
	function addImages(chart, selector, images) {
		let fruits = [];
		for (var i = 0; i < chart.data[0].dataPoints.length; i++) {
			var label = chart.data[0].dataPoints[i].label;

			if (label) {
				fruits.push($("<img>").attr("src", images[i].url)
					.attr("class", label)
					.attr("onClick", 'onClick("'+images[i].link+'", true)')
					.css("display", "none")
					.appendTo($("#" + selector + ">.canvasjs-chart-container"))
				);
			}

			positionImage(chart, fruits[i], i);
		}
		$(window).resize(function() {
			for (var i = 0; i < chart.data[0].dataPoints.length; i++) {
				positionImage(chart, fruits[i], i);
			}
		});
	}

	function onClick(e, direct=false){
		if(direct===true){
			return window.open(e,'_blank');  
		}
		window.open(e.dataPoint.link,'_blank');  
	};

	/**
	 * en çok okunan haberler için image position
	 */
	function positionImage(chart, fruit, index) {
		var imageBottom = chart.axisX[0].bounds.y1;
		var imageCenter = chart.axisX[0].convertValueToPixel(chart.data[0].dataPoints[index].x);

		fruit.width(chart.dataPointWidth * .5);
		fruit.height(chart.dataPointWidth * .42);
		fruit.css({
			"position": "absolute",
			"display": "block",
			"top": imageBottom - fruit.height(),
			"left": imageCenter - fruit.width() / 2
		});
		chart.render();
	}


	/**
	 * ajans istatistikleri
	 */
	function agency(start, end){

		$.ajax({
			type: 'POST',
			url: 'https://nodejs-api.ulak.news/stats_admin/agency',
			data: JSON.stringify({ "start": start, "end": end, key: "<?php echo $keyAuth; ?>" }),
			cache: false,
			contentType: "application/json",
			dataType: 'json',
			timeout: 500000,
			beforeSend: function () {
				divLoading('agencyReadsChart');
				divLoading('agencyTotalChart');
			},
			success: function (result) {
				$('#agencyReadsChart').html('');
				$('#agencyTotalChart').html('');
				if (result.status) {
					let tmpReadData = [];
					let tmpTotalData = [];
					for (let i = 0; i < result.result.agency.length; i++) {
						tmpReadData.push({y: result.result.agency[i].read_times, label: result.result.agency[i]._id})
						tmpTotalData.push({y: result.result.agency[i].total, name: result.result.agency[i]._id})
					}
					new CanvasJS.Chart("agencyReadsChart", {
						animationEnabled: true,
						theme: "light2", // "light1", "light2", "dark1", "dark2"
						axisY: {
							title: "Okunma Sayısı"
						},
						data: [
							{
								type: "column",  
								showInLegend: true, 
								legendMarkerColor: "grey",
								legendText: "Ajanslara göre okunma sayısı",
								dataPoints: tmpReadData
							}
						]
					}).render();

					new CanvasJS.Chart("agencyTotalChart", {
						animationEnabled: true,
						legend:{
							cursor: "pointer",
							itemclick: explodePie
						},
						data: [{
							type: "pie",
							showInLegend: true,
							toolTipContent: "{name}: <strong>{y} haber</strong>",
							indexLabel: "{name} - {y} haber",
							dataPoints: tmpTotalData
						}]
					}).render();

				} else {
					$('#agencyReadsChart').html('Veriler alınamadı!');
					$('#agencyTotalChart').html('Veriler alınamadı!');
				}
			},
			error: function (data) {
				$('#agencyReadsChart').html('Hata oluştu: '+JSON.stringify(data));
				$('#agencyTotalChart').html('Hata oluştu: '+JSON.stringify(data));
			},
			complete: function (data) {
				
			}
		});
	}


	/**
	 * kategori istatikleri
	 */
	function mostCats(start, end){

		$.ajax({
			type: 'POST',
			url: 'https://nodejs-api.ulak.news/stats_admin/mostCats',
			data: JSON.stringify({ "start": start, "end": end, key: "<?php echo $keyAuth; ?>" }),
			cache: false,
			contentType: "application/json",
			dataType: 'json',
			timeout: 500000,
			beforeSend: function () {
				divLoading('catsChart')
			},
			success: function (result) {
				$('#catsChart').html('');
				if (result.status) {
					let tmpOkunmaData = [];
					let tmpCountData = [];
					for (let i = 0; i < result.result.mostCats.length; i++) {
						tmpOkunmaData.push({y: result.result.mostCats[i].read_times, label: result.result.mostCats[i]._id});
						tmpCountData.push({y: result.result.mostCats[i].total, label: result.result.mostCats[i]._id});
					}
					new CanvasJS.Chart("catsChart",  {
						animationEnabled: true,
						
						toolTip: {
							shared: true
						},
						legend: {
							cursor: "pointer",
							itemclick: toggleDataSeries
						},
						data: [
							{
								type: "column",
								name: "Okunma sayısı",
								yValueFormatString: "### kere",
								legendText: "Okunma sayısı",
								showInLegend: true, 
								dataPoints: tmpOkunmaData
							},
							{
								type: "column",	
								name: "Haber sayısı",
								legendText: "Haber sayısı",
								yValueFormatString: "### tane",
								axisYType: "secondary",
								showInLegend: true,
								dataPoints: tmpCountData
							}
						]
					}).render();
				} else {
					$('#catsChart').html('Veriler alınamadı!');
				}
			},
			error: function (data) {
				$('#catsChart').html('Hata oluştu: '+JSON.stringify(data));
			},
			complete: function (data) {
				
			}
		});
	}

	/**
	 * en çok okunan 5 haber
	 */
	function mostNews(start, end){

		$.ajax({
			type: 'POST',
			url: 'https://nodejs-api.ulak.news/stats_admin/mostReads',
			data: JSON.stringify({ "start": start, "end": end, key: "<?php echo $keyAuth; ?>" }),
			cache: false,
			contentType: "application/json",
			dataType: 'json',
			timeout: 500000,
			beforeSend: function () {
				divLoading('mostNews')
			},
			success: function (result) {
				$('#mostNews').html('');
				if (result.status) {
					let tmpData = [];
					let images = [];

					for (let i = 0; i < result.result.mostReads.length; i++) {
						tmpData.push({y: result.result.mostReads[i].read_times, image: result.result.mostReads[i].image, link: 'https://ulak.news/'+result.result.mostReads[i].seo_link, label: result.result.mostReads[i].title});
						images.push({url: result.result.mostReads[i].image, link: 'https://ulak.news/'+result.result.mostReads[i].seo_link});
					}
					let chart = new CanvasJS.Chart("mostNews", {
						theme: "light2",
						axisX: {
							titleMaxWidth: 10,
							title: "",
							tickLength: 0,
							margin: 0,
							lineThickness: 0,
							labelFormatter: function(){
								return " ";
							},
							valueFormatString: " " //comment this to show numeric values
						},
						data: [              
							{
								type: "column",
								cursor: "pointer",
								click: onClick,
								toolTipContent: "<img width='128px' style='width: 128px;' src='\"'{image}'\"' /><br/>{label}",  
								dataPoints: tmpData
							}
						]
					});

					chart.render();
					// addImages(chart, "mostNews", images);
				} else {
					$('#mostNews').html('Veriler alınamadı!');
				}
			},
			error: function (data) {
				$('#mostNews').html('Hata oluştu: '+JSON.stringify(data));
			},
			complete: function (data) {
				
			}
		});
	}

	/**
	 * en çok kullanılan kelimeler
	 */
	function mostWords(start, end){

		$.ajax({
			type: 'POST',
			url: 'https://nodejs-api.ulak.news/stats_admin/mostWords',
			data: JSON.stringify({ "start": start, "end": end, key: "<?php echo $keyAuth; ?>" }),
			cache: false,
			contentType: "application/json",
			dataType: 'json',
			timeout: 500000,
			beforeSend: function () {
				divLoading('mostWord')
			},
			success: function (result) {
				$('#mostWord').html('');
				if (result.status) {
					let data = [];
					for (let index = 0; index < result.result.mostWords.length; index++) {
						data.push({ x: result.result.mostWords[index]._id, value: result.result.mostWords[index].count })
					}

					// create a tag cloud chart
					var chart = anychart.tagCloud(data);
					// set array of angles, by which words will be placed
					chart.angles([0])
					// enable color range
					chart.colorRange(false);
					// set color range length
					chart.colorRange().length('80%');

					// display chart
					chart.container("mostWord");
					chart.draw();

				} else {
					$('#mostWord').html('Veriler alınamadı!');
				}
			},
			error: function (data) {
				$('#mostWord').html('Hata oluştu: '+JSON.stringify(data));
			},
			complete: function (data) {
				
			}
		});
	}

	/**
	 * özet toplam
	 */
	function countStats(start, end){

		$.ajax({
			type: 'POST',
			url: 'https://nodejs-api.ulak.news/stats_admin/countStats',
			data: JSON.stringify({ "start": start, "end": end, key: "<?php echo $keyAuth; ?>" }),
			cache: false,
			contentType: "application/json",
			dataType: 'json',
			timeout: 500000,
			beforeSend: function () {
				divLoading('stats')
			},
			success: function (result) {
				if (result.status) {
					$('#stats').html('');
					let rslt = result.result.countStats;
					let chart = new CanvasJS.Chart("stats", {
						animationEnabled: true,
						data: [{
							type: "funnel",
							reversed: false,
							showInLegend: true,
							legendText: "{label}",
							indexLabel: "{label} - {y}",
							toolTipContent: "<b>{label}</b>: {y} <b>({percentage}%)</b>",
							indexLabelFontColor: "black",
							dataPoints: [
								{ y: rslt.read_times, label: "Okunma" },
								{ y: rslt.comments, label: "Yorum" },
								{ y: rslt.emoji, label: "Emoji" },
								{ y: rslt.news, label: "Haber" },
								{ y: rslt.banned, label: "Haber Engeli" }
							]
						}]
					});
					calculatePercentage(chart);
					chart.render();

				} else {
					$('#stats').html('Veriler alınamadı!');
				}
			},
			error: function (data) {
				$('#stats').html('Hata oluştu: '+JSON.stringify(data));
			},
			complete: function (data) {
				
			}
		});

	}

	/**
	 * özet toplam Tüm sistem
	 */
	function countTotal(start, end){

		$.ajax({
			type: 'POST',
			url: 'https://nodejs-api.ulak.news/stats_admin/totalCount',
			data: JSON.stringify({ "start": start, "end": end, key: "<?php echo $keyAuth; ?>" }),
			cache: false,
			contentType: "application/json",
			dataType: 'json',
			timeout: 500000,
			beforeSend: function () {
				divLoading('stats')
			},
			success: function (result) {
				if (result.status) {
					console.log(result.result)
					$('#newsTotal').text(result.result.totalCount.newsTotal.toLocaleString("tr-TR"));
					$('#commentsTotal').text(result.result.totalCount.commentTotal);
					$('#emojiTotal').text(result.result.totalCount.emoji);
					$('#agencyTotal').text(result.result.totalCount.agencyTotal);
				} else {
				}
			},
			error: function (data) {
			},
			complete: function (data) {
				
			}
		});

	}

</script>

</body>

</html>