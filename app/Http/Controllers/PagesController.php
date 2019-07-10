<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\PagesRequest;
use App\Http\Requests\UpdatePagesRequest;
use App\Pages;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {
        $pages=Pages::orderBy('created_at','desc')->paginate(9);
        return view('pages.mainindex',compact('pages'));
    }

    public function index2()
    {
        $pages=Pages::where('category','0')->orderBy('created_at','desc')->paginate(9);
        return view('pages.index',compact('pages'));
    }
    public function index3()
    {
        $pages=Pages::where('category','1')->orderBy('created_at','desc')->paginate(9);
        return view('pages.index',compact('pages'));
    }
    public function index4()
    {
        $pages=Pages::where('category','2')->orderBy('created_at','desc')->paginate(9);
        return view('pages.index',compact('pages'));
    }
    
    public function create()
    {
        return view('pages.create');
    }

    public function store(PagesRequest $request)
    {
        $page = new Pages();
        $page->title = $request->input('title');
        $page->body = $request->input('body');
        $page->category = $request->input('category');

        $image = $request->file('select_file');
        if($image) {
            $new_name = rand() . '.' . $image->getClientOriginalName();

            $image->move(public_path('images'), $new_name);
            $page->path_img= $new_name;
        }
        $page->views = 0;
        $request->user()->pages()->save($page);
        return redirect()->route('pages.show', compact('page'));
    }

    public function show(Pages $page)
    {
        $page->increment('views');
        return view('pages.show', compact('page'),compact('dt'));
    }

    public function destroy($id)
    {
        $page = Pages::find($id);
        $file= $page->path_img;
        $filename = public_path().'/images/'.$file;
        \File::delete($filename);
        $page->delete();
        return redirect('/')->with('success','post removed');
    }

    public function edit($id)
    {
        $page = Pages::find($id);
        return view('pages.edit', compact('page'));
    }

    public function update(UpdatePagesRequest $request, $page)
    {

        $page = Pages::find($page);
        $page->title = $request->input('title');
        $page->body = $request->input('body');
        $page->category = $request->input('category');
        $views = $request->views;
        $page->views = $views;
        $user_id=$page->user_id;
        $page->user_id =$user_id;

        if($request->file('select_file')){
            $file= $page->path_img;
            $filename = public_path().'/images/'.$file;
            \File::delete($filename);

            $image = $request->file('select_file');
            if($image) {
                $new_name = rand() . '.' . $image->getClientOriginalName();

                $image->move(public_path('images'), $new_name);
                $page->path_img= $new_name;
            }
        }

        $page->save();
        return redirect()->route('pages.show', compact('page'));
    }
}
