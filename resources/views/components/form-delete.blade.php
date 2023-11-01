<form action="/user/{{ $id }}" method="POST" id="delete-form">
    <div class="row justify-content-around mt-4">
       @csrf
       @method('DELETE')
       <button type="button" class="btn btn-danger" onclick="showDeleteConfirmation('Ya, Hapus', 'Apakah Anda yakin ingin menghapus data ini?', 'delete-form')">
          <i class="fas fa-trash-alt mr-2"></i>Delete
       </button>
    </div>
</form>