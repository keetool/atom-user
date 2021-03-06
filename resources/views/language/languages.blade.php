@extends("language.layout")

@section("content")
    <a href="/t/language/add">Thêm ngôn ngữ</a>
    <table>
        <thead>
            <tr>
                <th>Tên ngôn ngữ</th>
                <th>Codes</th>
                <th>Version</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
                <tr>
                    <td><a href="/t/language/{{ $language->id }}">{{ $language->name }}</a></td>
                    <td>{{ $language->codes }}</td>
                    <td>{{ $language->version }}</td>
                    <td>
                        <a href="/t/language/{{ $language->id }}/edit">Sửa</a>
                        <a href="">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display:flex; border: 1px #d9d9d9 solid;padding:5px;margin-top:20px">
        <div style="flex:1">
            <div style="border: 1px #d9d9d9 solid;height:30px;line-height:30px;padding-left:5px">
                <strong>Keyword <a href="/t/language/keyword/add">+</a></strong>
            </div>
            @foreach($keywords as $keyword)
                <div style="border: 1px #d9d9d9 solid;height:30px;line-height:30px;padding-left:5px">
                    <a href="/t/language/keyword/{{ $keyword->id }}/edit">
                        {{ $keyword->name }}
                    </a>
                </div>
            @endforeach
        </div>
        @foreach($languages as $lang)
            <div style="flex: 1">
                <div style="border: 1px #d9d9d9 solid;height:30px;line-height:30px;padding-left:5px"><strong>{{ $lang->name }}</strong></div>
                @foreach($lang->keywords()->orderBy('name')->get() as $keyword)
                    <div style="border: 1px #d9d9d9 solid;height:30px;line-height:30px;padding-left:5px">
                        <a href="{{ url("/t/language/$lang->id/keyword/$keyword->id") }}">
                            {{ $keyword->pivot->content ? $keyword->pivot->content : '+' }}
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

@endsection
