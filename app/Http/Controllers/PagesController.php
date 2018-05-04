<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\TypeProduct;
use App\Category;
use App\Bill;
use App\BillDetail;
use DB,Cart,Datetime;

class PagesController extends Controller
{

    public function contact()
    {
      $cate=TypeProduct::all()->toArray();
      return view('client.contact',['cate' => $cate]);
    }
public function showProductSale(){
  $sale= Product::where('sale','!=','null')->get()->toArray();
  dd($sale);
}
    public function showHome()
    {
        $cate=TypeProduct::all()->toArray();
        $data=Product::all()->toArray();
        $new = DB::table('products')->orderBy('id', 'desc')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
        $last=  DB::table('products')->orderBy('id')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
       $view=  DB::table('products')->orderBy('id')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
        $sale= Product::where('sale','!=','null')->get()->toArray();
        $data1=Product::where('type_id', '=', 1)->paginate(4);
        $data2=Product::where('type_id', '=', 2)->paginate(4);
        $data3=Product::where('type_id', '=', 4)->paginate(4);
        return view('client.index',['new' => $new ,'last' =>$last, 'view' => $view ,'data1' => $data1, 'data2' => $data2,'data3' => $data3,'cate' => $cate, 'sale' => $sale]);
    }

    public function showDetail($id)
    {
        $product = Product::find($id)->toArray();
        $cate = TypeProduct::all()->toArray();
                $new = DB::table('products')->orderBy('id', 'desc')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
        $last=  DB::table('products')->orderBy('id')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
       $view=  DB::table('products')->orderBy('id')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
        return view('product.detail',['product' => $product, 'new' => $new ,'last' =>$last, 'view' => $view, 'cate' => $cate]);
    }

        public function typeProduct($id)
    {
        $type = Product::where('type_id', '=', $id)->paginate(4);
        $cate = TypeProduct::all()->toArray();
                $new = DB::table('products')->orderBy('id', 'desc')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
        $last=  DB::table('products')->orderBy('id')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
       $view=  DB::table('products')->orderBy('id')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
        return view('product.typeproduct',['type' => $type, 'new' => $new ,'last' =>$last, 'view' => $view, 'cate' => $cate]);
    }

    public function addcart($id)
    {
        $pro = Product::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price,'options' => ['img' => $pro->image]]);
        return redirect()->back();
    }

    public function getupdatecart($id,$qty,$dk)
    {
      if ($dk=='up') {
         $qt = $qty+1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } elseif ($dk=='down') {
         $qt = $qty-1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } else {
         return redirect()->route('getcart');
      }
    }

    public function getdeletecart($id)
    {
     Cart::remove($id);
     return redirect()->back();
    }

    public function xoa()
    {
        Cart::destroy();   
        return redirect()->back();
    }

    public function getcart()
    {   
        $cate=TypeProduct::all()->toArray();
        return view ('cart.cart',['cate' => $cate])
        ->with('slug','Chi tiết đơn hàng');
    }

    public function getoder()
    {
        $cate=TypeProduct::all()->toArray();
        if (Auth::guest()) {
            return redirect('login');
        } else {

            return view ('cart.oder',['cate' => $cate])
            ->with('slug','Xác nhận');
        }        
    }
    public function postoder(Request $rq)
    {
        $cate=TypeProduct::all()->toArray();
        $oder = new Bill();
        $total =0;
        foreach (Cart::content() as $row) {
            $total = $total + ( $row->qty * $row->price);
        }
        $oder->user_id = Auth::user()->id;
        $oder->name_customer = Auth::user()->name;
        $oder->address_customer = Auth::user()->address;
        $oder->phone_customer =  Auth::user()->phone;
        $oder->amount = Cart::count();
        $oder->total =  floatval($total);
        $oder->note = $rq->txtnote;
        $oder->type = 'cod';
        $oder->created_at = new datetime;
        $oder->save();
        $detailId =$oder->id;

        foreach (Cart::content() as $row) {
           $detail = new BillDetail();
           $detail->product_id = $row->id;
           $detail->qty = $row->qty;
           $detail->bill_id = $detailId;
           $detail->created_at = new datetime;
           $detail->save();
        }

        Cart::destroy();
        return redirect()->route('getcart')
        ->with(['cate' => $cate,'flash_level'=>'result_msg','flash_massage'=>' Đơn hàng của bạn đã được gửi đi !']);
        
    }

    public function search(Request $request)
    {
      $data = $request->all();
      $keyWord= $data['search'];
      $results = Product::where('name', 'LIKE', '%'. $keyWord .'%')
      ->orWhere('description', 'LIKE', '%'. $keyWord .'%')
      ->orWhere('title', 'LIKE', '%'. $keyWord .'%')
      ->get();

      $cate=TypeProduct::all()->toArray();
      $new = DB::table('products')->orderBy('id', 'desc')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
      $last=  DB::table('products')->orderBy('id')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
      $view=  DB::table('products')->orderBy('id')
                           ->limit(5)                           
                           ->get()                             
                           ->toArray();
    return view('client.search')->with(['results' =>  $results, 'cate' => $cate,'last' => $last , 'view' => $view,'new' =>$new]);  
    }
}