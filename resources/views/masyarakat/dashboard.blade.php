<x-app-layout>
    <div class="flex min-h-screen bg-gray-50">
        <aside class="w-64 bg-white border-r border-gray-200 hidden md:block flex-shrink-0">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-blue-600 tracking-tight">Nickelfox<span class="text-gray-900">.</span></h2>
            </div>

            <nav class="mt-4 px-4 space-y-2">
                <a href="#" class="flex items-center px-4 py-3 bg-blue-50 text-blue-600 rounded-xl font-semibold">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('masyarakat.profile') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Profil Saya
                </a>

                <div class="pt-10">
                    <a href="{{ route('masyarakat.logout') }}" class="flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-xl transition-all font-medium">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Keluar
                    </a>
                </div>
            </nav>
        </aside>

        <main class="flex-1 overflow-y-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Dashboard Masyarakat</h2>
                    <p class="text-gray-500">Halo, <span class="font-semibold text-blue-600">{{ session('nama_warga') }}</span>. Sampaikan laporan Anda di sini.</p>
                    <p class="text-[11px] font-black text-blue-500 uppercase tracking-[0.2em] mt-2">
                        🕒 {{ \Carbon\Carbon::now()->timezone('Asia/Jakarta')->translatedFormat('d F Y | H:i') }} WIB
                    </p>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-11 h-11 bg-blue-600 rounded-2xl flex items-center justify-center text-white font-bold shadow-lg shadow-blue-200">
                        {{ substr(session('nama_warga'), 0, 1) }}
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm font-medium text-gray-500">Total Laporan</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $laporan->count() }}</p>
                </div>
                <div class="bg-amber-50 p-6 rounded-2xl border border-amber-100 shadow-sm">
                    <p class="text-sm font-medium text-amber-600">Diproses</p>
                    <p class="text-2xl font-bold text-amber-700">{{ $laporan->where('status', 'proses')->count() }}</p>
                </div>
                <div class="bg-green-50 p-6 rounded-2xl border border-green-100 shadow-sm">
                    <p class="text-sm font-medium text-green-600">Selesai</p>
                    <p class="text-2xl font-bold text-green-700">{{ $laporan->where('status', 'selesai')->count() }}</p>
                </div>
                <div class="bg-red-50 p-6 rounded-2xl border border-red-100 shadow-sm">
                    <p class="text-sm font-medium text-red-600">Ditolak</p>
                    <p class="text-2xl font-bold text-red-700">{{ $laporan->where('status', 'ditolak')->count() }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <div class="lg:col-span-4">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mr-3 text-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                            </span>
                            Tulis Laporan
                        </h3>

                        @if(session('success'))
                            <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-xl border border-green-100 text-sm italic">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Laporan</label>
                                <input type="text" name="judul" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-sm" placeholder="Apa yang ingin diadukan?">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Kejadian</label>
                                <input type="text" name="lokasi_kejadian" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-sm" placeholder="Contoh: Depan Toko Maju, RT 02...">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Laporan</label>
                                <textarea name="isi_laporan" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-sm" placeholder="Jelaskan detail pengaduan Anda..."></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Bukti</label>
                                <input type="file" name="foto" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 cursor-pointer">
                            </div>
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-blue-100 uppercase tracking-wide">
                                Kirim Aduan
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                            <h3 class="text-xl font-bold text-gray-800 uppercase tracking-tight">Riwayat Laporan</h3>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-gray-50/50">
                                        <th class="px-6 py-4 text-[11px] font-bold text-gray-400 uppercase tracking-widest text-center">Waktu Masuk</th>
                                        <th class="px-6 py-4 text-[11px] font-bold text-gray-400 uppercase tracking-widest">Detail Laporan</th>
                                        <th class="px-6 py-4 text-[11px] font-bold text-gray-400 uppercase tracking-widest text-center">Status</th>
                                        <th class="px-6 py-4 text-[11px] font-bold text-gray-400 uppercase tracking-widest text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50 text-sm">
                                    @forelse($laporan as $item)
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex flex-col">
                                                <span class="text-gray-900 font-bold text-xs">{{ $item->created_at->format('d M Y') }}</span>
                                                <span class="text-blue-500 font-black text-[10px]">{{ \Carbon\Carbon::parse($item->created_at)->timezone('Asia/Jakarta')->format('H:i') }} WIB</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-gray-900">{{ $item->judul }}</div>
                                            <div class="text-[10px] text-blue-600 font-bold mb-1 uppercase tracking-wider">📍 {{ $item->lokasi_kejadian }}</div>
                                            <div class="text-xs text-gray-400 truncate max-w-[200px] italic">"{{ $item->isi_laporan }}"</div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if($item->status == 'pending')
                                                <span class="px-3 py-1 rounded-full text-[10px] font-black bg-amber-50 text-amber-600 border border-amber-100 uppercase">Menunggu</span>
                                            @elseif($item->status == 'proses')
                                                <span class="px-3 py-1 rounded-full text-[10px] font-black bg-blue-50 text-blue-600 border border-blue-100 uppercase">Diproses</span>
                                            @elseif($item->status == 'selesai')
                                                <span class="px-3 py-1 rounded-full text-[10px] font-black bg-green-50 text-green-600 border border-green-100 uppercase">Selesai</span>
                                            @else
                                                <span class="px-3 py-1 rounded-full text-[10px] font-black bg-red-50 text-red-600 border border-red-100 uppercase">Ditolak</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <button class="text-blue-600 hover:bg-blue-600 hover:text-white font-black text-[10px] px-3 py-2 bg-blue-50 rounded-lg transition-all uppercase">
                                                Tanggapan
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-20 text-center text-gray-400 text-sm italic font-medium">Belum ada aktivitas laporan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
