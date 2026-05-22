<x-layout>
    <x-slot:title>Create Lyric</x-slot:title>

    <div class="max-w-3xl mx-auto py-10 px-6">
        <header class="mb-8 border-b border-gray-700 pb-4">
            <h1 class="text-3xl font-bold uppercase tracking-tighter">Create New Lyric</h1>
        </header>

        {{-- Flash Message & Errors --}}
        @if (session('success'))
            <div class="alert alert-success mb-6 rounded-none font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error mb-6 rounded-none font-semibold">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.lyrics.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="form-control w-full">
                <label class="label"><span class="label-text uppercase font-bold text-xs">Pilih Single /
                        Lagu</span></label>
                <select name="single_id" class="select select-bordered rounded-none w-full" required>
                    <option value="">-- Pilih Lagu --</option>
                    @foreach ($singles as $single)
                        <option value="{{ $single->id }}"
                            {{ old('single_id', $selectedSingleId ?? null) == $single->id ? 'selected' : '' }}>
                            {{ $single->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-control w-full">
                <label class="label"><span class="label-text uppercase font-bold text-xs">Teks Lirik</span></label>
                <textarea name="lyrics_text" rows="15" class="textarea textarea-bordered rounded-none w-full" required
                    placeholder="Masukkan seluruh teks lirik dari lagu di sini...">{{ old('lyrics_text') }}</textarea>
                <label class="label">
                    <span class="label-text-alt text-gray-500">Anda dapat menyalin (copy-paste) lirik lengkap ke dalam
                        box ini. Gunakan baris baru antar bait.</span>
                </label>
            </div>

            <div class="flex items-center gap-4 pt-6 border-t border-gray-800">
                <button type="submit" class="btn btn-primary rounded-none px-12 text-white">Simpan Lirik</button>
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-ghost rounded-none px-12 border border-gray-700">Batal</a>
            </div>
        </form>
    </div>
</x-layout>
