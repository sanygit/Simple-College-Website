<?php

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `cargo_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="update-status-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="status" class="control-label">Status</label>
			<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
			<option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Pending</option>
			<option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>In-Transit</option>
			<option value="2" <?php echo isset($status) && $status == 2 ? 'selected' : '' ?>>Arrive at Station</option>
			<option value="3" <?php echo isset($status) && $status == 3 ? 'selected' : '' ?>>Out for Delivery</option>
			<option value="4" <?php echo isset($status) && $status == 4 ? 'selected' : '' ?>>Delivered</option>
			</select>
		</div>
        <div class="form-group">
			<label for="remarks" class="control-label">Remarks</label>
			<textarea type="text" name="remarks" id="remarks" class="form-control form-control-sm rounded-0" required><?php echo isset($remarks) ? $remarks : ''; ?></textarea>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#update-status-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=update_cargo_type",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.reload()
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>