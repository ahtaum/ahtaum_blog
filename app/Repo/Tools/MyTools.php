<?php

namespace App\Repo\Tools;

use Illuminate\Support\Str;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MyTools implements ToolsInterface {

    public function store(Array $data, string $type) {
        if (!$data) {
            throw new \Exception("Data Required");
        }

        if($type == "register") {
            if(!isset($data["avatar"])) {
                $data['avatar'] = 'images/default.jpg';
            } else {
                $data['avatar'] = Storage::putFileAs('images', $data['avatar'], $data['avatar']->hashName());
            }

            $data["password"] = Hash::make($data['password'], [
                'rounds' => 12,
            ]);

            User::create($data);
        } else if($type == "create_post") {
            $data["users_id"] = User::find(Auth::id())->id;
            $data["slug"] = Str::slug($data["title_articles"] . sha1(rand()));

            if(!isset($data['image_articles'])) {
                $data['image_articles'] = 'images/default.jpg';
            } else {
                $data['image_articles'] = Storage::putFileAs('images', $data['image_articles'], $data['image_articles']->hashName());
            }

            Article::create($data);
        } else {
            throw new \Exception("Wrong Type");
        }
    }

    public function editData(Array $data, string $type, int $id) {
        if($type == "edit_post") {
            
            $img = Article::where('id', $id)->first();

            if(!isset($data['image_articles'])) {

                $data['image_articles'] = $img->image_articles;

            } else {

                if($img->image_articles != "images/default.jpg") {
                    Storage::delete($img->image_articles);
                }

                Storage::putFileAs('images', $data["image_articles"], $data["image_articles"]->hashName());
                $data['image_articles'] = "images/" . $data['image_articles']->hashName();

            }

            Article::find($id)->update([
                "title_articles" => $data["title_articles"],
                "slug" => Str::slug($data["title_articles"] . sha1(rand())),
                "image_articles" => $data['image_articles'],
                "content_articles" => $data['content_articles']
            ]);
            
        } else if ($type == "edit_user") {
            
            $img = User::where('id', $id)->first();

            if(!isset($data['avatar'])) {

                $data['avatar'] = $img->avatar;

            } else {

                if($img->avatar != "images/default.jpg") {
                    Storage::delete($img->avatar);
                }

                Storage::putFileAs('images', $data["avatar"], $data["avatar"]->hashName());
                $data['avatar'] = "images/" . $data['avatar']->hashName();

            }

            User::find($id)->update([
                "username" => $data["username"],
                "password" => Hash::make($data['password'], ['rounds' => 12 ]),
                "avatar" => $data['avatar']
            ]);

        } else {
            throw new \Exception("Wrong Type");
        }
    }

    public function deleteData($slug) {
        $data = Article::where('slug', $slug)->first();

        if($data->image_articles == 'images/default.jpg') {
            Article::where('slug', $slug)->delete();
            File::copy(public_path('images/default.jpg'), public_path('storage/images/default.jpg'));
        } else {
            Storage::delete($data->image_articles);
            Article::where('slug', $slug)->delete();
        }
    }

    public function searchData($data) {
        $result = Article::with('user')->where('title_articles', 'LIKE', '%' . $data['title'] . '%')->get();

        return $result ? $result : null;
    }

}