<form action="/user/activated/{{ $id }}" class="d-inline" method="POST" id="confirm-user">
   @csrf
   @method('PATCH')
   <button type="button" name="status" onclick="showDeleteConfirmation('Ya, Konfirmasi', 'Konfirmasi akun ini?', 'confirm-user')" class="btn btn-icon btn-outline-success" style="width:30px; height:30px;" >
      <i class="fas fa-user-check" style="font-size: 14px;"></i>
   </button>
</form>
<form action="/user/disable/{{ $id }}" class="d-inline" method="POST" id="disable">
   @csrf
   @method('PATCH')
   <button type="button" name="status" value="disable" onclick="showDeleteConfirmation('Ya, Nonaktifkan', 'Apakah Anda yakin ingin menonaktifkan user ini?', 'disable')" class="btn btn-icon btn-outline-danger" style="width:30px; height:30px;" >
      <i class="fas fa-user-times" style="font-size: 14px;" ></i>
   </button>
</form>