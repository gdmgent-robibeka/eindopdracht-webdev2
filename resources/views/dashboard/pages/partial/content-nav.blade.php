<div class="flex items-center mt-6 space-x-4 overflow-y-auto sm:justify-center whitespace-nowrap">
    <a href="{{ route('dashboard.' . $route . '.edit', $item->id) }}"
        class="px-3 py-1.5 text-gray-500 dark:text-gray-400 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-800 capitalize {{ isset($activeLocale) ? 'bg-gray-300' : '' }}">
        Main
    </a>

    @foreach (Config::get('app.locale_all') as $locale)
        <a href="{{ route('dashboard.' . $route . '.editContent', [$item->id, $locale]) }}"
            class="px-3 py-1.5 text-gray-500 dark:text-gray-400 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-800 rounded-lg {{ (isset($activeLocale) && $activeLocale == $locale ) ? 'bg-gray-300' : '' }}">
            Content <span class="uppercase">{{ $locale }}</span>
        </a>
    @endforeach
</div>
