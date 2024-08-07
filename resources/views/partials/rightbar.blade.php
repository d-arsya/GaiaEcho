<aside id="default-sidebar" class="md:absolute top-24 right-4 z-5 md:w-96 rounded-lg" aria-label="Sidebar">
    <div class="hidden md:flex p-4 flex-row mb-3 rounded-lg bg-white">
        @include('components.user_profile')
    </div>
    <div class="h-full rounded-lg pb-4 overflow-y-auto bg-white">
        <div class="px-12 md:px-4 pt-4">
            @if ($active == 'articles')
                @include('components.recomended_articles')
                @elseif($active == 'management')
            @elseif($active == 'report')
                @include('components.last_reports')
            @elseif($active== 'calculator')
                @include('components.vehicle')
            @else
                @auth
                    @include('components.recomended_users')
                @endauth
        </div>
        @endif
    </div>
</aside>
