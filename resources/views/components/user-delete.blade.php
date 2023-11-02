<form action="/user/{{ $id }}" method="POST" id="user-delete">
    @csrf
    @method('DELETE')
    @include('components.button-delete')
</form>