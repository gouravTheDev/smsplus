<title>Best Grade Blogs</title>
<meta content="" name="descriptison">
<meta content="" name="keywords">

<?php include '_menu.php'; ?>
<style type="text/css">
  .hoveryellow :hover {
    color: #f4c811;
  }
</style>
<main id="main">
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Blogs</h2>
      <ol>
        <li><a href="/">Home</a></li>
        <li>blogs</li>
      </ol>
    </div>

  </div>
</section>
<?php 
  $sql = "SELECT * FROM BLOGS ORDER BY ID DESC";
  $result = mysqli_query($link, $sql);
?>
<section id="blog" class="blog">
  <div class="container">
    <div class="row">
      <?php 
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
            $blogId = $row['BLOG_ID'];
            $slug = $row['SLUG'];
            $title = $row['TITLE'];
            $image = $row['IMAGE'];
            $altTag = $row['ALT_TAG'];
            $meta = $row['META'];
      ?>
      <div class="col-lg-4 col-md-6 col-sm-12 entries">
        <div class="card shadow mb-3" style="width:100%;border:none; border-bottom: 5px solid #f4c811;  cursor: pointer; height: 480px;">
          <a href="<?php echo $slug; ?>">
            <img src="<?php echo BLOGPANEL; ?>/CDN/BLOGS/<?php echo $blogId; ?>/<?php echo $image; ?>" alt="<?php echo $altTag; ?>" loading="lazy" style="height:250px; width:100%;">
          </a>
          <div style="height:250px;" class="card-body">
            <a style="color: black;" class="hoveryellow" href="<?php echo $slug; ?>"><h3 class="" style="text-decoration:none; font-weight:bold;"><?php echo $title; ?></h3></a>
            <a href="<?php echo $slug; ?>"><p style="color: black;"><?php echo substr($meta,0,80); ?>...</p></a>
          </div>
          <div class="card-footer text-right" style="border:none; background: #fff;">
            <a href="<?php echo $slug; ?>" style="position:relative; margin-bottom:10px;" class="btn btn-warning">Read More</a>
          </div>
        </div>
      </div>
      <?php }
        }else{ ?>
          <div class="alert alert-warning font-weight-bold text-center">Blog Posts are coming</div>
    <?php } ?>    
    </div>
  </div>
</section>
</main>