@extends('layout.main')

@section('content')
    <section class="section">
        <div class="container">
            <h2 class="mt-3 text-center has-line">Form Input Notulensi</h2>
            <form action="{{route('store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label class=""><strong>Tanggal Meeting</strong></label> 
                        <input type="date" name="tgl_meeting" class="w-100 form-control">
                    </div>
                    {{-- <div class="col-6 pb-3 mb-2">
                        <label class=""><strong>Task</strong> </label>
                        <textarea name="task" id="" cols="" rows="3" class="form-control"></textarea>
                    </div> --}}
                    <div class="col-6 pb-3 mb-2">
                        <label for=""><strong>Section</strong></label>
                        <select class="form-control" name="section">
                            <option value="">...</option>
                            <option value="GAA">General Affair</option>
                            <option value="LND">Learning & Development</option>
                            <option value="PSN">Personalia</option>
                            <option value="CSR">CSR & HSE</option>
                            <option value="HRA">HR Analytics</option>
                            <option value="REC">Recruitment</option>
                        </select>
                    </div>
                    <div class="col-6 pb-3 mb-2">
                        <label class=""><strong>Subjek</strong> </label>
                        <select class="form-control" name="subjek">
                            <option>...</option>
                            <option class="bg-gray text-dark" disabled><strong>REC</strong></option>
                            <option value="Pemenuhan Kandidat">Pemenuhan Kandidat</option>
                            <option value="Retention Survey">Retention Survey</option>
                            <option value="Data Karyawan">Data Karyawan</option>
                            <option value="Alat Tes Psikologi">Alat Tes Psikologi</option>
                            <option class="bg-gray text-dark" disabled><strong>GA</strong></option>
                            <option value="Weekly GA">Weekly GA</option>
                            <option value="BiWeekly GA Purchasing">BiWeekly GA Purchasing</option>
                            <option class="bg-gray text-dark" disabled><strong>CSR & HSE</strong></option>
                            <option value="P2K3">P2K3</option>
                            <option class="bg-gray text-dark" disabled><strong>LND</strong></option>
                            <option value="Meeting Progress Plan v Realisasi">Meeting Progress Plan v Realisasi</option>
                            <option class="bg-gray text-dark" disabled><strong>IN</strong></option>
                            <option value="Meeting KPI">Meeting KPI</option>
                        </select>
                    </div>
                    {{-- <div class="col-6">
                        <label class=""><strong>Deadline</strong> </label>
                        <input type="date" name="deadline" class="w-100 form-control">
                    </div> --}}
                    <div class="col-6 pb-3 mb-2">
                        <label class=""><strong>Task ID</strong> </label>
                        <input type="text" name="task_id" class="w-100 py-2 form-control">
                    </div>
                    <div class="col-6 pb-3 mb-2">
                        <label class=""><strong>Progress</strong> </label>
                        <textarea name="progress" id="" cols="" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-6">
                        <label class=""><strong>Peserta</strong> </label>
                        <input type="text" name="peserta" class="w-100 form-control">
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
                            <div class="form-group col-2">
                                <label for="">Tambah</label>
                                <a href="#" class="addActivities btn btn-primary btn-fw form-control">+</a>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        
                        {{-- Tabel with Input --}}
                        <div class="row mb-4" onload='setFocusToTextBox()'>
                            <table id="detail_table" class="table table-stripeds">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>PIC</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($no = 1) --}}
                                    {{-- @foreach($detail as $dt) --}}
                                    {{-- <tr id="addr0">
                                        <td>
                                            <input type="text" value="{{$no++}}" readonly>
                                        </td>
                                        <td>
                                            <input type='text' name='task[]' id='task' placeholder='Date' class='form-control input-md' value='{{ $dt->task }}'>
                                        </td>
                                        <td>
                                            <input type='text' name='pic[]' id='pic' placeholder='Note' class='form-control input-md' value='{{ $dt->pic }}'>
                                        </td>
                                        <td>
                                            <input type='date' name='deadline[]' id='date_input0' class='form-control input-md' placeholder='Input Date' value="{{$dt->deadline}}">
                                        </td>
                                        <td><select class='form-control' name='status[]'>
                                                <option value='Open'>Open</option>
                                                <option value='OnProgress'>On Progress</option>
                                                <option value='Close'>Close</option>
                                                <option value='Cancelled'>Cancelled</option>
                                            </select>
                                        </td>
                                        <td class='text-center remove'>
                                            <a href='#'><i class='fas fa-trash-alt'></i></a>
                                        </td>
                                    </tr> --}}
                                    {{-- @endforeach --}}
                                    <tr id="addr1"></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mx-auto text-center mt-5">
                            <button type="submit" class="btn btn-primary rounded-2">Submit</button>
                        </div>
                </div>
            </form>
            </div>
    </section>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () { 
            var i = 1;
            $(".addActivities").click(function () { 
                $('tr').find('input').prop('disabled',false);
                $('#addr' + i).html("<td><input type='text' name='task[]' id='task" + i + "' placeholder='...' class='form-control input-md'/></td><td><input type='text' name='pic[]' id='pic" + i + "' placeholder='...' class='form-control input-md'/></td><td><input type='date' name='deadline[]' id='deadline" + i + "' value='{{ date('Y-m-d') }}' placeholder='Input Date' class='form-control input-md'/></td><td><select class='form-control' name='status[]'><option value=''>...</option><option value='Open'>Open</option><option value='OnProgress'>On Progress</option><option value='Close'>Close</option><option value='Cancelled'>Cancelled</option></select></td><td class='text-center remove'><a href='#'><i class='fas fa-trash-alt'></i></a></td>");
                $('#detail_table').append('<tr id="addr' + (i+1) + '"></tr>');
                i++;
            });            
        });

        $('.remove').live('click', function() {
            $(this).closest('tr').remove();
        });
    </script>
<script type="text/javascript">
    $(document).ready( function() {
        $('#section').on('change', function() {
            $('#event_id').val($(this).val());
        });
    });
</script>
@endsection