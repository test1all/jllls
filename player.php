<?php $id = $_GET['id']; ?>
<html>
<head>
<meta name="robots" content="noindex,nofollow,noodp" />
<style>body{margin:0;}</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.9/mediaelementplayer.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.9/mediaelement-and-player.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$('audio,video').mediaelementplayer();
	})
</script>
</head>
<audio src="https://www.youtube.com/watch?v=<?php echo $id; ?>" type="video/youtube" controls style="width: 100%">Your browser does not support the audio element</audio>
</html>