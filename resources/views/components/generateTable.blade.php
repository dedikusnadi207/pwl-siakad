@php
    $tableId = isset($data['table_id']) ? $data['table_id']  : 'table';
    $ch = @$data['checkbox_header_id'] ?: "checkboxHeader";
@endphp
    <table class="table table-responsive table-hover" id="{{$tableId}}" style="width:100%">
        <thead>
            <tr>
                @foreach ($data['columns'] as $key => $item)
                    @if ('#' == $item)
                        <th style="width: 5%;">
                            <center>
                                <input type="checkbox" class="filled-in" id="{{ $ch }}">
                                <label for="{{ $ch }}"></label>
                            </center>
                        </th>
                    @else
                        <th>{{ str_replace('^', '', $item) }}</th>
                    @endif

                @endforeach
            </tr>
        </thead>
    </table>

@push('js')
    <script type="text/javascript">
        var {{ @$data['table_id'] ? $data['table_id'] : 'oTable' }};
        $(function() {
            {{ @$data['table_id'] ? $data['table_id'] : 'oTable' }} = $('#{{$tableId}}').DataTable({
                @php if (@$data['table_only']) { @endphp
                searching: false,
                bLengthChange: false,
                @php } @endphp
                @php if(!@$clientSide) { @endphp
                serverSide: true,
                @php }
                if(@$exportAll){
                @endphp

                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],

                @php } @endphp

                @php if(@$exportExcel) { @endphp
                dom: "Bfrtip",
                buttons: [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [ 0, 1, 2, 4, 5, 6, 7 ]
                        }
                    }
                ],

                @php } @endphp

                @if (@$data['pageLength'])
                    pageLength: {{ $data['pageLength'] }},
                @endif

                @if (@$data['pageLength'])
                    pageLength: {{ $data['pageLength'] }},
                @endif

                responsive: true,
                @php if(isset($isExportable)) { @endphp
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10', '25', '50', 'All' ]
                ],
                dom: "lBfrtip",

                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 4 ]
                        }
                    }
                ],

                @php } @endphp
                columnDefs: [
                    @if (@$data['checkbox'])
                        { "orderable": false, "targets": 0 },
                    @endif
                    @if(@$data['hidden_columns'])
                        @php
                            $keys = array_keys($data['columns']);
                            $result = array_keys(array_intersect($keys, $data['hidden_columns']));
                        @endphp
                        { 'targets' : {!! json_encode($result) !!}, 'visible': false }
                    @endif
                    ],
                ajax: {
                    url: '{!! $data["url"] !!}'
                },
                order: [],
                columns: [
                @foreach ($data['columns'] as $key => $item)
                    {data: '{{$key}}', name: '{{$key}}' {!!strpos($item, '^') !== false ? ",render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )" : ""!!} },
                @endforeach
                ],
            });
        });
    </script>
@endpush
