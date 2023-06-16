@extends('layout.main')

@section('content')
    <section class="section">
        <div class="container">
            <h2 class="mt-3 text-center has-line">Detail notulensi</h2>
            <form action="{{route('update')}}" method="post">
                @csrf
                <div class="row">
                    <input type="hidden" name="notulensi_id" value="{{$id}}">
                    <div class="col-6">
                        <label class=""><strong>Tanggal Meeting</strong></label> 
                        <input type="date" name="tgl_meeting" class="w-100 form-control" value="{{$notulensi->tgl_meeting}}" readonly>
                    </div>
                    <div class="col-6 pb-3 mb-2">
                        <label for=""><strong>Section</strong></label>
                        <select class="form-control" name="section" disabled>
                            <option {{$notulensi->section == 'GAA' ? 'selected' : ''}} value="GAA">General Affair</option>
                            <option {{$notulensi->section == 'LND' ? 'selected' : ''}} value="LND">Learning & Development</option>
                            <option {{$notulensi->section == 'PSN' ? 'selected' : ''}} value="PSN">Personalia</option>
                            <option {{$notulensi->section == 'CSR' ? 'selected' : ''}} value="CSR">CSR & HSE</option>
                            <option {{$notulensi->section == 'HRA' ? 'selected' : ''}} value="HRA">HR Analytics</option>
                            <option {{$notulensi->section == 'REC' ? 'selected' : ''}} value="REC">Recruitment</option>
                        </select>
                    </div>
                    <div class="col-6 pb-3 mb-2">
                        <label class=""><strong>Subjek</strong> </label>
                        <select class="form-control" name="subjek" disabled>
                            <option class="bg-gray text-dark" disabled><strong>REC</strong></option>
                            <option {{$notulensi->subjek == 'Pemenuhan Kandidat' ? 'selected' : ''}} value="Pemenuhan Kandidat">Pemenuhan Kandidat</option>
                            <option {{$notulensi->subjek == 'Retention Survey' ? 'selected' : ''}} value="Retention Survey">Retention Survey</option>
                            <option {{$notulensi->subjek == 'Data Karyawan' ? 'selected' : ''}} value="Data Karyawan">Data Karyawan</option>
                            <option {{$notulensi->subjek == 'Alat Tes Psikologi' ? 'selected' : ''}} value="Alat Tes Psikologi">Alat Tes Psikologi</option>
                            <option class="bg-gray text-dark" disabled><strong>GA</strong></option>
                            <option {{$notulensi->subjek == 'Weekly GA' ? 'selected' : ''}} value="Weekly GA">Weekly GA</option>
                            <option {{$notulensi->subjek == 'BiWeekly GA Purchasing'}} value="BiWeekly GA Purchasing">BiWeekly GA Purchasing</option>
                            <option class="bg-gray text-dark" disabled><strong>CSR & HSE</strong></option>
                            <option {{$notulensi->subjek == 'P2K3'}} value="P2K3">P2K3</option>
                            <option class="bg-gray text-dark" disabled><strong>LND</strong></option>
                            <option {{$notulensi->subjek == 'Meeting Progress Plan v Realisasi' ? 'selected' : ''}} value="Meeting Progress Plan v Realisasi">Meeting Progress Plan v Realisasi</option>
                            <option class="bg-gray text-dark" disabled><strong>IN</strong></option>
                            <option {{$notulensi->subjek == 'Meeting KPI' ? 'selected' : ''}} value="Meeting KPI">Meeting KPI</option>
                        </select>
                    </div>
                    <div class="col-6 pb-3 mb-2">
                        <label class=""><strong>Task ID</strong> </label>
                        <input type="text" name="task_id" class="w-100 py-2 form-control" value="{{$notulensi->task_id}}" readonly>
                    </div>
                    <div class="col-6 pb-3 mb-2">
                        <label class=""><strong>Progress</strong> </label>
                        <textarea name="progress" id="" cols="" rows="3" class="form-control" readonly>{{$notulensi->progress}} </textarea>
                    </div>
                    <div class="col-6">
                        <label class=""><strong>Peserta</strong> </label>
                        <input type="text" name="peserta" class="w-100 form-control" value="{{$notulensi->peserta}}" readonly>
                    </div>
                    {{-- <div class="col-6">
                        <label class=""><strong>Status</strong> </label>
                        <select class="form-control" name="status">
                            <option>...</option>
                            <option value="Open">Open</option>
                            <option value="OnProgress">On Progress</option>
                            <option value="Done">Done</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div> --}}

                    <div class="container">
                        <p class="has-line mt-5"></p>
                        <div class="row">
                            <div class="form-group col-10">
                                <h4 class="title">Detail Task</h4>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        
                        {{-- Tabel with Input --}}
                        <div class="row mb-4" onload='setFocusToTextBox()'>
                            <table id="detail_table" class="table table-stripeds">
                                <thead>
                                    <tr>
                                        {{-- <th>No.</th> --}}
                                        <th>Task</th>
                                        <th>PIC</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($no = 1) --}}
                                    @foreach($detail as $dt)
                                    <tr id="addr0">
                                        {{-- <td>
                                            <input type="text" value="{{$no++}}" readonly>
                                        </td> --}}
                                        <input type="hidden" name="id" value="{{$dt->id}}">
                                        <td>
                                            <input type='text' name='task[]' id='task' placeholder='Date' class='form-control input-md' value='{{ $dt->task }}' readonly>
                                        </td>
                                        <td>
                                            <input type='text' name='pic[]' id='pic' placeholder='Note' class='form-control input-md' value='{{ $dt->pic }}' readonly>
                                        </td>
                                        <td>
                                            <input type='date' name='deadline[]' id='date_input0' class='form-control input-md' placeholder='Input Date' value="{{$dt->deadline}}" readonly>
                                        </td>
                                        <td>
                                            <select class='form-control' name='status[]' disabled>
                                                <option {{$dt->status == 'Open' ? 'selected' : ''}} value='Open'>Open</option>
                                                <option {{$dt->status == 'OnProgress' ? 'selected' : ''}} value='OnProgress'>On Progress</option>
                                                <option {{$dt->status == 'Close' ? 'selected' : ''}} value='Close'>Close</option>
                                                <option {{$dt->status == 'Cancelled' ? 'selected' : ''}} value='Cancelled'>Cancelled</option>
                                            </select>
                                        </td>
                                        {{-- <td class='text-center remove'>
                                            <a href='#'><i class='fas fa-trash-alt'></i></a>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                    {{-- <tr id="addr1"></tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 col-md-6 col-12 mx-auto text-center mt-5">
                            <button type="submit" class="btn btn-primary rounded-2">Submit</button>
                        </div> --}}
                </div>
            </form>
            </div>
    </section>
@endsection

{{-- @section('script')
    <script>
        $(document).click(function () { 
            var i = 1;
            $(".addActivities").click(function () { 
                $('tr').find('input').prop('disabled',false);
                $('#addr' + i).html("<td><input type='text' name='task[]' id='task" + i + "' placeholder='...' class='form-control input-md'/></td><td><input type='text' name='pic[]' id='pic" + i + "' placeholder='...' class='form-control input-md'/></td><td><input type='date' name='deadline[]' id='deadline" + i + "' value='{{ date('Y-m-d') }}' placeholder='Input Date' class='form-control input-md'/></td><td><select class='form-control' name='status[]'><option value=''>...</option><option value='Open'>Open</option><option value='OnProgress'>On Progress</option><option value='Close'>Close</option><option value='Cancelled'>Cancelled</option></select></td><td class='text-center remove'><a href='#'><i class='fas fa-trash-alt'></i></a></td>");
                $('#detail_table').append('<tr id="addr' + (i+1) + '"></tr>');
                i++;
            });            
        });

        $('.remove').on('click', function() {
            $(this).closest('tr').remove();
        });
    </script>
@endsection --}}