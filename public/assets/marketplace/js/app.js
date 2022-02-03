$( document ).ready(function() {
 //untuk memanggil plugin select2
    $('#provinsi').select2({
    placeholder: 'Pilih Provinsi',
    language: "id"
 });
 $('#kota').select2({
    placeholder: 'Pilih Kota/Kabupaten',
    language: "id"
 });
 $('#kecamatan').select2({
    placeholder: 'Pilih Kecamatan',
    language: "id"
 });
 $('#kelurahan').select2({
    placeholder: 'Pilih Kelurahan',
    language: "id"
 });

 //saat pilihan provinsi di pilih, maka akan mengambil data kota
 //di data-wilayah.php menggunakan ajax
 $("#provinsi").change(function(){
       var id_provinces = $(this).val(); 
       $.ajax({
          type: "POST",
          dataType: "html",
          url: "{{url('tampil_cart')}}",
          data: "id_provinces="+id_provinces,
          success: function(msg){
             $("select#kota").html(msg); 
             getAjaxKota();                                                        
          }
       });                    
     });  

 //saat pilihan kota di pilih, maka akan mengambil data kecamatan
 //di data-wilayah.php menggunakan ajax
 $("#kota").change(getAjaxKota);
     function getAjaxKota(){
          var id_regencies = $("#kota").val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "{{url('tampil_cart')}}",
             data: "id_regencies="+id_regencies,
             success: function(msg){
                $("select#kecamatan").html(msg);
               getAjaxKecamatan();                                                    
             }
          });
     }

     //saat pilihan kecamatan di pilih, maka akan mengambil data kelurahan
 //di data-wilayah.php menggunakan ajax
     $("#kecamatan").change(getAjaxKecamatan);
     function getAjaxKecamatan(){
          var id_district = $("#kecamatan").val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "{{url('tampil_cart')}}",
             data: "id_district="+id_district,
             success: function(msg){
                $("select#kelurahan").html(msg);                                               
             }
          });
     }
});