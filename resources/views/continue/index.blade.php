@extends('layout.main')

@section('content')
    <section class="section">
        <div class="container">
            <div class="dataTable mt-5">
                <table id="myTable" class="table table-stripeds">
                    <thead>
                        <th class="">Tanggal Meeting</th>
                        <th class="">Section</th>
                        <th class="">Subjek</th>
                        <th class="">Task ID</th>
                        <th class="">Progress</th>
                        <th class="">Peserta</th>
                        <th class="">Action</th>
                    </thead>
                    @foreach ($data as $d)
                    <input type="hidden" name="id" value="{{$d->id}}">
                            <tr>
                                <td class="text-left">{{$d->tgl_meeting}} </td>
                                <td class="">{{$d->section}} </td>
                                <td class="">{{$d->subjek}} </td>
                                <td class=""><a href="/edit/{{$d->id}}">{{$d->task_id}} </a></td>
                                <td class="">{{$d->progress}} </td>
                                <td class="">{{$d->peserta}} </td>
                                <td class="">
                                    <div class="btn-group">
                                    <a href="/delete/{{$d->id}}" title="delete" class="btn btn-icon btn-primary" onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini ?')"><i class="fas fa-trash-alt"></i></a>
                                    <a href="/detail/{{$d->id}}" title="detail" class="btn btn-icon btn-primary"><i class="fa-solid fa-circle-info"></i></a>
                                    </div>
                                </td>
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

    <script src="https://kit.fontawesome.com/bf2986434e.js" crossorigin="anonymous"></script>
    {{-- <script>
        $('#myTable').dataTable({})
    </script> --}}
@endsection