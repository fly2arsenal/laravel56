<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Models\News;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Http\Requests\ImageRequest;

class NewsController extends Controller
{

    public function getDetail(Request $req){
        $news = News::where('id', $req->id)->get();
        $new = News::findOrFail($req->id);
        $created_time = strtotime($new->created_at);
        $time_alive = strtotime("+1130 minutes", $created_time);
        $now = now()->timestamp;
        if ($now < $time_alive) {
            return view('news.detail', compact('news'));
        }
        else{
            abort(404);  
        }
    }

	public function getManageNews(){
		$news = News::orderBy('title', 'ASC')->paginate('5');
    	return view('news.index', compact('news'));
    }	

    public function getCreateNews(){
    	return view('news.create');
    }

    public function postCreateNews(ImageRequest $req){
    	$news = new News;
    	$news->title = $req->title;
    	$news->content = $req->content;
    	$news_image = $req->file('image')->getClientOriginalName();
        $req->file('image')->move('source/image/news', $news_image);
        $news->file = $news_image;
    	$news->author = Auth::user()->name;
        $news->save();
        return redirect()->route('manageNews')->with('alert-success', 'Add News Successfully');
    }

    public function getEditNews($id){
        $news = News::findOrFail($id);
    	return view('news.edit', compact('news'));
    }

    public function postEditNews(ImageRequest $req){
    	$news = News::findOrFail($req->id);
    	$news->title = $req->title;
        $news->content = $req->content;
        if ($req->hasFile('image')) {
            $news_image = $req->file('image')->getClientOriginalName();
            $req->file('image')->move('source/image/news', $news_image);
            $news->file = $news_image;
        }    
    	$news->author = Auth::user()->name;
        $news->save();
        return redirect()->route('manageNews')->with('alert-success', 'Edit News Successfully');
    }

    public function getDeleteNews($id){
        $news = News::findOrFail($id);
        $news->delete();
    	return redirect()->route('manageNews')->with('alert-success', 'Delete News Successfully');
    }
}
