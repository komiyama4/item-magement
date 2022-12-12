<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
   
    public function index(Request $request)
    {
        // 商品一覧取得
        $keyword = $request->input('keyword');
        // クエリを作成
        $query = Item::query();

        // もし検索フォームにキーワードが入力されたら
        if(!empty($keyword)) {
            
            $query->where('name','Like','%'.$keyword.'%')
            ->orWhere('detail','Like','%'.$keyword.'%');
            

            $items = $query->orderBy('id')->paginate(20);
        }else{
        $items = Item
            ::where('items.status','active')
            ->select()
            ->get();
        }

        $type = Item::TYPE;
        $items = $query->paginate(20);
        return view('item.index', compact('items','type','keyword'));
    }


    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
                'value' => $request->value,
                'product_quantity' => $request->product_quantity,
                'date' => $request->input('date')
            ]);
            return redirect('/items');
        }

        return view('item.add');
    }
    public function delete(Request $request)
    {
        // 既存のレコードを習得して、削除する
        $item = Item::find($request->id);
        $item->delete();
        return redirect('/items');
    }
}
