<!DOCTYPE html>
<html>
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
            
            <!-- end Navbar -->

            <!-- cards -->
            @include('admin.Layout.Dashboard.Dashboard')
            @yield('content')
            <!-- end cards -->
        </main>
    </body>
    <!-- plugin for charts  -->
    <script src="./assets/js/plugins/chartjs.min.js" async></script>
    <!-- plugin for scrollbar  -->
    <script src="./assets/js/plugins/perfect-scrollbar.min.js" async></script>
    <!-- github button -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- main script file  -->
    <script
        src="./assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5"
        async
    ></script>
</html>
