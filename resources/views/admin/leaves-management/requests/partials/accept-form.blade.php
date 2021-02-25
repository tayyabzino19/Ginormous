<form id="request_accept_form" method="post" action="{{ route('admin.leaves_management.requests.accept') }}">
    @csrf
    <input type="hidden" name="id">
</form>