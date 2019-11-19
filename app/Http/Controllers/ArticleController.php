<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //DB::table('articles')->truncate();;

        $list = Article::paginate(10);
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
            'author' => 'required',
            'content' => 'required'
        ];
        $this->validate($request, $rule);
        $model = new Article();
        $model->name = $request->input('name');
        $model->author = $request->input('author');
        $model->content = $request->input('content');
        $r = $model->save();
        if ($r) {
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
        return view('article.show', ['show' => Article::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('article.edit', ['show' => Article::find($id)]);
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
        $rule = [
            'name' => 'required',
            'author' => 'required',
            'content' => 'required'
        ];
        $this->validate($request, $rule);
        $model =  Article::find($id);
        $model->name = $request->input('name');
        $model->author = $request->input('author');
        $model->content = $request->input('content');
        $r = $model->save();
        if ($r) {
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
