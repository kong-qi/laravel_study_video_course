<?php

namespace App\Http\Controllers;

use App\Mail\CommentNotify;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    //
    public function store(Request $request){
        $rule = [
            'content' => 'required'
        ];
        $this->validate($request, $rule);
        $model = new Comment();
        $model->user_id = $this->getUserId();
        $model->content = $request->input('content');
        $model->model_type=$request->input('model_type');
        $model->model_id=$request->input('model_id');
        $model->parent_id=0;
        $r = $model->save();
        $article=Article::find($request->input('model_id'));

        //邮件通知文章人,队列发送

        Mail::to($article->user['email'])->queue(new CommentNotify($model,$article));


        if ($r) {
            $data = [
                'status' => ['code' => '200', 'msg' => '添加成功']
            ];
            return redirect()->route('article.show',['article'=>$request->input('model_id')])->with($data);
        }
        $data = [
            'status' => ['code' => '100', 'msg' => '添加失败']
        ];
        return redirect()->route('article.show',['article'=>$request->input('model_id')])->with($data);
    }
}
