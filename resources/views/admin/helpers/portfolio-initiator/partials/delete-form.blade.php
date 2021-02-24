<form id="portfolio_initiator_delete_from" method="post" action="{{ route('admin.helpers.portfolio_initiator.delete') }}">
    @csrf
    <input type="hidden" name="id">
</form>