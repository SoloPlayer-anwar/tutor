@if (session('failed'))
<div class="alert alert-danger alert-dismissible" style="padding: 15px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ session('failed') }}
</div>
@endif

