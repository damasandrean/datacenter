     <?php include 'template/header/header.php' ?>
     <?php include 'template/body/navbar.php' ?>
     <?php include 'template/body/sidebar.php' ?>
     <?php $this->load->view($content); ?>
     <script>
          $(document).ready(function() {
               get_kegiatan();
          });


          function get_kegiatan() {
               var link = "<?php echo base_url() . $this->config->item('index_page'); ?>kegiatan/ajax_action_get_kegiatan_all";
               ajaxShowData(link, "POST", "", function(response) {
                    var html = '<tr><td>No</td><td>Nama Kegiatan</td></tr>';
                    var i;
                    for (i = 0; i < response.data.length; i++) {
                         html += "<tr><td><input type='checkbox'  class='checkSingle' id='multitype_check' value='" + response.data[i].id_kegiatan + "'>" + "</td><td>" + response.data[i].nama_kegiatan + "</td></tr>";
                    }
                    $('#list_kegiatan').html(html);
               });
          }

          function action_simpan_kegiatan() {
               message("Sek dam", "Sek ngelak", "error", "info", 1000);
          }
     </script>
     <?php include 'template/body/modal.php' ?>
     <?php include 'template/footer/footer.php' ?>