@if (empty($menu['submenu']))
<li class="nav-item {{ (Menu::isActive($menu['active'])) ? 'active' : '' }}">
	<a href="{{ $menu['url'] ?? '' }}" class="nav-link">
		<i class="link-icon" data-feather="{{ $menu['icon'] ?? 'box' }}"></i>
		<span class="link-title a">{{ $menu['text'] }}</span>
	</a>
</li>
@else
<li class="nav-item {{ (Menu::isActive($menu['active'])) ? 'active' : '' }}">
	<a class="nav-link" data-toggle="collapse" href="#{{ $menu['id'] }}" role="button" aria-expanded="false" aria-controls="{{ $menu['id'] }}">
		<i class="link-icon" data-feather="{{ $menu['icon'] ?? 'box' }}"></i>
		<span class="link-title">{{ $menu['text'] }}</span>
		<i class="link-arrow" data-feather="chevron-down"></i>
	</a>
	<div class="collapse {{ (Menu::isActive($menu['active'])) ? 'show' : '' }}" id="{{ $menu['id'] }}">
		<ul class="nav sub-menu">
			@foreach ($menu['submenu'] as $submenu)
			
				@if (isset($submenu['can']))
                    @if (Gate::allows($submenu['can']))
					<li class="nav-item">
						<a href="{{ $submenu['url'] }}" class="nav-link {{ (Request::is($submenu['active'])) ? 'active' : '' }}">{{ $submenu['text'] }}</a>
					</li>
                    @endif
                @else
				<li class="nav-item">
					<a href="{{ $submenu['url'] }}" class="nav-link {{ (Request::is($submenu['active'])) ? 'active' : '' }}">{{ $submenu['text'] }}</a>
				</li>
				@endif
			@endforeach
		</ul>
	</div>
</li>
@endif