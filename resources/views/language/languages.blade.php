@extends("language.layout")

@section("content")
    <a href="/t/language/add">Thêm ngôn ngữ</a>
    <table>
        <thead>
            <tr>
                <th>Tên ngôn ngữ</th>
                <th>Codes</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
                <tr>
                    <td><a href="/t/language/{{ $language->id }}">{{ $language->name }}</a></td>
                    <td>{{ $language->codes }}</td>
                    <td>
                        <a href="/t/language/{{ $language->id }}/edit">Sửa</a>
                        <a href="">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
