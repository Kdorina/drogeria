@extends( "layouts.new_perfume" )

@section( "content" )


<form action="add-perfume" method="post">
    @csrf
    <p>
        <label for="">Név</label>
        <input type="text" name="name">
    </p>
    @error('name')
    <div class="alert" style="color: red " role="alert">
    {{$message}}
    </div>
    @enderror
    <p>
        <label for="">Típus</label>
        <input type="text" name="type">
    </p>
    @error('type')
    <div class="alert" style="color: red " role="alert">
    {{$message}}
    </div>
    @enderror
    <p>
        <label for="">Ár</label>
        <input type="text" name="price">
    </p>
    @error('price')
    <div class="alert"  style="color: red " role="alert">
    {{$message}}
    </div>
    @enderror
    <p>
        <a href="/perfumes"><button type="submit">Küldés</button></a>
    </p>
</form>

@endsection