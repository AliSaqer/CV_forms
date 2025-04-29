<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CheckMailController extends Controller
{
    function checkmail(Request $request)
    {
        $mail = Post::Where('email', 'like', $request->txt)->first();

        if ($mail) {
            return 1;
        } else {
            return 0;
        }
    }
}
