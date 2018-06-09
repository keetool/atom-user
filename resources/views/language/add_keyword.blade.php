@extends("language.layout")

@section('content')
<form action="/t/language/keyword" method="POST">
    {{ csrf_field() }}
    <input type="hidden" value="{{ isset($keyword) ? $keyword->id: "" }}" name="id"/>
    keyword: <br>
    <input
        type="text"
        value="{{ isset($keyword) ? $keyword->name : "" }}" name="name"><br>
    <input type="submit"/>
</form>
@endsection
