<x-app-layout>
        <div class="container-xxl flex-grow-1 container-p-y">
                <center><h3 class="fw-bold py-3" style="font-size: 30px">DATA REIMBURSMENT</h3></center>
                @if(Auth::check())
                    @php
                        $userRole = Auth::user()->role;
                    @endphp

                    @if($userRole === 'staff')
                        <div class="pull-right mb-4">
                            <a class="btn btn-primary" href="{{ route('reimbursement.create') }}">Tambah Reimbursement</a>
                        </div>                        
                    @endif
                @endif
                
                <!-- Responsive Table -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="card">
                    <div class="table-responsive text-nowrap m-4">
                        <table class="table">
                            <thead>
                            <tr class="text-nowrap">
                                <th>No</th>
                                <th>Tanggal Pengajuan</th>
                                <th>NNama Reimbursement</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                <?php
                                    $no = 0;
                                ?>
                                @foreach($rei as $pl)
                                <?php
                                    $no += 1;
                                ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$pl->tanggal}}</td>
                                    <td>{{$pl->nama_reimbursement}}</td>
                                    <td>{{$pl->deskripsi}}</td>
                                    <td>{{$pl->status}}</td>
                                    <td>
                                        <a href="{{route('reimbursement.detail', $pl->id)}}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            {!! $rei->links() !!}
                        </div>
                    </div>
                </div>
              <!--/ Responsive Table -->
        </div>   
</x-app-layout>