<ui-select ng-model="selected.value">
    <ui-select-match>
        <span ng-bind="$select.selected.name"></span>
    </ui-select-match>
    <ui-select-choices repeat="item in (itemArray | filter: $select.search) track by item.id">
        <span ng-bind="item.name"></span>
    </ui-select-choices>
</ui-select>