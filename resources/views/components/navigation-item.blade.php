<a href="{{ $module['route'] }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
    <x-dynamic-component :component="'heroicon-o-' . $module['icon']" class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" />
    {{ $module['caption'] }}
</a>