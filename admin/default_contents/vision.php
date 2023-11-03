<div class="content py-3">
    <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
            <h5 class="card-title"><b>Vision Content Management</b></h5>
        </div>
        <div class="card-body">
            <form action="" id="default-content-form">
                <div class="form-group">
                    <label for="vision_content" class="label-control-label">Vision Content</label>
                    <textarea name="content[vision]" id="vision_content" cols="30" rows="10" class="form-control form-control-sm rounded-0 summernote"><?= is_file(base_app.'pages/default/vision.html') ? file_get_contents(base_app.'pages/default/vision.html') : "" ?></textarea>
                </div>
            </form>
        </div>
        <div class="card-footer text-center"><button class="btn btn-primary rounded-pill btn-sm w-25" type="submit" form="default-content-form"><i class="fa fa-save"></i> Save</button></div>
    </div>
</div>
<script>
    $(function(){
        $('.summernote').summernote({
            height: "50vh",
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
        $('#default-content-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
             var el = $('<div>')
                 el.addClass("alert alert-danger err-msg")
                 el.hide()
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_default_content",
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
						location.reload()
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