<?php
    // BlogsControllerのindexを呼び出す
    $BlogsController = new BlogsController($db, $plural_resource);
    if(!isset($id)){
      $id = null;
    }
    $blogs = $BlogsController->index($id);

    //カテゴリーデータをすべて配列に保存しておく
    while ($category = mysqli_fetch_assoc($blogs['categories'])):
      //配列として1データずつ追加保存
      $categories[]=$category;
    endwhile;
    
    $title = '記事一覧';

    foreach ($categories as $cat_each) {
      if ($cat_each['id'] == $id){
        $title = $cat_each['title'].'の記事の一覧';
        break;
      }
    }

    //ページング
    //ページ番号を取得する
    $page = $_REQUEST['page'];
      if ($page == '') {
        $page = 1
      }

      $page = max($page,1);
      //最終ページ番号を取得する
      while ($blog_each = mysqli_fetch_assoc($blogs['blogs'])):
      //配列として1データずつ追加保存
      $blog_array[]=$blog_each;
      $cnt++;
      endwhile;

       $maxPage = ceil($cnt / 5);
       $page = min($page, $maxPage);

       $start = ($page - 1) * 5;
       $start = max(0, $start);

       $blog_for_display = array();
       //表示したいブログ記事だけを抽出する
       $end = $start+5;
       for ($i=$start; $i < $end; $i++) {
        $blog_for_display[]=$blog_array[$i];
       }


// $page = $_REQUEST['page'];
//   if ($page == '') {
//     $page = 1;
//   }
//   $page = max($page, 1);

//   //最終ページを取得する
      //今データが何個あるのか調べる
//   $sql = 'SELECT COUNT(*) AS cnt FROM posts';
//   $recordSet = mysqli_query($db, $sql);
//   $table = mysqli_fetch_assoc($recordSet);
//   //($table['cnt'])が61件のデータが入っている
//   //ceil（数字）少数の切り上げ
//   //$maxPageには13ページ入っているとわかる
//   $maxPage = ceil($table['cnt'] / 5);
//   $page = min($page, $maxPage);
//   //$startどこからデータを取得しようか、取得開始の番号を決める（０番目から５行取得する）ページの開始番号を割り出す計算式
//   //p3の計算式（３−１）＊５＝１０
//   $start = ($page - 1) * 5;
//   $start = max(0, $start);
//   //投稿を取得し、取得件数を返す
//   //delete_flag = 0 データをもってくる
//   $sql = sprintf('SELECT b.title, c.* FROM blogs m, posts p WHERE m.id=p.member_id AND p.delete_flag=0 ORDER BY p.created DESC LIMIT %d, 5',
//     $start
//     );
//   $posts = mysqli_query($db, $sql) or die (mysqli_error($db));

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
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
        <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="location.href='/blog/blog/index?search='+document.getElementById('search_text').value;">検索</button>
        <input type="text" id="search_text" class="form-control" placeholder="Search for...">
        </div>
         </span>
      </form>

    <div class="row">
    <div class="col-md-8">
    <div align="center">
       <h2><!-- <span class="glyphicon glyphicon-play" aria-hidden="true"></span> -->
    <font face="Arial Black"><?php echo $title; ?></font></h2>
  
    <br />
    <div>
      <!-- <a href="new">記事作成</a> -->
      <button type="button" class="btn btn-default" style="width:100px" ><?php echo link_to('/blog/blog/new', '記事作成'); ?></button>
    </div>
    <br />
    <br />
    <br />

      <?php foreach ($blog_for_display as $blog_each){ ?>
        <div class="well well-lg">
          <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><?php echo $blog_each['title']; ?> :
          <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <!-- <div class="btn-group" role="group"> -->
              <button type="button" class="btn btn-default" style="width:200px" ><?php echo link_to('/blog/blog/show/' . $blog_each['id'], '詳細'); ?></button>
           <!--  </div> -->
            <!-- <div class="btn-group" role="group"> -->
              <button type="button" class="btn btn-default" style="width:200px" ><?php echo link_to('/blog/blog/edit/' . $blog_each['id'], '編集'); ?></button>
           <!--  </div> -->
            <!-- <div class="btn-group" role="group"> -->
              <button type="button" class="btn btn-default" style="width:200px" ><?php echo link_to('/blog/blog/delete/' . $blog_each['id'], '削除'); ?></button>
           <!--  </div> -->
            </div>
          </div>
      <?php } ?>
    </div>
    
       <!--  <p>ライフレシピのカテゴリ一覧</p> -->
    <br />
    <br />

    </div>
    <!-- center -->
       <span id="border">
     
        <ul style="list-style:none;">
           <?php foreach ($categories as $cat_each) {?>
          <li>
            <!-- リンク２箇所,タイトル -->
            <?php echo link_to('/blog/blog/index/' . $cat_each['id'], $cat_each['title']); ?>
           
          </li>
          <?php } ?>
          </div>

    </div> 
  </div>
</div>
<!-- 
<div align="center">
<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>
<br />
<br />
<br />

 -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../views/assets/js/bootstrap.js"></script>
    <script src="../views/assets/js/form.js"></script>
</body>
</html>











