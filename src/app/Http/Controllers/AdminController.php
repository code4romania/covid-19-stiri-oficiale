<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $repository;

    public function __construct (\AdminRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list ()
    {
        $articles = $this->repository->getArticles();
        return (view('admin.list', compact('articles')));
    }
    public function add ()
    {

        return (view('admin.add'));
    }
    public function storage (ArticleRequest $request)
    {
        return $this->repository->addArticle($request);

    }
}
