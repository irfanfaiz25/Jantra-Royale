<div>

    <ul class="mt-4 jantra-sidebar">
        <li class="mb-1 group {{ $active_link == 'dashboard' ? 'active' : '' }}">
            <a href="/dashboard"
                class="{{ request()->is('dashboard') ? 'bg-sidebar-active text-sidebar-active' : '' }} flex items-center py-2 px-4 text-gray-50 rounded-md">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        <li class="mb-1 group {{ isset($tab) && $tab == 'question' ? 'active' : '' }}">
            <a
                class="flex items-center {{ request()->is('question-data*') || request()->is('add-question') ? 'bg-sidebar-active text-sidebar-active' : '' }} py-2 px-4 text-gray-50 rounded-md sidebar-dropdown-toggle">
                <i class="ri-questionnaire-line mr-3 text-lg"></i>
                <span class="text-sm">Data Pertanyaan</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="submenu pl-7 mt-2 hidden group-[.selected]:block menu-option">
                @foreach ($categories as $category)
                    <li class="mb-4">
                        <a href="/question-data/{{ $category->name }}"
                            class="{{ $active_link == $category->name ? 'text-sidebar-logo' : 'text-gray-300' }} text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 capitalize">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="mb-1 group {{ $active_link == 'responden-data' ? 'active' : '' }}">
            <a href="{{ route('responden-data') }}"
                class="flex items-center {{ request()->is('responden-data') ? 'bg-sidebar-active text-sidebar-active' : '' }} py-2 px-4 text-gray-50 rounded-md">
                <i class="ri-pages-line mr-3 text-lg"></i>
                <span class="text-sm">Data Responden</span>
            </a>
        </li>
        <li class="mb-1 group {{ $active_link == 'result-data' ? 'active' : '' }}">
            <a href="{{ route('result-data') }}"
                class="flex items-center {{ request()->is('hasil') ? 'bg-sidebar-active text-sidebar-active' : '' }} py-2 px-4 text-gray-50 rounded-md">
                <i class="ri-line-chart-line mr-3 text-lg"></i>
                <span class="text-sm">Lihat Hasil</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" wire:click.prevent='logout' class="flex items-center py-2 px-4 text-gray-50 rounded-md">
                <i class="ri-logout-box-line mr-3 text-lg"></i>
                <span class="text-sm">Logout</span>
            </a>
        </li>
    </ul>

</div>
