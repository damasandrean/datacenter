<?php
	/*#### Security For Login ####*/
	if(!function_exists('session_check')) {
	function session_check(){
		$CI = &get_instance();
		 if($CI->uri->segment(1) == "cronjob"){
					echo "oke";
				}else{
					if(!($CI->session->userdata('id'))) {
			    if($CI->uri->segment(1) != "login")	{
					return redirect('login');
			}
		}
				}
		
	}
}
?>