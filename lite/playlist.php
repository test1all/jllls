<?php
$title_panel = 'Playlist';
require 'includes/header.php';

require '../config/init.php';

require '../core/functions/general.php';
require '../core/uri.php';
require '../core/router.php';
require '../core/functions/options.php';
require '../core/functions/cache.php';
require '../core/functions/permalinks.php';
require '../core/functions/common.php';

if (isset($_SESSION['login']) && $_SESSION['login'] == $hash) { ?>
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Playlist</h1>
</div>
<?php if(isset($_GET['create'])){
if(isset($_POST['change'])){
if ( file_exists( '../store/' . $_SERVER['HTTP_HOST'] . '/playlists' ) ) {
$cache_file = '../store/' . $_SERVER['HTTP_HOST'] . '/playlists/' . md5( $_POST['slug'] ) .'.json';
}else{
$cache_file = '../store/default/playlists/' . md5( $_POST['slug'] ) .'.json';
}
$cache['title'] = $_POST['title'];
$cache['slug'] = $_POST['slug'];
$cache['id'] = $_POST['id'];
$cache['description'] = $_POST['description'];
if ( isset( $cache ) ) {
  set_cache( $cache_file, $cache );
}
?>
<div class="card bg-success text-white shadow mb-2">
<div class="card-body">
<b>Playlist <?php echo $_POST['title'];?></b> successfully created
</div>
</div>
<?php
}
?>
<div class="row">
<div class="col-md-12">
<div class="card">
<form method="post">
<div class="card-body">
<div class="form-group row">
<label class="col-md-2 col-form-label">Title</label>
<div class="col-md-6">
<input class="form-control" type="text" name="title" placeholder="Populer Songs" required="required">
</div>
</div>
<div class="form-group row">
<label class="col-md-2 col-form-label">Slug</label>
<div class="col-md-6">
<input class="form-control" type="text" name="slug" placeholder="populer-songs" required="required">
</div>
</div>
<div class="form-group row">
<label class="col-md-2 col-form-label">Playlist ID</label>
<div class="col-md-6">
<input class="form-control" type="text" name="id" placeholder="PLFgquLnL59alQ4PrI-9tZyl0Z8Bqp-RE7" required="required">
</div>
</div>
<div class="form-group row">
<label class="col-md-2 col-form-label">Description</label>
<div class="col-md-6">
<textarea class="form-control" rows="5" name="description" required="required"></textarea>
</div>
</div>
</div><div class="card-footer">
<input class="btn btn-primary" name="change" value="Create" type="submit">
<a class="btn btn-danger" href="playlist.php">Back</a>
</div>
</form>
</div>
</div>
</div>
<?php } elseif(isset($_GET['delete'])){ ?>
<?php
$delete = $_GET['delete'];
if ( file_exists( '../store/' . $_SERVER['HTTP_HOST'] . '/playlists/'.$delete.'' ) ) {
$file = '../store/' . $_SERVER['HTTP_HOST'] . '/playlists/'.$delete.'';
if ( file_exists( $file ) ) {
unlink('../store/' . $_SERVER['HTTP_HOST'] . '/playlists/'.$delete.'');
header('location: playlist.php');
}else{
echo'<script>
 alert("Playlist not found!");
</script>';
}
}else{
$file = '../store/default/playlists/'.$delete.'';
if ( file_exists( $file ) ) {
unlink('../store/default/playlists/'.$delete.'');
header('location: playlist.php');
}else{
echo'<script>
 alert("Playlist not found!");
</script>';
}
}
?>
<?php } else { ?>
<?php
if ( file_exists( '../store/' . $_SERVER['HTTP_HOST'] . '/playlists' ) ) {
$folder = '../store/' . $_SERVER['HTTP_HOST'] . '/playlists';
}else{
$folder = '../store/default/playlists';
}
if(!($buka_folder = opendir($folder)));
$file_array = array(); 
while($baca_folder = readdir($buka_folder))
{
  if(substr($baca_folder,0,1) != '.')
   {
     $file_array[] =  $baca_folder;
    }
}
?>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<a class="btn btn-primary" href="?create">Create</a>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th width="5%">No</th>
<th width="45%">Title</th>
<th width="40%">Slug</th>
<th width="10%">Action</th>
</tr>
</thead>
<tbody>
<?php
$i = 0;
while(list($index, $nama_file) = each($file_array)){
$i++;
if ( file_exists( '../store/' . $_SERVER['HTTP_HOST'] . '/playlists/'.$nama_file.'' ) ) {
$cache_file = '../store/' . $_SERVER['HTTP_HOST'] . '/playlists/'.$nama_file.'';
}else{
$cache_file = '../store/default/playlists/'.$nama_file.'';
}
if ( file_exists( $cache_file ) ) {
$data = json_decode( file_get_contents( $cache_file ), true );
}
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $data['title']; ?></td>
<td><?php echo $data['slug']; ?></td>
<td><center><a href="?delete=<?php echo $nama_file; ?>" <?php echo 'onclick="javascript: return confirm(\'Delete playlist '.$data["title"].'?\')"';?> data-toggle="tooltip" title="Remove">
<i class="fas fa-times"></i>
</a></center></td>
</tr>
<?php }
closedir($buka_folder); ?>
</tbody>
</table>
</div>
</div>

</div>
</div>
</div>
</div>
<?php } ?>
</div>
<?php 
require 'includes/footer.php';
}else{
header('Location: login.php');
}?>