@extends('layout.template')

@section('content')
<!--  BEGIN CONTENT AREA  -->
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                    <h3>Lomba Mahasiswa</h3>
                </div>
            </div>

            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="column-filter_length">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary"> #. </th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Angkatan</th>
                                            <th>Program Studi</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="checkbox-column"> 1 </td>
                                            <td>2341******</td>
                                                <td>Syahrul</td>
                                                <td>2023</td>
                                                <td>D-IV TEKNIK INFORMATIKA</td>
                                                <td><span class="shadow-none badge badge-primary">Pending</span></td>
                                                <td class="text-center">
                                                    <a href="{{ url('/admin/verifikasi-lomba/detail') }}" class="btn btn-outline-primary">Detail Lomba</a>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
