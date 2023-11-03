<h1>Welcome to <?php echo $_settings->info('name') ?></h1>
<hr>
<?php if($_settings->userdata('type') == 1): ?>
<div class="row">
  <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-building"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total Departments</span>
        <span class="info-box-number">
          <?php 
            $department = $conn->query("SELECT * FROM department_list where delete_flag = 0")->num_rows;
            echo format_num($department);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-th-list"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Courses</span>
        <span class="info-box-number">
          <?php 
            $course = $conn->query("SELECT * FROM course_list where `status` = 0 ")->num_rows;
            echo format_num($course);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-users-cog"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Writers</span>
        <span class="info-box-number">
          <?php 
            $users = $conn->query("SELECT * FROM users where `type` = 2 ")->num_rows;
            echo format_num($users);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-6 col-md-6 col-sm-12 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-blog"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Unpublished Blogs</span>
        <span class="info-box-number">
          <?php 
            $articles = $conn->query("SELECT * FROM article_list where `status` = 0 and delete_flag = 0 ")->num_rows;
            echo format_num($articles);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
    
  <div class="col-12 col-sm-6 col-md-6 col-sm-12 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-blog"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Published Blogs</span>
        <span class="info-box-number">
          <?php 
            $articles = $conn->query("SELECT * FROM article_list where `status` = 1 and delete_flag = 0 ")->num_rows;
            echo format_num($articles);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>
<?php else: ?>
<div class="row">
  <div class="col-12 col-sm-6 col-md-6 col-sm-12 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-blog"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Unpublished Blogs</span>
        <span class="info-box-number">
          <?php 
            $articles = $conn->query("SELECT * FROM article_list where `status` = 0 and delete_flag = 0 ")->num_rows;
            echo format_num($articles);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  
  <div class="col-12 col-sm-6 col-md-6 col-sm-12 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-blog"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Published Blogs</span>
        <span class="info-box-number">
          <?php 
            $articles = $conn->query("SELECT * FROM article_list where `status` = 1 and delete_flag = 0 ")->num_rows;
            echo format_num($articles);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>
<?php endif; ?>
<div class="container">
  <?php 
    $files = array();
      $fopen = scandir(base_app.'uploads/banner');
      foreach($fopen as $fname){
        if(in_array($fname,array('.','..')))
          continue;
        $files[]= validate_image('uploads/banner/'.$fname);
      }
  ?>
  <div id="tourCarousel"  class="carousel slide" data-ride="carousel" data-interval="2500">
      <div class="carousel-inner h-100">
          <?php foreach($files as $k => $img): ?>
          <div class="carousel-item  h-100 <?php echo $k == 0? 'active': '' ?>">
              <img class="d-block w-100  h-100" style="object-fit:contain" src="<?php echo $img ?>" alt="">
          </div>
          <?php endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
</div>
