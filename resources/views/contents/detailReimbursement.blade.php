<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <center><h3 class="fw-bold py-3" style="font-size: 30px">DETAIL REIMBURSEMENT</h3></center>
        
        <div class="card mt-4" style="padding: 30px">
            <div class="table-responsive text-nowrap m-4">
                @if(Auth::check())
                    @php
                        $userRole = Auth::user()->role;
                    @endphp

                    @if($userRole === 'direktur')
                        <div style="display: flex; justify-content: space-between;" class="mb-4" >
                            <form action="{{ route('reimbursement.acceptdirektur', $rei->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Accept Reimbursement</button>
                            </form>
                            <form action="{{ route('reimbursement.rejectdirektur', $rei->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject Reimbursement</button>
                            </form>
                        </div> 
                    @elseif($userRole === 'finance')
                        <div style="display: flex; justify-content: space-between;" class="mb-4">
                            <form action="{{ route('reimbursement.acceptfinance', $rei->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Accept Reimbursement</button>
                            </form>
                            <form action="{{ route('reimbursement.rejectfinance', $rei->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject Reimbursement</button>
                            </form>
                        </div>                        
                    @endif
                @endif
                <table class="table mb-4">
                    <tr>
                        <td><strong>Nama Pengajuan:</strong></td>
                        <td>{{$rei->user}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal:</strong></td>
                        <td>{{$rei->tanggal}}</td>
                    </tr>
                    <tr>
                        <td><strong>Nama Reimbursement:</strong></td>
                        <td>{{$rei->nama_reimbursement}}</td>
                    </tr>
                    <tr>
                        <td><strong>Deskripsi:</strong></td>
                        <td>{{$rei->deskripsi}}</td>
                    </tr>
                </table>
                <div class="d-grid gap-3 mb-4">
                    <a href="link_ke_file_reimbursement" target="_blank">
                        <center><x-primary-button>Lihat Dokumen</x-primary-button></center>
                    </a>
                </div>
                
                
            </div>
        </div>
    </div>
</x-app-layout>
