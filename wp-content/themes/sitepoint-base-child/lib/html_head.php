<head>
	<base href=".">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta http-equiv="cleartype" content="on">

	<meta name="keywords"
		  content="netfoodcafe, net, food, cafe, φάστ φούντ, φαγητό, καφέ, διανομή, παράδοση κατ οίκον, νόστιμο, δίκτυο, παιχνίδια, ραδιόφωνο, ραδιοφωνικός σταθμός, μουσική, ελλάδα, εύβοια, χαλκίδα, έξω παναγίτσα, κατάστημα, καταστήματα">
	<meta name="google-site-verification" content="AQORS7K6w90ZBAnKI14fH8mjFrVMiGUgy2Uo65_GeaE">
	<meta name="yandex-verification" content="1a90177446b1a8a1">
	<meta name="wot-verification" content="bbf354168e63c3d158ee">
	<meta name="norton-safeweb-site-verification"
		  content="mx84juotprckx9jz3oia3mey98069csh8cegfj149s0lbuhggmlh7vmd5cb1vguo4l0oy17c3n3l5u9sl5l1lt7gy6ouogsk-s6884xlfqt8xpn9vj6mn6vfogphmn2i">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		  content="NetFoodCafe - Το δικό σου νόστιμο δίκτυο - Φάστ φούντ & καφέ διανομή/παράδοση κατ οίκον, φαγητό, net, παιχνίδια & ραδιόφωνο - Χαλκίδα & Έξω Παναγίτσα, Εύβοια, Ελλάδα">

	<title>NetFoodCafe</title>

	<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.png" rel="shortcut icon" type="image/png">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/finder.css" type="text/css">
	<style type="text/css">
		.hyphen, p, ul, ol, div[class*="newsflash"] ul li, div[class*="newsflash"] ol li, .item-page div, .item-page span, div[class*="bannergroup"], .feed-description, div[itemprop="blogPost"], .popover-content {
			text-align: justify;
			-ms-text-justify: auto;
			text-justify: auto;
			-webkit-hyphens: auto;
			-moz-hyphens: auto;
			hyphens: auto;
		}

		.item-page img, .blog img, .blog-featured img, .newsflash img, .category-list img, .categories-list img, .banneritem img, #archive-items img, .contact-image img, .contact .thumbnail img {
			-webkit-box-shadow: 0 0 3px #aaa;
			-moz-box-shadow: 0 0 3px #aaa;
			box-shadow: 0 0 3px #aaa;
		}

		html.go_fullscreen .bboard-logo img {
			max-width: 450px;
		}

		html.go_fullscreen .billboard {
			font-size: 125%;
			line-height: 2em;
		}

		.emod-billboard:before {
			padding-top: 44.27%
		}
	</style>
	<script src="https://use.fontawesome.com/cd17edcbc9.js"></script>
	<script type="text/javascript" id="www-widgetapi-script" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/www-widgetapi.js" async=""></script>
	<script async="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/analytics.js"></script>
<!--	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/player_api.js"></script>-->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-migrate-3.0.0.min.js" type="text/javascript"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-noconflict.js" type="text/javascript"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/caption.js" type="text/javascript"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-effects.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(window).on('load', function ()
		{
			new JCaption('img.caption');
		});
		var sidebar_pos = "";

		jQuery("#yt-player").hide();
		var tag = document.createElement("script");
		tag.src = "https://www.youtube.com/player_api";
		var firstScriptTag = document.getElementsByTagName("script")[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		var player;
		function onYouTubePlayerAPIReady()
		{
			player = new YT.Player("yt-player", {
				playerVars: {
					enablejsapi: 1,
					autoplay: 1,
					autohide: 2,
					loop: 1,
					controls: 0,
					disablekb: 0,
					showinfo: 0,
					rel: 0,
					fs: 0,
					list: 'PLICcdfGCswIvUqTlqlz4zq8Mb_f7c5c0I',
					listType: 'playlist',
					hl: "el",
					iv_load_policy: 3,
					start: 1,
					origin: "netfoodcafe.com",
					cc_load_policy: 0
				},
				width: "100%",
				height: "100%",
				events: {
					"onReady": onPlayerReady,
					//"onStateChange": onPlayerStateChange
				}
			});
		}

		function onPlayerReady(event)
		{
			player.pauseVideo();
			player.mute();
			player.setPlaybackQuality("hd1080");
			setTimeout(function ()
			{
				jQuery(".eovid").css("display", "block");
				jQuery("#yt-player").fadeTo(3000, 1);
				player.playVideo();
			}, 1000);
		}

		var done = false;
		function onPlayerStateChange(event)
		{
			if (event.data == YT.PlayerState.PLAYING) {
				if (!done) {
					fade_in_video();
					setTimeout(loop_video, 59000);
					done = true;
				}
			} else if (event.data == YT.PlayerState.ENDED) {
				jQuery("#eoytvid").hide(function ()
				{
					player.stopVideo();
					jQuery(this).remove();
				});
			}
		}

		function fade_in_video()
		{
			jQuery("input.bb").fadeTo(6000, "0.8");
			jQuery("#eoytvid").fadeTo(2000, 1.0);
		}

		function loop_video()
		{
			player.seekTo(1);
			setTimeout(loop_video, 59000);
		}


		jQuery(document).ready(function ($)
		{
			$(".billboard").css("background", "#000000");
			$('[class^="emod-billboard"]').fadeTo(0, 0.0);
			$("<img />").attr("src", "<?php echo get_stylesheet_directory_uri(); ?>/assets/images/netfoodcafe-evia-greece-panoramic-1.jpg").load(function ()
			{
				$(this).remove();
				$('[class^="emod-billboard"]').css("background-image", "url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/netfoodcafe-evia-greece-panoramic-1.jpg')");
				$('[class^="emod-billboard"]').fadeTo(500, 1.0);
			});
		});

		jQuery(function ($)
		{
			$(".hasTooltip").tooltip({"html": true, "container": "body"});
		});
	</script>

	<meta property="og:title" content="NetFoodCafe">
	<meta property="og:site_name" content="NetFoodCafe">
	<meta property="og:url" content="http://netfoodcafe.com/">
	<meta property="og:site_name" content="http://netfoodcafe.com/">
	<meta property="og:locale:locale" content="el_GR">
	<meta property="og:description"
		  content="NetFoodCafe - Το δικό σου νόστιμο δίκτυο - Φάστ φούντ & καφέ διανομή/παράδοση κατ οίκον, φαγητό, net, παιχνίδια & ραδιόφωνο - Χαλκίδα & Έξω Παναγίτσα, Εύβοια, Ελλάδα">
	<meta property="og:locale:locale" content="el_GR">
<!--	<meta property="og:type" content="cafe">-->
	<meta property="og:type"                                content="restaurant.restaurant" />
	<meta property="restaurant:contact_info:street_address" content="Λεωφ. Γ. Παπανδρέου 150" />
	<meta property="restaurant:contact_info:locality"       content="Έξω Παναγίτσα" />
	<meta property="restaurant:contact_info:region"         content="Εύβοια" />
	<meta property="restaurant:contact_info:postal_code"    content="34100" />
	<meta property="restaurant:contact_info:country_name"   content="Ελλάδα" />
	<meta property="restaurant:contact_info:email"          content="contact&#064;netfoodcafe.com" />
	<meta property="restaurant:contact_info:phone_number"   content="2221044405 " />
	<meta property="restaurant:contact_info:website"        content="http://www.netfoodcafe.com/" />
	<meta property="place:location:latitude"                content="38.489077" />
	<meta property="place:location:longitude"               content="23.63255" />

<!--	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/netfoodcafe-logo-white-full.jpg">-->
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-large.jpg">
<!--	<meta property="og:image:secure_url" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/netfoodcafe-logo-white-full.png">-->
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:image:width" content="600">
	<meta property="og:image:height" content="800">

	<!-- Responsive and mobile friendly stuff -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>