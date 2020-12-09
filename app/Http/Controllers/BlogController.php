<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::get();
        return view('blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string|max:50|unique:blogs'
        ]);

        if ($request->file('image')){
            $image = $request->file('image')->store('image' , 'public');
        } else {
            $image = null;
        }

        $request->request->add([
            'slug' => $request->title,
        ]);

        Blog::insert([
            // $request->except('_token'),
            'image' => $image,
            'title' => $request ->get('title'),
            'description' => $request ->get('description'),
            'slug' => $request ->get('slug')
            
        ]);

        return redirect(route('blog.index'))->with(['success' => 'Blog berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request,[
            'title'=>'required|string|max:50|unique:blogs'
        ]);
        $blog->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'slug' => $request->name
        ]);
        return redirect(route('blog.index'))->with(['success' => 'Update Succesfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect(route('blog.index'));
    }

    public function trash() {

        $blog = Blog::onlyTrashed()->get();
        return view('blog.trash', compact('blog'));
    }

    public function restore($id = null) {

        if($id != null) {
            Blog::onlyTrashed()
            ->where('id', $id)
            ->restore();
            return redirect('blog/trash')->with('status', 'Blog berhasil di-restore!');
        } else {
           Blog::onlyTrashed()->restore();
        }
        return redirect('blog/trash')->with('status', 'Blog berhasil di-semua!');
    }

    public function delete($id = null) {

        if($id != null) {
            Blog::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
            return redirect('blog/trash')->with('status', 'Blog berhasil dihapus!');
        } else {
           Blog::onlyTrashed()->forceDelete();
        }
        return redirect('blog/trash')->with('status', 'Blog berhasil dihapus semua!');
    }

}
