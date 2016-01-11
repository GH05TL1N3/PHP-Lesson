<?Php
$manu_arr = $page;
?>
<nav class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="./">ask-club</a>
      <div class="nav-collapse collapse navbar-inverse-collapse">
        <ul class="nav">
<?Php
$url = $uri_past[0];
foreach ($manu_arr as $key => $val){
	if (empty($uri_past[0]) or $uri_past[0] == "index.php") $url = "./";
		#if ($val["status"] == "show"){
?>
          <li<?Php echo ($url == $key ? " class=\"active\"" : "") ?>><a href="<?Php echo ($key == "./" ? "./" : "./".$key); ?>"><?Php echo $val["name"]; ?></a></li>
<?Php
		#}
	}
?>
        </ul>
      </div><!-- /.nav-collapse -->
    </div>
  </div><!-- /navbar-inner -->
</nav>
