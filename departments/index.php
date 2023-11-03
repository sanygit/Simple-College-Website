
<div class="content py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2 class="text-center font-weight-bolder m-0">Departments</h2>
                <center><hr class="border-primary bg-primary my-1" style="width:3vw;height:3px;opacity:1"></center>
                <div class="my-2 list-group">
                    <?php 
                    $departments = $conn->query("SELECT * FROM `department_list` where delete_flag = 0 and `status` = 1 order by `name` asc");
                    while($row = $departments->fetch_assoc()):
                    ?>
                    <div class="list-group-item">
                        <h3><b><?= $row['name'] ?></b></h3>
                        <hr>
                        <p><?= $row['description'] ?></p>
                        <div class="text-right">
                            <a href="./?p=courses&department_id=<?= $row['id'] ?>">List Courses</a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                
                <?php if($departments->num_rows <= 0): ?>
                    <center><span class="text-muted"><b><i>Department List is Empty</i></b></span></center>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <?php include("./inc/aside.php") ?>
            </div>
        </div>
        
    </div>
</div>