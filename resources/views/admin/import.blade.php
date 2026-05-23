<x-layout class="md:px-6 px-4 py-10">
    <x-slot:title>Import Data</x-slot:title>

    <div class="max-w-7xl mx-auto space-y-8">
        <header class="border-b border-gray-700 pb-4">
            <h1 class="text-3xl font-bold uppercase tracking-tighter">Import Data Discography</h1>
            <p class="text-sm text-gray-500 mt-2">Import data album, single, dan lirik melalui file Excel</p>
        </header>

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="alert alert-success mb-6 rounded-none font-semibold">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error mb-6 rounded-none font-semibold">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if (session('errors'))
            <div class="alert alert-error mb-6 rounded-none">
                <div class="w-full">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <span class="font-bold">Terdapat kesalahan validasi pada file yang diupload:</span>
                    </div>
                    <div class="mt-4 space-y-2 text-sm">
                        @foreach (session('errors') as $failure)
                            <div class="bg-base-100 p-3 border-l-4 border-error">
                                <span class="font-bold">Baris {{ $failure->row() }}</span>
                                @if ($failure->attribute())
                                    <span class="text-gray-400">- Kolom: <span class="font-mono">{{ $failure->attribute() }}</span></span>
                                @endif
                                <div class="mt-1 text-gray-300">
                                    @foreach ($failure->errors() as $error)
                                        <div>• {{ $error }}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- Albums Section --}}
        <section class="space-y-4">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-bold uppercase tracking-widest flex items-center">
                    <i class="fas fa-compact-disc mr-3"></i>
                    Albums
                </h2>
            </div>
            <div class="border border-gray-800">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Download Template --}}
                        <div class="space-y-3">
                            <h3 class="font-bold text-sm uppercase tracking-wider text-gray-400">Download Template</h3>
                            <p class="text-sm text-gray-500">Download template Excel untuk import data album</p>
                            <a href="{{ route('admin.import.template', 'albums') }}"
                               class="btn btn-sm btn-outline rounded-none">
                                <i class="fas fa-download mr-2"></i>
                                Download Template Albums
                            </a>
                        </div>

                        {{-- Upload File --}}
                        <div class="space-y-3">
                            <h3 class="font-bold text-sm uppercase tracking-wider text-gray-400">Upload File</h3>
                            <p class="text-sm text-gray-500">Upload file Excel yang sudah diisi dengan data album</p>
                            <form action="{{ route('admin.import.process', 'albums') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                                @csrf
                                <input type="file" name="file" accept=".xlsx,.csv"
                                       class="file-input file-input-bordered rounded-none w-full" required>
                                <button type="submit" class="btn btn-sm btn-primary rounded-none text-white">
                                    <i class="fas fa-upload mr-2"></i>
                                    Import Albums
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Singles Section --}}
        <section class="space-y-4">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-bold uppercase tracking-widest flex items-center">
                    <i class="fas fa-music mr-3"></i>
                    Singles
                </h2>
            </div>
            <div class="border border-gray-800">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Download Template --}}
                        <div class="space-y-3">
                            <h3 class="font-bold text-sm uppercase tracking-wider text-gray-400">Download Template</h3>
                            <p class="text-sm text-gray-500">Download template Excel untuk import data single</p>
                            <a href="{{ route('admin.import.template', 'singles') }}"
                               class="btn btn-sm btn-outline rounded-none">
                                <i class="fas fa-download mr-2"></i>
                                Download Template Singles
                            </a>
                        </div>

                        {{-- Upload File --}}
                        <div class="space-y-3">
                            <h3 class="font-bold text-sm uppercase tracking-wider text-gray-400">Upload File</h3>
                            <p class="text-sm text-gray-500">Upload file Excel yang sudah diisi dengan data single</p>
                            <form action="{{ route('admin.import.process', 'singles') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                                @csrf
                                <input type="file" name="file" accept=".xlsx,.csv"
                                       class="file-input file-input-bordered rounded-none w-full" required>
                                <button type="submit" class="btn btn-sm btn-primary rounded-none text-white">
                                    <i class="fas fa-upload mr-2"></i>
                                    Import Singles
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Lyrics Section --}}
        <section class="space-y-4">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-bold uppercase tracking-widest flex items-center">
                    <i class="fas fa-file-alt mr-3"></i>
                    Lyrics
                </h2>
            </div>
            <div class="border border-gray-800">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Download Template --}}
                        <div class="space-y-3">
                            <h3 class="font-bold text-sm uppercase tracking-wider text-gray-400">Download Template</h3>
                            <p class="text-sm text-gray-500">Download template Excel untuk import data lirik</p>
                            <a href="{{ route('admin.import.template', 'lyrics') }}"
                               class="btn btn-sm btn-outline rounded-none">
                                <i class="fas fa-download mr-2"></i>
                                Download Template Lyrics
                            </a>
                        </div>

                        {{-- Upload File --}}
                        <div class="space-y-3">
                            <h3 class="font-bold text-sm uppercase tracking-wider text-gray-400">Upload File</h3>
                            <p class="text-sm text-gray-500">Upload file Excel yang sudah diisi dengan data lirik</p>
                            <form action="{{ route('admin.import.process', 'lyrics') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                                @csrf
                                <input type="file" name="file" accept=".xlsx,.csv"
                                       class="file-input file-input-bordered rounded-none w-full" required>
                                <button type="submit" class="btn btn-sm btn-primary rounded-none text-white">
                                    <i class="fas fa-upload mr-2"></i>
                                    Import Lyrics
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Instructions --}}
        <section class="space-y-4">
            <div class="border border-gray-800 bg-base-200 p-6">
                <h3 class="font-bold text-lg uppercase tracking-wider mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-info"></i>
                    Petunjuk Penggunaan
                </h3>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start">
                        <span class="font-bold mr-2">1.</span>
                        <span>Download template Excel sesuai dengan jenis data yang ingin diimport (Albums, Singles, atau Lyrics)</span>
                    </div>
                    <div class="flex items-start">
                        <span class="font-bold mr-2">2.</span>
                        <span>Isi template dengan data yang sesuai. Pastikan format data sesuai dengan kolom yang terssedia</span>
                    </div>
                    <div class="flex items-start">
                        <span class="font-bold mr-2">3.</span>
                        <span>Simpan file dalam format .xlsx atau .csv (maksimal 5MB)</span>
                    </div>
                    <div class="flex items-start">
                        <span class="font-bold mr-2">4.</span>
                        <span>Upload file melalui form yang tersedia dan klik tombol Import</span>
                    </div>
                    <div class="flex items-start">
                        <span class="font-bold mr-2">5.</span>
                        <span>Sistem akan memvalidasi data dan menampilkan pesan sukses atau error jika ada kesalahan</span>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-700">
                    <p class="text-xs text-gray-500">
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        <strong>Catatan:</strong> Untuk Singles, pastikan album sudah ada di database jika ingin mengaitkan single dengan album.
                        Untuk Lyrics, pastikan single sudah ada di database.
                    </p>
                </div>
            </div>
        </section>

        {{-- Back to Dashboard --}}
        <div class="flex justify-center">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-ghost rounded-none px-12 border border-gray-700">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</x-layout>
