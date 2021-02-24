<form id="ender_delete_from" method="post" action="{{ route('admin.helpers.ender.delete') }}">
    @csrf
    <input type="hidden" name="id">
</form>