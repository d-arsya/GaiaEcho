<aside id="default-sidebar" class="absolute top-24 right-4 z-5 w-96 rounded-lg" aria-label="Sidebar">
    <div class="p-4 flex flex-row mb-3 rounded-lg bg-white">
        @include('components.user_profile')

    </div>
    <div class="h-full rounded-lg pb-4 overflow-y-auto bg-white">
        <div class="px-4 pt-4">
            @if ($active == 'articles')
                @include('components.recomended_articles')
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
