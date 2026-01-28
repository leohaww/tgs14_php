    <!-- FOOTER BERGERAK - Enlarged text and increased padding -->
    <footer class="nexus-footer">
        <div class="container mx-auto px-4">
            <marquee behavior="scroll" direction="left" class="text-xl md:text-2xl font-black text-slate-600 dark:text-slate-300 tracking-tight">
                <span class="mx-7">Menjadi programmer itu bukan soal siapa yang paling jenius,tapi siapa yang paling kuat bertahan saat gagal.</span>
                <span class="mx-7 text-blue-600">★</span>
                <span class="mx-7">Menjadi programmer itu bukan soal siapa yang paling jenius,tapi siapa yang paling kuat bertahan saat gagal.</span>
                <span class="mx-7 text-blue-600">★</span>
                <span class="mx-7">Menjadi programmer itu bukan soal siapa yang paling jenius,tapi siapa yang paling kuat bertahan saat gagal.</span>
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