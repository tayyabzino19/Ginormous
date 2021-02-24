<form id="tech_star_delete_from" method="post" action="{{ route('admin.helpers.tech_star.delete') }}">
    @csrf
    <input type="hidden" name="id">
</form>