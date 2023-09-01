<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Exception;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return ShortLink
     * @throws Exception
     */
    public function shortenLink(Request $request): ShortLink
    {
        $bytes = random_bytes(strlen($request['url'])/3);
        $shortUrl = bin2hex($bytes);
        $shortLink = new ShortLink();
        $shortLink->fill([
            'actual_url'  =>  $request['url'],
            'short_url'  =>  $shortUrl,
        ]);
        if (Auth::check()) {
            Auth::user()->shortLinks()->associate($shortLink);
        }
        $shortLink->save();
        return $shortLink;
    }

    /**
     * @param string $shortUrl
     * @return Redirector
     */
    public function redirectToUrl(string $shortUrl): Redirector
    {
        $url = ShortLink::where('short_url', $shortUrl)->firstOrFail();
        return redirect($url->actual_url);
    }
}
