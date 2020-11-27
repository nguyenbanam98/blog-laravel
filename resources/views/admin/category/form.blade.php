<div class="form-group">
    <label for="category">Ten danh muc</label>
    <input type="text" class="form-control" name="category" value="{{old('category', $category->name ?? '')}}" id="category" placeholder="Nhap ten danh muc">
</div>

<div class="form-group">
    <label for="exampleFormControlTextarea1">Mo ta</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{old('description', $category->description ?? '')}}</textarea>
</div>

<div class="form-group form-check">
    <input type="checkbox" name="active" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Noi bat</label>
</div>