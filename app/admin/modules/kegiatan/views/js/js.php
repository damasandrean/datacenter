<script type="text/javascript">
  $(document).ready(function() {
    var form_data = new FormData();
    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
    dataTableShow("#list_admin", "<?php echo base_url() . $this->config->item('index_page'); ?>/kegiatan/ajax_action_datatable_kegiatan", form_data);
    get_kegiatan();
  });


  function get_kegiatan() {
    var link = "<?php echo base_url() . $this->config->item('index_page'); ?>kegiatan/ajax_action_get_kegaitan_all";
    ajaxShowData(link, "POST", "", function(response) {
      var html = '<tr><td>No</td><td>Nama Kegiatan</td></tr>';
      var i;
      for (i = 0; i < response.data.length; i++) {
        html += "<tr><td><input type='checkbox'  class='checkSingle' id='multitype_check' value='" + response.data[i].id_menu + "'>" + "</td><td>" + response.data[i].menu + "</td></tr>";
      }
      $('#list_kegiatan').html(html);
    });
  }

  function ajax_action_add_kegiatan() {
    var form_data = new FormData();
    form_data.append('nama_kegiatan', $('#nama_kegiatan').val());
    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
    addItemSerialize("<?php echo base_url() . $this->config->item('index_page'); ?>/kegiatan/ajax_action_add_kegiatan/", "POST", form_data);
  }
</script>

<script type="text/javascript">
  // Ajax Edit Admin-----------------------------------------------------
  function ajax_action_edit_kegiatan() {
    var form_data = new FormData();
    var nama_kegiatan = $('#edit_kegiatan').val();
    var id = $('#edit_id_kegiatan').val();
    form_data.append('nama_kegiatan', nama_kegiatan);
    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
    addItemSerialize("<?php echo base_url() . $this->config->item('index_page'); ?>kegiatan/ajax_action_edit/" + id, "POST", form_data);
  }



  function ajax_show_edit_modal(id) {
    var link = "<?php echo base_url() . $this->config->item('index_page'); ?>kegiatan/ajax_action_get_kegiatan/" + id;
    var form_data = new FormData();
    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');

    ajaxShowData(link, "POST", form_data, function(response) {
      var email = $('#edit_kegiatan').val(response.data[0].nama_kegiatan);
      var username = $('#edit_id_kegiatan').val(response.data[0].id_kegiatan);
      $('#page-load').hide();
    });
    $('#edit-kegiatan').modal("show");

  }
</script>