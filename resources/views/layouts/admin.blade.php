<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Tailwind Config --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        border: "hsl(0 0% 89%)",
                        input: "hsl(0 0% 89%)",
                        ring: "hsl(0 0% 14%)",
                        background: "hsl(0 0% 100%)",
                        foreground: "hsl(0 0% 9%)",
                        primary: {
                            DEFAULT: "hsl(0 0% 9%)",
                            foreground: "hsl(0 0% 98%)",
                        },
                        secondary: {
                            DEFAULT: "hsl(0 0% 96%)",
                            foreground: "hsl(0 0% 9%)",
                        },
                        muted: {
                            DEFAULT: "hsl(0 0% 96%)",
                            foreground: "hsl(0 0% 45%)",
                        },
                        accent: {
                            DEFAULT: "hsl(0 0% 96%)",
                            foreground: "hsl(0 0% 9%)",
                        },
                    },
                }
            }
        }
    </script>

    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-background text-foreground antialiased">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside id="sidebar"
        class="w-64 border-r border-border bg-background fixed md:static inset-y-0 left-0
               transform -translate-x-full md:translate-x-0
               transition-transform duration-200 ease-in-out z-40 flex flex-col">

        {{-- Logo Section --}}
        <div class="h-16 flex items-center px-6 border-b border-border">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <circle cx="12" cy="12" r="3"/>
                    <line x1="12" y1="2" x2="12" y2="9"/>
                    <line x1="12" y1="15" x2="12" y2="22"/>
                </svg>
                <span class="font-semibold text-base">Bike Service</span>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 p-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm font-medium transition-colors
               {{ request()->routeIs('admin.dashboard')
                    ? 'bg-primary text-primary-foreground'
                    : 'text-muted-foreground hover:bg-accent hover:text-accent-foreground' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="/admin/pelanggan"
               class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm font-medium transition-colors
                      text-muted-foreground hover:bg-accent hover:text-accent-foreground">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <span>Pelanggan</span>
            </a>

            <a href="#"
               class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm font-medium transition-colors
                      text-muted-foreground hover:bg-accent hover:text-accent-foreground">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/>
                    <circle cx="12" cy="12" r="3"/>
                    <line x1="12" y1="2" x2="12" y2="9"/>
                    <line x1="12" y1="15" x2="12" y2="22"/>
                </svg>
                <span>Service</span>
            </a>

            <a href="/admin/layanan"
               class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm font-medium transition-colors
                      text-muted-foreground hover:bg-accent hover:text-accent-foreground">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                <span>Layanan</span>
            </a>
        </nav>

        {{-- Logout Button - Positioned at Bottom --}}
        <div class="p-4 border-t border-border">
            <button onclick="logoutConfirm()"
                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-md text-sm font-medium transition-colors
                       text-muted-foreground hover:bg-accent hover:text-accent-foreground">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span>Logout</span>
            </button>
        </div>
    </aside>

    {{-- Overlay Mobile --}}
    <div id="overlay"
         class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden md:hidden z-30 transition-opacity"
         onclick="toggleSidebar()"></div>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">

        {{-- Topbar --}}
        <header class="h-16 border-b border-border bg-background sticky top-0 z-20">
            <div class="h-full flex items-center px-6 gap-4">
                <button class="md:hidden -ml-2 p-2 hover:bg-accent rounded-md transition-colors" onclick="toggleSidebar()">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div class="flex-1">
                    <h1 class="text-lg font-semibold">@yield('title')</h1>
                    <p class="text-xs text-muted-foreground">Kelola sistem service sepeda Anda</p>
                </div>
            </div>
        </header>

        {{-- Content Area --}}
        <main class="flex-1 p-6 bg-secondary/30">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>

    </div>
</div>

{{-- Scripts --}}
<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }

    function logoutConfirm() {
        Swal.fire({
            title: 'Logout?',
            text: 'Kamu akan keluar dari sistem',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>

{{-- Hidden Logout Form --}}
<form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
    @csrf
</form>

</body>
</html>