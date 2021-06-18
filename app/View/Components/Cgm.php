<?php

namespace App\View\Components;

use App\Models\Contrat;
use Illuminate\View\Component;

class Cgm extends Component
{

    /**
     * The Client Id .
     *
     * @var integer
     */
    public $clientId;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($clientId)
    {
        $this->clientId=$clientId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $contrats=Contrat::all()->where('client_id',$this->clientId);

        return view('components.cgm',['contrats'=>$contrats]);
    }
}
