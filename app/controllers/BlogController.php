<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/1/14
 * Time: 11:31 AM
 */

class BlogController extends BaseController{


    public function getBlog()
    {
        $posts = BlogModel::all();
        return View::make('page.blog')->with('posts', $posts);
    }

    public function postBlog()
    {
        $data = Input::all();

        $rules = Validator::make($data, array(
            'title' => 'required',
            'message' => 'required'
        ));

        if($rules->fails())
        {
            return Redirect::route('getBlog')->withErrors($rules);
        }
        else
        {
            $id = DB::table('users')->where('username', Session::get('username'))->pluck('id');

            $blog = new BlogModel;

            $blog->title = Input::get('title');
            $blog->message = Input::get('message');
            $blog->author_id = $id;

            if($blog->save())
            {
                return Redirect::route('getBlog')->with('success', 'Post was successful');
            }
            else
            {
                return Redirect::route('getBlog')->with('fail', 'An error occurred while processing your post.');
            }
        }
    }
} 