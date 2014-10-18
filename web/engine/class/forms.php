<?php
class jsForm {
   function __construct($form_id="",$output_id="",$button_id="") {
       ?>		
		<script type="text/javascript">
		$(document).ready(function() { 
		// start readay		
		    $('#<?=$form_id?>').ajaxForm({ 
		        target: '#<?=$output_id?>', 
		        success: function() { 
		            // code afther submit 
		        } 
		    }); 		
		    $('#<?=$button_id?>').click(function() {
		    	$('#loadfrm').show(500);
		    	//$('#<?=$button_id?>').prop( "disabled", true );
				$('#<?=$form_id?>').submit();
		    }); 		
		//end ready        
		});
		</script>
		<?
   }
}

class jsForm1 {
   function __construct($form_id="",$output_id="",$button_id="") {
       ?>		
		<script type="text/javascript">
		//$(document).ready(function() { 
			$('#<?=$form_id?>').submit(function() { // catch the form's submit event
				var formData = new FormData($(this)[0]);
			    $.ajax({ // create an AJAX call...
			        data: formData,
			        type: $(this).attr('method'), // GET or POST
			        url: $(this).attr('action'), // the file to call
					enctype: $(this).attr('enctype'),					
			    	async: true,
			    	cache: false,
			    	contentType: false,
			    	processData: false,			
			        success: function(response) { // on success..
			            $('#<?=$output_id?>').html(response); // update the DIV
			        },
					statusCode: {
						404: function() {
							alert( "page not found" );
						}
					}
			    });
			    return false; // cancel original event to prevent form submitting
			});	
		    $('#<?=$button_id?>').click(function() {
		    	$('#loadfrm').show();
		    	//$('#<?=$button_id?>').prop( "disabled", true );
				$('#<?=$form_id?>').submit();
		    });	
		//end ready        
		//});
		</script>
		<?
   }
}


?>