<!DOCTYPE html>
<html>
<head>
   <title>Add New Task</title>
</head>
 
<body>
	<p>
		<?php echo $msg;?>
	</p>
<form action="addingNewtask" method="post">
	<p>	
		Judul      : <input type="text" id="judul" name="judul" width="50">
	</p>
	<p>
		Kata kunci : <input type="text" id="katakunci" name="katakunci" width="50">	
	</p>
	<input type="submit" value="Submit">
</form>
</body>
</html>