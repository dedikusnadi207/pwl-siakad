@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.grade') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <table class="table table-responsive table-hover" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('common.period') }}</th>
                                <th>SKS Semester</th>
                                <th>SKS Total</th>
                                <th>IP Semester</th>
                                <th>IP Kumulatif</th>
                                <th>{{ __('common.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->period->publicName() }}</td>
                                <td>{{ $item->sks_semester }}</td>
                                <td>{{ $item->sks_kumulatif }}</td>
                                <td>{{ $item->ip_semester }}</td>
                                <td>{{ $item->ip_kumulatif }}</td>
                                <td><button type="button" class="btn-detail btn btn-sm btn-primary" value="{{ $item->id }}">{{__('common.detail')}}</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailTitle"></h5>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <table class="table table-responsive table-hover" id="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>{{ __('common.code') }}</th>
                            <th>{{ __('common.course') }}</th>
                            <th>SKS</th>
                            <th>{{ __('common.grade') }}</th>
                            <th>{{ __('common.index') }}</th>
                            <th>{{ __('common.index_grade') }}</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                {{ __('common.close') }}
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).on('click', '.btn-detail', function () {
            $('#modalDetail').modal('show');
            $.ajax({
                method: 'GET',
                url: "{{ url('clg/grade') }}/"+this.value+"/detail",
                data:{
                    "_token":"{{ csrf_token() }}"
                }
            }).done(function (data, message, xhr) {
                if (xhr.status == 200) {
                    $('#tableBody').html(data);
                }
            })
        });
    </script>
@endpush
