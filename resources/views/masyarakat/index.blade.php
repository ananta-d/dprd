<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen px-6">
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">Pengaduan<span class="text-blue-600">.</span></h2>
        </div>

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Validasi Identitas</h3>
                <p class="text-gray-500 mt-2">Silakan masukkan NIK Anda untuk melanjutkan.</p>
            </div>

            <form action="{{ route('masyarakat.cekNik') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Induk Kependudukan</label>
                    <input type="number" name="nik"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none @error('nik') border-red-500 @enderror"
                           placeholder="16 Digit NIK" required>
                    @error('nik')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-blue-200">
                    Cek Data Saya
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-gray-600">Belum terdaftar?
                    <a href="{{ route('masyarakat.register') }}" class="text-blue-600 font-bold hover:underline">
                        Buat Akun Baru
                    </a>
                </p>
            </div>
        </div>

        <div class="mt-8">
            <a href="/" class="text-gray-400 hover:text-gray-600 text-sm transition-all flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</x-app-layout>
