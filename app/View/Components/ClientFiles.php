<?php

namespace App\View\Components;

use App\Models\Upload;
use Illuminate\View\Component;

class ClientFiles extends Component
{

    /**
     * The Client Id .
     *
     * @var integer
     */
    public $clientId;
    public $uploads;


    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($clientId)
    {
        $this->clientId=$clientId;
        $uploads=Upload::where('client_id',$clientId)->get();
        $this->uploads=$uploads;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client-files',['clientId' => $this->clientId,'uploads' => $this->uploads]);
    }
}
