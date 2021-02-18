<a href="{{ $module->getRoute() }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
    <x-dynamic-component :component="'heroicon-o-' . $module->getIcon()" class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" />
    {{ $module->getCaption() }}
</a>