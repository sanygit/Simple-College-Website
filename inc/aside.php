<div class="clear-fix py-5"></div>
<div class="card shadow rounded-0 shadow mb-4">
    <div class="card-header">
        <div class="card-title font-weight-bolder">Departments</div>
    </div>
    <div class="card-body">
        <div class="list-group">
            <?php 
            $dept_all = $conn->query("SELECT id FROM `department_list` where delete_flag = 0  and `status` = 1")->num_rows;
            $departments = $conn->query("SELECT * FROM  `department_list` where delete_flag = 0  and `status` = 1 order by RAND() limit 4");
            while($row = $departments->fetch_assoc()):
            ?>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action text-decoration-none text-reset"><b><?= $row['name'] ?></b></a>
            <?php endwhile; ?>
            <?php if($dept_all > 4): ?>
            <a href="./?p=departments" class="list-group-item list-group-item-action text-decoration-none text-reset"><b>See More...</b></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="card shadow rounded-0 shadow mb-4">
    <div class="card-header">
        <div class="card-title font-weight-bolder">Courses</div>
    </div>
    <div class="card-body">
        <div class="list-group">
            <?php 
            $course_all = $conn->query("SELECT id FROM `course_list` where delete_flag = 0  and `status` = 1")->num_rows;
            $courses = $conn->query("SELECT * FROM  `course_list` where delete_flag = 0  and `status` = 1 order by RAND() limit 4");
            while($row = $courses->fetch_assoc()):
            ?>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action text-decoration-none text-reset"><b><?= $row['name'] ?></b></a>
            <?php endwhile; ?>
            <?php if($course_all > 4): ?>
            <a href="./?p=courses" class="list-group-item list-group-item-action text-decoration-none text-reset"><b>See More...</b></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="card shadow rounded-0 shadow mb-4">
    <div class="card-header">
        <div class="card-title font-weight-bolder">Recent Blogs</div>
    </div>
    <div class="card-body">
        <div class="list-group">
            <?php 
            $article_all = $conn->query("SELECT id FROM `article_list` where delete_flag = 0  and `status` = 1")->num_rows;
            $articles = $conn->query("SELECT * FROM  `article_list` where delete_flag = 0  and `status` = 1 order by RAND() limit 10");
            while($row = $articles->fetch_assoc()):
            ?>
            <a href="./?p=blogs/view_blog&id=<?= $row['id'] ?>" class="list-group-item list-group-item-action text-decoration-none"><p class="text-truncate m-0"><?= $row['title'] ?></p></a>
            <?php endwhile; ?>
        </div>
    </div>
</div>