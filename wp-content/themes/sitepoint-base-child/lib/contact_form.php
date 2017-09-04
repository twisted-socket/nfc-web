<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="contact-form">
	<form id="contact-form" action="/submit_contact.php" method="post" class="form-validate form-horizontal well">
		<fieldset>
			<legend>Send an Email</legend>
			<div class="control-group">
				<div class="control-label">
									<span class="spacer"><span class="before"></span><span class="text"><label id="jform_spacer-lbl"
																											   class=""><strong class="red">*</strong> Υποχρεωτικό πεδίο</label></span><span
											class="after"></span></span></div>
				<div class="controls"></div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<label id="jform_contact_name-lbl" for="jform_contact_name" class="hasPopover required" title=""
						   data-content="Το όνομά σας" data-original-title="Το όνομα σας">
						Το όνομα σας<span class="star">&nbsp;*</span></label></div>
				<div class="controls"><input type="text" name="contact_name" id="jform_contact_name" value=""
											 class="required" size="30" required="required" aria-required="true"
											 style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGP6zwAAAgcBApocMXEAAAAASUVORK5CYII=&quot;); cursor: auto;">
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<label id="jform_contact_email-lbl" for="jform_contact_email" class="hasPopover required" title=""
						   data-content="Η ηλεκτρονική σας διεύθυνση."
						   data-original-title="Η διεύθυνση ηλεκτρονικού ταχυδρομείου σας">
						Η διεύθυνση ηλεκτρονικού ταχυδρομείου σας<span class="star">&nbsp;*</span></label></div>
				<div class="controls"><input type="email" name="contact_email" class="validate-email required"
											 id="jform_contact_email" value="" size="30" autocomplete="email"
											 required="required" aria-required="true"></div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<label id="jform_contact_emailmsg-lbl" for="jform_contact_emailmsg" class="hasPopover required" title=""
						   data-content="Το θέμα του μηνύματός σας." data-original-title="Θέμα">
						Θέμα<span class="star">&nbsp;*</span></label></div>
				<div class="controls"><input type="text" name="contact_subject" id="jform_contact_emailmsg" value=""
											 class="required" size="60" required="required" aria-required="true"></div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<label id="jform_contact_message-lbl" for="jform_contact_message" class="hasPopover required" title=""
						   data-content="Το μήνυμά σας." data-original-title="Το μήνυμα σας">
						Το μήνυμα σας<span class="star">&nbsp;*</span></label></div>
				<div class="controls"><textarea name="contact_message" id="jform_contact_message" cols="50" rows="10"
												class="required" required="required" aria-required="true"></textarea></div>
			</div>
			<div class="g-recaptcha" data-callback="recaptchaOk" data-sitekey="6LdNPwoUAAAAAO86qmo6sMcWhql-H4d3GasqmhCM"></div>
		</fieldset>
		<div class="control-group">

			<div class="controls">
				<button style="display: none;"  id="submit-button" class="btn btn-primary validate" type="submit">Αποστολή Μηνύματος</button>
				<input type="hidden" name="origin" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
			</div>
	</form>
</div>
<script type="text/javascript">
	var recaptchaOk = function(response){
		if (undefined != response){
			document.getElementById("submit-button").style.display = "block"
		}
	}
</script>

