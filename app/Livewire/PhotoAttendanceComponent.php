<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; // Trait untuk handling upload file di Livewire
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

/**
 * Component untuk menangani absensi dengan foto
 */
class PhotoAttendanceComponent extends Component
{
    use WithFileUploads;

    public $currentLiveCoords = null; // Menyimpan koordinat lokasi saat ini
    public $photo; // Menyimpan file foto yang diupload
    public $shift_id; // ID shift yang dipilih
    public $attendance = null; // Data absensi hari ini
    public $successMsg = ''; // Pesan sukses

    /**
     * Inisialisasi component
     * Mengambil data absensi user hari ini jika ada
     */
    public function mount()
    {
        $this->attendance = Attendance::where('user_id', Auth::id())
            ->where('date', now()->toDateString())
            ->first();
    }

    /**
     * Method untuk melakukan absensi
     * Validasi input dan menyimpan data absensi
     */
    public function takeAttendance()
    {
        // Validasi input
        $this->validate([
            'photo' => 'required|image|max:2048', // Validasi foto max 2MB
            'shift_id' => 'required', // Shift harus dipilih
            'currentLiveCoords' => 'required|array' // Koordinat harus ada
        ]);

        // Upload dan simpan foto
        $path = $this->photo->store('attendance-photos', 'public');

        // Buat object attendance baru
        $attendance = new Attendance();
        $attendance->user_id = Auth::id();
        $attendance->date = now()->toDateString();
        $attendance->shift_id = $this->shift_id;
        $attendance->latitude = $this->currentLiveCoords[0];
        $attendance->longitude = $this->currentLiveCoords[1];
        $attendance->attachment = $path;
        
        // Cek apakah absen masuk atau keluar
        if (!$this->attendance) {
            $attendance->time_in = now(); // Absen masuk
            $this->successMsg = 'Berhasil melakukan absen masuk!';
        } else {
            $attendance->time_out = now(); // Absen keluar
            $this->successMsg = 'Berhasil melakukan absen keluar!';
        }

        $attendance->save();
        $this->attendance = $attendance;
    }

    /**
     * Render view component
     * Mengirim data shifts ke view
     */
    public function render()
    {
        return view('livewire.photo-attendance-component', [
            'shifts' => \App\Models\Shift::all()
        ]);
    }
}