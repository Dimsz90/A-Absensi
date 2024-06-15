<?php

namespace App\Livewire;

use App\Models\Barcode;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class BarcodeComponent extends Component
{
    use InteractsWithBanner;

    public $deleteName = null;
    public $confirmingDeletion = false;
    public $selectedId = null;

    public function confirmDeletion($id, $name)
    {
        $this->deleteName = $name;
        $this->confirmingDeletion = true;
        $this->selectedId = $id;
    }

    public function delete()
    {
        $barcode = Barcode::find($this->selectedId);
        $barcode->delete();
        $this->confirmingDeletion = false;
        $this->selectedId = null;
        $this->deleteName = null;
        $this->banner(__('Deleted successfully.'));
    }

    public function render()
    {
        $barcodes = Barcode::all();
        return view('livewire.barcode', [
            'barcodes' => $barcodes
        ]);
    }
}
