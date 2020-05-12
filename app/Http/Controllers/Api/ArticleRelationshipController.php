<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\PeopleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleRelationshipController extends Controller
{
    public function author(Article $article)
    {
        return new PeopleResource($article->author);
    }

    public function comments(Article $article)
    {
        return new CommentsResource($article->comments);
    }
}
