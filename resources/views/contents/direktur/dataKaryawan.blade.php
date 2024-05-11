<x-app-layout>
        <div class="container-xxl flex-grow-1 container-p-y">
                <center><h3 class="fw-bold py-3" style="font-size: 30px">DATA KARYAWAN</h3></center>
                <div class="pull-right mb-4">
                    <a class="btn btn-primary" href="{{ route('direktur.createkaryawan') }}">Tambah Karyawan</a>
                </div>
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
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                <?php
                                    $no = 0;
                                ?>
                                @foreach($user as $pl)
                                <?php
                                    $no += 1;
                                ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$pl->name}}</td>
                                    <td>{{$pl->nip}}</td>
                                    <td>{{$pl->email}}</td>
                                    <td>{{$pl->role}}</td>
                                    <td>
                                        <a href="{{route('datakaryawan.update', $pl->id)}}" class="btn btn-warning">Ubah</a>
                                        <a href="{{route('datakaryawan.delete', $pl->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            {!! $user->links() !!}
                        </div>
                    </div>
                </div>
              <!--/ Responsive Table -->
        </div>   
</x-app-layout>