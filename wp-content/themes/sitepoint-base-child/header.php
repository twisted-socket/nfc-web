<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="maincontentcontainer">
 *
 * @package Sitepoint Base
 * @since Sitepoint Base 1.0
 */
?><!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<?php get_template_part('lib/html_head'); ?>

<body <?php body_class(); ?>>

<?php //twisted_get_current_template(true); ?>

	<div id="wrapper" class="hfeed site">

		<div class="visuallyhidden skip-link">
			<a href="#primary"><?php esc_html_e( 'Skip to main content', 'sitepoint-base' ); ?></a>
		</div>

		<div id="headercontainer">

			<header>
				<div class="top-bar-cont">
					<div class="top-bar full min-shadow trans">
						<div class="top-bar-inner elem-full">
							<div class="top-bar-lower">
								<div class="top-bar-left">
									<nav class="main_menu min-shadow trans"><a href="/">
											<div class="top-bar-home">
												<img class="custom" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/netfoodcafe-logo-small.png" alt="netfoodcafe logo" title="netfoodcafe">
											</div>
										</a>
										<div class="mobile-icon">
											<span class="mobile-icon-bar"></span>
											<span class="mobile-icon-bar"></span>
											<span class="mobile-icon-bar"></span>
										</div>
										<div id="menus">
											<div class="default">
												<ul class="nav menu">
													<li class="item-247 divider deeper parent">
														<span class="separator">Καταστήματα</span>
														<ul class="nav-child unstyled small">
															<li class="item-248">
																<a href="/stores/chalcis-farmakidou-1.php">Κατάστημα Χαλκίδας</a>
															</li>
															<li class="item-249">
																<a href="/stores/exo-panagitsa-papandreou-150.php">Κατάστημα Έξω Παναγίτσα</a>
															</li>
															<li class="item-252">
																<a href="/stores/internet-cafe-exo-panagitsa-papandreou-150.php">Internet Cafe</a>
															</li>
														</ul>
													</li>
													<li class="item-215">
														<a href="/contact.php">Επικοινωνία</a>
													</li>
													<li class="item-216">
														<a href="<?php echo get_permalink(4); ?>">Eshop</a>
													</li>
												</ul>
											</div>
										</div>
									</nav>
								</div>
								<div class="top-bar-right" style="width:auto">
									<div class="player-top">
										<div class="emod-audio-playerstyle-none">
											<a href="/radio/index.html" target="_player" title="Άκου ζωντανά!" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,width=834,height=460');return false;" rel="nofollow">
												<div class="eoplayer">
													<div class="player-inner" style="background-image:url(/assets/images/speaker2-white.png);"></div>
													<div class="on-air">
														<span>Ραδιόφωνο</span>
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<header id="masthead" class="grid-container site-header" role="banner">
				<div class="grid-40 tablet-grid-40 site-title">
					<?php //sitepointbase_the_custom_logo() ?>
				</div> <!-- /.grid-40.site-title -->

				<div class="grid-60 tablet-grid-60">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<h3 class="menu-toggle assistive-text"><?php esc_html_e( 'Menu', 'sitepoint-base' ); ?></h3>
						<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'sitepoint-base' ); ?>"><?php esc_html_e( 'Skip to content', 'sitepoint-base' ); ?></a></div>
							<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'navigation nav-menu', 'container_class' => 'navigation_container' ) ); ?>
					</nav> <!-- /.site-navigation.main-navigation -->
				</div> <!-- /.grid-60 -->
			</header> <!-- /#masthead.grid-container.site-header -->

		</div> <!-- /#headercontainer -->

		<?php if ( get_header_image() ) { ?>
			<div id="bannercontainer">
				<div class="banner grid-container">
					<div class="header-image grid-100">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						</a>
					</div><!-- .header-image.grid-100 -->
				</div> <!-- /.banner.grid-container` -->
			</div> <!-- /#bannercontainer -->
		<?php } ?>

		<?php do_action( 'sitepointbase_before_woocommerce' ); ?>