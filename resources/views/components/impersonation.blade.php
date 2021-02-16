@impersonating
    <div class="relative bg-indigo-600">
        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="pr-16 sm:text-center sm:px-16">
                <p class="font-medium text-white">
                    <span class="hidden md:inline">
                        {{ auth()->user()->name ?? auth()->user()->email }} is being impersonated.
                    </span>
                    <span class="block sm:ml-2 sm:inline-block">
                        <a href="{{ route('impersonate.leave') }}" class="text-white font-bold underline"> Exit impersonation <span aria-hidden="true">&rarr;</span></a>
                    </span>
                </p>
            </div>
        </div>
    </div>
@endImpersonating