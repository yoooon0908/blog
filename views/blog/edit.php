<?php
    $BlogsController = new BlogsController($db, $plural_resource);
    $blog = $BlogsController->edit($id, $_POST);
    //var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
 <!--  <title></title> -->
  <link rel="stylesheet" type="text/css" href="../views/blog/index.css"/>
  <link rel="stylesheet" href="../views/assets/css/bootstrap.css">
  <link rel="stylesheet" href="../views/assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../views/assets/css/form.css">
  <link rel="stylesheet" href="../views/assets/css/timeline.css">
  <link rel="stylesheet" href="../views/assets/css/main.css">
</head>
<body>
  <center>
    <br />
    <br />
    <br />
    <br />
    <div>
  <form action="" method="post">
    <div>
      <input type="text" name="title" style="width:400px" value="<?php echo $blog['blog']['title']; ?>">
    </div>
    <br />

    <select name="category_id">
      <!-- $blogでデータを取り出す -->
      <?php while ($category = mysqli_fetch_assoc($blog['categories'])): ?>
      <option value="<?php echo $category['id']; ?>"<?php if($blog['blog']['category_id']== $category['id'] ){echo 'selected';}?>><?php echo $category['title']; ?></option>
      <?php endwhile; ?>
     


   <!--  <option value="2"> -->
      <?php //if($categories['id']==2){echo $categories['title'];} ?><?php //if($blog['category_id']==2){echo 'selected';}?><!-- </option> -->
    <!-- <option value="3"> -->
      <?php //if($categories['id']==3){echo $categories['title'];} ?><?php //if($blog['category_id']==3){echo 'selected';}?><!-- </option> -->
   <!--  <option value="4"> -->
      <?php //if($categories['id']==4){echo $categories['title'];} ?><?php //if($blog['category_id']==4){echo 'selected';}?><!-- </option> -->
   
    </select>
    <br />
    <br />

    <div>
      <textarea name="body" style="width:400px" rows="10" ><?php echo $blog['blog']['body']; ?></textarea>
    </div>

    <div>
       <input type="submit" class="btn btn-primary btn-info" style="width:400px"value="編集完了">
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

















