     <!-- Sidebar Overlay (Mobile) -->
        <div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 z-40 bg-black/50 hidden lg:hidden"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0 sidebar-transition shadow-xl">
            <div class="flex items-center justify-between h-16 px-6 bg-slate-950">
                <span class="text-xl font-bold tracking-wider text-blue-400">MODULPRO</span>
                <button onclick="toggleSidebar()" class="lg:hidden text-gray-400 hover:text-white">
                    <i data-lucide="x"></i>
                </button>
            </div>
            
            <nav class="mt-6 px-4 space-y-2">
                <a href="#" onclick="showPage('home', this)" class="nav-link active flex items-center px-4 py-3 rounded-lg transition">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                    <span>Beranda</span>
                </a>
                <a href="#" onclick="showPage('stats', this)" class="nav-link flex items-center px-4 py-3 text-gray-400 hover:bg-slate-800 hover:text-white rounded-lg transition group">
                    <i data-lucide="bar-chart-2" class="w-5 h-5 mr-3 group-hover:text-blue-400"></i>
                    <span>Statistik</span>
                </a>
                <a href="#" onclick="showPage('users', this)" class="nav-link flex items-center px-4 py-3 text-gray-400 hover:bg-slate-800 hover:text-white rounded-lg transition group">
                    <i data-lucide="users" class="w-5 h-5 mr-3 group-hover:text-blue-400"></i>
                    <span>Pengguna</span>
                </a>
                <a href="#" onclick="showPage('settings', this)" class="nav-link flex items-center px-4 py-3 text-gray-400 hover:bg-slate-800 hover:text-white rounded-lg transition group">
                    <i data-lucide="settings" class="w-5 h-5 mr-3 group-hover:text-blue-400"></i>
                    <span>Pengaturan</span>
                </a>
            </nav>

            <div class="absolute bottom-0 w-full p-4 border-t border-slate-800">
                <button class="flex items-center w-full px-4 py-2 text-gray-400 hover:text-red-400 transition">
                    <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>
                    <span>Keluar</span>
                </button>
            </div>
        </aside>