@extends('layout.main')

@section('content')
    <section class="section">
        <div class="container mt-5 text-center">
                <a href="{{'new'}}" class="text-center btn btn-primary col-6 my-4 py-4 "> <h3 class="my-auto">New</h3></a>
                <a href="{{'continue'}}" class="text-center btn btn-primary col-6 my-4 py-4"><h3 class="my-auto">Continue with on progress task</h3></a>
                <a href="{{'report'}}" class="text-center btn btn-primary col-6 mt-4 py-4"><h3 class="my-auto">Report</h3></a>
        </div>

    </section>
@endsection