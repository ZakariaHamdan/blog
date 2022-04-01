<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'slug',
        'category_id',
        'user_id'
    ];
    protected $guarded =[];

    //protected $with = ['category', 'author'];

    public function category()
    {
        //$ss = $posts->map(function ($post){return collect($post->toarray())->only('author_username')->all();});
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasmany(Comment::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query->where(function($query) use ($search) {
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orwhere('body', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['category'] ?? false, function ($query, $category){
            $query->wherehas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        $query->when($filters['author'] ?? false, function($query, $author){
            $query->wherehas('author', function($query) use ($author) {
//                $query->where('user_id',User::firstwhere('username', $author)->id);
                $query->where('username',$author);
            });
        });

        Post::wherehas('category', function ($query){$query->where('slug', 'fourthslug');})->get();

    }
}


