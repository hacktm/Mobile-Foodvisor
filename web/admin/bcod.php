
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-barcode fa-fw"></i> Barcodes list
                        </div>
                        <div id="items_view" class="panel-body"></div>
                        <script>$('#items_view').load('bcod_list.php')</script>
                    </div>
            	</div>
            	<div class="col-lg-4" id="form_bcod_div">
					<? //require_once("bcod_add.php")?>
            	</div>
            	<script>
				//$('#form_bcod_div').load('bcod_add.php')
				var xload1 = $.ajax({
				        url:"bcod_add.php", /*local*/
				        dataType:'html',
				        type: "POST",
				        async:false,
				        success:function(data, textStatus, jqXHR){
				            $('#form_bcod_div').html(data);
				        }
				});
				</script>
            </div>
            <!-- /.row -->