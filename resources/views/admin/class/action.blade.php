<a href="{{ url('class').'?id='.$data->id }}" class="btn btn-sm btn-primary">{{ __('common.edit') }}</a>
<button class="btn btn-sm btn-danger" type="button" onclick="deleteConfirmation('{{ url('class').'/'.$data->id }}')">{{ __('common.delete') }}</button>
