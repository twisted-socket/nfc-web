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
								Netfoodcafe E-shop
							</h1>
							<div class="page-header">
								<h2>
									<span class="contact-name" itemprop="name">Σύστημα online παραγγελιών</span>
								</h2>
							</div>

							<?php include LIB . '/eshop_form.php'; ?>
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