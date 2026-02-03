<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bike Service')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    borderRadius: {
                        xl: '0.75rem',
                        '2xl': '1rem',
                    }
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        * { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-muted/40">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r flex flex-col">

        <!-- LOGO -->
        <div class="h-16 px-6 flex items-center gap-3 border-b">
            <div class="w-8 h-8 rounded-full border border-foreground flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9" stroke-width="2"/>
                    <path stroke-width="2" stroke-linecap="round" d="M12 7v5l3 2"/>
                </svg>
            </div>
            <span class="text-lg font-semibold">Bike Service</span>
        </div>

        <!-- MENU -->
        <nav class="flex-1 px-3 py-4 space-y-1">

            <!-- Dashboard -->
            <a href="{{ route('customer.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
               {{ request()->routeIs('customer.dashboard')
                    ? 'bg-black text-white shadow'
                    : 'text-muted-foreground hover:bg-muted' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3"/>
                </svg>
                Dashboard
            </a>

            <!-- kendaraan -->
            <a href="/kendaraan"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
               text-muted-foreground hover:bg-muted">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round"
                          d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                    <path stroke-width="2" stroke-linecap="round"
                          d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 01-2.83 2.83l-.06-.06A1.65 1.65 0 0015 19.4"/>
                </svg>
                kendaraan
            </a>

            <!-- profile -->
            <a href="/profile"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
               text-muted-foreground hover:bg-muted">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round"
                          d="M17 21v-1a4 4 0 00-4-4H5a4 4 0 00-4 4v1"/>
                    <circle cx="9" cy="7" r="4"/>
                </svg>
                Profile
            </a>

        </nav>

        <!-- LOGOUT -->
        <div class="p-4 border-t">
            <button onclick="logoutConfirm()"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl
                    text-sm font-medium text-muted-foreground hover:bg-muted">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round"
                          d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4"/>
                    <path stroke-width="2" stroke-linecap="round"
                          d="M10 17l5-5-5-5M15 12H3"/>
                </svg>
                Logout
            </button>
        </div>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 overflow-y-auto p-6">
        @yield('content')
    </main>
</div>

<form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
    @csrf
</form>

<script>
function logoutConfirm() {
    Swal.fire({
        title: 'Logout?',
        text: 'Anda akan keluar dari akun ini',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#000',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
}
</script>

</body>
</html>
