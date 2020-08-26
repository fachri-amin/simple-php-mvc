$(document).on("click", "#btn-edit-mahasiswa", function () {
    const id = $(this).data("id");
    const url = $(this).data("url")
    $.ajax({
        url: $(this).data("url"),
        type: "post",
        data: {mahasiswa_id: id},
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $("#namaEdit").val(response.nama_mahasiswa);
            $("#nimEdit").val(response.nim);
            $("#emailEdit").val(response.email);
            $("#jurusanEdit").val(response.jurusan);
            $("#idEdit").val(response.mahasiswa_id);
        },
        error: function(){
            alert('terjadi kesalahan');
        }
    });
    return false;
});