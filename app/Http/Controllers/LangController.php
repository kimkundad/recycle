<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App;
  
class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('lang');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function change(Request $request)
    {
        $lang = $request->query('lang');

        if (in_array($lang, config('app.supported_locales'), true)) {
            App::setLocale($lang);
            session()->put('locale', $lang);
        }

        return redirect()->back();
    }
}
