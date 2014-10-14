<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/26/14
 * Time: 4:36 PM
 */

class PageController extends BaseController{

    public function getNewpage()
    {
        return View::make('page.newpage');
    }

    public function getProject()
    {
        $pages = PageModel::all();
        return View::make('page.project')->with('pages', $pages);
    }

    public function getPage($title)
    {
        $pages = PageModel::where("title", "=", $title)->first();

        return View::make('page.pages')->with('pages', $pages);
    }

    public function postNewpage()
    {
        $id = DB::table('users')->where('username', Session::get('username'))->pluck('id');

        $data = Input::all();

        $page = new PageModel;

        $page->title = Input::get('title');
        $page->body = Input::get('content');
        $page->author_id = $id;

        if ($page->save()) {
            return Redirect::route('home')->with('success', 'Page has been created!');;
        } else {
            return Redirect::route('getNewpage')->with('fail', 'An error occurred while creating page!');
        }
    }
} 