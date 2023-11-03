
<div class="content py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2 class="text-center font-weight-bolder m-0">Courses</h2>
                <center><hr class="border-primary bg-primary my-1" style="width:3vw;height:3px;opacity:1"></center>
                <div class="card card-outline card-primary rounded-0 shadow">
                    <div class="card-body">
                        <?php 
                            $dwhere = "";
                            if(isset($_GET['department_id'])){
                                $dwhere = " and id = '{$_GET['department_id']}'";
                            }
                            $departments = $conn->query("SELECT * FROM `department_list` where delete_flag = 0 and `status` = 1 {$dwhere} order by `name` asc");
                            while($drow = $departments->fetch_assoc()):
                        ?>
                        <h3 class="font-weight-bolder"><?= $drow['name'] ?></h3>
                        <hr>
                        <div class="my-2 list-group ml-5">
                            <?php 
                        
                            $courses = $conn->query("SELECT c.*, d.name as department FROM `course_list` c inner join department_list d on c.department_id = d.id where c.delete_flag = 0 and c.`status` = 1 and c.department_id = '{$drow['id']}' order by c.`name` asc");
                            while($row = $courses->fetch_assoc()):
                            ?>
                            <div class="list-group-item">
                                <h3><b><?= $row['name'] ?></b></h3>
                                <hr>
                                <small class="text-muted">Department: <?= $row['department'] ?></small><br>
                                <p class="mt-2"><?= $row['description'] ?></p>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <?php if($courses->num_rows <= 0): ?>
                                <center><span class="text-muted"><b><i>No Course Listed on this Department</i></b></span></center>
                        <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <?php include("./inc/aside.php") ?>
            </div>
        </div>
        
    </div>
</div>