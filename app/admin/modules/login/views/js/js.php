<script type="text/javascript">
	function login(){
		 var username = $('#username').val();
         var password = $('#password').val();
		  var link = "<?php echo base_url().$this->config->item('index_page'); ?>/login/ajax_action_login/";
           var form_data = new FormData();
              form_data.append('username', username);
              form_data.append('password', password);
          	  form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
            
          ajaxShowData(link,"POST",form_data,function(response) {
           	if(response.result){
           		 message("Selamat", response.message.body, "success", "info",1000);
               setTimeout(function() {
                    window.location = response.redirect
                }, 500);
           	}else{
           		 message("Mohon Maaf", response.message.body, "error", "info",1000);
           	}
             $('#page-load').hide();
          });
	}
</script>

<script type="text/javascript">
   $('#page-load').hide();
</script>