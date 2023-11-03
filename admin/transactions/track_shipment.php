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
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
    <div><span class="text-muted">Shipment Ref. Code:</span> <b><?= isset($ref_code) ? $ref_code : "" ?></b></div>
	<div id="history" class="border-left border-3 pl-3">
        <?php 
        $tracks = $conn->query("SELECT * FROM `tracking_list` where cargo_id = '{$_GET['id']}' order by unix_timestamp(date_added) desc");
        while($row = $tracks->fetch_assoc()):
        ?>
        <div class="card card-default shadow rounded-0">
            <div class="card-header py-1">
                <h5 class="card-title"><b><?= $row['title'] ?></b></h5>
            </div>
            <div class="card-body">
                <div class="card-text"><?= $row['description'] ?></div>
                <div class="clear-fix"></div>
                <div class="text-right"><small class="text-muted"><em><?= date("F d, Y h:i A", strtotime($row['date_added'])) ?></em></small></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="clear-fix my-3"></div>
    <div class="text-right">
        <button class="btn btn-default border btn-flat btn-sm" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
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