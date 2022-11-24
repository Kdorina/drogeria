@extends( "layouts.edit_perfume" )

@section( "content" )


<form action="/update-perfume" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $perfume->id }}">
    <p>
        <label for="">Név</label>
        <input type="text" name="name" value="{{ $perfume->name }}">
    </p>
    @error('name')
    <div class="alert" style="color: red " role="alert">
    {{$message}}
    </div>
    @enderror
    <p>
        <label for="">Típus</label>
        <input type="text" name="type" value="{{ $perfume->type }}">
    </p>
    @error('type')
    <div class="alert" style="color: red " role="alert">
    {{$message}}
    </div>
    @enderror
    <p>
        <label for="">Ár</label>
        <input type="text" name="price" value="{{ $perfume->price }}">
    </p>
    @error('price')
    <div class="alert" style="color: red " role="alert">
    {{$message}}
    </div>
    @enderror
    <p>
        <a href="/perfumes"><button type="submit">Küldés</button></a>
    </p>
</form>
@endsection