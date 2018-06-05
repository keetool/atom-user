@extends("language.layout")

@section("content")
<h3>Ngôn ngữ: {{ $language->name }}</h3>
<div>
    <a href="/t/language/list">languages</a>
</div>
<table>
    <thead>
        <tr>
            <th>Key</th>
            <th>Value</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <a href="/t/language/{{ $language->id }}/keyword/add">Add</a>
        @foreach($keywords as $keyword)
            <tr>
                <td>{{ $keyword->name }}</td>
                <td>{{ $keyword->pivot->content }}</td>
                <td>
                    <a href="/t/language/{{ $language->id }}/keyword/{{ $keyword->id }}">Sửa</a>
                    <a href="">Xóa</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
