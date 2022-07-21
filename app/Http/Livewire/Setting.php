<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Repositories\SettingRepository;

class Setting extends Component
{
    public $data;
    public $index;

    public function render()
    {
        return view('livewire.setting');
    }

    public function update()
    {
        $settingRepository = new SettingRepository;
        $settingRepository->updaApiKey($this->index, $this->data);
        session()->flash('status', 'Updated successfully.');
    }
}
