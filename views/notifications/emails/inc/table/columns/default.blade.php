@php
    /**
     * @var array $tableData
     * @var array $tableDataRow
     * @var string $tableDataRowColumnKey
     * @var string $tableDataRowColumn
     */
    //    $pathToImage = themes('images/markt-banner2.jpg');
@endphp
<td style="text-align: left; color: #404040; background-color: #f8f8f8; padding: 6px;">
    {{ data_get($tableDataRowColumn, 'content') }}
</td>