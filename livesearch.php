<?php
	$a[] = "Anna";
	$a[] = "Brittany";
	$a[] = "Cinderella";
	$a[] = "Diana";
	$a[] = "Eva";
	$a[] = "Fiona";
	$a[] = "Gunda";
	$a[] = "Hege";
	$a[] = "Inga";
	$a[] = "Johanna";
	$a[] = "Kitty";
	$a[] = "Linda";
	$a[] = "Nina";
	$a[] = "Ophelia";
	$a[] = "Petunia";
	$a[] = "Amanda";
	$a[] = "Raquel";
	$a[] = "Cindy";
	$a[] = "Doris";
	$a[] = "Eve";
	$a[] = "Evita";
	$a[] = "Sunniva";
	$a[] = "Tove";
	$a[] = "Unni";
	$a[] = "Violet";
	$a[] = "Liza";
	$a[] = "Elizabeth";
	$a[] = "Ellen";
	$a[] = "Wenche";
	$a[] = "Vicky";


	// get the q parameter from URL
	$q = $_POST['t'];
	echo " $q ";
	$hint="";
	if ($q !== "") {
		echo "q has value $q";
	    $q = strtolower($q);
	    $len=strlen($q);
	    foreach($a as $name) {
	        if (stristr($q, substr($name, 0, $len))) {
	            if ($hint === "") {
	                $hint = $name;
	            } else {
	                $hint .= ", $name";
	            }
	        }
	    }
	}
	echo $hint === "" ? "<br>No suggestion<br>" : $hint;	
?>