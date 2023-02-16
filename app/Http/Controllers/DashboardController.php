<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\category;
use App\Models\news;

class DashboardController extends Controller
{
    //

    public function index(){

        $pro = product::count();
        $cat = category::count();

        $view = news::sum('view');

        $objs = DB::table('contacts')->select(
            'contacts.*',
            'contacts.id as id_q',
            'contacts.name as names',
            'contacts.status as status1',
            'type_contacts.*',
            'type_contacts.name as name1',
            )
            ->leftjoin('type_contacts', 'type_contacts.id',  'contacts.type')
            ->whereDate('contacts.created_at', date('Y-m-d'))
            ->paginate(15);

            $objs->setPath('');
      
        $data['sum'] = 1;
        return view('admin.dashboard.index', compact('objs','pro', 'cat', 'view'	));
    }


}
