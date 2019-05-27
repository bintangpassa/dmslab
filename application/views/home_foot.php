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

    <!-- script untuk tambah akun -->
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
              url:"<?php echo base_url();?>index.php/Ajax_akun/cek_new_username",
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
        $('#leveluser').change(function() { 
          var leveluser = $(this).val(); 
          $.ajax({
            type: 'POST', 
            url: '<?php echo base_url();?>index.php/Ajax_akun/bagian_leveluser', 
            data: {leveluser:leveluser}, 
            success: function(response) { 
              $('#bagianselect').html(response); 
            }
          });
        });
    
        // $(document).ready(function() {
        //   $('#bagian').change(function() { // Jika select box id kota dipilih
        //     var bagian = $(this).val(); // Ciptakan variabel kota
        //     $.ajax({
        //       type: 'POST', // Metode pengiriman data menggunakan POST
        //       url: '', // File pemroses data
        //       data: 'nama_kota=' + kota, // Data yang akan dikirim ke file pemroses
        //       success: function(response) { // Jika berhasil
        //         $('#kurir').html(response); // Berikan hasilnya ke id kurir
        //       }
        //     });
        //   });
        // });
      });

      var form_no_error=false;
      function cek_no_error(){
        if(valid_username && valid_email && valid_full_name && valid_password && valid_repassword && valid_nipnim){
          form_no_error=true;
        }else{
          form_no_error=false;
        }
      }
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
                  leveluser=_this.find("select#leveluser").val(),
                  bagian=_this.find("select#bagian").val();

                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url();?>index.php/Ajax_akun/new_akun",
                  data:{"username":username,"email":email,"nama":nama_lengkap,"password":password,"repassword":repassword,"nipnim":nipnim,"leveluser":leveluser,"bagian":bagian},
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                      hide_proses();
                   // show_proses("Berhasil!, mengalihkan halaman...")
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

    <!-- script untuk atur matakuliah -->
    <script type="text/javascript">
      <?php  if($npage=="atur_mk"){ ?>
        /*From menambah matakuliah*/
        /* Untuk mencek inputan user*/
        var valid_kodemk=false,
            valid_namamk=false,
            ajax_request=false;

        /*kodemk*/
        $(".form-mk-baru input#kodemk").blur(function(){
          var kodemkval=$(this).val();
          var p=$(this);
          if(kodemkval!=''){
            if(/^[\w]+$/.test(kodemkval)){
            if(kodemkval.length>2){
            $.ajax({
              type:"POST",
              url:"<?php echo base_url();?>index.php/Ajax_aturmk/cek_new_kodemk",
              data:{kodemk:kodemkval},
              cache:false,
              success:function(a){
                if(a=='ok' && kodemkval.length>2){
                 p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
                  p.parent().siblings('span.label-danger').html("");
                  valid_kodemk=true;
                 
                }
                else if(a=='terpakai') {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Kode Matakuliah ini sudah terpakai');
                   valid_kodemk=false;
                }
              }
            });
            }
            else {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Harus minimal 3 karakter');
                   valid_kodemk=false;
            }
          }
          else {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Karakter hanya diperbolehkan huruf/kata/underscore, dan jgn ada spasi');
                   valid_kodemk=false;
          }
          }else{
             p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Tidak boleh kosong');
                   valid_kodemk=false;
          }
        })

      $(".form-mk-baru input#namamk").on("blur keyup",function(){
        var namamkvall=$(this).val();
        var zz=$(this);
        if(namamkvall!=''){
          if(/^\w[\w\s]+$/.test(namamkvall)){
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           zz.parent().siblings('span.label-danger').html('');
           valid_namamk=true;
          } else {
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Hanya diperbolehkan huruf/angka/underscore/spasi. Dan jg ada spasi di awal');
           valid_namamk=false;
          }
        } else {
           zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_namamk=false;
        }
      });

      var form_no_error=false;
      function cek_no_error(){
        if(valid_kodemk && valid_namamk){
          form_no_error=true;
        }else{
          form_no_error=false;
        }
      }
      setInterval(cek_no_error,500);
      ajax_request=false;
      
            $('.form-mk-baru').submit(function(e){
                e.preventDefault();
                if(!ajax_request){
                if(form_no_error){
                    proses_new_mk($(this));  
                 }
                 else {
                  error_alert("Form belum terisi");
                 }
               }
              });

            function proses_new_mk(_this){
              ajax_request=false;
              if(!ajax_request){
                ajax_request=true;
                show_proses("Menambahkan matakuliah baru...");

              var kodemk=_this.find("input#kodemk").val(),
                  namamk=_this.find("input#namamk").val(),
                  sksmk=_this.find("select#sksmk").val(),
                  semestermk=_this.find("select#semestermk").val();

                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url();?>index.php/Ajax_aturmk/new_mk",
                  data:{"kodemk":kodemk,"namamk":namamk,"sksmk":sksmk,"semestermk":semestermk},
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                      hide_proses();
                    window.location="<?php echo base_url() ?>index.php/dms/buat_akun";
                    } else if(a=='taken'){
                      ajax_request=false;
                    } else {
                      ajax_request=false;
                    }
                    hide_proses();
                  },
                  error:function(a,b,c){                    
                      hide_proses();
                      ajax_request=false;
                  }
                });
              }
            }
      <?php } ?> 
    </script>

    <!-- script untuk  upload instruksi (dari laboran)-->
    <?php  if($npage=="upload_instruksi"){ ?>
      <script src="<?php echo base_url(); ?>js/dropzone.min.js"></script>
      <!-- <script src="<?php echo base_url(); ?>js/dropzone-amd-module.min.js"></script> -->
    <?php  } ?> 

    <script type="text/javascript">
      <?php  if($npage=="upload_instruksi"){ ?>
        Dropzone.autoDiscover = false;

        /* Untuk mencek inputan user*/
        var valid_namains=false,
            valid_jenisins=false,
            valid_dokumen=false;
        
        /*nama instruksi*/
      $(".form-instruksi-baru input#namains").on("blur keyup",function(){
        var namavall=$(this).val();
        var zz=$(this);
        if(namavall!=''){
          if(/^\w[\w\s]+$/.test(namavall)){
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           zz.parent().siblings('span.label-danger').html('');
           valid_namains=true;
          } else {
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Hanya diperbolehkan huruf/angka/underscore/spasi. Dan jg ada spasi di awal');
           valid_namains=false;
          }
        } else {
           zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_namains=false;
        }
      });

      
      var form_no_error=false;
      function cek_no_error(){
        if(valid_namains){
          form_no_error=true;
        }else{
          form_no_error=false;
        }
      }

      setInterval(cek_no_error,500);
      
          /* Untuk upload dokumen admin */
           var sedang_upload_dokumen=false;
           var dokumen_terupload=false;
           var form_username_has_error=false;
           var file_temp_telah_terhapus=false;
           var sesi=$('.sesi-form').val();
           var dokumenBaru=new Dropzone(".dokumen_user", { url: "<?php echo base_url() ?>index.php/Ajax_instruksi/dokumen_new" ,
                                                      maxFilesize: 10,
                                                      maxFiles: 1,
                                                      method:'post',
                                                      acceptedFiles:".doc,.docx,.pdf",
                                                      paramName:"userfile",
                                                      addRemoveLinks: true,
                                                      headers: {sesi:"2"},
                                                      dictDefaultMessage:"Drop dokumen disini untuk diunggah <br>",
                                                      dictInvalidFileType:"Type file ini tidak dizinkan",
                                                      dictRemoveFile:"Batalkan gambar ini"
                                                    });
           dokumenBaru.on("sending",function(a,b,c){
            a.token=Math.random();
            c.append('sesi',sesi);
            c.append('token_file',a.token);
            sedang_upload_dokumen=true;
           })
           dokumenBaru.on("success",function(a,b,c){
            sedang_upload_dokumen=false;
            dokumen_terupload=true;
            file_temp_telah_terhapus=false;
           })
           dokumenBaru.on("error",function(a,b){ 
            sedang_upload_dokumen=false;
            dokumen_terupload=(dokumen_terupload)?true:dokumen_terupload;
           })
           dokumenBaru.on("canceled",function(){
            sedang_upload_dokumen=false;
            dokumen_terupload=false;
           })
           dokumenBaru.on("removedfile",function(a){
            if(a.status=='success'){
              dokumen_terupload=false;
              var token=a.token;
              $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>index.php/Ajax_instruksi/delete_dokumen_temp",
                data:{file_token:token},
                cache:false,
                success:function(){
                  file_temp_telah_terhapus=true;
                }
              })
            }
           })

            $('.form-instruksi-baru').submit(function(e){
                e.preventDefault();
                if(!ajax_request){
                if(form_no_error){
                    proses_new_instruksi($(this));
                 }
               }
              });

            function proses_new_instruksi(_this){
              if(!ajax_request){
                ajax_request=true;

              var namains=_this.find("input#namains").val(),
                  jenisins=_this.find("select#jenisins").val(),
                  id_laboran=<?php echo $id_laboran?>,
                  sessi=_this.find("input.sesi-form").val();

                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url() ?>index.php/ajax_instruksi/new_instruksi",
                  data:{"namains":namains,"jenisins":jenisins,"id_laboran":id_laboran,"sessi":sessi},
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                      hide_proses();
                      window.location="<?php echo base_url()?>index.php/dms/instruksi_kerja_al";
                    }  
                    hide_proses();
                  }
                });
              }
            }

          <?php  } //Akhir untuk form user baru
           ?> 
    </script>

  </body>

</html>