$(function(){

    $('.tampilModalDetail').on('click', function(){
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/storage_management/public/dashboard/detail',
            data: {id : id}, 
            method : 'POST',
            dataType : 'json',
            success : function(data) {
                $('#Nama_Barang').html(data.Nama);
                $('#Gambar').attr('src', 'http://localhost/storage_management/public/img/'+data.Gambar);
                // $('#Gambar').attr('src', data.Gambar);
                $('#Gambar').html()
                $('#Tipe').html(data.Tipe);
                $('#Kondisi').html(data.Kondisi);
                $('#Jumlah').html(data.Jumlah);
                $('#User_Input').html(data.Nama_Lengkap);
                $('#Waktu_Ditambahkan').html(data.Waktu_Ditambahkan);
                $('#Waktu_Diubah').html(data.Waktu_Diubah);
                $('#Edit').attr('href', 'http://localhost/storage_management/public/dashboard/update/'+data.Id_Barang);
                $('#Delete').attr('href', 'http://localhost/storage_management/public/dashboard/delete/'+data.Id_Barang);
            }
        
        });
    });

});