<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repo\Tools\MyTools;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Crypt;

class PageController extends Controller
{
    protected $myTools;

    public function __construct() {
        $this->myTools = new MyTools();
    }

    // Client
    public function index() {
        return view('home', [
            'data' => Article::with('user')->get()
        ]);
    }

    public function articles() {
        return view('articles', [
            'data' => Article::with('user')->paginate(3)
        ]);
    }
    public function article($slug) {
        return view('article', [
            'data' => Article::with('user')->where('slug', $slug)->first(),
            'dataOthers' => Article::with('user')->latest()->get()
        ]);
    }

    public function about() {
        return view('about');
    }

    public function admin()
    {
        return view('admin.mainAdmin', [
            'dataContent' => User::with('articles_pages')->find(Auth::id()),
            'dataApiQuotes' => json_decode(file_get_contents('https://type.fit/api/quotes'))
        ]);
    }

    public function posts() {
        return view('admin.posts', [
            'data' => User::with('articles_pages')->find(Auth::id())
        ]);
    }

    public function allPosts() {
        return view('admin.allPosts', [
            'data' => User::with('articles_pages')->find(Auth::id())
        ]);
    }

    public function postForm() {
        return view('admin.postForm');
    }

    public function articleAdmin($slug) {
        return view('admin.articleAdmin', [
            'data' => Article::with('user')->where('slug', $slug)->first()
        ]);
    }

    public function editForm($slug) {
        return view('admin.editForm', [
            'data' => Article::with('user')->where('slug', $slug)->first()
        ]);
    }

    public function profile() {
        return view('admin.profile');
    }
    public function editProfile($id) {
        return view('admin.editProfile');
    }

    // Process
    public function register(Request $request) {
        $this->myTools->store($request->all(), "register");

        return back()->with("success_post", "Registrasi Berhasil");
    }

    public function create(Request $request) {
        $this->myTools->store($request->all(), "create_post");

        return back()->with("success_post", "Post Berhasil");
    }
    
    public function edit(Request $request, $id) {
        $this->myTools->editData($request->all(), "edit_post", $id);
        
        return redirect('admin/edit-form/' . Article::with('user')->where('id', $id)->first()->slug)->with("success_edit", "Post Berhasil Diubah");
    }

    public function deleteArticle($slug) {
        $this->myTools->deleteData($slug);

        return back()->with("success_delete", "Data berhasil di HAPUS!!!");
    }

    public function editUser(Request $request, $id) {
        $this->myTools->editData($request->all(), "edit_user", $id);

        return redirect()->to("admin/profile")->with("success_update_user", "Update Success");
    }

    public function search(Request $request) {
        if($request['title'] == "") {
            return redirect()->to('articles');
        }

        return view('searchResult', [
            'result' => $this->myTools->searchData($request->all()),
            'searchKey' => $request['title']
        ]);
    }

}
