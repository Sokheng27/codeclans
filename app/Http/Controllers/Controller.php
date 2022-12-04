<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $params = [];

    /**
     * Get parameter for filter
     */
    public function getParams()
    {
        $this->params['page'] = request()->get('page', 1);
        $this->params['search'] = request()->get('search', '');
        $this->params['limit'] = request()->get('limit', config('custom.crud.list.limit'));
        $this->params['order'] = request()->get('order', config('custom.crud.list.order'));
        $this->params['sort'] = request()->get('sort', config('custom.crud.list.sort'));
    }

    /**
     * Mapping paramater
     *
     * @param any $params
     */
    public function mapParams($params)
    {
        foreach ($params as $key => $param) {
            $this->params[$key] = $param;
        }
    }
}
