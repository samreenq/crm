<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Models\ModelUsers;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!$request->session()->has('userName')) {
            $request->session()->flush();
            $request->session()->flash('error', "Please Login First");
            $currentUrl = $request->url();
            if (strpos($currentUrl, 'view-meeting') !== false) {
               
                $request->session()->put('view_meeting_url', $currentUrl);
            }
            return redirect('/login-page');
        }

        $check_user_available = ModelUsers::withTrashed()->where([
            ['id', $request->session()->get('userId')],
        ])->get()->toArray();

        if (!isset($check_user_available[0])) {
            $request->session()->flush();
            $request->session()->flash('error', "Sorry, You are removed from System, contact:Admin");
            return redirect('/login-page');
        } else {
            if (!empty($check_user_available[0]['deleted_at'])) {
                $request->session()->flush();
                $request->session()->flash('error', "Sorry, Your Credentials has been revoked");
                return redirect('/login-page');
            }
        }
        return $next($request);
    }
}
