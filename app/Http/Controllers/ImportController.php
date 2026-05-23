<?php

namespace App\Http\Controllers;

use App\Exports\AlbumTemplateExport;
use App\Exports\SingleTemplateExport;
use App\Exports\LyricsTemplateExport;
use App\Imports\AlbumImport;
use App\Imports\SingleImport;
use App\Imports\LyricsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class ImportController extends Controller
{
    /**
     * Tampilkan halaman import
     *
     * @return \Illuminate\View\View
     */
    public function showImportPage()
    {
        return view('admin.import');
    }

    /**
     * Download template Excel berdasarkan tipe
     *
     * @param string $type - 'albums', 'singles', atau 'lyrics'
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadTemplate(string $type)
    {
        // Pilih export class berdasarkan tipe
        $exportClass = match($type) {
            'albums' => new AlbumTemplateExport(),
            'singles' => new SingleTemplateExport(),
            'lyrics' => new LyricsTemplateExport(),
            default => abort(404)
        };

        // Download file Excel dengan nama sesuai tipe
        return Excel::download($exportClass, "{$type}_template.xlsx");
    }

    /**
     * Proses import file Excel
     *
     * @param Request $request
     * @param string $type - 'albums', 'singles', atau 'lyrics'
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request, string $type)
    {
        // Validasi file upload
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv|max:5120' // 5MB max
        ], [
            'file.required' => 'File wajib diupload.',
            'file.mimes' => 'File harus berformat .xlsx atau .csv.',
            'file.max' => 'Ukuran file maksimal 5MB.',
        ]);

        // Pilih import class berdasarkan tipe
        $importClass = match($type) {
            'albums' => new AlbumImport(),
            'singles' => new SingleImport(),
            'lyrics' => new LyricsImport(),
            default => abort(404)
        };

        try {
            // Proses import file Excel
            Excel::import($importClass, $request->file('file'));

            // Dapatkan jumlah baris yang berhasil diimport
            $count = $importClass->getRowCount();

            // Redirect dengan pesan sukses
            return redirect()->back()
                ->with('success', "Berhasil mengimport {$count} {$type}!");

        } catch (ValidationException $e) {
            // Tangkap error validasi dari Laravel Excel
            $failures = $e->failures();

            // Redirect dengan error validasi
            return redirect()->back()
                ->with('errors', $failures)
                ->withInput();
        } catch (\Exception $e) {
            // Tangkap error sistem lainnya
            \Log::error('Import failed', [
                'type' => $type,
                'user_id' => auth()->id(),
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Redirect dengan pesan error umum
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan sistem saat mengimport data. Silakan coba lagi atau hubungi administrator.');
        }
    }
}
