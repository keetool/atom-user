@extends("language.layout")

@section("content")
<form action="/t/language/{{ $lang_id }}/keyword" method="POST">
    {{ csrf_field() }}
    keyword: <br>
    <input
        {{ (!isset($keyword) || $keyword == null) ? "" : "readonly" }}
        type="text"
        value="{{ isset($keyword) ? $keyword->name : "" }}" name="name"><br>
    Content:<br>
    <input type="text" value="{{ isset($keyword_language) ? $keyword_language->content : "" }}" name="content"><br>
    <input type="submit"/>
</form>
@endsection
