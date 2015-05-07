<!doctype html>
<html>
<head><title>Test Page</title></head>
<body>
  <h1><?php echo $test_var; ?></h1>
	<div id="test">
		click me!
	</div>
  <script type="text/javascript" src="/../../vendor/jquery/jquery.min.js"></script>

	<script>
	$('#test').click(function(){
		alert('hhh');
	});
	</script>
</body>
</html>