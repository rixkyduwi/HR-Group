<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('foto/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="flex min-h-screen bg-gradient-to-br from-blue-100 to-blue-200">
    <!-- Sidebar -->
    <aside id="sidebar"
        class="w-64 bg-blue-800 text-white p-6 fixed inset-y-0 left-0 transform -translate-x-full transition-transform duration-300 lg:translate-x-0 lg:relative">
        <!-- Logo -->
        <div class="flex items-center justify-center space-x-3 text-2xl font-bold">
            <img src="{{ asset('foto/logo.png') }}" alt="Logo" class="w-10 h-10" />
            <span>HR GROUP</span>
        </div>

        <!-- Navigation -->
        <nav class="mt-10">
            <ul class="space-y-4">
                {{-- admin --}}
                @if (Auth::user()->role == 'admin')
                    <li><a href="{{ route('index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Home</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Tambah karyawan</a></li>
                @endif
                {{-- general manager --}}
                @if (Auth::user()->role == 'gm')
                    <li><a href="{{ route('index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Home</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Tambah Bawahan</a></li>
                @endif
                {{-- direktur --}}
                @if (Auth::user()->role == 'direktur')
                    <li><a href="{{ route('index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Home</a></li>
                    <li class="relative">
                        <button id="PrintReportBtn"
                            class="w-full flex items-center justify-between py-2 px-4 rounded hover:bg-blue-700">
                            Report Marketing
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul id="PrintReportMenu" class="hidden space-y-2 pl-6 mt-2">
                            <li class="relative">
                                <button id="PrintHarianBtn"
                                    class="w-full flex items-center justify-between py-2 px-4 rounded hover:bg-blue-700">
                                    Report Harian
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <ul id="PrintHarianMenu" class="hidden space-y-2 pl-6 mt-2">
                                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Diterima</a>
                                    </li>
                                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Ditolak</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Report Mingguan -->
                            <li class="relative">
                                <button id="PrintMingguanBtn"
                                    class="w-full flex items-center justify-between py-2 px-4 rounded hover:bg-blue-700">
                                    Report Mingguan
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <ul id="PrintMingguanMenu" class="hidden space-y-2 pl-6 mt-2">
                                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Diterima</a>
                                    </li>
                                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Ditolak</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Laporan KPI</a></li>
                @endif
                {{-- Manager Marketing --}}
                @if (Auth::user()->role == 'mm')
                    <li><a href="{{ route('index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Home</a></li>
                    <li class="relative">
                        <button id="PrintReportBtn"
                            class="w-full flex items-center justify-between py-2 px-4 rounded hover:bg-blue-700">
                            Report Marketing
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul id="PrintReportMenu" class="hidden space-y-2 pl-6 mt-2">
                            <li class="relative">
                                <button id="PrintHarianBtn"
                                    class="w-full flex items-center justify-between py-2 px-4 rounded hover:bg-blue-700">
                                    Report Harian
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <ul id="PrintHarianMenu" class="hidden space-y-2 pl-6 mt-2">
                                    <li><a href=""
                                            class="block py-2 px-4 rounded hover:bg-blue-700">Diterima</a>
                                    </li>
                                    <li><a href=""
                                            class="block py-2 px-4 rounded hover:bg-blue-700">Ditolak</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="relative">
                                <button id="PrintMingguanBtn"
                                    class="w-full flex items-center justify-between py-2 px-4 rounded hover:bg-blue-700">
                                    Report Mingguan
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <ul id="PrintMingguanMenu" class="hidden space-y-2 pl-6 mt-2">
                                    <li><a href=""
                                            class="block py-2 px-4 rounded hover:bg-blue-700">Diterima</a>
                                    </li>
                                    <li><a href=""
                                            class="block py-2 px-4 rounded hover:bg-blue-700">Ditolak</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">KPI</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Tambah Bawahan</a></li>
                @endif
                {{-- Manager Legal --}}
                @if (Auth::user()->role == 'ml')
                    <li><a href="{{ route('index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Home</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">KPI</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Tambah Bawahan</a></li>
                @endif
                {{-- Manager Keuangan --}}
                @if (Auth::user()->role == 'mk')
                    <li><a href="{{ route('index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Home</a></li>
                     <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">KPI</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Tambah Bawahan</a></li>
                @endif
                {{-- manager produksi --}}
                @if (Auth::user()->role == 'mp')
                    <li><a href="{{ route('index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Home</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">KPI</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Tambah Bawahan</a></li>
                @endif
                {{-- manager hrd --}}
                @if (Auth::user()->role == 'mh')
                    <li><a href="{{ route('index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Home</a></li>
                    <li><a href="{{ route('kpi.index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">KPI</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-700">Tambah Bawahan</a></li>
                @endif
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center">
            <button id="sidebarToggle"
                class="lg:hidden text-black font-bold text-2xl p-2 rounded focus:outline-none">☰</button>
            <h2 class="text-2xl font-semibold">Dashboard Manager @php echo Auth::user()->role @endphp </h2>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center space-x-2 p-2">
                    <span class="text-lg">Menu</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="absolute right-0 mt-2 w-32 bg-white border rounded-lg z-10">
                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <a href="{{ route('logout') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-6">
            @yield('Landing-Pages')
        </main>

        <!-- Footer -->
        <footer class="mt-auto bg-white p-4 rounded-lg shadow-lg">
            <p class="text-gray-500 text-center">&copy; 2024 HR Group. All rights reserved.</p>
        </footer>
    </div>

    <!-- JavaScript for Sidebar Toggle -->
    <script>
        const sidebarToggle = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("sidebar");

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");
        });

        const toggleDropdown = (btnId, menuId) => {
            const btn = document.getElementById(btnId);
            const menu = document.getElementById(menuId);

            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        };

        toggleDropdown("PrintReportBtn", "PrintReportMenu");
        toggleDropdown("PrintHarianBtn", "PrintHarianMenu");
        toggleDropdown("PrintMingguanBtn", "PrintMingguanMenu");
        toggleDropdown("reportMarketingBtn",
            "reportMarketingMenu");
        toggleDropdown("reportManagerBtn", "reportManagerMenu");
    </script>
</body>

</html>
