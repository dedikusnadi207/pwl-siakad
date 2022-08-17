@extends('layouts.index')
@push('css')
    <style>
        .swal2-container {
            z-index: 2000 !important;
        }
    </style>
@endpush
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.study_plan_card') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form method="GET" id="form">
                        <div class="col-md-6">
                            <select name="academic_supervisor_id" onchange="$('#form').submit()" class="form-control">
                                <option value="">-- {{ __('common.choose') }} --</option>
                                @foreach ($options as $option)
                                <option value="{{ $option['value'] }}" {{ $option['value'] == $academicSupervisorId ? 'selected' : '' }}>{{ $option['text'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                @if ($academicSupervisorId)
                    <div class="card-body">
                        @include('components.generateTable',['data' => [
                            'url' => url('lct/study-plan-card/'.$academicSupervisorId.'/data'),
                            'columns' => [
                                'npm' => 'NPM',
                                'name' => __('common.name'),
                                'semester' => __('common.semester'),
                                'status' => __('common.status'),
                                'action' => __('common.action'),
                            ],
                        ]])
                    </div>
                @endif
            </div>
        </div>
    </div>
<!-- / Content -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
    <form method="POST" action="{{ url('lct/study-plan-card/approval') }}" id="formModal">
    @csrf
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailTitle">{{ __('common.study_plan_card_detail') }}</h5>
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
                            <th>{{ __('common.class') }}</th>
                            <th>{{ __('common.schedule') }}</th>
                            <th>{{ __('common.status') }}</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                {{ __('common.cancel') }}
                </button>
                <button type="button" class="btn btn-primary" onclick="save()">{{ __('common.save') }}</button>
            </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('js')
    <script>
        $(document).on('click', '.btn-detail', function () {
            $('#collegerStudyPlanCardId').val(this.value);
            $('#formModal').attr('action', "{{ url('lct/study-plan-card') }}/"+this.value+"/approval")
            $('#modalDetail').modal('show');
            $.ajax({
                method: 'GET',
                url: "{{ url('lct/study-plan-card') }}/"+this.value+"/detail",
                data:{
                    "_token":"{{ csrf_token() }}"
                }
            }).done(function (data, message, xhr) {
                if (xhr.status == 200) {
                    $('#tableBody').html(data);
                }
            })
        });

        function save() {
            confirmation(() => {
                $('#formModal').submit();
            });
        }
    </script>
@endpush
