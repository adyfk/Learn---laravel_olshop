<input type="hidden" name="id" id="id" placeholder="id">
<input type="text" name="title" id="title" placeholder="title">
<input type="text" name="desc" id="desc" placeholder="desc">
<input type="text" name="img" id="img" placeholder="img">
<input type="number" name="qyt" id="qyt" placeholder="qyt">
<input type="number" name="price" id="price" placeholder="price">
<select name="category_id" id="category">
    @foreach ($cat as $item)
        <option value="{{ $item->id }}">{{ $item->title }}</option>
    @endforeach
</select>