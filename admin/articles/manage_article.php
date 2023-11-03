<?php 
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `article_list` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        foreach($qry->fetch_array() as $k => $v){
            $$k = $v;
        }
    }
}
?>
<div class="content py-3">
    <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
            <h5 class="card-title"><b><?= isset($id) ? "Update Article" : "New Article" ?></b></h5>
        </div>
        <div class="card-body">
            <form action="" id="article-form">
                <input type="hidden" name="id" value="<?= isset($id) ? $id : "" ?>">
                <input type="hidden" name="content_path" value="<?= isset($content_path) ? $content_path : "" ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control form-control-sm rounded-0" name="title" value="<?= isset($title) ? $title : "" ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="short_description" class="control-label">Summary</label>
                            <textarea rows="5" class="form-control form-control-sm rounded-0" name="short_description" required><?= isset($short_description) ? $short_description : "" ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="content" class="label-control-label">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control form-control-sm rounded-0 summernote"><?= isset($content_path) && !empty($content_path) && is_file(base_app.$content_path) ? file_get_contents(base_app.$content_path) : "" ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="status" value="1" name="status" <?= isset($status) && $status == 1 ? "checked" : (!isset($status) ? 'checked' : "") ?>>
                          <label for="status" class="custom-control-label">Publish Article</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-center"><button class="btn btn-primary rounded-pill btn-sm w-25" type="submit" form="article-form"><i class="fa fa-save"></i> Save</button></div>
    </div>
</div>
<script>
    $(function(){
        $('.summernote').summernote({
            height: "30vh",
            toolbar: [
                [ 'style', [ 'style' ] ],
                [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ],
                [ 'fontsize', [ 'fontsize' ] ],
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                [ 'table', [ 'table' ] ],
                [ 'insert', [ 'picture', 'video', 'link' ] ],
                [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
            ]
        })
        $('#article-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
             var el = $('<div>')
                 el.addClass("alert alert-danger err-msg")
                 el.hide()
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_article",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.error(err)
                    el.text("An error occured",'error');
                    _this.prepend(el)
                    el.show('slow')
                    $("html, body").scrollTop(0);
					end_loader();
                    $("html, body").scrollTop(0);
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
                        el.removeClass("alert alert-danger err-msg")
						location.replace("./?page=articles/view_article&id="+resp.aid)
					}else if(resp.status == 'failed' && !!resp.msg){
                            el.text(resp.msg)
                    }else{
						el.text("An error occured",'error');
						end_loader();
                        console.err(resp)
					}
                    _this.prepend(el)
                    el.show('slow')
                    $("html, body").scrollTop(0);
                    end_loader()
				}
			})
		})
    })
</script>