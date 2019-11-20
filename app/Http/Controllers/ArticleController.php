<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //DB::table('articles')->truncate();;

        $list = Article::where('user_id',$this->getUserId())->paginate(10);
        $pagers = $list->links();

        return view('article.index', ['data' => $list, 'pager' => $pagers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rule = [
            'name' => 'required',
            'content' => 'required'
        ];
        $this->validate($request, $rule);
        $model = new Article();
        $model->name = $request->input('name');
        $model->author = $this->getUser('name');
        $model->user_id=$this->getUser('id');
        $model->content = $request->input('content');

        $r = $model->save();
        if ($r) {
            //添加tags
            Tag::add($request->input('tags'),$model->id,'article');
            $data = [
                'status' => ['code' => '200', 'msg' => '添加成功']
            ];
            return redirect()->route('article.index')->with($data);
        }
        $data = [
            'status' => ['code' => '100', 'msg' => '添加失败']
        ];
        return redirect()->route('article.index')->with($data);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artilce=Article::find($id);
        $list = $artilce->comments()->with('user')->paginate(1);
        $pagers = $list->links();
        $data=[
            'show' => $artilce,
            'list'=>$list,
            'pager'=>$pagers
        ];
        return view('article.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id);
        Gate::authorize('self_article', $article);
        return view('article.edit', ['show' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article=Article::find($id);
        Gate::authorize('self_article', $article);
        $rule = [
            'name' => 'required',
            'content' => 'required'
        ];
        $this->validate($request, $rule);
        $model =  Article::find($id);
        $model->name = $request->input('name');

        $model->content = $request->input('content');
        $r = $model->save();
        if ($r) {
            //更新tags
            Tag::add($request->input('tags'),$model->id,'article');
            $data = [
                'status' => ['code' => '200', 'msg' => '编辑成功']
            ];
            return redirect()->route('article.index')->with($data);
        }
        $data = [
            'status' => ['code' => '100', 'msg' => '编辑失败']
        ];
        return redirect()->route('article.index')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        Gate::authorize('self_article', $article);
        $r=Article::find($id)->delete();
        if ($r) {
            $data = [
                'status' => ['code' => '200', 'msg' => '删除成功']
            ];
            return redirect()->route('article.index')->with($data);
        }
        $data = [
            'status' => ['code' => '100', 'msg' => '删除失败']
        ];
        return redirect()->route('article.index')->with($data);
    }
}
