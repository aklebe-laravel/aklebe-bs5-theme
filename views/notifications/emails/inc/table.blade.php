@php
    /**
     * @var array $tableData
     */
@endphp
<table style="margin: 10px; margin-bottom: 60px; min-width: 600px;">
    @include('notifications.emails.inc.table.head')

    @foreach(data_get($tableData, 'rows') as $tableDataRow)
        @include('notifications.emails.inc.table.row')
    @endforeach
</table>