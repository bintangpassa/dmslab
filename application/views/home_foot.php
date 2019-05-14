        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Okananda Rizky Perdana</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "Logout" jika anda ingin logout</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/dms/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>css/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>css/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(); ?>css/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>css/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>css/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>js/sb-admin.min.js"> </script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url(); ?>js/demo/datatables-demo.js"></script>
    <script src="<?php echo base_url(); ?>js/passa_admin.js"></script>
    <!-- <script src="<?php echo base_url(); ?>js/demo/chart-area-demo.js"></script> -->

    <script type="text/javascript">
      <?php  if($npage=="buat_akun"){ ?>
         /*From menambah user*/
        /* Untuk mencek inputan user*/
        var valid_username=false,
            valid_email=false,
            valid_full_name=false,
            valid_password=false,
            valid_repassword=false,
            valid_nipnim=false,
            ajax_request=false;

        /*username*/
        $(".form-user-baru input#username").blur(function(){
          var userval=$(this).val();
          var p=$(this);
          if(userval!=''){
            if(/^[\w]+$/.test(userval)){
            if(userval.length>2){
            $.ajax({
              type:"POST",
              url:"<?php echo base_url();?>index.php/Ajax/cek_new_username",
              data:{username:userval},
              cache:false,
              success:function(a){
                if(a=='ok' && userval.length>2){
                 p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
                  p.parent().siblings('span.label-danger').html("");
                  valid_username=true;
                 
                }
                else if(a=='terpakai') {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Username ini sudah terpakai');
                   valid_username=false;
                }
              }
            });
            }
            else {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Harus minimal 3 karakter');
                   valid_username=false;
            }
          }
          else {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Karakter hanya diperbolehkan huruf/kata/underscore, dan jgn ada spasi');
                   valid_username=false;
          }
          }else{
             p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Tidak boleh kosong');
                   valid_username=false;
          }
        })
      /*email*/
      $(".form-user-baru input#email").on("blur keyup",function(){
        var mailval=$(this).val();
        var z=$(this);
        if(/^[\w-.]+@[0-9a-zA-Z_.]+\.[0-9a-zA-Z_.]+$/.test(mailval)){
           z.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           z.parent().siblings('span.label-danger').html("");
           valid_email=true;
                 
                }
         else {
           z.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           z.parent().siblings('span.label-danger').html('Format email tidak benar');
           valid_email=false;
        }
      });

      $(".form-user-baru input#nama_lengkap").on("blur keyup",function(){
        var namavall=$(this).val();
        var zz=$(this);
        if(namavall!=''){
          if(/^\w[\w\s]+$/.test(namavall)){
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           zz.parent().siblings('span.label-danger').html('');
           valid_full_name=true;
          } else {
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Hanya diperbolehkan huruf/angka/underscore/spasi. Dan jg ada spasi di awal');
           valid_full_name=false;
          }
        } else {
           zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_full_name=false;
        }
      });

      $(".form-user-baru input#password").on("blur keyup",function(e){
        if(e.type='keyup'){
          $(".form-user-baru input#repassword").val('').siblings('.form-control-feedback').attr('class','form-control-feedback');
           valid_repassword=false;
        }
        var passvall=$(this).val();
        var yy=$(this);
        if(passvall!=''){
          if(passvall.length>=8){
            yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           yy.parent().siblings('span.label-danger').html('');
           valid_password=true;
          }else{
            yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yy.parent().siblings('span.label-danger').html('Minimal 8 karakter');
           valid_password=false;
          }
        } else {
          yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yy.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_password=false;
        }
      });
      
      $(".form-user-baru input#repassword").on("blur keyup",function(e){
        var repass=$(this).val();
        var yyy=$(this);
        var passbef=$(".form-user-baru input#password").val();
        
        if(repass==passbef){
           yyy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           yyy.parent().siblings('span.label-danger').html('');
           valid_repassword=true;
        } else {
           yyy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yyy.parent().siblings('span.label-danger').html('Password tidak sama');
           valid_repassword=false;
        }
      });

      $(".form-user-baru input#nipnim").on("blur keyup",function(){
        var nipnimvall=$(this).val();
        var nzz=$(this);
        if(nipnimvall!=''){
          if(/^\w[\w\s]+$/.test(nipnimvall)){
            nzz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           nzz.parent().siblings('span.label-danger').html('');
           valid_nipnim=true;
          } else {
            nzz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           nzz.parent().siblings('span.label-danger').html('Hanya diperbolehkan huruf/angka/underscore/spasi. Dan tidak ada spasi di awal');
           valid_nipnim=false;
          }
        } else {
           nzz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           nzz.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_nipnim=false;
        }
      });

      $(document).ready(function() {
        $('#provinsi').change(function() { // Jika Select Box id provinsi dipilih
          var provinsi = $(this).val(); // Ciptakan variabel provinsi
          $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
            url: 'kota.php', // File yang akan memproses data
            data: 'nama_prov=' + provinsi, // Data yang akan dikirim ke file pemroses
            success: function(response) { // Jika berhasil
              $('#kota').html(response); // Berikan hasil ke id kota
            }
          });
        });
     
     
     
        $(document).ready(function() {
          $('#kota').change(function() { // Jika select box id kota dipilih
            var kota = $(this).val(); // Ciptakan variabel kota
            $.ajax({
              type: 'POST', // Metode pengiriman data menggunakan POST
              url: 'kurir.php', // File pemroses data
              data: 'nama_kota=' + kota, // Data yang akan dikirim ke file pemroses
              success: function(response) { // Jika berhasil
                $('#kurir').html(response); // Berikan hasilnya ke id kurir
              }
            });
          });
        });
      });

      setInterval(cek_no_error,500);
      ajax_request=false;
      
            $('.form-user-baru').submit(function(e){
                e.preventDefault();
                if(!ajax_request){
                if(form_no_error){
                    proses_new_admin($(this));  
                 }
                 else {
                  error_alert("Form belum terisi dengan benar","Masih ada input yang belum terisi dengan benar. Pastikan semua input sudah tercentang hijau");
                 }
               }
              });

            function proses_new_admin(_this){
              ajax_request=false;
              if(!ajax_request){
                ajax_request=true;
                show_proses("Menambahkan akun baru...");
              var username=_this.find("input#username").val(),
                  email=_this.find("input#email").val(),
                  nama_lengkap=_this.find("input#nama_lengkap").val(),
                  password=_this.find("input#password").val(),
                  repassword=_this.find("input#repassword").val(),
                  nipnim=_this.find("input#nipnim").val(),
                  leveluser=_this.find("select#leveluser").val();

                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url();?>index.php/Ajax/new_akun",
                  data:{"username":username,"email":email,"nama":nama_lengkap,"password":password,"repassword":repassword,"nipnim":nipnim,"leveluser":leveluser},
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                      hide_proses();
                   show_proses("Berhasil!, mengalihkan halaman...")
                    window.location="<?php echo base_url() ?>index.php/dms/daftar_akun";
                     //error_alert("berhasil",a);
                    } else if(a=='taken'){
                      error_alert("Tindakan Ilegal!","Username yang anda masukan sudah pernah terdaftar! Masukkan yang lain");
                      ajax_request=false;
                    } else {
                      error_alert("Error","Maaf ada kesalahan tidak terduga. Mohon coba lagi<br> Pesan Error: <br>"+a);
                      ajax_request=false;
                    }
                    hide_proses();
                  },
                  error:function(a,b,c){                    
                      error_alert("Error","Terjadi kesalahan. Mungkin koneksi internet terputus atau server down. Mohon coba lagi<br> Pesan Error: <br>"+c);
                      hide_proses();
                      ajax_request=false;
                  }
                });
              }
            }
          <?php  } //Akhir untuk form user baru
           ?> 
    </script>

  </body>

</html>