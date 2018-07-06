@extends("home.layout")

@section("Title", "Access to your dashboard")

@section("content")
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="col-md-12">
                <div class="text-center">
                    <h1>Access your dashboard</h1>
                    <p>Manage your atom users</p>
                    <br/>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="col-md-12">
                <form action="" method="GET">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" placeholder="Subdomain" class="form-control" name="subdomain" required>
                    </div>
                    <button class="btn btn-primary btn-lg" style="width: 100%">
                        NEXT
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection