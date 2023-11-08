<form action="{{ $id }}" method="POST" id="user-delete">
    @csrf
    @method('DELETE')
    @include('components.buttons.button-delete')
</form>