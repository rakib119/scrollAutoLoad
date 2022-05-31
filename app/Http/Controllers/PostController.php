<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(Request $request)
    {


        $total_user = User::count();
        if ($request->ajax()) {
            $num = 6;
            $users = User::paginate($num);
            // echo $posts->count();
            $html = '';
            $page = (int)$request->page;
            $i = $num * ($page - 1);
            foreach ($users as $user) {
                $i++;
                $html .= "
                <div class='col-12'>
                    <div class='card mt-3'>
                        <div class='card-header'>
                            User ID : &nbsp; $i
                        </div>
                        <div class='card-body'>
                            <p class='card-text'> $user->uid </p>
                        </div>
                    </div>
                </div>
            ";
            }

            return $html;
        }

        return view('post', compact('total_user'));
    }
}
