<form id="request_reject_form" method="post" action="{{ route('admin.leaves_management.requests.reject') }}">
    @csrf
    <input type="hidden" name="id">
</form>
