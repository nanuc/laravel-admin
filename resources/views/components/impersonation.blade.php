@impersonating
<div class="relative bg-red-800">
    <div class="max-w-7xl mx-auto py-1 px-1 sm:px-6 lg:px-8">
        <div class="pr-16 sm:text-center sm:px-16">
            <p class="text-sm text-white">
                    <span class="md:inline">
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