<?php $no = 1; ?>
@foreach ($collegerStudyPlanCardDetails as $item)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $item->studyPlanCardDetail->classCourse->course->code }}</td>
    <td>{{ $item->studyPlanCardDetail->classCourse->course->name }}</td>
    <td>{{ $item->studyPlanCardDetail->classCourse->course->sks }}</td>
    <td>{{ $item->grade }}</td>
    <td>{{ $item->index }}</td>
    <td>{{ $item->index_grade }}</td>
</tr>
@endforeach
