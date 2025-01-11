@php

    use Illuminate\Support\Facades\Auth;
    use Modules\Acl\app\Models\AclResource;
    use Modules\Acl\app\Services\UserService;

    /** @var UserService $userService */
    $userService = app(UserService::class);

    $navigation = app('website_base_settings')->getNavigation();

$testUsers=[];
if ($userService->hasUserResource(Auth::user(), 'tester')) {
    $testUsers = app(\App\Models\User::class)::with(['aclGroups.aclResources'])
    ->whereHas('aclGroups.aclResources', function ($query) {
        return $query->where('code', '=', AclResource::RES_NON_HUMAN);
    })
    ->whereHas('aclGroups.aclResources', function ($query) {
        return $query->where('code', '=', AclResource::RES_TRADER);
    })
    ->whereDoesntHave('aclGroups.aclResources', function ($query) {
        return $query->where('code', '=', AclResource::RES_ADMIN);
    })
    ->orderBy('last_visited_at', 'ASC')->limit(5)->get();
}
@endphp
<nav class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="main-nav-bar max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-auto-close="outside" data-bs-target="#navbarHeaderMain"
                                aria-controls="navbarHeaderMain"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarHeaderMain">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                @foreach($navigation->children as $navItem)
                                    @if(!$navItem->title)
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        @continue
                                    @endif
                                    @if($navItem->children)
                                        <li class="nav-item dropdown">
                                            <button class="nav-link dropdown-toggle" role="button"
                                                    data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                    aria-expanded="false">
                                                {{ __($navItem->title) }}
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                                                @foreach($navItem->children as $child2)
                                                    @if(!$child2->title)
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        @continue
                                                    @endif
                                                    @php
                                                        $child2Count = count($child2->children)
                                                    @endphp

                                                    <li>
                                                        <a class="dropdown-item" href="{{ $child2->url }}">
                                                            {{ __($child2->title) }} @if($child2Count) &raquo; @endif
                                                        </a>
                                                        @if($child2Count)
                                                            <ul class="dropdown-menu dropdown-submenu">
                                                                @foreach($child2->children as $child3)
                                                                    @if(!$child3->title)
                                                                        <li>
                                                                            <hr class="dropdown-divider">
                                                                        </li>
                                                                        @continue
                                                                    @endif
                                                                    @php
                                                                        $child3Count = count($child3->children)
                                                                    @endphp
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                           href="{{ $child3->url }}">
                                                                            {{ __($child3->title) }} @if($child3Count) &raquo; @endif
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link {{ ($navItem->active ?? false) ? 'active' : '' }}"
                                               aria-current="page"
                                               href="{{ $navItem->url }}">{{ __($navItem->title) }}</a>
                                        </li>
                                    @endif
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </nav>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <span class="d-flex mr-2">
                    <input class="form-control" type="search" name="search" placeholder="{{ __('Search') }}"
                           aria-label="{{ __('Search') }}">
                    <button class="btn btn-outline-secondary" type="submit"><span class="bi bi-search"></span></button>
                </span>
                </form>
                {{-- @TODO: Remove breeze navigation --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>
                                <span class="bi bi-person-circle"></span> {{ (Auth::id()) ? Auth::user()->name : __('Not logged in') }}
                            </div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        @if (Auth::check())
                            <x-dropdown-link :href="route('logout')">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('user-profile', Auth::user()->shared_id)">
                                {{ __('User Profile') }}
                            </x-dropdown-link>
                            @foreach($testUsers as $testUser)
                                <x-dropdown-link :href="route('user.claim', $testUser->shared_id)">
                                    {{ __('Login: :name', ['name' => $testUser->name]) }}
                                </x-dropdown-link>
                            @endforeach
                        @else
                            <x-dropdown-link :href="route('login')">
                                {{ __('Login') }}
                            </x-dropdown-link>
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="navigation.hamburgerOpen = ! navigation.hamburgerOpen"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': navigation.hamburgerOpen, 'inline-flex': ! navigation.hamburgerOpen }"
                              class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! navigation.hamburgerOpen, 'inline-flex': navigation.hamburgerOpen }"
                              class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': navigation.hamburgerOpen, 'hidden': ! navigation.hamburgerOpen}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ (Auth::check()) ? Auth::user()->name : '' }}</div>
                <div class="font-medium text-sm text-gray-500">{{ (Auth::check()) ? Auth::user()->email : '' }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                @if (Auth::check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-responsive-nav-link>
                    </form>
                @else
                    <x-dropdown-link :href="route('login')">
                        {{ __('Login') }}
                    </x-dropdown-link>
                @endif
            </div>
        </div>
    </div>
</nav>

