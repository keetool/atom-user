@extends("language.layout")

@section('content')
<form action="/t/language" method="POST">
    <input type="hidden" name="id" value="{{ isset($language) ? $language->id : "" }}"/>
    {{ csrf_field() }}
    Tên:<br>
    <input type="text" value="{{ isset($language) ? $language->name : "" }}" name="name"><br>
    Codes:<br>
    <input type="text" value="{{ isset($language) ? $language->codes : "" }}" name="codes"><br>
    <input type="submit"/>
</form>
@endsection
