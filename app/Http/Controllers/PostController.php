<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Validator;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        
        $this->post = new Post;

    }


    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(5);
        //print_r($posts);exit;

        return view('admin.posts.index', compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('admin.posts.create');
    }



    public function store(Request $request)
    {

        $input = $request->all();
      //echo "<pre>";print_r($input);exit;

        $validator = Validator::make($input,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',

        ]);
        
        if ($validator->passes()) {

            if ($image = $request->file('image')) {
                $destinationPath = 'post/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            }
        
        $this->post->addPosts($input);
       // DB::insert('insert into portfolios (project_name,status, category_selection, platform_selection, tech_stack,tags, hero_img, description,client_name,slug,company_name,country) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$input['project_name'],$input['status'],$input['category_selection'],$input['platform_selection'],$input['tech_stack'],$input['tags'],$input['hero_img'],$input['description'],$input['client_name'],$input['slug'],$input['company_name'],$input['country']]);
     
        return redirect()->route('admin.posts.index')->with('success','Post created successfully.');
    }

        return redirect()->back()->withErrors($validator)->withInput();
    }


    public function edit($id)
    {
       
         $post = $this->post->find($id);
         return view('admin.posts.edit',compact('post'));
        
    }



    public function update($id, Request $request)
    {
        $input = $request->all();
        //echo "<pre>";print_r($input);exit;

        $validator = Validator::make($input,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        
        ]);
     
        if ($validator->passes()) {


            if ($image = $request->file('image')) {
                $destinationPath = 'post/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            }else{
                unset($input['image']);
            }
    
        
        $this->post->updatePosts($id, $input);
      
        return redirect()->route('admin.posts.index')->with('success','Post updated successfully');
    }

        return redirect()->back()->withErrors($validator)->withInput();
    }



    public function destroy(Request $request, $id)
    {
        //$cms = $this->cms->deleteUser($request->id);
       DB::delete('delete from posts where id = ?',[$request->id]);
     
        return redirect()->route('admin.posts.index')
                        ->with('success','Post deleted successfully');
    }



}
