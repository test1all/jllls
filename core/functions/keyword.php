<?php
function kw_folder(){
	if (file_exists( $_SERVER['DOCUMENT_ROOT'] . '/store/' . $_SERVER['HTTP_HOST'] . '/keywords' )) {
	    return $_SERVER['DOCUMENT_ROOT'] . '/store/' . $_SERVER['HTTP_HOST'] . '/keywords';
	}else{
		return $_SERVER['DOCUMENT_ROOT'] . '/store/default/keywords';
    }
}

function save_to_txt($string, $file='1.txt', $delim="\n" ){
	$file = kw_folder().'/'.$file; 
	$myfile = fopen($file, "a") or die("Unable to open file!");
	if (! cek_duplicate($string, $file, $delim)) {
		$save = file_put_contents($file, $string.$delim, FILE_APPEND | LOCK_EX);
		return true;
	}
	fclose($myfile); 
}
function cek_duplicate($string, $file, $delimiter = "\n"){
	$file 	= file_get_contents($file);
	$exp 	= explode($delimiter, $file);
	foreach ($exp as $value) {
		if (trim($string) === trim($value)) {
			return true;
			exit;
		}
	}
	return false;
}
   
if (isset($_POST['injek_kw'])) {
		$term = $_POST['injek_kw'];		
		$terms= explode("\r\n", $term);
		$items = array_filter($terms);
		foreach ($items as $term) {
			$title        = trim($term);
			save_to_txt($title);
		}
		echo '<div class="card bg-success text-white shadow mb-2">
<div class="card-body">
<b>Keywords</b> successfully added
</div>
</div>';
}
else{
}
?>