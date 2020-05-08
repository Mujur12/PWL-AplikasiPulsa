<?php

function isLogin(){
	$ci = &get_instance();
	if(!$ci->session->userdata('is_login_pwl')){
		redirect("login");
	}
}
