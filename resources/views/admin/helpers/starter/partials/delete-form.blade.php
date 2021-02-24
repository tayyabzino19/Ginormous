<form id="starter_delete_from" method="post" action="{{ route('admin.helpers.starter.delete') }}">
    @csrf
    <input type="hidden" name="id">
</form>