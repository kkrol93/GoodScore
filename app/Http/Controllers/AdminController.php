<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Requests;
use App\Http\Requests\CreateNewsRequest;
use App\News;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }
    public function newspanel()
    {
        $news = News::latest()->get();
        return view('news-panel')->with('news', $news);
    }
    public function newspost()
    {
      $input = Request::all();
      News::create($input);
      return redirect('#');
    }
    public function editnews($id)
    {
     $news = News::find($id);
      return view('edit-news')->with('news', $news);
      $input = Request::all();
      News::update($input);
      return redirect('#');
    }
    public function updatenews($id, CreateNewsRequest $request)
    {
        $news = News::findorfail($id);
        $news->destroy($request->all());
        return redirect('/admin/news-panel');
    }
 
    public function destroynews($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('/admin/news-panel');
    }
    
    public function userspanel()
    {
        $users = User::latest()->get();
        return view('users-panel')->with('users', $users);
    }
    public function scorespanel()
    {
        return view('scores-panel');
    }
    public function quizpanel()
    {
        return view('quiz-panel');
    }
    public function registerpanel()
    {
        return view('auth/register');
    }
}
