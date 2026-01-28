<!DOCTYPE html>
<html lang="ms" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexusCore - Pengurusan Data Premium</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome 6.4.0 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        dark: {
                            bg: '#0b1120',
                            card: '#151f33',
                            border: '#1e293b',
                            text: '#f1f5f9',
                            muted: '#94a3b8'
                        }
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --bs-body-font-family: 'Inter', sans-serif;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            transition: background-color 0.4s ease, color 0.4s ease;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .dark body {
            background-color: #0b1120;
            color: #f1f5f9;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .dark .glass-nav {
            background: rgba(15, 31, 51, 0.85);
            border-bottom: 1px solid rgba(51, 65, 85, 0.5);
        }

        .premium-card {
            border: none;
            border-radius: 1.5rem;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dark .premium-card {
            background-color: #151f33;
            border: 1px solid #1e293b;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
        }

        .file-icon-box {
            @apply flex-shrink-0 w-10 h-10 md:w-12 md:h-12 rounded-xl flex items-center justify-center transition-all duration-300 border border-slate-100;
            background-color: #f1f5f9;
            color: #2563eb;
        }

        .dark .file-icon-box {
            background-color: rgba(37, 99, 235, 0.1);
            color: #60a5fa;
            border: 1px solid rgba(37, 99, 235, 0.2);
        }

        /* Action Buttons Styling - ENLARGED */
        .btn-action {
            @apply w-10 h-10 md:w-11 md:h-11 rounded-xl flex items-center justify-center transition-all duration-300 transform active:scale-90 border shadow-sm;
        }

        /* Detail/View Button */
        .btn-view {
            @apply bg-blue-50 text-blue-600 border-blue-100 hover:bg-blue-600 hover:text-white hover:border-blue-600 hover:shadow-lg hover:shadow-blue-500/30;
        }
        .dark .btn-view {
            @apply bg-blue-500/10 text-blue-400 border-blue-500/20 hover:bg-blue-500 hover:text-white;
        }

        /* Edit Button */
        .btn-edit {
            @apply bg-amber-50 text-amber-600 border-amber-100 hover:bg-amber-500 hover:text-white hover:border-amber-500 hover:shadow-lg hover:shadow-amber-500/30;
        }
        .dark .btn-edit {
            @apply bg-amber-500/10 text-amber-400 border-amber-500/20 hover:bg-amber-500 hover:text-white;
        }

        /* Delete Button */
        .btn-delete {
            @apply bg-rose-50 text-rose-600 border-rose-100 hover:bg-rose-600 hover:text-white hover:border-rose-600 hover:shadow-lg hover:shadow-rose-500/30;
        }
        .dark .btn-delete {
            @apply bg-rose-500/10 text-rose-400 border-rose-500/20 hover:bg-rose-500 hover:text-white;
        }

        /* Icon sizing inside buttons - ENLARGED */
        .btn-action i {
            @apply text-sm md:text-base;
        }

        .table > :not(caption) > * > * {
            padding: 1.25rem 0.75rem;
            background-color: transparent !important;
            border-bottom-width: 1px;
            border-color: rgba(226, 232, 240, 0.5);
        }

        .dark .table > :not(caption) > * > * {
            border-color: rgba(30, 41, 59, 0.5);
        }

        .modal-content {
            border-radius: 2rem !important;
            border: none !important;
            overflow: hidden;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        .dark ::-webkit-scrollbar-thumb { background: #334155; }

        /* Footer Marquee Style - Updated for larger text and spacing */
        .nexus-footer {
            margin-top: auto;
            @apply py-8 bg-white dark:bg-dark-card border-t border-slate-200 dark:border-dark-border;
        }
    </style>
</head>
<body class="bg-slate-50 dark:bg-dark-bg text-slate-900 dark:text-dark-text">

    <!-- NAVIGASI -->
    <nav class="glass-nav sticky top-0 z-50 py-3">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="#" class="flex items-center gap-3 no-underline">
                <div class="bg-blue-600 w-10 h-10 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <i class="fas fa-cube text-white text-xl"></i>
                </div>
                <div class="text-xl font-black tracking-tighter dark:text-white">
                    NEXUS<span class="text-blue-600">CORE</span>
                </div>
            </a>

            <div class="flex items-center gap-4">
                <button id="theme-toggle" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-yellow-400 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
                    <i class="fas fa-moon dark:hidden"></i>
                    <i class="fas fa-sun hidden dark:block"></i>
                </button>
                <div class="h-8 w-[1px] bg-slate-200 dark:bg-slate-700 mx-1"></div>
                <img src="https://ui-avatars.com/api/?name=Admin&background=2563eb&color=fff" class="w-9 h-9 rounded-full ring-2 ring-blue-500/20">
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="container mx-auto px-4 py-8 md:py-12 flex-grow">
        
        <!-- Header Section -->
        <div class="max-w-6xl mx-auto mb-10">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                <div>
                    <span class="text-[10px] font-bold text-blue-600 dark:text-blue-400 uppercase tracking-[0.2em] mb-2 block">Pusat Data Strategik</span>
                    <h1 class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white mb-2 tracking-tight">Dokumentasi Digital</h1>
                    <p class="text-slate-500 dark:text-slate-400 max-w-md text-sm md:text-base">Kelola informasi dokumen anda dengan sistem pengurusan yang efisien dan selamat.</p>
                </div>
                
                <div class="flex flex-wrap gap-3 w-full md:w-auto">
                    <div class="relative flex-1 sm:w-72">
                        <i class="fas fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="text" id="searchInput" class="w-full pl-11 pr-4 py-3 bg-white dark:bg-dark-card border border-slate-200 dark:border-dark-border rounded-2xl text-sm focus:ring-2 focus:ring-blue-500 outline-none dark:text-white transition-all shadow-sm" placeholder="Cari dokumen...">
                    </div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl font-bold flex items-center gap-2 shadow-lg shadow-blue-500/25 transition-all active:scale-95" data-bs-toggle="modal" data-bs-target="#dataModal">
                        <i class="fas fa-plus"></i> Tambah Baru
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="max-w-6xl mx-auto">
            <div class="premium-card overflow-hidden">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr class="bg-slate-50/50 dark:bg-slate-800/40">
                                <th class="ps-8 py-5 text-[11px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest border-0">Butiran Dokumen</th>
                                <th class="text-center py-5 text-[11px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest border-0 hidden sm:table-cell">Kategori</th>
                                <th class="text-end pe-8 py-5 text-[11px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest border-0">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody id="data-table-body" class="dark:text-slate-300">
                            <!-- Kandungan Dinamik -->
                        </tbody>
                    </table>
                </div>

                <!-- Keadaan Kosong -->
                <div id="empty-state" class="py-24 text-center hidden">
                    <div class="w-20 h-20 bg-slate-50 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-folder-open text-slate-300 dark:text-slate-600 text-3xl"></i>
                    </div>
                    <h4 class="font-bold text-slate-400">Tiada Data Ditemui</h4>
                </div>
            </div>

            <!-- Bar Statistik -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-10">
                 <div class="premium-card p-6 flex items-center gap-5">
                    <div class="w-14 h-14 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 border border-blue-100 dark:border-blue-500/20 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-server text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Jumlah Rekod</p>
                        <h3 id="total-files" class="text-2xl font-black dark:text-white mb-0">0</h3>
                    </div>
                </div>
                <div class="premium-card p-6 flex items-center gap-5">
                    <div class="w-14 h-14 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-500/20 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-circle-check text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Status Sistem</p>
                        <h3 class="text-2xl font-black text-emerald-500 mb-0 tracking-tight">AKTIF</h3>
                    </div>
                </div>
                <div class="premium-card p-6 flex items-center gap-5">
                    <div class="w-14 h-14 bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 border border-amber-100 dark:border-amber-500/20 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-bolt-lightning text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Sinkronisasi</p>
                        <h3 class="text-2xl font-black dark:text-white mb-0" style="font-size: 16px;">AUTOMASI</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER BERGERAK - Enlarged text and increased padding -->
    <footer class="nexus-footer">
        <div class="container mx-auto px-4">
            <marquee behavior="scroll" direction="left" class="text-xl md:text-2xl font-black text-slate-600 dark:text-slate-300 tracking-tight">
                <span class="mx-7">"Menjadi programmer itu bukan soal siapa yang paling jenius,tapi siapa yang paling kuat bertahan saat gagal".</span>
                <span class="mx-7 text-blue-600">★</span>
                <span class="mx-7">"Menjadi programmer itu bukan soal siapa yang paling jenius,tapi siapa yang paling kuat bertahan saat gagal".</span>
                <span class="mx-7 text-blue-600">★</span>
                <span class="mx-7">"Menjadi programmer itu bukan soal siapa yang paling jenius,tapi siapa yang paling kuat bertahan saat gagal".</span>
            </marquee>
        </div>
    </footer>

    <!-- MODAL: TAMBAH / EDIT -->
    <div class="modal fade" id="dataModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content dark:bg-dark-card shadow-2xl">
                <div class="p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h5 id="modalTitle" class="text-2xl font-black dark:text-white tracking-tight">Tambah Fail</h5>
                        <button type="button" class="text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors" data-bs-dismiss="modal">
                            <i class="fas fa-xmark text-xl"></i>
                        </button>
                    </div>
                    <form id="data-form">
                        <input type="hidden" id="item-id">
                        <div class="space-y-5">
                            <div>
                                <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2 block">Nama Dokumen</label>
                                <input type="text" id="in-name" required class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 border-none focus:ring-2 focus:ring-blue-500 outline-none text-slate-900 dark:text-white shadow-inner" placeholder="Contoh: Laporan Kewangan">
                            </div>
                            <div>
                                <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2 block">Kategori</label>
                                <select id="in-cat" class="w-full px-4 py-3 rounded-2xl bg-slate-50 dark:bg-slate-800 border-none focus:ring-2 focus:ring-blue-500 outline-none text-slate-900 dark:text-white shadow-inner">
                                    <option value="Kewangan">Kewangan</option>
                                    <option value="Keselamatan">Keselamatan</option>
                                    <option value="Operasi">Operasi</option>
                                    <option value="Inventori">Inventori</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-8">
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-500/20 transition-all active:scale-95">Simpan Rekod</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: BUTIRAN -->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content dark:bg-dark-card shadow-2xl">
                <div class="p-8">
                    <div class="w-20 h-20 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 rounded-3xl flex items-center justify-center mx-auto mb-6 border border-blue-500/10 shadow-sm">
                        <i class="fas fa-file-lines text-3xl"></i>
                    </div>
                    <div class="text-center mb-8">
                        <h4 id="det-name" class="text-2xl font-black dark:text-white tracking-tight mb-2">Nama Fail</h4>
                        <span id="det-id" class="px-3 py-1 bg-slate-100 dark:bg-slate-800 rounded-lg text-[10px] font-black text-slate-500 tracking-widest uppercase">ID: #0000</span>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center p-4 bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-slate-100 dark:border-white/5">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Kategori Utama</span>
                            <span id="det-cat" class="text-sm font-bold dark:text-white">---</span>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-slate-100 dark:border-white/5">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tarikh Input</span>
                            <span id="det-date" class="text-sm font-bold dark:text-white">---</span>
                        </div>
                    </div>
                    
                    <button class="w-full mt-8 py-3 bg-slate-100 dark:bg-slate-800 dark:text-white font-bold rounded-2xl hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors" data-bs-dismiss="modal">Tutup Paparan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div class="toast-container position-fixed bottom-4 end-4 p-3">
        <div id="liveToast" class="toast align-items-center text-white bg-slate-900 dark:bg-blue-600 border-0 rounded-2xl shadow-2xl" role="alert">
            <div class="d-flex p-3">
                <div class="toast-body font-bold text-sm" id="toast-text">Berjaya!</div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let dataItems = JSON.parse(localStorage.getItem('nexus_db_v5')) || [
            { id: 4101, name: 'Laporan Audit Tahunan 2025', category: 'Kewangan', date: '25/01/2026' },
            { id: 5202, name: 'Protokol Keselamatan Pusat Data', category: 'Keselamatan', date: '26/01/2026' }
        ];

        const themeBtn = document.getElementById('theme-toggle');
        const setDark = (isDark) => {
            if(isDark) document.documentElement.classList.add('dark');
            else document.documentElement.classList.remove('dark');
        }
        if (localStorage.getItem('nexus_theme') === 'dark') setDark(true);
        themeBtn.onclick = () => {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('nexus_theme', isDark ? 'dark' : 'light');
        };

        function notify(msg) {
            document.getElementById('toast-text').innerText = msg;
            new bootstrap.Toast(document.getElementById('liveToast')).show();
        }

        function getCatIcon(cat) {
            const icons = {
                'Kewangan': 'fa-building-columns text-blue-500',
                'Keselamatan': 'fa-user-shield text-rose-500',
                'Operasi': 'fa-gears text-amber-500',
                'Inventori': 'fa-warehouse text-indigo-500'
            };
            return icons[cat] || 'fa-file-lines';
        }

        function renderTable(filter = '') {
            const tbody = document.getElementById('data-table-body');
            const empty = document.getElementById('empty-state');
            tbody.innerHTML = '';
            
            const filtered = dataItems.filter(i => i.name.toLowerCase().includes(filter.toLowerCase()));
            document.getElementById('total-files').innerText = dataItems.length;

            if (filtered.length === 0) {
                empty.classList.remove('hidden');
            } else {
                empty.classList.add('hidden');
                filtered.forEach(item => {
                    const tr = document.createElement('tr');
                    tr.className = 'group transition-all hover:bg-slate-50/50 dark:hover:bg-slate-800/30';
                    tr.innerHTML = `
                        <td class="ps-8">
                            <div class="flex items-center gap-4">
                                <div class="file-icon-box">
                                    <i class="fas fa-file-signature text-sm md:text-base"></i>
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <span class="font-bold text-slate-900 dark:text-white text-sm md:text-base truncate">${item.name}</span>
                                    <span class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">REF: NX-${item.id}</span>
                                </div>
                            </div>
                        </td>
                        <td class="text-center hidden sm:table-cell">
                            <span class="px-3 py-1.5 rounded-xl text-[10px] font-bold bg-slate-100 dark:bg-slate-800/50 text-slate-600 dark:text-slate-300 inline-flex items-center gap-2 border border-slate-200 dark:border-white/5">
                                <i class="fas ${getCatIcon(item.category)} text-[8px]"></i> ${item.category}
                            </span>
                        </td>
                        <td class="text-end pe-8">
                            <div class="flex justify-end gap-2 md:gap-3">
                                <button onclick="viewDetail(${item.id})" class="btn-action btn-view" title="Lihat Butiran">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="editItem(${item.id})" class="btn-action btn-edit" title="Edit Rekod">
                                    <i class="fas fa-pen-to-square"></i>
                                </button>
                                <button onclick="deleteItem(${item.id})" class="btn-action btn-delete" title="Padam Rekod">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            }
            localStorage.setItem('nexus_db_v5', JSON.stringify(dataItems));
        }

        document.getElementById('data-form').onsubmit = (e) => {
            e.preventDefault();
            const id = document.getElementById('item-id').value;
            const name = document.getElementById('in-name').value;
            const cat = document.getElementById('in-cat').value;

            if (id) {
                const idx = dataItems.findIndex(i => i.id == id);
                dataItems[idx].name = name;
                dataItems[idx].category = cat;
                notify('Maklumat berjaya dikemaskini.');
            } else {
                dataItems.unshift({
                    id: Math.floor(1000 + Math.random() * 9000),
                    name: name,
                    category: cat,
                    date: new Date().toLocaleDateString('ms-MY')
                });
                notify('Rekod baru berjaya disimpan.');
            }
            renderTable();
            bootstrap.Modal.getInstance(document.getElementById('dataModal')).hide();
        };

        function editItem(id) {
            const item = dataItems.find(i => i.id == id);
            document.getElementById('modalTitle').innerText = 'Sunting Rekod';
            document.getElementById('item-id').value = item.id;
            document.getElementById('in-name').value = item.name;
            document.getElementById('in-cat').value = item.category;
            new bootstrap.Modal(document.getElementById('dataModal')).show();
        }

        function viewDetail(id) {
            const item = dataItems.find(i => i.id == id);
            document.getElementById('det-name').innerText = item.name;
            document.getElementById('det-id').innerText = `ID: #NX-${item.id}`;
            document.getElementById('det-cat').innerText = item.category;
            document.getElementById('det-date').innerText = item.date;
            new bootstrap.Modal(document.getElementById('detailModal')).show();
        }

        function deleteItem(id) {
            dataItems = dataItems.filter(i => i.id !== id);
            renderTable();
            notify('Data telah dipadam secara kekal.');
        }

        document.getElementById('dataModal').addEventListener('hidden.bs.modal', () => {
            document.getElementById('modalTitle').innerText = 'Tambah Fail';
            document.getElementById('item-id').value = '';
            document.getElementById('data-form').reset();
        });

        document.getElementById('searchInput').oninput = (e) => renderTable(e.target.value);
        document.addEventListener('DOMContentLoaded', () => renderTable());
    </script>
</body>
</html>