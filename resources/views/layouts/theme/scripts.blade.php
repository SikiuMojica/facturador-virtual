    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ ASSET('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ ASSET('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ ASSET('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ ASSET('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ ASSET('assets/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ ASSET('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ ASSET('plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ ASSET('assets/js/dashboard/dash_2.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script src="{{ asset('js/fontawesome.js') }}"></script>

    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <!-- toastr -->
    <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('assets/js/components/notification/custom-snackbar.js') }}"></script>

    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>


<script>
    function notification(msg, option = 1) {
            Snackbar.show({
                text: msg.toUpperCase(),
                actionText: 'CERRAR',
                actionTextColor: '#fff',
                backgroundColor: option == 1 ? '#009688' : '#e7515a',
                pos: 'top-right'
            })
        }
</script>

<script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>

@livewireScripts