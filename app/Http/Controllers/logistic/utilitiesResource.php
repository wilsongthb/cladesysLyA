<?php

namespace App\Http\Controllers\logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\brandsModel;
use App\locationsModel;
use App\measurementsModel;
use App\categoriesModel;
use App\packingsModel;
use App\ticketsModel;

class utilitiesResource extends Controller
{
    public function brands(Request $request)
    {
        $result = brandsModel::where('flagstate', '1');
        if(strlen($request->search) !== 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(15);
    }
    public function categories(Request $request)
    {
        $result = categoriesModel::where('flagstate', '1');
        if(strlen($request->search) !== 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(15);
    }
    public function measurements(Request $request)
    {
        $result = measurementsModel::where('flagstate', '1');
        if(strlen($request->search) !== 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(15);
    }
    public function packings(Request $request)
    {
        $result = packingsModel::where('flagstate', '1');
        if(strlen($request->search) !== 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('detail', 'LIKE', "%$request->search%");
        }
        return $result->paginate(15);
    }
    public function locations(Request $request)
    {
        $result = locationsModel::where('flagstate', '1');
        if(strlen($request->search) !== 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('name', 'LIKE', "%$request->search%");
        }
        return $result->paginate(15);
    }
    public function tickets(Request $request)
    {
        $result = ticketsModel::where('flagstate', '1');
        if(strlen($request->search) !== 0){// si se envia algun argumento de busqueda
            // condiciones de busqueda
            $result->where('name', 'LIKE', "%$request->search%");
        }
        return $result->paginate(15);
    }
}