<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\Document;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class mypost
{
    public $title;

    public $desc;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $desc, $date, $slug, $body)
    {
        $this->title = $title;
        $this->desc = $desc;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;
    }


    static public function getposts(){

        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new mypost(
                $document->title,
                $document->desc,
                $document->date,
                $document->slug,
                $document->body()
            ))
            ->sortByDesc('date');
    }

    static public function find($slug){

        return static::getposts()->firstWhere('slug',$slug);
    }

    static public function findOrFail($slug){
        $post = static::find($slug);
        if(! $post)
            abort(404);
        return $post;
    }

    static public function all(){
        $files = File::files(resource_path("posts/"));
        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }
    static public function getallmeta(){
        $files = File::files(resource_path("posts/"));
        return array_map(function ($file){
            return YamlFrontMatter::parseFile($file);
        }, $files);
    }

}
