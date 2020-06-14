const daftar = $('.daftar').data('flashdata');
if (daftar) {
  Swal.fire({
      type: 'success',
      title: 'Berhasil!',
      text: daftar,
      showConfirmButton: false,
      timer: 1000
    });
}
const cantdelete = $('.cantdelete').data('cantdelete');
if (cantdelete) {
  Swal.fire({
      type: 'error',
      title: 'Gagal!',
      text: cantdelete,
      showConfirmButton: false,
      timer: 1000
    });
}
const flashdata = $('.flashdata').data('flashdata');
if (flashdata) {
	Swal.fire({
      type: 'success',
      title: 'Berhasil!',
      text: 'Data '+ flashdata,
      showConfirmButton: false,
      timer: 1000
    });
}

const hapus = $('.hapus').on('click', function(e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
          type: 'warning',
          title: 'Apakah anda yakin?',
          text: 'Data akan dihapus',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#2dc389',
          confirmButtonText: 'Yakin'
        }).then((result)=>{
            if (result.value) {
            	location.href = href
            }
        });

})
const logout = $('.logout').on('click', function(e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
          type: 'warning',
          title: 'Apakah anda yakin?',
          text: 'anda akan logout',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#2dc389',
          confirmButtonText: 'Yakin'
        }).then((result)=>{
            if (result.value) {
            	location.href = href
            }
        });

})

const flashdatawarning = $('.flashdatawarning').data('flashdata');
if (flashdatawarning) {
	Swal.fire({
      type: 'warning',
      title: 'Warning!',
      text: flashdatawarning,
      showConfirmButton: false,
      timer: 1000
    });
}

const userfail = $('.userfail').data('flashdata');
if (userfail) {
	Swal.fire({
      type: 'error',
      title: 'Gagal!',
      text: userfail,
      showConfirmButton: false,
      timer: 1000
    });
}
const loginsuccess = $('.loginsuccess').data('loginsuccess');
if (loginsuccess) {
  Swal.fire({
      type: 'success',
      title: 'Berhasil!',
      text: loginsuccess,
      showConfirmButton: false,
      timer: 1000
    });
}