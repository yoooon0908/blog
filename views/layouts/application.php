<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>nsfw - シンプルフレームワーク</title>
  <link rel="stylesheet" type="text/css" href="/blog/views/blog/index.css"/>
  <link rel="stylesheet" href="/blog/views/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/blog/views/assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/blog/views/assets/css/form.css">
  <link rel="stylesheet" href="/blog/views/assets/css/timeline.css">
  <link rel="stylesheet" href="/blog/views/assets/css/main.css">
</head>
<body>
    <div id="header"> 
    <br />
    <h1><span id="title"><font face="Arial Black">Blogシステムテスト
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span></font></h1>
  	<br />
    </br>
    </div>
	  <?php
	      // require()関数と同じく、指定したパスのファイルを読み込む
	      include('./views/' . $resource . '/' . $action . '.php');
	      // URLが /blog/indexの場合
	      // ./views/blog/index.php
	  ?>
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../views/assets/js/bootstrap.js"></script>
    <script src="../views/assets/js/form.js"></script>
</body>
</html>


