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
    {{-- <table>
        <thead>
            <tr>
                <th>Keyword</th>
                @foreach($languages as $lang)
                    <th>{{ $lang->name }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($keywords as $Keyword)

                <tr>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

@endsection
