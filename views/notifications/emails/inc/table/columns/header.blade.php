@php
    /**
     * @var array $tableData
     * @var array $tableDataHeadName
     * @var array $tableDataHead
     * @var string $tableDataRowHeaderKey
     * @var array $tableDataRowHeader
     */
    //    $pathToImage = themes('images/markt-banner2.jpg');
@endphp
<th style="text-align: left; color: #404040; background-color: #e0e0e0; padding: 6px; font-weight: bold;">
    {{ data_get($tableDataRowHeader, 'label') }}
</th>