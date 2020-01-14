<script type="text/javascript">
    $(document).ready(function() {
          var form_data = new FormData();
          form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
          dataTableShow("#list_admin","<?php echo base_url().$this->config->item('index_page'); ?>/petugas/ajax_action_datatable_petugas",form_data);
        } );

 function ajax_action_add_admin(){
            var form_data = new FormData();
            form_data.append('nama_petugas', $('#nama_petugas').val());
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
            addItemSerialize("<?php echo base_url().$this->config->item('index_page'); ?>/petugas/ajax_action_add_admin/","POST",form_data);
        }
</script>

<script type="text/javascript">
    // Ajax Edit Admin-----------------------------------------------------
   function ajax_action_edit_admin(){
          var form_data = new FormData();
          var nama =$('#edit_nama_petugas').val();
          var id =$('#edit_id_petugas').val();
          form_data.append('nama_petugas',nama);
          form_data.append('id_petugas',id);
          form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
          addItemSerialize("<?php echo base_url().$this->config->item('index_page'); ?>petugas/ajax_action_edit/","POST",form_data);
        }



        function ajax_show_edit_modal(id){
          var link = "<?php echo base_url().$this->config->item('index_page'); ?>petugas/ajax_action_get_admin/"+id;
           var form_data = new FormData();
          form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
            
          ajaxShowData(link,"POST",form_data,function(response) { 
              var email =$('#edit_nama_petugas').val(response.data[0].nama_petugas);
                 var email =$('#edit_id_petugas').val(response.data[0].id_petugas);
             $('#page-load').hide();
          });
         $('#edit-petugas').modal("show");
          
        }
</script>
