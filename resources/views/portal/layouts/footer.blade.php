    <!-- plugins:js -->
    <script src="{{ asset('panel/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('panel/js/off-canvas.js') }}"></script>
    <script src="{{ asset('panel/js/hoverable-collapse.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('panel/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('panel/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('panel/vendors/datatables.net/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/datatables.net/jszip.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/datatables.net/buttons.html5.min.js') }}"></script>
    {{-- <script src="{{ asset('panel/js/dataTables.select.min.js') }}"></script> --}}
    <script src="{{ asset('panel/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('panel/js/select2.js') }}"></script>
    <script src="{{ asset('panel/js/template.js') }}"></script>
    <!-- End plugin js for this page -->


    <!-- Custom js for this pages-->
    <script>
        function openShowDynamicModel(url, title, size = 'lg') {
            event.preventDefault();
            $('#show-dynamic-model .modal-dialog').addClass(`modal-${size}`);
            $('#show-dynamic-model').modal('show');
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function() {
                    $('#dynamic-model-title').html(title);
                    $('#dynamic-model-content').html(
                        '<div class="spinner2 my-6"><div class="cube1"></div><div class="cube2"></div></div>'
                    );
                },
                success: function(response) {
                    if (response.data)
                        $('#dynamic-model-content').html(response.data);
                    else
                        $('#dynamic-model-content').html(response);
                },
                error: function(error) {
                    $('#dynamic-model-content').html(error);
                }
            });
        }

        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

            $('#confirm-delete').on('show.bs.modal', function(e) {
                $(this).find('#destroyForm').attr('action', $(e.relatedTarget).data('href'));
            });

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                // todayBtn: true,
                clearBtn: true,
                startDate: new Date(), //'+1d'
            });

            $('.dataTables-table-export').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel',
                ],
            });

            $('.dataTables-table').DataTable({
                "order": [
                    // [1, 'asc']
                ],
                // "paging": false,
                // "ordering": false,
                // "info": false,
                // "filter": false,
                // columnDefs: [{
                //     orderable: false,
                //     className: 'select-checkbox',
                //     targets: 0
                // }],
                // select: {
                //     style: 'os',
                //     selector: 'td:first-child'
                // }
            });

            @yield('script')
        });
    </script>

</body>

</html>
