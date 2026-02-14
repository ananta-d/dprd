<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .croppie-container { padding: 0 !important; }
        .cr-boundary { border-radius: 1.5rem !important; }
    </style>

    <div class="flex min-h-screen bg-gray-50">
        <aside class="w-64 bg-white border-r border-gray-200 hidden md:block flex-shrink-0">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-blue-600 tracking-tight">Nickelfox<span class="text-gray-900">.</span></h2>
            </div>

            <nav class="mt-4 px-4 space-y-2">
                <a href="{{ route('masyarakat.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl transition-all font-medium">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('masyarakat.profile') }}" class="flex items-center px-4 py-3 bg-blue-50 text-blue-600 rounded-xl font-semibold shadow-sm shadow-blue-50">
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
                    <h2 class="text-3xl font-bold text-gray-900">Pengaturan Profil</h2>
                    <p class="text-gray-500 italic">Kelola informasi pribadi Anda dengan aman.</p>

                    <p class="text-[12px] font-bold text-blue-600 mt-2 flex items-center gap-1">
                        <span>🕒</span> {{ \Carbon\Carbon::now()->timezone('Asia/Jakarta')->translatedFormat('d F Y | H:i') }} WIB
                    </p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('masyarakat.dashboard') }}" class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-xl text-sm font-bold hover:bg-gray-50 transition-all shadow-sm">
                        Kembali
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-8 p-4 bg-green-50 border border-green-100 text-green-700 rounded-2xl flex items-center text-sm font-medium">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center sticky top-8">
                        <div class="relative inline-block">
                            <div id="preview-container">
                                @if($user->foto)
                                    <img id="main-avatar" src="{{ asset('storage/' . $user->foto) }}" class="w-28 h-28 rounded-full object-cover mx-auto mb-6 shadow-xl border-4 border-white">
                                @else
                                    <div id="main-initial" class="w-28 h-28 bg-gradient-to-tr from-blue-600 to-blue-400 rounded-full mx-auto mb-6 flex items-center justify-center text-white text-4xl font-bold shadow-xl shadow-blue-100">
                                        {{ strtoupper(substr($user->nama, 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                            <div id="crop-area" class="hidden mb-6"></div>

                            <div class="absolute bottom-6 right-0 w-8 h-8 bg-green-500 border-4 border-white rounded-full shadow-md"></div>
                        </div>

                        <h2 class="text-xl font-bold text-gray-900 leading-tight">{{ $user->nama }}</h2>
                        <p class="text-blue-600 text-xs font-bold uppercase tracking-widest mt-1">NIK: {{ $user->nik }}</p>

                        <div class="mt-8 pt-8 border-t border-gray-50 space-y-3">
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-gray-400 font-medium">Status Akun</span>
                                <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full font-bold uppercase text-[10px]">Terverifikasi</span>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-gray-400 font-medium">Bergabung Sejak</span>
                                <span class="text-gray-900 font-bold">{{ $user->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 bg-blue-50 rounded-3xl border border-blue-100">
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex-shrink-0 flex items-center justify-center text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="text-left">
                                <h4 class="text-sm font-bold text-blue-900 uppercase tracking-tight">Keamanan Data</h4>
                                <p class="text-xs text-blue-700/70 mt-1 leading-relaxed">Data pribadi Anda dilindungi oleh sistem enkripsi kami dan hanya digunakan untuk keperluan tindak lanjut laporan pengaduan masyarakat.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-8 border-b border-gray-50 bg-gray-50/30">
                            <h3 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Detail Informasi Pribadi</h3>
                        </div>

                        <div class="p-8">
                            <form id="profileForm" action="{{ route('masyarakat.updateProfile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="image_base64" id="image_base64">

                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2">Perbarui Foto Profil</label>
                                        <input type="file" name="foto" id="foto_upload"
                                               class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                                        <p class="mt-2 text-[10px] text-gray-400 italic">* Pilih foto lalu geser/zoom untuk menyesuaikan posisi</p>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2">NIK</label>
                                            <input type="text" value="{{ $user->nik }}" disabled
                                                   class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-100 text-gray-400 cursor-not-allowed font-medium text-sm">
                                        </div>

                                        <div>
                                            <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
                                            <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" required
                                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all outline-none text-sm font-semibold">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2">Email</label>
                                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all outline-none text-sm font-semibold">
                                        </div>

                                        <div>
                                            <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2">WhatsApp</label>
                                            <input type="text" name="telp" value="{{ old('telp', $user->telp) }}" required
                                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all outline-none text-sm font-semibold">
                                        </div>
                                    </div>

                                    <div class="pt-10 border-t border-gray-50 flex justify-end">
                                        <button type="submit"
                                                class="w-full md:w-auto px-10 py-3 bg-blue-600 text-white font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-blue-700 transition-all shadow-lg active:scale-95">
                                            Update Profil
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="cropModal" class="fixed inset-0 z-[999] hidden bg-black/80 flex items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-3xl overflow-hidden w-full max-w-md shadow-2xl">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">Sesuaikan Foto</h3>
                <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="p-6 bg-gray-50">
                <div id="modal-cropper"></div>
            </div>
            <div class="p-6 border-t border-gray-100 flex gap-3">
                <button type="button" onclick="closeModal()" class="flex-1 py-3 text-gray-500 font-bold text-sm uppercase tracking-widest">Batal</button>
                <button type="button" id="crop-done" class="flex-1 py-3 bg-blue-600 text-white rounded-xl font-bold text-sm uppercase tracking-widest shadow-lg shadow-blue-200 active:scale-95 transition-all">Selesai</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

    <script>
        // Inisialisasi Croppie di dalam modal
        let modalCropper = $('#modal-cropper').croppie({
            viewport: { width: 220, height: 220, type: 'circle' },
            boundary: { width: 300, height: 300 },
            showZoomer: true,
            enableOrientation: true
        });

        // Saat User memilih file
        $('#foto_upload').on('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#cropModal').removeClass('hidden'); // Tampilkan Modal
                    modalCropper.croppie('bind', {
                        url: e.target.result
                    });
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Saat klik tombol "Selesai" di Modal
        $('#crop-done').on('click', function() {
            modalCropper.croppie('result', {
                type: 'canvas',
                size: 'viewport',
                circle: true
            }).then(function(img) {
                // 1. Update preview di sidebar kiri secara real-time
                $('#final-preview-container').html(`
                    <img src="${img}" class="w-28 h-28 rounded-full object-cover mx-auto mb-6 shadow-xl border-4 border-white">
                `);

                // 2. Simpan string Base64 ke input hidden agar bisa dikirim ke server
                $('#image_base64').val(img);

                // 3. Tutup modal
                closeModal();
            });
        });

        function closeModal() {
            $('#cropModal').addClass('hidden');
            $('#foto_upload').val(''); // Reset input file agar bisa pilih file yang sama lagi
        }

        // Handle klik di luar modal untuk menutup
        $(window).on('click', function(event) {
            if (event.target == document.getElementById('cropModal')) {
                closeModal();
            }
        });
    </script>
</x-app-layout>
