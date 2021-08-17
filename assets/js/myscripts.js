const flashData = $('.flash-data').data('flashdata');
const content = $('.m-content').data('content');

if (flashData) {
	Swal.fire({
		title: 'Data ' + content,
		text: 'Berhasil ' + flashData,
		icon: 'success'
	});
}
//tombol hapus
$('.tombol-hapus').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data kegiatan akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;
        }
      })
});