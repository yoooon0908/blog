<?php
    $BlogsController = new BlogsController($db, $plural_resource, $action);
    $blog_record = $BlogsController->show($id);

    $blog = mysqli_fetch_assoc($blog_record);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="../views/blog/index.css"/>
  <link rel="stylesheet" href="../views/assets/css/bootstrap.css">
  <link rel="stylesheet" href="../views/assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../views/assets/css/form.css">
  <link rel="stylesheet" href="../views/assets/css/timeline.css">
  <link rel="stylesheet" href="../views/assets/css/main.css">
</head>
<body>
    <center>

		<h2><span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
        <span id="title1"><font face="Arial Black">記事詳細</span></h2>
		<div><?php echo $blog['title']; ?></div>
		<div><?php echo $blog['body']; ?></div>
									</font>
		<?php echo '<a href="../index">一覧へ</a>' ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../views/assets/js/bootstrap.js"></script>
    <script src="../views/assets/js/form.js"></script>
    </center>
</body>
</html>


