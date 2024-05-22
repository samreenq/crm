<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ModelUsers;

class AdminAuth
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

            $request->session()->flash('error', "Please Login First");
            $currentUrl = $request->url();
            if (strpos($currentUrl, 'view-meeting') !== false) {

                $request->session()->put('view_meeting_url', $currentUrl);
            }
            return redirect('/admin');


        }
        //echo $request->session()->has('user_id')
        $check_user_available = ModelUsers::where([
            ['id', "=", $request->session()->get('userId')],
            ['user_type', "<>", 2],


        ])->exists();



        if ($check_user_available != 1) {
            $request->session()->flush();
            $request->session()->flash('error', "Sorry, You are no longer aurthorized to access");
            return redirect('/admin');
        }

        return $next($request);
    }
}
