@php
    /**
     * @var array $tableData
     * @var array $tableDataHeadName
     */
    //    $pathToImage = themes('images/markt-banner2.jpg');
@endphp
<tr style="height: 50px;">
    @foreach(data_get($tableData, 'headers') as $tableDataRowHeaderKey => $tableDataRowHeader)
        @include('notifications.emails.inc.table.columns.header')
    @endforeach
</tr>