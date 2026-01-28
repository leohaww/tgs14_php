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
