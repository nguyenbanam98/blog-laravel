<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="product">Ten san pham</label>
            <input type="text" class="form-control" name="name" value="{{old('product', $product->name ?? '')}}" id="product" placeholder="Nhap ten danh muc">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mo ta</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{old('description', $product->description ?? '')}}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Noi dung</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{{old('content', $product->content ?? '')}}</textarea>
        </div>

        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input type="file"
                class="form-control-file"
                name="feature_image_path"
            >
        </div>
        @if(isset($product->img_path))
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ $product->img_path }}" 
                        style=" width: 130px;
                                height: 100px;
                                object-fit: cover;" 
                        class="card-img-top" alt="">
                </div>
            </div>
        @endif

        <div class="form-group form-check">
            <input type="checkbox" name="hot" value="1" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Noi bat</label>
        </div>
     
        
       
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="loai_san_pham">Loai san pham</label>
            <select class="form-control" id="loai_san_pham" name="category_id">
                <option value="">---Chon loai san pham---</option>
                @if($categories)
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ isset($product->category_id) ?? '' ==  $category->id ? 'selected' : '' }}>{{$category->name}}</option> 
                        
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="loai_san_pham">Thuong hieu</label>
            <select class="form-control" id="loai_san_pham" name="brand_id">
                <option value="">---Chon loai thuong hieu---</option>
                @if($brands)
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}" {{ isset($product->brand_id) ?? '' ==  $brand->id ? 'selected' : '' }}>{{$brand->name}}</option> 
                        
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="product_price">Gia san pham</label>
            <input type="text" class="form-control" name="price" value="{{old('price', $product->price ?? '')}}" id="product_price" placeholder="Nhap ten title seo">
        </div>
        
        <div class="form-group">
            <label for="product_discount">Gia khuyen mai %</label>
            <input type="text" class="form-control" name="sale" value="{{old('sale', $product->sale ?? '0')}}" id="product_discount" placeholder="Nhap ten title seo">
        </div>

        <div class="form-group">
            <label>Ảnh chi tiết</label>
            <input type="file"
                multiple
                class="form-control-file"
                name="image_path[]"
            >
        </div>
        @if(isset($product->images))
            <div class="col-md-12 container_image_detail">
                <div class="row">
                    @foreach($product->images as $producImageItem)
                                <div class="col-md-3 mr-1">
                                    <div class="card">
                                        <img  src="{{ $producImageItem->image_path }}" class="card-img-top" alt="" style=" width: 130px;
                                        height: 100px;
                                        object-fit: cover;">
                                    </div>
                                </div>
                    @endforeach
                </div>
            </div> 
        @endif
       

       
    </div>
</div>