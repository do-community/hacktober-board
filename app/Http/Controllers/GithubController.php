<?php
/**
 * Created by PhpStorm.
 * User: erika
 * Date: 27-9-19
 * Time: 0:12
 */

namespace Http\Controllers;


use App\Http\Controllers\Controller;

class GithubController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}