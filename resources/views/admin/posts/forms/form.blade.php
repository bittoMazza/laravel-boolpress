<div class="form-group">
    <label class="text-light">TITOLO</label>
    <input type="text" class="form-control" value="{{ old('title',$post->title) }}" name="title" placeholder="Inserire titolo" required>
</div>

@error('title')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div class="form-group">
    <label class="text-light">CONTENUTO POST</label>
    <textarea class="form-control" name="post_content" cols="30" rows="5">{{ old('post_content',$post->post_content) }}</textarea>
</div>

@error('post_content')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<select type="text" name="category_id" id="">
    @foreach ($categories as  $category)
        <option value="{{ old('category_id',$category->id) }}" 
            @isset($post->category)
                {{ $category->id === $post->category->id ? 'selected' : '' }}
            @endisset>
            {{ $category->name }}
        </option>
    @endforeach
</select>

<div class="form-group">
    <label class="text-light">IMMAGINE POST</label>
    <input type="file" class="form-control" value="{{ old('thumb',$post->thumb) }}" name="thumb" placeholder="Inserire immagine" required>
</div>

@error('thumb')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div>
    <label class="text-light">TAGS</label>
    @foreach ($tags as $tag)
        <div class="form-check text-white">
            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]" id="exampleRadios1" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios1">
            {{ $tag->name }}
            </label>
        </div>
    @endforeach
</div>



<button type="submit" class="btn btn-primary my-3">Salva il post</button>
