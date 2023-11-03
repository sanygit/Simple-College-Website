<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
	function delete_img(){
		extract($_POST);
		if(is_file($path)){
			if(unlink($path)){
				$resp['status'] = 'success';
			}else{
				$resp['status'] = 'failed';
				$resp['error'] = 'failed to delete '.$path;
			}
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = 'Unkown '.$path.' path';
		}
		return json_encode($resp);
	}
	function save_default_content(){
		extract($_POST);
		if(isset($content)){
			foreach($content as $k => $v){
				$status = file_put_contents(base_app."pages/default/{$k}.html",$v);
				if(!$status)
				break;
			}
			if($status){
				$resp['status'] = 'success';
				$resp['msg'] = ' Default Page Content Successfully Updated.';
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = ' Default Page Content has failed to updated.';
			}
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = ' No Default Content Data Sent.';
		}
		if($resp['status'] == 'success')
		$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}

	function save_department(){
		extract($_POST);
		$data = "";
		$check = $this->conn->query("SELECT * FROM `department_list` where `name` = '{$name}' and delete_flag = 0 ".(isset($id) ? " and id != '{$id}'" : "" ))->num_rows;
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Department Name already exists.";
		}else{
			foreach($_POST as $k => $v){
				if(!in_array($k,['id']) && !is_array($_POST[$k])){
					if(!empty($data)) $data .=", ";
					$v = $this->conn->real_escape_string($v);
					$data .= "`{$k}` = '{$v}'";
				}
			}
			if(empty($id) && !is_numeric($id)){
				$sql = "INSERT INTO `department_list` set {$data}";
			}else{
				$sql = "UPDATE `department_list` set {$data} where id = '{$id}'";
			}
			$save = $this->conn->query($sql);
			if($save){
				$did = empty($id) ? $this->conn->insert_id : $id;
				$resp['status'] = 'success';
				if(empty($id))
					$resp['msg'] = " New Department successfully added.";
				else
					$resp['msg'] = " Department's Details has been updated successfully.";
			}else{
				$resp['status'] = 'failed';
				if(empty($id))
					$resp['msg'] = " New Department has failed to save.";
				else
					$resp['msg'] = " Department's Details has failed to update.";
				$resp['error'] = $this->conn->error;

			}
		}
		
		if(isset($resp['status']) && $resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);

		return json_encode($resp);
	}
	function delete_department(){
		extract($_POST);
		$update = $this->conn->query("UPDATE `department_list` set delete_flag = 1 where id = '{$id}'");
		if($update){
			$resp['status'] = 'success';
			$resp['msg'] = ' Department has been deleted successfully.';
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = ' Department has failed to delete.';
			$resp['error'] = $this->conn->error;
		}

		if(isset($resp['status']) && $resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function save_course(){
		extract($_POST);
		$data = "";
		$check = $this->conn->query("SELECT * FROM `course_list` where `name` = '{$name}' and `department_id` = '{$department_id}' and delete_flag = 0 ".(isset($id) ? " and id != '{$id}'" : "" ))->num_rows;
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Course Name already exists on the selected Department.";
		}else{
			foreach($_POST as $k => $v){
				if(!in_array($k,['id']) && !is_array($_POST[$k])){
					if(!empty($data)) $data .=", ";
					$v = $this->conn->real_escape_string($v);
					$data .= "`{$k}` = '{$v}'";
				}
			}
			if(empty($id) && !is_numeric($id)){
				$sql = "INSERT INTO `course_list` set {$data}";
			}else{
				$sql = "UPDATE `course_list` set {$data} where id = '{$id}'";
			}
			$save = $this->conn->query($sql);
			if($save){
				$did = empty($id) ? $this->conn->insert_id : $id;
				$resp['status'] = 'success';
				if(empty($id))
					$resp['msg'] = " New Course successfully added.";
				else
					$resp['msg'] = " course's Details has been updated successfully.";
			}else{
				$resp['status'] = 'failed';
				if(empty($id))
					$resp['msg'] = " New Course has failed to save.";
				else
					$resp['msg'] = " course's Details has failed to update.";
				$resp['error'] = $this->conn->error;

			}
		}
		
		if(isset($resp['status']) && $resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);

		return json_encode($resp);
	}
	function delete_course(){
		extract($_POST);
		$update = $this->conn->query("UPDATE `course_list` set delete_flag = 1 where id = '{$id}'");
		if($update){
			$resp['status'] = 'success';
			$resp['msg'] = ' Course has been deleted successfully.';
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = ' Course has failed to delete.';
			$resp['error'] = $this->conn->error;
		}

		if(isset($resp['status']) && $resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function save_article(){
		if(empty($id)){
			$_POST['user_id'] = $this->settings->userdata('id');
		}
		if(!isset($_POST['status'])){
			$_POST['status'] = 0;
		}
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k,['id','content','content']) && !is_array($_POST[$k])){
				if(!empty($data)) $data .=", ";
				$v = $this->conn->real_escape_string($v);
				$data .= "`{$k}` = '{$v}'";
			}
		}
		if(empty($id) && !is_numeric($id)){
			$sql = "INSERT INTO `article_list` set {$data}";
		}else{
			$sql = "UPDATE `article_list` set {$data} where id = '{$id}'";
		}
		$save = $this->conn->query($sql);
		if($save){
			$aid = empty($id) ? $this->conn->insert_id : $id;
			$resp['aid'] = $aid;
			$resp['status'] = 'success';
			if(empty($id))
				$resp['msg'] = " New Article successfully added.";
			else
				$resp['msg'] = " Article's Details has been updated successfully.";
			if(empty($content_path)){
				if(!is_dir(base_app.'pages/articles'))
				mkdir(base_app.'pages/articles');
				$fname = strtolower(str_replace(["/"," "],"_",$title));
				$i = 0;
				while(true){
					if(is_file(base_app.'pages/articles/'.$fname.($i > 0 ? "_".$i : "").'.html')){
						$i++;
					}else{
						$fname ='pages/articles/'.$fname.($i > 0 ? "_".$i : "").'.html';
						break;
					}
				}
			}else{
				$fname = $content_path;
			}
			$save_content = file_put_contents(base_app.$fname,$content);
			if(!$save_content){
				if(!empty($id)){
					$resp['msg'] = " Article's Details has been updated successfully but content has failed.";
				}else{
					$resp['status'] = 'failed';
					$resp['msg'] = " Article has failed to add due to an error occurred while saving the content file.";
					$this->conn->query("DELETE FROM `article_list` where id = '{$aid}'");
				}
			}else{
			$this->conn->query("UPDATE `article_list` set content_path = '{$fname}' where id = '{$aid}' ");
			}
		}else{
			$resp['status'] = 'failed';
			if(empty($id))
				$resp['msg'] = " New Article has failed to save.";
			else
				$resp['msg'] = " Article's Details has failed to update.";
			$resp['error'] = $this->conn->error;

		}
		if(isset($resp['status']) && $resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);

		return json_encode($resp);
	}
	function delete_article(){
		extract($_POST);
		$update = $this->conn->query("UPDATE `article_list` set delete_flag = 1 where id = '{$id}'");
		if($update){
			$resp['status'] = 'success';
			$resp['msg'] = ' Article has been deleted successfully.';
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = ' Article has failed to delete.';
			$resp['error'] = $this->conn->error;
		}

		if(isset($resp['status']) && $resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function save_contact(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			$k = $this->conn->real_escape_string($k);
			$v = $this->conn->real_escape_string($v);
			if(!empty($data)) $data .= ", ";
			$data .= "('{$k}','{$v}')";
		}
		if(!empty($data)){
			$this->conn->query("DELETE FROM `system_info` where meta_field in ('".implode("','",array_keys($_POST))."')");
			$sql = "INSERT INTO `system_info` (`meta_field`, `meta_value`) VALUES {$data}";
			$save = $this->conn->query($sql);
			if($save){
				$resp['status'] = 'success';
				$resp['msg'] = ' School Contact Information has been updated';
				foreach($_POST as $k=> $v){
					$this->settings->set_info($k, $v);
				}
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = " School Contact Information has failed to update.";
				$resp['error'] = $this->conn->error;
 			}
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = " No Post data that been sent.";
		}
		if(isset($resp['status']) && $resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'delete_img':
		echo $Master->delete_img();
	break;
	case 'save_default_content':
		echo $Master->save_default_content();
	break;
	case 'save_department':
		echo $Master->save_department();
	break;
	case 'delete_department':
		echo $Master->delete_department();
	break;
	case 'save_course':
		echo $Master->save_course();
	break;
	case 'delete_course':
		echo $Master->delete_course();
	break;
	case 'save_article':
		echo $Master->save_article();
	break;
	case 'delete_article':
		echo $Master->delete_article();
	break;
	case 'save_contact':
		echo $Master->save_contact();
	break;
	default:
		// echo $sysset->index();
		break;
}