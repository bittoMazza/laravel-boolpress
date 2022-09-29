<div class="form-group">
    <label class="text-light">Nome tag</label>
    <input type="text" class="form-control" value="{{ old('name',$tag->name) }}" name="name" placeholder="Inserire nome tag" required>
</div>

@error('name')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<button type="submit" class="btn btn-primary my-3">Salva il tag</button>
