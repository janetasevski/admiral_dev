@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
        class="fixed top-10 right-10 bg-green-500 text-white px-6 py-3 rounded shadow-md">
        <p>{{ session('message') }}</p>
    </div>
@endif
