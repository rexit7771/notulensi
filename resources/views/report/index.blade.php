@extends('layout.main')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
            <div class="col-10"></div>
            <div class="col-2 mt-2"><a class="btn btn-primary" href="" data-toggle="modal" data-target="#exportModal">Export</a></div>
            </div>
            <div class="dataTable mt-5">
                <table id="myTable" class="table table-stripeds">
                    <thead>
                        <th class="">Tanggal Meeting</th>
                        <th class="">Section</th>
                        <th class="">Subjek</th>
                        <th class="">Task ID</th>
                        <th class="">Progress</th>
                        <th class="">Peserta</th>
                    </thead>
                    @foreach ($data as $d)
                    <input type="hidden" name="id" value="{{$d->id}}">
                            <tr>
                                <td class="text-left">{{$d->tgl_meeting}} </td>
                                <td class="">{{$d->section}} </td>
                                <td class="">{{$d->subjek}} </td>
                                <td class="">{{$d->task_id}} </td>
                                <td class="">{{$d->progress}} </td>
                                <td class="">{{$d->peserta}} </td>
                            </tr>
                        @endforeach
                    </Tbody>
                </table>
            </div>
        </div>
    </section>
    @endsection
    
    @section('script')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
    {{-- <script>
        $('#myTable').dataTable({})
    </script> --}}
@endsection