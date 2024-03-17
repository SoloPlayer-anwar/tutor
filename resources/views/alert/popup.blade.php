@if (session('popup'))
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">SUCCESSFULLY WAKTU CETAK SEKARANG</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="" class="btn btn-primary btn-sm">Cetak sekarang</a>
                    {{ session('popup') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
    </script>
@endif
