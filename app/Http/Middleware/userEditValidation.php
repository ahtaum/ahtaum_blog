<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userEditValidation
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
        $credentials = Validator::make(
            $request->all(),
            [
                'username' => 'required|max:7',
                'password_confirm' => 'same:password',
                'avatar' => 'image|file|max:10240',
            ],
            [
                'username.required' => 'Nama tidak boleh kosong',
                'username.max' => 'Nama maksimal 7 karakter',
                'password_confirm.same' => 'Konfirmasi password tidak sama',
                'avatar.image' => 'Format file harus gambar',
                'avatar.file' => 'File harus berupa file',
                'avatar.max' => 'Ukuran file maksimal 10 MB',
            ]
        );

        if ($credentials->fails()) {
            return redirect()->back()->withErrors($credentials)->withInput();
        }
        
        return $next($request);
    }
}
