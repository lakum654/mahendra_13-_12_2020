<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use DataTables;
class PostController extends Controller
{
	public function index(){
		$posts = Post::with('user')->get();
		return view('posts.index',compact('posts'));
	}
    public function create(){
    	$user = User::find(4);

    	$post = new Post();
    	$post->title = "Hello Worl";
    	$user->posts()->saveMany([$post]);
    }
    public function destroy($id){
    	Post::find($id)->delete();
    	return back();
    }
    public function index2(){
    	return view('posts.yajra');
    }
    public function getPosts(Request $request){
    	if ($request->ajax()) {
            $data = Post::with('user')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
