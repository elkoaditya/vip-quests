<?php

namespace App\Http\Livewire\Root;

use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['echo:root,TriggerRoot' => 'notifyNewOrder'];
    public string $nama;
    public string $jabatan, $panggilan;
    public bool $show;

    public function notifyNewOrder($data)
    {
        $this->show = false;
        sleep(1);


        $this->nama = $data['nama'];
        $this->jabatan = $data['jabatan'];
        $this->panggilan = $data['panggilan'];
        $this->show = true;
    }
    public function render()
    {

        return view('livewire.root.index');
    }
}
