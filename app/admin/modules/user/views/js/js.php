<script type="text/javascript">
    $(document).ready(function() {
    	  var form_data = new FormData();
    	  form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
          dataTableShow("#list_admin","<?php echo base_url().$this->config->item('index_page'); ?>/user/ajax_action_datatable_admin",form_data);
        } );

 function ajax_action_add_user(){
        	var form_data = new FormData();
			form_data.append('username', $('#username').val());
			form_data.append('password', $('#password').val());
			form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
			addItemSerialize("<?php echo base_url().$this->config->item('index_page'); ?>/user/ajax_action_add_user/","POST",form_data);
        }
</script>

<script type="text/javascript">
	// Ajax Edit Admin-----------------------------------------------------
   function ajax_action_edit_user(){
          var form_data = new FormData();
          var username =$('#edit_username').val();
          var password =$('#edit_password').val();
          var id =$('#edit_id_user').val();
          form_data.append('username',username);
          form_data.append('password', password);
          form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
          addItemSerialize("<?php echo base_url().$this->config->item('index_page'); ?>user/ajax_action_edit/"+id,"POST",form_data);
            }



        function ajax_show_edit_modal(id){
          var link = "<?php echo base_url().$this->config->item('index_page'); ?>user/ajax_action_get_user/"+id;
           var form_data = new FormData();
          form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
            
          ajaxShowData(link,"POST",form_data,function(response) {
              var email =$('#edit_username').val(response.data[0].username);
              var name =$('#edit_password').val(response.data[0].password);
              var username = $('#edit_id_user').val(response.data[0].id_user);
              selected_set_kota(response.data[0].id_level);
             $('#page-load').hide();
          });
         $('#edit-user').modal("show");
          
        }
</script>

<!-- <script type="text/javascript">
    function set_level(){
       var link2 = "<?php echo base_url().$this->config->item('index_page'); ?>/level/ajax_action_get_all_level";
        $('#page-load').show();
         var form_data = new FormData();
         form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
         ajaxShowData(link2,"POST",form_data,function(response) {;
              var html = '<option value="" selected="selected">Pilih Kategori</option>';
            var i;
        for(i=0; i<response.data.length; i++){
          html += "<option value='"+response.data[i].id_level+"'>"+response.data[i].name_level+"</option>";
        }
        $('#add_admin_akses').html(html);
        $('#page-load').hide();
        });
  }
</script>
 -->
