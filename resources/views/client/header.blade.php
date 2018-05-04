
<header class="header-area header-2 header-8">
    <div class="header-top">
        <div class="container">
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-8">
                    <div class="header-logo">
                        <a href="">
                            <img src="{{asset('img/logo/logo.png')}}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="hidden-lg hidden-md hidden-sm col-xs-4">
                    <div class="hidden-right-header">
                        <ul>
                            <li><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                            <li><a href="my-account.html"><i class="fa fa-user"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="expand">
                                    <a href="{{asset('/phuotshop')}}">
                                        <span class="menu-label">Trang Chủ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{asset('/contact')}}">
                                        <span class="menu-label">Liên Hệ</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a  class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-shopping-cart"><span class="badge">{!!Cart::count();!!}</span></span> Giỏ Hàng <b class="caret"></b></a>
                                    <ul class="dropdown-menu" style="right:0; left: auto; min-width: 430px;">
                                    @if(Cart::count() !=0)
                                      <div class="table-responsive">
                                         <table class="table table-hover" >
                                          <thead>
                                          <tr>
                                            <th>Ảnh</th>
                                            <th>SL</th>
                                            <th>Tên <SPAN></SPAN></th>
                                            <th>Giá</th>
                                          </tr>
                                        </thead>
                                           <tbody>
                                          @foreach(Cart::content() as $row)
                                             <tr>
                                               <td style="width: 20%"> <img  
                                                src="/img/{{$row->options->img}}" alt="dell"></td>
                                               <td>{!!$row->qty!!}</td>
                                               <td>{!!$row->name!!}</td>
                                               <td>{!!number_format($row->price)!!} VND</td>
                                             </tr>
                                            @endforeach
                                           </tbody>
                                         </table> 
                                         <a href="{!!url('/gio-hang/')!!}" type="button" class="btn btn-success"> Chi Tiết Giỏ Hàng </a>
                                         <a href="{!!url('/gio-hang/xoa')!!}" type="button" class="btn btn-danger pull-right"> Xóa </a>
                                      </div>
                                      @else
                                        <div class="table-responsive">
                                         <table class="table table-hover" >
                                          <thead>
                                          <tr>
                                            <th>Ảnh</th>
                                            <th>LS</th>
                                            <th>Tên <SPAN></SPAN></th>
                                            <th>Giá</th>
                                          </tr>
                                        </thead>
                                           <tbody>
                                            <td colspan="3">Hện đang trống</td>
                                           </tbody>
                                         </table> 
                                      </div>
                                      @endif
                                    </ul>
                                  </li> 
<!--                                 <li class="dropdown pull-right">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                                    <i class="fa fa-shopping-cart" style="font-size: 151%;"></i>
                                        <span class="num-of-item" style="position: relative;border-radius: 4.4rem;min-width: 1.1rem;line-height: 1.2em;padding: 0 .5rem;text-align: center;height: 1.6rem;border: .2rem solid #f74d18;color: #ff5722;background-color: #fff;left: -0.8rem;top: -1.9rem;margin-right: -1.4rem;">02</span>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a ><i class="fa fa-btn fa-sign-out"></i>Thông tin</a></li>
                                        <li><a ><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Mobile Menu Start -->
                <div class="mobile-menu-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul>
                                            <li><a href="index.html">Home</a>
                                                <ul>
                                                    <li><a href="index.html">Home Version 1</a></li>
                                                    <li><a href="index-2.html">Home Version 2</a></li>
                                                    <li><a href="index-3.html">Home Version 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Products</a></li>
                                            <li><a href="#">Page</a>
                                                <ul>
                                                    <li><a href="#">Categories 01</a>
                                                        <ul>
                                                            <li><a href="contact.html">Contact</a></li>
                                                            <li><a href="price.html">Picing table</a></li>
                                                            <li><a href="team-member.html">Team member</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Categories 02</a>
                                                        <ul>
                                                            <li><a href="cart.html">Cart</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu End -->
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="home-2-header-bottom">
                <div class="row clearfix">
                    <div class="col-sm-3 hidden-xs">
                        <div class="header-cate-color">
                            <div class="left-category-menu">
                                <nav class="category-menu">
                                    <ul>
                                        <li>
                                            <a href="#" class="category-label">
                                                <h2>Danh mục sản phâm</h2>
                                            </a>
                                            <ul class="category-items">
                                            @foreach($cate as $item)
                                            <a href="{{asset('/typeproduct/').'/'.$item['id']}}" class="categoriesId">
                                                    <li class="menu-item electronic-item">
                                                        {{$item['name']}}
                                                    </li>
                                                    </a>
                                           @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="search-container">
                    <form action="{{asset('search')}}" method="POST">
                         {{csrf_field()}}
                      <input type="text" placeholder="Search.." name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                  </div>

                    <div class="hidden-lg hidden-md hidden-sm col-xs-2">
                        <div class="mobile-cart-inner pull-right">
                            <a href="cart.html"><i class="fa fa-shopping-cart"></i></a>
                            <span class="num-of-item">02</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="slider-area-8">
            <!-- Slider Start -->
            <div class="slider-container">
                <!-- Slider Image -->
                <div id="mainSlider" class="nivoSlider slider-image">
                    <img src="{{asset('img/slider/slider.png')}}" alt="main slider" title="#htmlcaption1"/>
                    <img src="{{asset('img/slider/game.jpg')}}" alt="main slider" title="#htmlcaption2"/>
                    <img src="{{asset('img/slider/mac3.png')}}" alt="main slider" title="#htmlcaption3"/>
                </div>
            </div>
            <!-- Slider End-->
        </div>
    </div>
</header>