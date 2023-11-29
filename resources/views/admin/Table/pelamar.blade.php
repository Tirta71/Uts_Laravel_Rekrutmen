<!DOCTYPE html>
<html lang="en">
    @include('admin.Layout.header')

    <body
        class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500"
    >
        @include('admin.Layout.sideNav')

        <main
            class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200"
        >
            <!-- Navbar -->
            @include('admin.Layout.navTop')

            <div class="w-full px-6 py-6 mx-auto">
               @yield('table')
            </div>
        </main>
        
    </body>
    <!-- plugin for scrollbar  -->
    <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
    <!-- github button -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- main script file  -->
    <script
        src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5"
        async
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
