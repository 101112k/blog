<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\ArticlesService;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $list = ArticlesService::getAll(2);
        return view('pages.home', [
            'list' => $list
        ]);
    }
}