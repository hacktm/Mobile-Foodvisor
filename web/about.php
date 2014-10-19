
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Foodvisor</title>
<!--style-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
 <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jquery.selectbox.css" type="text/css" rel="stylesheet" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    

  </head>
  <body  >
 
<?php include('nav.php'); ?>
    
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Disclaimer</h4>
      </div>
      <div class="modal-body">
    <p>   Users of the International Food Additive Database are advised that national regulations affecting permissible additive maximum use levels and technological functions frequently change. Although this database is updated periodically, users are advised that the information in it may not be completely up-to-date or error free.</p>

 <p>Additionally, food categories, additive nomenclature, technological function definitions, and substances considered to be additives vary between countries. To facilitate database queries, this information is organized according to food categories and technological functions identified by the Codex Alimentarius Commission and used in the Codex General Standard for Food Additives (GSFA). While every attempt was made to align with Codex, the relationships may not always be perfect equivalents. For example, food categories identified by national governments may appear in the database more than once when not precisely defined by national regulations.</p>

 <p>Also note that Codex Primary Additives and corresponding Additive Synonyms have been linked to the Codex Primary Additive INS number. The Codex Primary Additive will have an associated JECFA specification of identity and purity. Additive Synonyms gleaned from national food additive standards may have national specifications of identity and purity that differ from the JECFA specification for the Primary Additive. Importers must comply with the additive's national specifications of identity and purity.</p>

 <p>Additives included in the database are those that correspond to one or more of the twenty-seven functional classes defined by Codex Alimentarius in CAC/GL 36-1989. Some additives with other or unspecified technological functions are also included. However, many substances regulated as food additives in some markets are not within the scope of the database and are not included. These include, but are not limited to, flavorings, processing aids, nutritional additives, enzymes, and pesticides.</p>

 <p>This database is intended to serve as an initial reference source for food exporters. Users are strongly encouraged to verify all information with knowledgeable parties in the export markets prior to the sale or shipment of any products.</p>

 <p>The developers of this database are not liable for any damages, in whole or in part, caused by or arising in any way from user's use of the database.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<div class="container wrapper">

  <div class="container-fluid">

   <div class="title"> <h1>About US</h1></div>
    
<div class="row">
<div class="col-lg-12">




</div>
</div>
</div><!--continer-fluid-->
</div><!--continer-->





 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
		<script type="text/javascript">
		$(function () {
			$("#bar").selectbox();
		});
		</script>
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    
  
  </body>
</html>