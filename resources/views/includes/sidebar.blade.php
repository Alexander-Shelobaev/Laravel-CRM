@php
	$sidebarClass = (!empty($sidebarTransparent)) ? 'sidebar-transparent' : '';
@endphp
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar {{ $sidebarClass }}">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			@guest

			@else
			<li class="nav-profile">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow"></div>
					<div class="image">
						<img src="{{ asset('/assets/img/user/'.Auth::user()->avatar) }}" alt="user_avatar" />
					</div>
					<div class="info">
						<b class="caret pull-right"></b>
						{{Auth::user()->name}}
						
						@foreach (Auth::user()->roles as $role)
							<small>{{ $role->name }}</small>
						@endforeach
						
					</div>
				</a>
			</li>
			<li>
				<ul class="nav nav-profile">
					<li><a href="javascript:;"><i class="fa fa-cog"></i> Редактировать профиль</a></li>
					<!--<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
					<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li> -->
				</ul>
			</li>
			@endguest
		</ul>
		<!-- end sidebar user -->
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header">Навигация</li>
			@php
				$currentUrl = '/'. Request::path();

				function renderSubMenu($value, $currentUrl) {
					$subMenu = '';
					$GLOBALS['sub_level'] += 1 ;
					$GLOBALS['active'][$GLOBALS['sub_level']] = '';
					$currentLevel = $GLOBALS['sub_level'];
					foreach ($value as $key => $menu) {
						$GLOBALS['subparent_level'] = '';
						
						$subSubMenu = '';
						$hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
						$hasCaret = (!empty($menu['sub_menu'])) ? '<b class="caret pull-right"></b>' : '';
						$hasTitle = (!empty($menu['title'])) ? $menu['title'] : '';
						$hasHighlight = (!empty($menu['highlight'])) ? '<i class="fa fa-paper-plane text-theme m-l-5"></i>' : '';
						
						if (!empty($menu['sub_menu'])) {
							$subSubMenu .= '<ul class="sub-menu">';
							$subSubMenu .= renderSubMenu($menu['sub_menu'], $currentUrl);
							$subSubMenu .= '</ul>';
						}
						
						$active = ($currentUrl == $menu['url']) ? 'active' : '';
						
						if ($active) {
							$GLOBALS['parent_active'] = true;
							$GLOBALS['active'][$GLOBALS['sub_level'] - 1] = true;
						}
						if (!empty($GLOBALS['active'][$currentLevel])) {
							$active = 'active';
						}
						$subMenu .= '
							<li class="'. $hasSub .' '. $active .'">
								<a href="'. $menu['url'] .'">'. $hasCaret . $hasTitle . $hasHighlight .'</a>
								'. $subSubMenu .'
							</li>
						';					
					}
					return $subMenu;
				}
				
				foreach (config('sidebar.menu') as $key => $menu) {
					$GLOBALS['parent_active'] = '';

					if(mb_strpos($currentUrl, 'admin/chat')){$currentUrl = '/admin/chat';} 

					if(mb_strpos($currentUrl, 'admin/user-management/users')){$currentUrl = '/admin/user-management/users';} 
					if(mb_strpos($currentUrl, 'admin/user-management/roles')){$currentUrl = '/admin/user-management/roles';} 
					if(mb_strpos($currentUrl, 'admin/user-management/permissions')){$currentUrl = '/admin/user-management/permissions';} 

					if(mb_strpos($currentUrl, 'admin/content/services')){$currentUrl = '/admin/content/services';} // меняем URI при редактировании материала
					if(mb_strpos($currentUrl, 'admin/content/portfolios')){$currentUrl = '/admin/content/portfolios';} // меняем URI при редактировании материала
					if(mb_strpos($currentUrl, 'admin/content/news')){$currentUrl = '/admin/content/news';} // меняем URI при редактировании материала

					if(mb_strpos($currentUrl, 'admin/handbook/currencies')){$currentUrl = '/admin/handbook/currencies';} 
					if(mb_strpos($currentUrl, 'admin/handbook/states')){$currentUrl = '/admin/handbook/states';} 
					if(mb_strpos($currentUrl, 'admin/handbook/cities')){$currentUrl = '/admin/handbook/cities';} 
					if(mb_strpos($currentUrl, 'admin/handbook/airfields')){$currentUrl = '/admin/handbook/airfields';} 


					// изменяем $currentUrl, если состоит более чем из 3 секций, например /admin/users/users/2/edit превращаем в /admin/users/users
					//$currentUrlArr = explode("/", $currentUrl, 4);
					//print_r($currentUrlArr);
					//Array ( [0] => [1] => admin [2] => users/users/1/edit ) /admin/users/users/1/edit
					//$currentUrl = implode ("/", $currentUrlArr);
					//echo $currentUrl;
					//echo dirname($currentUrl);
					//if(mb_strpos($currentUrl, 'admin/content/news')){ 

					//}
					
					$hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
					$hasCaret = (!empty($menu['caret'])) ? '<b class="caret"></b>' : '';
					$hasIcon = (!empty($menu['icon'])) ? '<i class="'. $menu['icon'] .'"></i>' : '';
					$hasImg = (!empty($menu['img'])) ? '<div class="icon-img"><img src="'. $menu['img'] .'" /></div>' : '';
					$hasLabel = (!empty($menu['label'])) ? '<span class="label label-theme m-l-5">'. $menu['label'] .'</span>' : '';
					$hasTitle = (!empty($menu['title'])) ? '<span>'. $menu['title'] . $hasLabel .'</span>' : '';
					$hasBadge = (!empty($menu['badge'])) ? '<span class="badge pull-right">'. $menu['badge'] .'</span>' : '';
					
					$subMenu = '';
					if (!empty($menu['sub_menu'])) {
						$GLOBALS['sub_level'] = 0;
						$subMenu .= '<ul class="sub-menu">';
						$subMenu .= renderSubMenu($menu['sub_menu'], $currentUrl);
						$subMenu .= '</ul>';
					}
					$active = ($currentUrl == $menu['url']) ? 'active' : '';
					$active = (empty($active) && !empty($GLOBALS['parent_active'])) ? 'active' : $active;
					echo '
						<li class="'. $hasSub .' '. $active .'">
							<a href="'. $menu['url'] .'">
								'. $hasImg .'
								'. $hasBadge .'
								'. $hasCaret .'
								'. $hasIcon .'
								'. $hasTitle .'
							</a>
							'. $subMenu .'
						</li>
					';
				}
			@endphp
			<!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			<!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->

