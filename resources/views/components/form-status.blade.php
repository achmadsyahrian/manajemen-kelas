<form action="/user/activated/{{ $id }}" method="POST">
   @csrf
   @method('PATCH')
   <button type="submit" name="status" class="btn btn-success">
      <i class="fas fa-user-check mr-2"></i>Activate
   </button>
</form>
<form action="/user/disable/{{ $id }}" method="POST" id="disable">
   @csrf
   @method('PATCH')
   <button type="button" name="status" value="disable" onclick="showDeleteConfirmation('Ya, Nonaktifkan', 'Apakah Anda yakin ingin menonaktifkan user ini?', 'disable')" class="btn btn-danger">
      <i class="fas fa-user-times mr-2"></i>Disable
   </button>
</form>