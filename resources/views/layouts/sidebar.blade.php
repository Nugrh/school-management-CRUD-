<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <a href="{{ route('home') }}" class="brand-link text-center">
{{--        <img src=""--}}
{{--             class="brand-image img-circle elevation-3 fas fa-book">--}}
        <i class="fas fa-book"></i>
        <span class="brand-text font-weight-light"><b>{{ config('app.name') }}</b></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
