<script type="text/javascript">
  $(document).ready(function() {
    var form_data = new FormData();
    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
    dataTableShow("#list_admin", "<?php echo base_url() . $this->config->item('index_page'); ?>/user/ajax_action_datatable_admin", form_data);

    var link2 = "<?php echo base_url() . $this->config->item('index_page'); ?>level/ajax_action_get_all_level";
    var form_data = new FormData();
    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
    ajaxShowData(link2, "POST", form_data, function(response) {
      var html = '<option value="" selected="selected">Pilih Akses Admin</option>';
      var i;
      for (i = 0; i < response.data.length; i++) {
        html += "<option value='" + response.data[i].id_level + "'>" + response.data[i].name_level + "</option>";
      }
      $('#edit_select_level').html(html);
      $('#select_level').html(html);
    });

  });

  function ajax_action_add_user() {
    var form_data = new FormData();
    form_data.append('username', $('#username').val());
    form_data.append('password', $('#password').val());
    form_data.append('id_level', $('#select_level :selected').val());
    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
    addItemSerialize("<?php echo base_url() . $this->config->item('index_page'); ?>/user/ajax_action_add_user/", "POST", form_data);
  }
</script>

<script type="text/javascript">
  // Ajax Edit Admin-----------------------------------------------------
  function ajax_action_edit_user() {
    var form_data = new FormData();
    var username = $('#edit_username').val();
    var password = $('#edit_password').val();
    var id = $('#edit_id_user').val();
    form_data.append('username', username);
    form_data.append('password', password);
    form_data.append('id_level', $('#edit_select_level :selected').val());
    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
    addItemSerialize("<?php echo base_url() . $this->config->item('index_page'); ?>user/ajax_action_edit/" + id, "POST", form_data);
  }



  function ajax_show_edit_modal(id) {
    var link = "<?php echo base_url() . $this->config->item('index_page'); ?>user/ajax_action_get_user/" + id;
    var form_data = new FormData();
    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');

    ajaxShowData(link, "POST", form_data, function(response) {
      var email = $('#edit_username').val(response.data[0].username);
      var username = $('#edit_id_user').val(response.data[0].id_user);
      $("#edit_select_level option[value='" + response.data[0].level + "']").attr('selected', 'selected');
      $('#page-load').hide();
    });
    $('#edit-user').modal("show");

  }
</script>