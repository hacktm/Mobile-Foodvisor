
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    

  </head>
  <body  >
 
 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Foodvisor</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about" data-toggle="modal" data-target="#myModal">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
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

   <div class="title"> <h1>Welcome to Foodvisor</h1></div>
    
<div class="row">
<div class="col-lg-12">
<form class="form-horizontal" role="form">

  <div class="form-group">
    <div class="col-sm-12">
  <div class="control-group">
    <label class=" "></label>   </div>
    </div>
  </div>
  
  <div class="form-group">
   
    <div class="col-sm-12">
      <input type="text" class="form-control" autocomplete="off" id="prod" >
    </div>
  </div>
  
  <div class="form-group">
    <div class=" col-sm-12">
      <button type="search" class="btn btn-primary">Search</button>
    </div>
  </div>
</form>
</div><!--col-lg-5-->
</div><!--row-->


<div class="row"><label class="control-label" for="input01">Barcode/Product:</label>
    <div class="controls">
   <select name="BP" class="BP"  id="span9000">
	<option></option>
    <option>--Select Barcode/Product--</option>

<option>Barcode</option>	
	
<option>Product</option>	
	
	</select>
    </div>


 <div class="col-xs-6"><img src="img/1.png"/>
 </div><!--col-xs-6-->
  <div class="col-xs-6">
  
  
  <div class="panel panel-success">
  <div class="panel-heading">

    <h3 class="panel-title">This product contains</h3>

</div>
  <div class="panel-body">
  <p> Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur</p>
  </div>
 
</div>
  
  
 
  
  
  </div><!--col-xs-6-->
  
  </div><!--row-->
  
  <div class="row">
  <div class="col-lg-12">
  
  <div class="panel panel-danger">
  <div class="panel-heading">

    <h3 class="panel-title">Atention!!!</h3>

</div>
  <div class="panel-body">
  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur</p>
  </div>
 
</div>
  
  


 
                    
  </div><!--col-xs-6-->
  
  </div><!--row-->


</div><!--continer-fluid-->
</div><!--continer-->




<div class="clrb"></div>
<div id="backtotop" class="scrollup">
<a href="#"><i class="icon-angle-up  icon-3x"></i></a>
</div> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script src="js/typehead.min.js"></script>
    <script src="js/functions.js"></script>
    <script type="text/javascript">initAutocomplete();</script>
  </body>
</html>