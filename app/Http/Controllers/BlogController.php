<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function index(){
      
        $blogs= Blog::paginate(8);
        return view('blog', compact('blogs'));

    }
    public function store(Request $request){
        if ($request->file('image')) {
            $thumbnailImage = $request->file('image');
            $thumbnailImageName = date('YmdHi') . $thumbnailImage->getClientOriginalName();
            Image::make($thumbnailImage)->save('photos/'.$thumbnailImageName);
            $save_url = 'photos/'.$thumbnailImageName;
        }
        $title = $request->input('title');
        $description = $request->input('description');
        //$catagory = $request->input('catagory');
        $blog = new Blog();
        $blog['title'] = $title;
        $blog['description'] = $description;
        //$blog['catagory'] = $catagory;
        $blog['image'] = $thumbnailImageName;
        $blog->save();
        
        $notification = array(
            'message' => 'New Blog added!',
            'alert-type' => 'success'
        );

        return redirect()->route('blog')->with($notification);

    }
    public function show(Request $request){
       
        $blogs = Blog::paginate(2);
        return view('blogGrid', compact('blogs'));
    }
    public function viewBlog($id){
        $blog = Blog::find($id);
        return view('blogArticle', compact('blog'));
    }

    public function destroy(Request $request){
        $blog = Blog::find($request->input('blog_id'));
        $blog->delete();
        $notification = array(
            'message' => 'Blog deleted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('blog')->with($notification);

    }
    public function updateBlog(Request $request){
        $id = $request->input('id');
        $title = $request->input('title');
        $description = $request->input('editordata');

        $blog = Blog::find($id);
        $blog['title'] = $title;
        $blog['description'] = $description;
        
        if ($request->file('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailImageName = date('YmdHi') . $thumbnail->getClientOriginalName();
            Image::make($thumbnail)->save('photos/'.$thumbnailImageName);
            $save_url = 'photos/'.$thumbnailImageName;
            $blog['image'] = $thumbnailImageName;

        }
        $blog->save();
        return response()->json(['success'=>'Blog updated successfully']);

    }
}
