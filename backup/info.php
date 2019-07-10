<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>PREMEDME</title>

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

</head>

<body data-spy="scroll" data-offset="0" data-target="#navbar-main">



<div class="selector">
	<select class="selectsatu">
		<option>Name</option>
		<option>Father Name</option>
		<option>Mother Name</option>
	</select>
	<select class="selectdua">
		<option>Name</option>
		<option>Father Name</option>
		<option>Mother Name</option>
	</select>

</div>


<div>
	<button id="copy">Copy</button>
</div>

<div class="another">

</div>

<script type="text/javascript">
	$(function(){
		$('.selectsatu').select2();
		$('.selectdua').select2();
		$('#copy').click(function(){
            $('.selectsatu').select2('destroy');
            $('.selectdua').select2('destroy');
			var selectorParant = $('.selector').html();
			$('.another').append(selectorParant);
            $('.selectsatu').select2();
            $('.selectdua').select2();
		});
	});
</script>




<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<script type="text/javascript">
	$(function(){
		$('.selectsatu').select2();
		$('.selectdua').select2();
		$('#copy').click(function(){
            $('.selectsatu').select2('destroy');
            $('.selectdua').select2('destroy');
			var selectorParant = $('.selector').html();
			$('.another').append(selectorParant);
            $('.selectsatu').select2();
            $('.selectdua').select2();
		});
	});
</script>


</body>
</html>