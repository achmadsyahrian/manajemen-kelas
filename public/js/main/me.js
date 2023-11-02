function showDeleteConfirmation(action, confirmationText, idForm) {
   Swal.fire({
       title: 'Konfirmasi',
       text: confirmationText,
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       confirmButtonText: action,
       cancelButtonText: 'Batal'
   }).then((result) => {
       if (result.isConfirmed) {
           document.getElementById(idForm).submit();
       }
   });
}

function previewImage() {
    const image = document.getElementById('photo');
    const imgPreview = document.getElementById('imgPreview');

    // Hapus gambar lama
    imgPreview.src = "";

    if (image.files && image.files[0]) {
       const reader = new FileReader();

       reader.onload = function(e) {
          imgPreview.src = e.target.result;
       }

       reader.readAsDataURL(image.files[0]);
    }
 }
 
