<?php

namespace App\Services\Menu;

use Illuminate\Support\Facades\Request;

class MenuService
{
	/* 
	 * text => Nama menu yang tampil pada web
	 * id => memberikan id pada masing-masing nav
	 * url => url menu
	 * icon => icon menu
	 * active => patern agar menu aktif. Sesuaikan dengan url pada route.
	 */
	public static function getSideBarMenu()
	{
		return [
			[
				'text' => 'Dashboard',
				'id' => 'dashboard',
				'url' => '#',
				'icon' => 'box',
				'active' => ['backend/dashboard'],
			],
			[
				'text' => 'Menu 1',
				'id' => 'menu-1',
				'url' => '#',
				'icon' => 'box',
				'can' => 'menu-1',
				'active' => ['backend/menu-1'],
			],
			[
				'text' => 'Konten Web',
				'id' => 'content',
				'icon' => 'box',
				'active' => ['backend/content/*'],
				'submenu' => [
					[
						'text' => 'Artikel',
						'id' => 'article',
						'url' => '#',
						'active' => ['backend/content/article/*', 'backend/content/article'],
					],
					[
						'text' => 'Event',
						'id' => 'event',
						'url' => '#',
						'active' => ['backend/content/event/*', 'backend/content/event'],
					],
				]
			],
		];
	}

	public static function isActive($segments)
	{

		foreach ($segments as $segment) {
			if(Request::is($segment)){
				return true;
			}
		}

		return false;
	}

}