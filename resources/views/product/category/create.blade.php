<form action="{{ route('category.store') }}" method="POST">
    @csrf
    Name of Category
    <input type="text" name="name" value="{{ old('name') }}">

    @if ($errors->has('name'))
        <span class="error">
            {{ $errors->first('name') }}
        </span>
    @endif

    <br>
    <button>Add</button>
</form>
