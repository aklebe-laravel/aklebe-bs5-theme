@php
    /**
     * @var array $tableData
     * @var array $tableDataRow
     */
@endphp
<tr style="height: 40px; border: 1px solid blue;">
    @foreach($tableDataRow as $tableDataRowColumnKey => $tableDataRowColumn)
        @include('notifications.emails.inc.table.columns.default')
    @endforeach
</tr>
