@if (session('info'))
    <div class="mb-2 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('info') }}</span>
    </div>
@endif
@if (session('error'))
    <div class="mb-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif
@if (session('delete'))
    <div class="mb-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('delete') }}</span>
    </div>
@endif
@if (session('success'))
    <div class="mb-2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
