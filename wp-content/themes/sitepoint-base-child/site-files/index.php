<!DOCTYPE html>
<html class="footer-dark" xmlns="http://www.w3.org/1999/xhtml" xml:lang="el" lang="el" dir="ltr">
<?php include './lib/html_head.php'; ?>

<body>
<?php include LIB . '/header.php'; ?>

<div class="fadein" style="">
	<div class="main-wrapper">
		<div id="modal-img-bg" style="display: none;"></div>
		<div id="modal-img-window" style="display: none;">
			<div class="modal-img-top">
				<div class="modal-img-title-small" style="display: none;"></div>
				<div class="modal-img-loading" style="display: none;"></div>
				<div class="modal-img-close">✕</div>
			</div>
			<div id="modal-img-bottom"></div>
		</div>
		<header class="header">
			<div class="billboard" style="background: rgb(0, 0, 0);">
				<div class="emod-billboard bb eo-full eo-cover"
					 style="max-height: 850px; background-color: rgb(21, 21, 21); background-position: center top; opacity: 0;">
					<div class="eovid" style="display: none;">
						<div id="yt-player" style="display: none;"></div>
						<?php
						// OLDER VIDEO https://www.youtube.com/embed/JvrsTqiH6m0?enablejsapi=1&autoplay=1&autohide=2&loop=1&controls=0&disablekb=0&showinfo=0&rel=0&fs=0&playlist=OYnQRqMhM-M&hl=el&iv_load_policy=3&start=1&origin=" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . "&cc_load_policy=0&widgetid=1"
						//$iframe_src = "https://www.youtube.com/embed/OYnQRqMhM-M?enablejsapi=1&autoplay=1&autohide=2&loop=1&controls=0&disablekb=0&showinfo=0&rel=0&fs=0&playlist=OYnQRqMhM-M&hl=el&iv_load_policy=3&start=1&origin={$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}&cc_load_policy=0&widgetid=1";
						//$iframe_src = "https://www.youtube.com/embed/?listType=playlist&list=PLICcdfGCswIvUqTlqlz4zq8Mb_f7c5c0I&autoplay=1&loop=1&controls=0&showinfo=0&rel=0&fs=0&hl=el&iv_load_policy=3&origin={$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}&cc_load_policy=0&widgetid=1";
						//$iframe_src = "https://www.youtube.com/embed?listType=playlist&list=PLICcdfGCswIvUqTlqlz4zq8Mb_f7c5c0I&enablejsapi=1&autoplay=1&autohide=2&controls=1&disablekb=0&showinfo=0&rel=0&fs=0&hl=el&iv_load_policy=3&start=1&origin={$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}&cc_load_policy=0&widgetid=1";
						?>
					</div>
					<input title="Λειτουργία Πλήρους Οθόνης" class="btn-fullscreen bb" value="" type="button"
						   style="opacity: 0.8; display: inline-block;">
					<div class="bboard-wrapper">
						<div class="bboard-outer eo-full">
							<div class="bboard-main eo-full eo-middle"></div>
						</div>
					</div>
				</div>

			</div>
			<div class="center"></div>
		</header>
		<div class="inner-wrapper">
			<div class="center">
				<div class="system-messages">
					<div id="system-message-container"></div>
				</div>
			</div>
		</div>
	</div>

	<?php include LIB . '/footer.php'; ?>
</div>

<?php include LIB . '/footer_scripts.php'; ?>
</body>
</html>