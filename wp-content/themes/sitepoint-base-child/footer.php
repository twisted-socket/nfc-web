<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id #maincontentcontainer div and all content after.
 * There are also four footer widgets displayed. These will be displayed from
 * one to four columns, depending on how many widgets are active.
 *
 * @package Sitepoint Base
 * @since Sitepoint Base 1.0
 */
?>

	<?php do_action( 'sitepoint_base_after_woocommerce' ); ?>
	<div id="footercontainer">

		<footer class="footer-max">
			<div class="center">
				<div class="footer-inner" style="padding-top: 10px;">
					<nav class="footer-upper">
						<?php /*
				<div class="footer-upper-in" style="width:220px">
					<div class="moduletable style-none">
						<h3>Καταστήματα</h3>
						<ul class="category-modulestyle-none">
							<li>
								<a class="mod-articles-category-title "
								   href="/stores/chalcis-farmakidou-1.php">
									Κατάστημα Χαλκίδας
								</a>
							</li>
							<li>
								<a class="mod-articles-category-title "
								   href="/stores/exo-panagitsa-papandreou-150.php">
									Κατάστημα Έξω Παναγίτσα
								</a>
							</li>
							<li>
								<a class="mod-articles-category-title "
								   href="/stores/internet-cafe-exo-panagitsa-papandreou-150.php">
									Κατάστημα Internet Cafe
								</a>
							</li>
						</ul>
					</div>
					<div class="moduletable">
						<h3>Γενικά</h3>
						<ul class="nav menu">
							<li class="item-213"><a href="/contact.php">Επικοινωνία</a></li>
						</ul>
					</div>
				</div>
				<div class="footer-upper-in" style="width:220px">
					<div class="moduletable">
						<h3>Όροι Χρήσης</h3>
						<ul class="nav menu">
							<li class="item-282"><a href="/privacy.php">Προσωπικά
									Δεδομένα</a></li>
						</ul>
					</div>
				</div>
 				*/ ?>
						<style>
							.footer-menu-li {
								list-style-type: none;
								padding-left: 20px;
								text-align: center;
								float: right !important;
								vertical-align: top;
								display: table-cell;
								margin-top: 10px;
							}
							.footer-menu-li a i {
								font-size: 25px;
							}
							.footer-menu-li a i span {
								font-size: 11px;
								font-family: 'robotolight', Roboto, sans-serif, Arial, Helvetica !important;
							}
						</style>
						<ul id="sm_menu" class="nav menu" style="text-align: right;">
							<li class="item-262 footer-menu-li">
								<a href="https://www.youtube.com/channel/UCZuUqpf-7jw3Q3mDu0cC9vQ" target="_blank" title="YouTube">
									<i class="fa fa-youtube" aria-hidden="true"><br /><span>YouTube</span></i>
								</a>
							</li>
							<li class="item-260 footer-menu-li">
								<a href="https://www.twitch.tv/netfoodcafe" target="_blank" title="Twitch">
									<i class="fa fa-twitch" aria-hidden="true"><br /><span>Twitch</span></i>
								</a>
							</li>
							<li class="item-259 footer-menu-li">
								<a href="https://twitter.com/NetFoodCafe" target="_blank" title="Twitter">
									<i class="fa fa-twitter" aria-hidden="true"><br /><span>Twitter</span></i>
								</a>
							</li>
							<li class="item-262 footer-menu-li">
								<a href="skype:skype@netfoodcafe.com?call" target="_blank" title="Skype">
									<i class="fa fa-skype" aria-hidden="true"><br /><span>Skype</span></i>
								</a>
							</li>
							<li class="item-262 footer-menu-li">
								<a href="https://www.facebook.com/NetFoodCafe2" target="_blank" title="Facebook - Fast Food">
									<i class="fa fa-facebook" aria-hidden="true"><br /><span>Fast Food</span></i>
								</a>
							</li>
							<li class="item-262 footer-menu-li">
								<a href="https://www.facebook.com/NetFoodCafe1" target="_blank" title="Facebook - Internet Cafe">
									<i class="fa fa-facebook" aria-hidden="true"><br /><span>Net Cafe</span></i>
								</a>
							</li>
						</ul>
					</nav>
					<div class="eclear"></div>
				</div>
			</div>
			<div class="footer-end" style="text-align: left;">
				<div class="center">
					<div class="copyright" style="font-size: 10px; max-width: none;">
						Copyright © <?php echo date('Y'); ?> NETFOODCAFE ΕΠΕ. All Rights Reserved.
					</div>
				</div>
			</div>
		</footer>

		<noscript>&lt;div class="noscript"&gt;&lt;div class="noscript-warning"&gt;This website makes use of JavaScript.&lt;br&gt;Enable
			JavaScript on your browser, or some features will not work.&lt;/div&gt;&lt;/div&gt;</noscript>

		<script type="text/javascript">(function (i, s, o, g, r, a, m)
			{
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] || function ()
					{
						(i[r].q = i[r].q || []).push(arguments)
					}, i[r].l = 1 * new Date();
				a = s.createElement(o), m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
			ga('create', 'UA-82691314-1', 'netfoodcafe.com');
			ga('set', 'forceSSL', true);
			ga('send', 'pageview');
		</script>

		<script type="application/javascript">
			jQuery(document).ready(function() {
				jQuery('.shop_table .table_header').click(function () {
					jQuery(this).toggleClass('expand').parent().next().children().slideToggle(100);
				});
			});
		</script>

		<?php //get_sidebar( 'footer' ); ?>

	</div> <!-- /.footercontainer -->

</div> <!-- /.#wrapper.hfeed.site -->

</body>

</html>