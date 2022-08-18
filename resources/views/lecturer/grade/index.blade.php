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
                        <div class="mb-3 col-md-8">
                            <select name="period_id" onchange="$('#form').submit()" class="form-control">
                                <option value="">-- {{ __('common.choose').' '.__('common.period') }} --</option>
                                @foreach ($periods as $option)
                                    <option value="{{ $option['value'] }}" {{ $option['value'] == $periodId ? 'selected' : '' }}>{{ $option['text'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($periodId)
                            <div class="mb-3 col-md-8">
                                <select name="detail_id" onchange="$('#form').submit()" class="form-control">
                                    <option value="">-- {{ __('common.choose').' '.__('common.class') }} --</option>
                                    @foreach ($detailOptions as $option)
                                        <option value="{{ $option['value'] }}" {{ $option['value'] == $detailId ? 'selected' : '' }}>{{ $option['text'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </form>
                </div>
                @if ($detailId)
                    <form method="post" action="{{url('lct/grade/'.$periodId.'/'.$detailId.'')}}">
                        @csrf
                        <div class="card-body">
                            @include('components.generateTable',['data' => [
                                'url' => url('lct/grade/'.$periodId.'/'.$detailId.'/data'),
                                'columns' => [
                                    'colleger_study_plan_card.colleger.npm' => 'NPM',
                                    'colleger_study_plan_card.colleger.name' => __('common.name'),
                                    'grade' => __('common.grade'),
                                    'index' => __('common.index'),
                                    'index_grade' => __('common.index_grade'),
                                ],
                            ]])
                            <div class="mt-3">
                                <button class="btn btn-primary" type="submit">{{  __('common.save') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>

        </div>
    </div>
<!-- / Content -->
@endsection

@push('js')
    <script>
        $(document).on('keyup', '.input-grade', function () {
            const id = $(this).attr('input-grade-id');
            const converted = convertGrade(parseInt(this.value));
            $(`#index${id}`).html(converted[0]);
            $(`#indexGrade${id}`).html(converted[1]);
        });

        function convertGrade(grade) {
            if (grade >= 85) {
                return ['A', 4.00];
            } else if (grade >= 80) {
                return ['A-', 3.75];
            } else if (grade >= 75) {
                return ['B+', 3.25];
            } else if (grade >= 70) {
                return ['B', 3.00];
            } else if (grade >= 65) {
                return ['B-', 2.75];
            } else if (grade >= 60) {
                return ['C+', 2.25];
            } else if (grade >= 55) {
                return ['C', 2.00];
            } else if (grade >= 50) {
                return ['C-', 1.75];
            } else if (grade >= 40) {
                return ['D', 1.00];
            } else {
                return ['E', 0];
            }
        }
    </script>
@endpush
