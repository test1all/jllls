<div class="container-fluid pagecontent">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-9">
<div class="row list-container">
<div class="text-center">
<h4 class="video-title-selected"><?php echo $result['title']; ?><br><span><?php echo $result['duration']; ?></span></h4>
</div>
<div class="row donwload-box">
<div class="text-center">
<iframe rel="preconnect" width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $result['id']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br>

<br>
<iframe allowtransparency frameborder="0" height="800px" marginheight="0" marginwidth="0" referrerpolicy="origin" src="https://clickapi.net/api/widgetplus?url=https://www.youtube.com/watch?v=<?php echo $result['id']; ?>" width="100%"></iframe>
<script>document.addEventListener('DOMContentLoaded', function(event) { iFrameResize({ log: false }, '#widgetPlusApi'); });</script><br/><br/>
<script type="text/javascript">
// Selecting the iframe element
 var widgetApi = document.getElementById("widgetIframe");

  // Adjusting the iframe height onload event
widgetApi.onload = function(){
widgetApi.style.height = widgetApi.contentWindow.document.body.scrollHeight + 3 + 'px';
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/4.3.9/iframeResizer.min.js"></script>
</div>
<div class="text-center">
<ul class="download-share-box">
<li>Share </li>
<li><a href="whatsapp://send?text=<?php echo canonical_url(); ?>" aria-label="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<br/>

</div>
</div>