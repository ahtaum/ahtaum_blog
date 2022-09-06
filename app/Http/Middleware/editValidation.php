<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class editValidation
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
                'title_articles' => 'required|exists:articles,title_articles|max:30|regex:/^[A-Za-z0-9 ]+$/',
                'image_articles' => 'image|file|max:10240',
                'content_articles' => 'required',
            ],
            [
                'title_articles.required' => 'Title is required',
                'title_articles.exists' => 'Title is already exist',
                'title_articles.max' => 'Title is too long',
                'image_articles.image' => 'Image must be an image',
                'image_articles.max' => 'Image must be less than 10MB',
                'image_articles.file' => 'Image must be a file',
                'content_articles.required' => 'Content is required',
            ]
        );

        if ($credentials->fails()) {
            return redirect()->back()->withErrors($credentials)->withInput();
        }

        return $next($request);
    }
}
