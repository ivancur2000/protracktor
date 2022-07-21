<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\ApiKey;

class ApiKeys extends Component
{
    public $label;
    public $api_key;

    public $id_edit;
    public $label_edit;
    public $api_key_edit;

    protected $listeners = ['edit' => 'edit'];

    public function render()
    {
        return view('livewire.user.api-keys');
    }

    public function create() {
        ApiKey::create([
            'label' => $this->label,
            'api_key' => $this->api_key,
            'status' => 'Active',
            'user_id' => auth()->user()->id
        ]);
        session()->flash('status', 'API Key successfully created.');
        $this->label = '';
        $this->api_key = '';
    }

    public function delete($id) {
        $api_key = ApiKey::find($id);
        $api_key->delete();
        session()->flash('status', 'API Key successfully deleted.');
    }

    public function edit($id) {
        $api_key_selected = ApiKey::find($id);
        $this->id_edit = $id;
        $this->label_edit = $api_key_selected->label;
        $this->api_key_edit = $api_key_selected->api_key;
        $this->emit('showModal');
    }

    public function update() {
        $api_key = ApiKey::find($this->id_edit);
        $api_key->label = $this->label_edit;
        $api_key->api_key = $this->api_key_edit;
        $api_key->save();
        
        session()->flash('status', 'API Key successfully updated.');
        $this->emit('updated');
    }
}
