<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{config('app.base_url') . $product->img_path}}" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                @foreach($product->images as $key => $productImage)
                @if($key % 3 == 0)
                <div class="item {{$key == 0 ? 'active' : ''}}">
                    @endif
                    <a href=""><img src="{{config('app.base_url') . $productImage->image_path}}" alt=""></a>

                    @if($key % 3 == 2)
                </div>

                @endif
                @endforeach

            </div>

            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <!--/product-information-->
            <img src="{{asset('shop/images/product-details/new.')}}" class="newarrival" alt="" />
            <h2>{{$product->name}}</h2>
            <p>Mã ID: {{$product->id}}</p>
            <img src="{{asset('shop/images/product-details/rating.png')}}" alt="" />
            <span>
                <form action="{{route('save.cart', ['id' => $product->id])}}" method="post">
                    @csrf
                    <span style="font-size: 16px">{{number_format($product->price)}} VNĐ</span>
                    <label>Số lượng:</label>
                    <input type="number" name="quantity" min="1" value="3" />
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Thêm giỏ hàng
                    </button>
                </form>

            </span>
            <p><b>Tình trạng:</b> Còn hàng</p>
            <p><b>ĐIều kiện:</b> Mới 100%</p>
            <p><b>Thương hiệu:</b> {{$product->brand->name}}</p>
            <a href=""><img src="{{asset('shop/images/product-details/share.png')}}" class="share img-responsive" alt="" /></a>
        </div>
        <!--/product-information-->
    </div>
</div>
