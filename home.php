
<style>
    .carousel-item>img{
        object-fit:fill !important;
    }
    #carouselExampleControls .carousel-inner{
        height:400px !important;
    }
</style>
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleControls" class="carousel slide bg-dark" data-ride="carousel" data-interval="2500">
                    <div class="carousel-inner">
                        <?php 
                            $upload_path = "uploads/banner";
                            if(is_dir(base_app.$upload_path)): 
                            $file= scandir(base_app.$upload_path);
                            $_i = 0;
                                foreach($file as $img):
                                    if(in_array($img,array('.','..')))
                                        continue;
                            $_i++;
                                
                        ?>
                        <div class="carousel-item h-100 <?php echo $_i == 1 ? "active" : '' ?>">
                            <img src="<?php echo validate_image($upload_path.'/'.$img) ?>" class="d-block w-100  h-100" alt="<?php echo $img ?>">
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
            </div>
        </div>
        <div class="clear-fix mb-4"></div>
        <!-- <div class="card card-outline card-primary rounded-0 shadow">
            <div class="card-body">
                <?= file_get_contents('welcome.html') ?>
            </div>
        </div> -->
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card card-outline card-primary rounded-0 shadow mb-3">
                    <div class="card-body lh-2">
                        <h2 class="text-center font-weight-bolder m-0">Mission</h2>
                        <center><hr class="border-primary bg-primary my-1" style="width:3vw;height:3px;opacity:1"></center>
                        <div class="my-4">
                            <?php if(is_file(base_app.'pages/default/mission.html')): ?>
                                <?= file_get_contents(base_app.'pages/default/mission.html') ?>
                            <?php else: ?>
                                    <center><small class="text-muted"><i>Content is not set yet.</i></small></center>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card card-outline card-primary rounded-0 shadow mb-3">
                    <div class="card-body lh-2">
                        <h2 class="text-center font-weight-bolder m-0">Vision</h2>
                        <center><hr class="border-primary bg-primary my-1" style="width:3vw;height:3px;opacity:1"></center>
                        <div class="my-4">
                            <?php if(is_file(base_app.'pages/default/vision.html')): ?>
                                <?= file_get_contents(base_app.'pages/default/vision.html') ?>
                            <?php else: ?>
                                    <center><small class="text-muted"><i>Content is not set yet.</i></small></center>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card card-outline card-primary rounded-0 shadow mb-3">
                    <div class="card-body lh-2">
                        <h2 class="text-center font-weight-bolder m-0">Goal</h2>
                        <center><hr class="border-primary bg-primary my-1" style="width:3vw;height:3px;opacity:1"></center>
                        <div class="my-4">
                            <?php if(is_file(base_app.'pages/default/goal.html')): ?>
                                <?= file_get_contents(base_app.'pages/default/goal.html') ?>
                            <?php else: ?>
                                    <center><small class="text-muted"><i>Content is not set yet.</i></small></center>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <?php include("./inc/aside.php") ?>
            </div>
        </div>
    </div>
</section>
<script>
    $(function(){
        $('#search-frm').submit(function(e){
            e.preventDefault();
            location.href = "./?"+$(this).serialize()
        })
    })

</script>