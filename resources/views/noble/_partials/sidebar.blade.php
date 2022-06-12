@php
	$sidebar_menu = App\Services\Menu\MenuService::getSideBarMenu();
@endphp
<nav class="sidebar">
        <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            NOBLE-<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active" id="sidebar_hide">
          <span></span>
          <span></span>
          <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">MENU</li>
			@foreach ($sidebar_menu as $menu)
                @if (isset($menu['can']))
                    @if (Gate::allows($menu['can']))
                        @include('noble::_partials.sidebar-tree')
                    @endif
                @else
                    <li class="nav-item">
                        @include('noble::_partials.sidebar-tree')
                    </li>
				@endif
            @endforeach
        </ul>
    </div>
</nav>