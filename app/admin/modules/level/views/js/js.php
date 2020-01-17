<script type="text/javascript">
    $(document).ready(function() {
    	  var form_data = new FormData();
    	  form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
          dataTableShow("#list_akses","<?php echo base_url().$this->config->item('index_page'); ?>/level/ajax_action_datatable_level",form_data);
       get_menu();
        } );



        function get_menu(){
          var link = "<?php echo base_url().$this->config->item('index_page'); ?>level/ajax_action_get_menu";
           ajaxShowData(link,"POST","",function(response) {
            var html = '<tr><td>No</td><td>Nama Menu</td></tr>';
           var i;
            for(i=0; i<response.data.length; i++){
              html += "<tr><td><input type='checkbox'  class='checkSingle' id='multitype_check' value='"+response.data[i].id_menu+"'>"+"</td><td>"+response.data[i].menu+"</td></tr>";
            }
        $('#list_menu').html(html);
          });
        }

        function get_menu_edit(select_post){
          var link = "<?php echo base_url().$this->config->item('index_page'); ?>level/ajax_action_get_menu";
          var names_arr = select_post;
           ajaxShowData(link,"POST","",function(response) {
            var html = '<tr><td>No</td><td>Nama Menu</td></tr>';
            var i;
            for(i=0; i<response.data.length; i++){
              var id_level = response.data[i].id_menu;
              html += "<tr><td><input type='checkbox'  class='checkSingle' "+checkValue(id_level, names_arr)+" id='multitype_check' value='"+response.data[i].id_menu+"'>"+"</td><td>"+response.data[i].menu+"</td></tr>";
            }
         $('#edit_list_menu').html(html);
          });
        }

        function checkValue(value,arr){
        var status = '';
        for(var i=0; i<arr.length; i++){
          var name = arr[i];
          if(name == value){
          status = 'checked = checked';
          break;
        }
       }

  return status;
}


        function ajax_action_add_level(){
            var searchIDs = $('.checkSingle:checked').map(function(){
              return $(this).val();
             });
            $('#akses').val("["+searchIDs.get()+"]");

          var form_data = new FormData();
          form_data.append('name_level', $('#name_level').val());
          form_data.append('role', $('#akses').val());
          form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
          addItemSerialize("<?php echo base_url().$this->config->item('index_page'); ?>level/ajax_action_add_level/","POST",form_data);
          }

          function ajax_show_edit_modal(id){
           
            var link = "<?php echo base_url().$this->config->item('index_page'); ?>level/ajax_action_get_level";
            var link2 = "<?php echo base_url().$this->config->item('index_page'); ?>level/ajax_action_get_menu";
           
            var form_data = new FormData();
            form_data.append('id_level', id);
            ajaxShowData(link,"POST",form_data,function(response) {
              for(i=0; i<response.data.length; i++){
                var role =$('#edit_akses').val(response.data[0].role);
                get_menu_edit(response.data[0].role);
                var id_level =$('#edit_id_level').val(response.data[0].id_level);
                var name_level =$('#edit_name_level').val(response.data[0].name_level);
              }
                         
               
            });
           
             $('#page-load').hide();
             $('#edit-level').modal("show");       
          }

           function ajax_action_edit_level(){
            var searchIDs = $('.checkSingle:checked').map(function(){
              return $(this).val();
             });
            $('#edit_akses').val("["+searchIDs.get()+"]");

          var form_data = new FormData();
          form_data.append('name_level', $('#edit_name_level').val());
          form_data.append('role', $('#edit_akses').val());
          form_data.append('id_level', $('#edit_id_level').val());
          form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
          addItemSerialize("<?php echo base_url().$this->config->item('index_page'); ?>level/ajax_action_edit_level/","POST",form_data);
        }

          
    
</script>
