<html>
	<title>My Friends Book</title>
	<meta charset="utf-8">
	<link href="styleTask3.css" rel="stylesheet"/>
<header>
	<center><h1>Friend Book</h1></center>
</header>
<body>

	<form method="post" action="index.php">
	Insert Name :<input type="text" name="IName">
 				<input type="submit" name="envoi" value="Send">
	Filter Name :<input type="text" name="FName" value="<?php if(empty($_POST['FName'])) $FName = NULL;?>">
 				<input type="submit" name="Name" value="Filter">
 	</form>

	<?php      
	    $filename = "friends.txt";
	    
	    if (isset($_POST['IName'])) {	
	    	$name = $_POST['IName'];
	    	$file = fopen( $filename, "a" );
	    	if ( "$name" != NULL ) {
	        	fwrite( $file, "$name\n");
	    	}
	    }
	    	

	    $FName = $_POST['FName'];
	    $file = fopen( $filename, "r" );
	    while (!feof($file)) {
	    	if ($FName != NULL){
	    	$ligne = fgets($file)."<br/>";
	        if (isset($_POST['FName']) and $_POST['FName']!=''){
	            $ligne=strstr($ligne, $_POST['FName'], false);
	        }
	        if($ligne)echo "$ligne";
	    	}
	    	else {
            echo fgets($file)."<br/>";
        	}
	    }
	?>


</body>
	<footer>
		<center><h5>Footer</h5></center>
	</footer>
</html>
