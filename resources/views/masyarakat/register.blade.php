<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen px-6 py-10">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">Nickelfox<span class="text-blue-600">.</span></h2>
        </div>

        <div class="w-full max-w-xl bg-white rounded-2xl shadow-xl p-8 md:p-10">
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-gray-800">Daftar Akun Baru</h3>
                <p class="text-gray-500 mt-2">NIK Anda belum terdaftar. Silakan lengkapi data diri Anda.</p>
            </div>

            <form action="{{ route('masyarakat.store_register') }}" method="POST" class="space-y-5">
                @csrf

                <input type="hidden" value="masyarakat" name="role">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                        <input type="string" name="nik"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none @error('nik') border-red-500 @enderror"
                               value="{{ old('nik', session('nik')) }}" placeholder="16 Digit NIK" required>
                        @error('nik')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none"
                               placeholder="Sesuai KTP" required>
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                        <input type="text" name="telp"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none"
                               placeholder="08xxxxxx" required>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" name="email"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none"
                               placeholder="nama@email.com" required>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap (Sesuai Domisili)</label>
                        <textarea name="alamat" rows="2"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-sm"
                               placeholder="Contoh: Jl. Anggrek No. 12, RT 05/01, Kelurahan..." required></textarea>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password Akun</label>
                        <input type="password" name="password"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none"
                               placeholder="••••••••" required>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-blue-200">
                        Simpan & Masuk ke Dashboard
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-gray-600">Sudah punya akun?
                    <a href="{{ route('masyarakat.index') }}" class="text-blue-600 font-bold hover:underline">
                        Kembali Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
