<?php $path=base_url(); ?>
<li><a href='<?php echo $path; ?>index.php/home/index'><i class='fa fa-home fa-fw'></i>&nbsp;Home</a></li>
<?php

	$row=$this->session->userdata('user_session');
	if (isset($row)) {
		$menu=$this->session->userdata('menu_session');
		if (isset($menu)) {
			foreach ($menu as $key => $value) {
				echo "<li><a href='".$path ."index.php$value->href'><i class='fa $value->icon fa-fw'></i>&nbsp;$value->menu_name</a></li>";
			}
		}else {
			echo "<script>window.location.href='".$path."index.php/home/index'</script>";
		}
	}else {
		echo "<script>window.location.href='".$path."index.php/home/index'</script>";
	}
	
?>