<?php

namespace App\Http\Livewire;

use App\Models\Supplies;
use Livewire\Component;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Search extends Component
{
    use Loggable;
    public $term = "";

    public function render()
    {
        sleep(1);
        $supplies = Supplies::search($this->term)->paginate(10);

        $data = [
            'supplies' => $supplies,
        ];


        return view('livewire.service', $data);
    }
}

