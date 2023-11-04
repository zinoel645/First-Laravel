<form action="{{ route('category.update', $each) }}" method="POST">
    @csrf
    @method('PUT')
    Name
    <input type="text" name="name" value="{{ $each->name }}">
    @if ($errors->has('name'))
        <span>
            {{ $error->first('name') }}
        </span>
    @endif
    <br>
    <button>Save changes</button>
</form>
