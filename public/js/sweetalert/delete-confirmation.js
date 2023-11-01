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
 
