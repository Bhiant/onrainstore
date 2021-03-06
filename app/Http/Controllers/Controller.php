<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $data = [];

    public function __construct()
    {
        $this->_initAdminMenu();
    }

    private function _initAdminMenu()
    {
        $this->data['currentAdminMenu'] = 'Dashboard';
        $this->data['currentAdminSubMenu'] = '';
    }

    protected function loadTheme($view, $data = [])
    {
        return view('themes/' . env('APP_THEME') . '/' . $view, $data);
    }
}
