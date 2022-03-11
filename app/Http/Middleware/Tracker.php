<?php

namespace App\Http\Middleware;

use App\Models\Track;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Tracker
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
        $track = new Track();
        $track->datetime = Carbon::now();
        $track->url = $request->url();
        if(Auth::user())
            $track->user_id = Auth::user()->id;
        $track->save();

        return $next($request);
    }
}
