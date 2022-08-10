<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index(Request $request){

      $posts = Post::paginate(15);
    $numberofposts= Post::get();
      $countposts=$numberofposts->count();
      if($request->has('view_deleted')){
        $posts=Post::onlyTrashed()->get(); 
        if($posts->count()==0){
          return "no deleted records";
        }
      }
      if($countposts<=0){
        return view('posts.empty');
      }
      else{ 
           // return view('users.index',['users' =>$users]);
      foreach ($posts as $post){
      // return $user->name;
      return view('posts.index',['posts'=>$posts]);
    }}
  
  }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // $request -> all();
        $posts = Post::paginate(15);
        if(isset($request['enabled'])){
 Post::create(['id'=>$request['id'],'title'=>$request['title'],'body'=>$request['body'],'user_id'=>$request['user_id'],'enabled'=>1,'published_at'=>$request['published_at']]);
}
else{
 Post::create(['id'=>$request['id'],'title'=>$request['title'],'body'=>$request['body'],'user_id'=>$request['user_id'],'enabled'=>0,'published_at'=>$request['published_at']]);

}
//Post::create($request->all());

// return view('users.create') ;
 return redirect('posts');



}

public function edit($id){

  $posts = Post::paginate(15)->where('id','=',$id);
  
  return view('posts.edit',['id'=>$id]);
  // return "edit page";
}
public function update(Request $request, $id)
{
  if(isset($request['enabled'])){

    Post::where('id',$id)->update(
       ['title'=>$request['title'],'body'=>$request['body'],'user_id'=>$request['user_id'],'enabled'=>1,'published_at'=>$request['published_at']]
    );}
    else{
      Post::where('id',$id)->update(
        ['title'=>$request['title'],'body'=>$request['body'],'user_id'=>$request['user_id'],'enabled'=>0,'published_at'=>$request['published_at']]
     );
    }
return redirect()->route('posts.index');

}

public function delete($id){
Post::find($id)->delete();
return redirect('posts');

}

public function restore($id){
Post::withTrashed()->find($id)->restore(); 
return redirect()->route('posts.index');

}
}

