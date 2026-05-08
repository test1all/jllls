<div class="ktz-inner-content">
<div class="container">
<div class="row"> <section class="col-md-12">
<div class="row">
<div role="main" class="main col-md-9">
<section class="new-content">
<article id="post-111" class="ktz-page post-111 page type-page status-publish hentry">
<div class="inner-box">
<div class="entry-body clearfix">
<h1 class="ktz-titlepage">Daftar Lagu <b><?php echo $data['title']; ?></b></h1>
<h2 class="alert alert-block btn-box alert-info">Download Playlist <strong><?php echo $data['title']; ?> MP3</strong> dapat kamu download secara gratis di <?php echo get_option( 'site_name' ); ?>.
Untuk melihat detail lagu <?php echo $data['title']; ?> klik salah satu judul yang cocok,
kemudian untuk link download <?php echo $data['title']; ?> ada di halaman berikutnya.</h2>
<?php if ( $result ) { ?>
<?php $i = 0; ?>
<ul class="ranked-popular-post-wrapper">
<?php foreach ( $result as $item ) { ?>
<?php $i++; ?>
<li class="col-xs-12 col-sm-6 col-md-12">
<div class="popular-news-wrapper">
<span class="news-rank">
<?php echo $i; ?>
</span>
<h4 class="news-title">
<a title="<?php echo $item['title']; ?> MP3" href="<?php echo download_permalink( $item['id'] ); ?>">
<?php echo $item['title']; ?>
</a>
</h4>
<div class="news-info">
<span class="entry-author vcard"><?php echo $item['channel']; ?></span>
<span class="entry-date updated"><?php echo timeline($item['date']); ?></span>
</div>
</div>
</li>
<?php } unset( $item ); ?>
</ul>
<?php } ?>
</div>
</div>
</article>
</section>
</div>
<div class="sbar col-md-3 widget-area wrapwidget" role="complementary">
<aside id="execphp-2" class="widget widget_execphp">
<?php 
$searches = get_recent_user_access( get_option( 'recent_searches_count' ) );
if ( $searches ) {
?>
<div class="execphpwidget"><aside class="widget widget_categories">
<h4 class="widget-title"><span class="ktz-blocktitle">Recent Search</span></h4><ul></ul></aside></div>
<ul>
<?php foreach( $searches as $item ) { ?>
<li><a href="<?php echo search_permalink( $item['title'] ); ?>" title="<?php echo $item['title']; ?> MP3"><span class="cuk"><?php echo $item['title']; ?></span></a></li>
<?php } ?>
</ul>
<?php } ?>
</aside></div>
</div>
</section>
</div> 
</div> 
</div>