<!DOCTYPE html>
<html class="footer-dark" xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el" dir="ltr">
<?php include $_SERVER["DOCUMENT_ROOT"].'/lib/html_head.php'; ?>

<body>
<?php include LIB . '/header.php'; ?>

<div class="fadein" style="">
	<div class="main-wrapper">
		<div id="modal-img-bg"></div>
		<div id="modal-img-window">
			<div class="modal-img-top">
				<div class="modal-img-title-small"></div>
				<div class="modal-img-loading"></div>
				<div class="modal-img-close">✕</div>
			</div>
			<div id="modal-img-bottom"></div>
		</div>
		<header class="header no-bboard">
			<div class="center"></div>
		</header>
		<div class="inner-wrapper">
			<div class="center">
				<div class="system-messages">
					<div id="system-message-container"></div>
				</div>
			</div>
			<div class="center">
				<div class="system-messages">
					<div id="system-message-container"></div>
				</div>
			</div>

			<div class="mainbody">
				<div class="mainbody-resize">
					<div class="mainbody-comp">
						<div class="contact" itemscope="" itemtype="https://schema.org/Person">
							<h1>
								Επικοινωνία
							</h1>
							<div class="page-header">
								<h2>
									<span class="contact-name" itemprop="name">Διαχειριστής Online Server & Webmaster</span>
								</h2>
							</div>
							<h3></h3>
							<dl class="contact-address dl-horizontal" itemprop="address" itemscope=""
								itemtype="https://schema.org/PostalAddress">
								<dt>
						<span class="jicons-icons" itemprop="email">
							<img src="<?php echo ASSETS_PATH; ?>/images/emailButton.png" alt="Ηλεκτρονικό ταχυδρομείο: ">
						</span>
								</dt>
								<dd>
						<span class="contact-emailto">
							<span><a href="mailto:giorgoslaliotis@netfoodcafe.com">giorgoslaliotis@netfoodcafe.com</a></span>
						</span>
								</dd>
							</dl>

							<?php include LIB . '/contact_form.php'; ?>
							<h3></h3>
							<div class="contact-miscinfo">
								<dl class="dl-horizontal">
									<dt>
							<span class="jicons-icons">
								<img src="<?php echo ASSETS_PATH; ?>/images/con_info.png" alt=": ">
							</span>
									</dt>
									<dd>
										<span class="contact-misc">Μη διστάσετε να έρθετε σε επαφή μαζί μας.<br/>Βεβαιωθείτε ότι χρησιμοποιείτε μια έγκυρη διεύθυνση e-mail, έτσι ώστε να μπορείτε να λάβετε μια απάντηση, και ότι το μήνυμά σας είναι όσο το δυνατόν λεπτομερές.<br/>Θυμηθείτε να ελέγξετε τις ρυθμίσεις στον φάκελο ανεπιθύμητης αλληλογραφίας / spam, στο γραμματοκιβώτιό σας.</span>
									</dd>
								</dl>
							</div>
						</div>
					</div>
				</div>
				<div class="baseline"></div>
			</div>

		</div>
	</div>

	<?php include LIB . '/footer.php'; ?>
</div>

<?php include LIB . '/footer_scripts.php'; ?>
</body>
</html>