@extends('client.master')
@section('content')
<div class="container">
  <div >
    <h3 class="panel-title" style="margin-bottom: 3%;">
    <a href="#" title=""> Home >> Đặt hàng >>{!!$slug!!}</a></span> 
      
    </h3>              
    <div >              
      <div class="row">
        <div >
          <div class="panel panel-success">
            <div class="panel-body">   
            <legend class="text-left">Xác nhận thông tin đơn hàng</legend> 
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Hình ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>SL</th>
                      <th>Giá</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach(Cart::content() as $row)
                    <tr>
                      <td><img src="/img/{{$row->options->img}}" alt="dell" width="200" height="100"></td>
                      <td>{!!$row->name!!}</td>
                      <td class="text-center">                        
                          <span>{!!$row->qty!!}</span>
                      </td>
                      <td>{!! number_format($row->price)!!} VND</td>
                      <td>{!!  number_format($row->qty * $row->price)!!} VND</td>
                    </tr>
                  @endforeach                    
                    <tr>
                      <td colspan="3"><strong>Tổng cộng :</strong> </td>
                      <td>{!!Cart::count()!!}</td>
                      <td colspan="2" style="color:red;">{!!Cart::subtotal();!!} VND</td>                      
                    </tr>                    
                  </tbody>
                </table>                
              </div>
              {{-- form thong tin khach hang dat hang           --}}
              @if ($_GET['paymethod'] =='cod' )
              <form action="" method="POST" role="form">
                <legend class="text-left">Xác nhận thông tin khách hàng</legend>
                {{ csrf_field() }}

                <div class="col-md-4 first">
                <p><label for="name" style="padding-top: 3%;">Tên Khách hàng : </label> 
                 </p>
                <p><label for="email" style="padding-top: 3%;">Điện thoại : </label>
                 </p>

                <p><label for="email" style="padding-top: 3%;">Địa chỉ : </label>
                 
                 </p>
  
              </div>
              <div class="col-md-8">
                <p>  <input type=" text" name="name" value="{{ Auth::user()->name }}" class="form-control" required="required"></p>
                <p><input type="text " name="phone" value="{{ Auth::user()->phone }}" class="form-control" required="required"></p>
                <p> <input type="" name="address" value="{{ Auth::user()->address }}" class="form-control" required="required" ></p>
                
              </div>
                             
                <div class="form-group">
                  <label for="">Các ghi chú khác</label>
                  <textarea name="txtnote" id="inputtxtNote" class="form-control" rows="4" required="required">                    
                  </textarea>
                </div>              
                <button type="submit" class="btn btn-primary pull-right"> Đặt hàng (COD)</button> 
              </form>
              @else 
              <form action="{{url('dat-hang-shop')}}" method="Post" accept-charset="utf-8">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="col-md-4 first">
                <p><label for="name" style="padding-top: 3%;">Tên Khách hàng : </label> 
                 </p>
                <p><label for="email" style="padding-top: 3%;">Điện thoại : </label>
                 </p>

                <p><label for="email" style="padding-top: 3%;">Địa chỉ : </label>
                 
                 </p>
  
              </div>
              <div class="col-md-8">
                <p>  <input type=" text" name="name" value="{{ Auth::user()->name }}" class="form-control" required="required"></p>
                <p><input type="text " name="phone" value="{{ Auth::user()->phone }}" class="form-control" required="required"></p>
                <p> <input type="" name="address" value="{{ Auth::user()->address }}" class="form-control" required="required" ></p>
                
              </div>
                             
                <div class="form-group">
                  <label for="" style="float: left !important;">Các ghi chú khác</label>
                  <textarea name="txtnote" id="inputtxtNote" class="form-control" rows="4" required="required">                    
                  </textarea>
                </div>  

                <button type="submit" class="btn btn-danger pull-left"> Thanh toán Tại cửa hàng </button> &nbsp;
              </form>
              @endif
            </div>
          </div>   
        </div>
      </div>     
    </div> 
</div>
</div>
@endsection