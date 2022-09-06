<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class validation
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
                'username' => 'required|unique:users|max:7',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'password_confirm' => 'required|same:password',
                'avatar' => 'image|file|max:10240',
            ],
            [
                'username.required' => 'Nama tidak boleh kosong',
                'username.unique' => 'Nama sudah digunakan',
                'username.max' => 'Nama maksimal 7 karakter',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'password_confirm.required' => 'Konfirmasi password tidak boleh kosong',
                'password_confirm.same' => 'Konfirmasi password tidak sama',
                'avatar.image' => 'Format file harus gambar',
                'avatar.file' => 'File harus berupa file',
                'avatar.max' => 'Ukuran file maksimal 10 MB',
            ]
        );

        if ($credentials->fails()) {
            return redirect('/registrasi')->withErrors($credentials)->withInput();
        }

        return $next($request);
    }
}
