<div class="fixed bottom-0 w-full md:hidden bg-slate-900 border-t border-slate-700 z-50">

    <div class="grid grid-cols-4 text-white">

        <!-- Menu Home -->
        <a href="{{ route('landing') }}"
            class="flex flex-col items-center py-3 {{ Route::is('landing') ? 'bg-sky-700' : '' }}">
            <span class="text-sm">Home</span>
        </a>

        <!-- Menu Kategori -->
        <a href="{{ route('category.index') }}"
            class="flex flex-col items-center py-3 {{ Route::is('category*') ? 'bg-sky-700' : '' }}">
            <span class="text-sm">Kategori</span>
        </a>

        <!-- Menu Barang -->
        <a href="{{ route('product.index') }}"
            class="flex flex-col items-center py-3 {{ Route::is('product*') ? 'bg-sky-700' : '' }}">
            <span class="text-sm">Barang</span>
        </a>

        <!-- Menu Dinamis (Dashboard / Login) -->
        @auth
            @if(Auth::user()->hasAnyRole(['Admin', 'Super Admin']))
                <a href="{{ route('admin.dashboard') }}"
                    class="flex flex-col items-center py-3 {{ Route::is('admin.dashboard') ? 'bg-sky-700' : '' }}">
                    <span class="text-sm">Dashboard</span>
                </a>
            @else
                {{-- Jika dia auth tapi bukan Admin/Super Admin, otomatis dilempar ke Dashboard Customer --}}
                <a href="{{ route('customer.dashboard') }}"
                    class="flex flex-col items-center py-3 {{ Route::is('customer.dashboard') ? 'bg-sky-700' : '' }}">
                    <span class="text-sm">Dashboard</span>
                </a>
            @endif
        @else
            <a href="{{ route('login') }}"
                class="flex flex-col items-center py-3 {{ Route::is('login') ? 'bg-sky-700' : '' }}">
                <span class="text-sm">Login</span>
            </a>
        @endauth

    </div>

</div>