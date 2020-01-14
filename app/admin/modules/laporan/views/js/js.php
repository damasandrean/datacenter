<script type="text/javascript">
  $(function() {
      var form_data = new FormData();
    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
          dataTableShow("#list_mutasi","<?php echo base_url().$this->config->item('index_page'); ?>/mutasi/ajax_action_datatable_mutasi",form_data);
  });
</script>

