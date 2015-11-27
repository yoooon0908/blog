<?php
    $BlogsController = new BlogsController($db, $plural_resource);
    $blog = $BlogsController->_new($_POST);
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
<!--   <title></title> -->
  <link rel="stylesheet" type="text/css" href="../views/blog/index.css"/>
  <link rel="stylesheet" href="../views/assets/css/bootstrap.css">
  <link rel="stylesheet" href="../views/assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../views/assets/css/form.css">
  <link rel="stylesheet" href="../views/assets/css/timeline.css">
  <link rel="stylesheet" href="../views/assets/css/main.css">
</head>
<body>
  <center>
  <div>
  <form action="" method="post">
    <div>
      <h4><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span><font face="Arial Black">タイトル</font></h4>
      <input type="text" name="title" style="width:400px" placeholder="タイトルを入力してください">
    </div>
    <div>
      <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span><font face="Arial Black"> 内容
          <span class="glyphicon glyphicon-minus" aria-hidden="true"></span></font></h4>
    
    <select name="category_id">
    <?php while ($category = mysqli_fetch_assoc($blog['categories'])): ?>
    <option value="<?php echo $category['id']; ?>"<?php if($blog['blog']['category_id']== $category['id']);?>><?php echo $category['title']; ?></option>
    <?php endwhile; ?>
    </select>

        <!-- <option>恋愛</option>
      <option value="2">料理</option>
      <option value="3">生活・ライフスタイル</option>
      <option value="4">スマホ・携帯</option> -->

    <br />
    <br />

      <textarea name="body" style="width:400px" rows="10" ></textarea>
    </div>
    <br />
    <div>
      <input type="submit" class="btn btn-primary btn-info" style="width:400px"value="記事投稿">
    </div>
  </form>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../views/assets/js/bootstrap.js"></script>
    <script src="../views/assets/js/form.js"></script>
  </center>
</body>
</html>
