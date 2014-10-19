<? 
require_once("engine/ini.php");
require_once("engine/functions_front.php");
?>
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
  <script>
   $('#myCarousel').on('slide.bs.carousel', function () {
   
   interval: 2000
})
</script>
  </head>
  <body  >
 
 <?php include('nav.php'); ?>
    


<div class="container wrapper">

  <div class="container-fluid">

   <div class="title"> <h1>Welcome to Foodvisor</h1></div>
    <? if (!isset($_POST['bar'])) {?>
    <div class="row">
<div class="col-lg-12">
 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
   <div class="col-lg-4">
      <img src="img/1.png">
      </div>
       <div class="col-lg-8">
       <h2 class="title_b">This product is food additive free!<br/>
Green lights on, so start eating!</h2>
      </div>
    </div>
    <div class="item">
     <div class="col-lg-4">
      <img src="img/2.png">
      </div>
       <div class="col-lg-8">
       <h2 class="title_b">To eat, or not to eat?!<br/>
Hell with it - just dare, cause this is a balanced mixture - it contains some food additives - the 
harmless ones. </h2>
      </div>
      </div>
       <div class="item">
     
     
     <div class="col-lg-4">
      <img src="img/3.png">
      </div>
       <div class="col-lg-8">
       <h2 class="title_b">Careful...danger detected!<br/>
Do not consume this product - it contains more than one dangerous additive. This will most probably shorten your life...so better safe than sorry. </h2>
      </div>
     
     
     
      </div>
      
    </div>
  
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>   
 </div>
 </div>   
    
   
<div class="row">
<div class="col-lg-12">
<form class="form-horizontal" role="form" method="post">

  <div class="form-group">
    <div class="col-sm-12">
  <div class="control-group">
    <label class="control-label" for="input01"></label>
    <div class="controls">
    
    <select name="bar" id="bar" tabindex="1" onChange="changeHomeSel(this.value);">		
				
				<option value="1">Product</option>
                <option value="2" <?=$_REQUEST['bar']==2?' selected="selected"':''; ?>>Bar Code</option>

	</select>
    </div>
    </div>
    </div>
  </div>
  
  <div class="form-group">
   
    <div class="col-sm-12">
      <input type="text" name="prod-name" value="<?=$_REQUEST['prod-name']; ?>" class="form-control" autocomplete="off" id="prod-name" />
      <input type="text" name="prod" value="<?=$_REQUEST['prod']; ?>" class="form-control hidden" autocomplete="off" id="prod" />
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

<? } ?>
<div class="row">
  <div class="col-lg-12">
  

  
  <?
show_result_table($_REQUEST['bar'],$_REQUEST['prod'],$_REQUEST['prod-name']);
?>
  
 
 
  
  
  </div><!--col-lg-12-->
 
  </div><!--row-->
  
 


</div><!--continer-fluid-->
</div><!--continer-->





 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
		<script type="text/javascript">
		$(function () {
			$("#bar").selectbox();
		});
		</script>
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script src="js/typehead.min.js"></script>
    <script src="js/functions.js"></script>
    <script type="text/javascript">initAutocomplete();</script>
  </body>
</html>