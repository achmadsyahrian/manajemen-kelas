<form action="/user/update-status/{{ $id }}" method="POST">
    <div class="row justify-content-around mt-4">
       @csrf
       @method('PATCH')
       <button type="submit" name="status" value="activate" class="btn btn-success">
          <i class="fas fa-user-check mr-2"></i>Activate
       </button>
       <button type="submit" name="status" value="disable" class="btn btn-danger">
          <i class="fas fa-user-times mr-2"></i>Disable
       </button>
    </div>
</form>