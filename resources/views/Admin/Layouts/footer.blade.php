<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>

<script>
    $(document).ready(function() {
        console.log("11");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.delete-item', function(event) {
            console.log("22");

            event.preventDefault()
            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("33");

                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,
                        // dataType: JSON,
                        success: function(data) {

                            if (data.status == 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success'
                                )
                                window.location.reload()
                            } else if (data.status == 'error') {
                                Swal.fire(
                                    'Cant Delete!',
                                    data.message,
                                    'error'
                                )
                            }

                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.status);
                            console.log(error);

                        }
                    })
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

{{-- @stack('scripts') --}}
</body>

</html>
