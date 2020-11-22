
        <div class="form-group">
            <label for="article">Ten bai viet</label>
            <input type="text" class="form-control" name="name" value="{{old('article', $article->name ?? '')}}" id="article" placeholder="Nhap ten danh muc">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mo ta</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{old('description', $article->description ?? '')}}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Noi dung</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{{old('content', $article->content ?? '')}}</textarea>
        </div>
        <div class="form-group">
            <label for="article_title">Meta title</label>
            <input type="text" class="form-control" name="title_seo" value="{{old('title_seo', $article->title_seo ?? '')}}" id="article_title" placeholder="Nhap ten title seo">
        </div>

        <div class="form-group">
            <label for="meta_description">Meta description</label>
            <input type="text" class="form-control" name="description_seo" value="{{old('description_seo', $article->description_seo ?? '')}}"id="meta_description" placeholder="Nhap ten title seo">
        </div>

        <div class="form-group">
            <label>Ảnh bai viet</label>
            <input type="file"
                multiple
                class="form-control-file"
                name="image_path[]"
            >
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="active" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Noi bat</label>
        </div>
 