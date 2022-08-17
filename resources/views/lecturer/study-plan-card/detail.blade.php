<?php $no = 1; ?>
@foreach ($collegerStudyPlanCardDetails as $item)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $item->studyPlanCardDetail->classCourse->course->code }}</td>
    <td>{{ $item->studyPlanCardDetail->classCourse->course->name }}</td>
    <td>{{ $item->studyPlanCardDetail->classCourse->course->sks }}</td>
    <td>{{ $item->studyPlanCardDetail->classCourse->class->name.$item->studyPlanCardDetail->studyPlanCard->class_group }}</td>
    <td>{{ $item->studyPlanCardDetail->publicSchedule() }}</td>
    <td>
        <select name="status[{{ $item->id }}]" class="form-control">
            <option value="APPROVED">{{ __('status.approved') }}</option>
            <option value="REJECTED">{{ __('status.rejected') }}</option>
        </select>
    </td>
</tr>
@endforeach
