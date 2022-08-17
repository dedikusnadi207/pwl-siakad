@extends('layouts.index')
@section('content')
<!-- Content -->
    <div class="row">
        <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('common.study_plan_card') }}</h5>
                <hr class="my-0" />
                <div class="card-body">
                    @if (!$submitted || $submitted->status != \App\Constants\CollegerStudyPlanCardStatus::APPROVED)
                    <form method="POST" action="{{ url('clg/study-plan-card') }}">
                        @csrf
                        <input type="hidden" name="study_plan_card_id" value="{{ $studyPlanCard->id }}">
                    @else
                        @php $disableCheckbox = 'checked disabled' @endphp
                    @endif
                        <table class="table table-responsive table-hover" id="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">
                                        <center>
                                            <input type="checkbox" class="form-check-input" id="checkboxHeader" {{ $disableCheckbox ?? '' }}>
                                        </center>
                                    </th>
                                    <th>No</th>
                                    <th>{{ __('common.code') }}</th>
                                    <th>{{ __('common.course') }}</th>
                                    <th>SKS</th>
                                    <th>{{ __('common.class') }}</th>
                                    <th>{{ __('common.schedule') }}</th>
                                    <th>{{ __('common.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($studyPlanCard->studyPlanCardDetails as $item)
                                <tr>
                                    <td><input type="checkbox" class="checkbox form-check-input" id="check{{ $item->id }}" name="study_plan_card_details[{{ $item->id }}]" {{ $disableCheckbox ?? '' }}></td>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->classCourse->course->code }}</td>
                                    <td>{{ $item->classCourse->course->name }}</td>
                                    <td>{{ $item->classCourse->course->sks }}</td>
                                    <td>{{ $item->classCourse->class->name.$item->studyPlanCard->class_group }}</td>
                                    <td>{{ $item->publicSchedule() }}</td>
                                    <td>
                                        @if(isset($submittedDetail[$item->id]))
                                            {!! \App\Constants\CollegerStudyPlanCardStatus::generateBadge($submittedDetail[$item->id]) !!}
                                        @else
                                            <span class="badge bg-secondary">{{ __('status.not_submitted') }}</span>
                                        @endif
                                        @if (\App\Constants\CollegerStudyPlanCardStatus::APPROVED != ($submittedDetail[$item->id] ?? 'APPROVED'))
                                            <button class="btn btn-sm btn-danger" type="button" onclick="deleteConfirmation('{{ url('clg/study-plan-card/'.$submitted->id.'/'.$item->id) }}', false, null, ()=>location.reload())">{{ __('common.cancel_request') }}</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @if (!$submitted || $submitted->status != \App\Constants\CollegerStudyPlanCardStatus::APPROVED)
                        <div class="mt-3 col-md-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('common.save') }}</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
<!-- / Content -->
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#checkboxHeader').change(function () {
                $('.checkbox').prop('checked', this.checked)
            })
        })
    </script>
@endpush
