<div class="flex items-center space-x-4 mb-4">
    <img src="{{ asset('logo.jpeg') }}"
         alt="logo claro"
         style="height: {{ str_contains(request()->url(), '/login') ? '5rem' : '3.5rem' }}; margin-top: 1rem;">
</div>