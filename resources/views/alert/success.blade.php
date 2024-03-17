@if (session('status'))
<div class="alert alert-success alert-dismissible" style="padding: 15px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ session('status') }}
</div>
@endif

