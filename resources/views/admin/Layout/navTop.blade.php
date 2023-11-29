<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        @include('admin.Layout.partial.PagesTop')
        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                <li class="flex items-center">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500">
                            <i class="fa fa-user sm:mr-1"></i>
                            <span class="hidden sm:inline">Log Out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
