<!-- start: Sidebar -->
<div class="fixed left-0 top-0 w-64 h-full bg-sidebar p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="{{ asset('img/logo.png') }}" alt="jantra-logo" class="w-8 h-5.8 rounded">
        <span class="text-lg font-bold text-white ml-3"><span class="text-sidebar-logo">eval</span>-Jantra Royale</span>
    </a>

    @if (isset($tab))
        @livewire('admin-sidebar', ['active_link' => $active_link, 'tab' => $tab])
    @else
        @livewire('admin-sidebar', ['active_link' => $active_link, 'tab' => ''])
    @endif

</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end: Sidebar -->
