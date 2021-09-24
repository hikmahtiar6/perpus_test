<form action="{{ route('pencipta.destroy', encrypt($pencipta_id)) }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger delconfirm" type="submit">Delete</button>
</form>
{{-- @include('sweet::alert') --}}
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script>
$('.delconfirm').on('click', function (event) {
    event.preventDefault();
    var form =  $(this).closest("form");
    swal({
        title: 'Apakah kamu yakin?',
        text: 'Semua buku {{ $pencipta_nama }} akan dihapus juga',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            form.submit();
        }
    });
});
</script>