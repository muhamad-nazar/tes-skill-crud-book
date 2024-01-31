<!-- Bootstrap JavaScript-->
<script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset/bs/js/bootstrap.min.js') }}"></script>

<!-- Js Jquery-->
<script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Data Tables -->
<script src="{{ asset('asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('asset/vendor/js/demo/datatables-demo.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if (session('error'))
    <script type="text/javascript">
        Swal.fire({
            title: 'Gagal',
            text: '{{ session('error') }}',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('success'))
    <script type="text/javascript">
        Swal.fire({
            title: 'Berhasil',
            text: '{{ session('success') }}',
            icon: 'primary',
            confirmButtonText: 'OK'
        });
    </script>
@endif
