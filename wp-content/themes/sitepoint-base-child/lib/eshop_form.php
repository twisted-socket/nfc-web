<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- <img class="basket_img" src="/assets/images/icon_basket_gray.png" /> -->

<style>
	div.product-labels{
		float: left;
	}
	label {
		margin-right: 10px;
	}
	div.products{
		padding-top: 10px;
	}
	div.products-list {
		border: 1px solid #bbb;
		padding: 0 20px;
		background-color: #eee;
		/*width: 60%;*/
		margin-bottom: 20px;
	}
	div.products-list input {
		background-color: #eee;
		width: 13px;
		min-width: auto;
	}
	div.products-list h2 {
		padding-top: 10px;
		font-size: 20px;
		font-weight: bold;
	}
	.basket_img {
		width: 16px;
	}
</style>

<div class="contact-form">

	<form id="eshop-form" action="/eshop_endpoint.php" method="post" class="form-validate form-horizontal well">
		<fieldset>
		
			<div class="products-list">
				<h2>Σφολιάτες</h2>
				<div class="control-group">
					<div class="control-label product-labels">
						<label id="jform_cheese_pie-lbl" for="jform_cheese_pie" class="hasPopover" title="" data-content="Τυρόπιτα" data-original-title="Τυρόπιτα">Τυρόπιτα (€1.60)</label>
					</div>
					<div class="controls products">
						<input type="checkbox" name="order[]" id="jform_cheese_pie" value="cheese_pie" size="30" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label product-labels">
						<label id="jform_hamcheese_pie-lbl" for="jform_hamcheese_pie" class="hasPopover" title="" data-content="Ζαμπονοτυρόπιτα" data-original-title="Ζαμπονοτυρόπιτα">Ζαμπονοτυρόπιτα (€2.20)</label>
					</div>
					<div class="controls products">
						<input type="checkbox" name="order[]" id="jform_hamcheese_pie" value="hamcheese_pie" size="30" />
					</div>
				</div>
			</div>
				
			<div class="products-list">
				<h2>Πίτσες</h2>
				<div class="control-group">
					<div class="control-label product-labels">
						<label id="jform_pizza-a-lbl" for="jform_pizza-a" class="hasPopover" title="" data-content="Ζαμπόν-τυρί" data-original-title="Ζαμπόν-τυρί">Ζαμπόν-τυρί (€3.50)</label>
					</div>
					<div class="controls products">
						<input type="checkbox" name="order[]" id="jform_pizza-a" value="pizza-a" size="30" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label product-labels">
						<label id="jform_pizza-b-lbl" for="jform_pizza-b" class="hasPopover" title="" data-content="Ζαμπόν-τυρί-μπέικον" data-original-title="Ζαμπόν-τυρί-μπέικον">Ζαμπόν-τυρί-μπέικον (€3.80)</label>
					</div>
					<div class="controls products">
						<input type="checkbox" name="order[]" id="jform_pizza-b" value="pizza-b" size="30" />
					</div>
				</div>
			</div>
				
			<div class="products-list">
				<h2>Καφέδες - Ροφήματα</h2>
				<div class="control-group">
					<div class="control-label product-labels">
						<label id="jform_freddo_espresso-lbl" for="jform_freddo_espresso" class="hasPopover" title="" data-content="Freddo Espresso" data-original-title="Freddo Espresso">Freddo Espresso (€2.00)</label>
					</div>
					<div class="controls products">
						<input type="checkbox" name="order[]" id="jform_freddo_espresso" value="freddo_espresso" size="30" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label product-labels">
						<label id="jform_tea-lbl" for="jform_tea" class="hasPopover" title="" data-content="Τσάι ζεστό" data-original-title="Τσάι ζεστό">Τσάι ζεστό (€1.70)</label>
					</div>
					<div class="controls products">
						<input type="checkbox" name="order[]" id="jform_tea" value="tea" size="30" />
					</div>
				</div>
			</div>
			
			<div class="control-group">
				<div class="control-label">
					<label id="jform_contact_message-lbl" for="jform_contact_message" class="hasPopover required" title="" data-content="Σχόλια παραγγελίας"  data-original-title="Σχόλια παραγγελίας">Σχόλια παραγγελίας</label>
				</div>
				<div class="controls">
					<textarea name="contact_message" id="jform_contact_message" rows="5"></textarea>
				</div>
			</div>
			
			<div class="g-recaptcha" data-callback="recaptchaOk" data-sitekey="6LdNPwoUAAAAAO86qmo6sMcWhql-H4d3GasqmhCM"></div>
			
		</fieldset>
		
		<div class="control-group">
			<div class="controls" id="form-submit">
				<button style="display: none;" id="submit-button" class="btn btn-primary validate" type="submit">Αποστολή Παραγγελίας</button>
				<input type="hidden" name="origin" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
			</div>
		</div>
		
	</form>
	
</div>

<script type="text/javascript">
	var recaptchaOk = function(response){
		if (undefined != response ){
			document.getElementById("submit-button").style.display = "block"
		}
	};
	
	var form = jQuery('#eshop-form');
	
	jQuery("#submit-button").click(function(e){

		e.preventDefault();
		jQuery.post(form.attr('action'),form.serialize(),function(data){
			console.log('JQSuccess');
			var user_msg = '';
			if (data.status == 'error') {
				console.log('DataError');
				user_msg = 'Σφάλμα αποστολής παραγγελίας. Προσπαθήστε αργότερα...';
			} else if (data.status == 'success') {
				console.log('DataSuccess');
				user_msg = data.message;
			}
			jQuery('#form-submit').html(user_msg);
		},'json')
			.fail(function(){
				console.log('failed!');
			});


//		jQuery.ajax({
//			url: form.attr('action'),
//			type: "POST",
//			dataType: "json",
//			data: form.serialize(),
//			error: function(jqXHR, textStatus, errorThrown) {
//				console.log('JQError');
//				console.log(textStatus + " ||| " + errorThrown + " ||| " + jqXHR);
//			},
//			success: function(data, textStatus, jqXHR) {
//				console.log('JQSuccess');
//				var user_msg = '';
//				if (data.status == 'error') {
//					console.log('DataError');
//					user_msg = 'Σφάλμα αποστολής παραγγελίας. Προσπαθήστε αργότερα...';
//				} else if (data.status == 'success') {
//					console.log('DataSuccess');
//					user_msg = data.message;
//				}
//				jQuery('#form-submit').html(user_msg);
//			}
//		});
	});
</script>