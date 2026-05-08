<div class="container-fluid pagecontent">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-9">
<div class="row list-container">
<?php if ( $result ) { ?>
<?php foreach ( $result as $item ) { ?>
<div class="col-xs-12">
  <div class="media">
    <div class="media-left">
      <a href="<?php echo download_permalink( $item['id'] ); ?>" aria-label="<?php echo htmlentities( $item['title'], ENT_QUOTES ); ?>">
        <img class="media-object" width="168" height="126" src="<?php echo $item['image']; ?>" alt="<?php echo htmlentities( $item['title'], ENT_QUOTES ); ?>">
      </a>
    </div>

    <div class="media-body">
      <a href="<?php echo download_permalink( $item['id'] ); ?>" aria-label="<?php echo htmlentities( $item['title'], ENT_QUOTES ); ?>">
        <h4 class="media-heading"><?php echo $item['title']; ?></h4>
      </a>

      <ul class="video-search-footer">
        <li><span class="hidden-xs">Artist: </span><?php echo $item['channel']; ?></li>
        <li><a href="whatsapp://send?text=<?php echo download_permalink( $item['id'] ); ?>"><i class="fa fa-whatsapp"></i></a></li>
      </ul>
    </div>
  </div>
</div>
<?php } unset( $item ); ?>
<?php } ?>
</div>
</div>
</div>
</div>
</div>