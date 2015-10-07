<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
	    <title>Wallbase</title>
	    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link href="<?php echo base_url(); ?>ressource/dist/dropzone.css" type="text/css" rel="stylesheet" />
		<script src="<?php echo base_url(); ?>ressource/dist/dropzone.js"></script>
		<script>
			/*function submitForm(){
				//$(".dropzone").submit();
				alert("lol");
			}*/
		</script>
	</head>
	<body>
    <div class="container">
        <h1>Déposez vos photos</h1>
        <hr>
        <form action="<?php echo site_url('DropzoneController/upload');?>" class="dropzone" >

        </form>
    </div>

	</body>
</html>