var setDefaultDate = new Date();
    $scope.defaultStartDate = moment(setDefaultDate).format('MM/DD/YYYY');
    $scope.defaultEndDate = moment(setDefaultDate).add(1, 'day').format('MM/DD/YYYY');
    $scope.defaultStartTime = moment(setDefaultDate).format("hh:mm a");
    $scope.defaultEndTime = moment(setDefaultDate).format("hh:mm a");
    jQuery('#startDatepicker').datetimepicker({
        format: 'MM/DD/YYYY',
        defaultDate: new Date()
    });
    jQuery('#endDatepicker').datetimepicker({
        format: 'MM/DD/YYYY',
        useCurrent: false
    });
    jQuery('#startDatepicker').data("DateTimePicker").minDate($scope.defaultStartDate);
    jQuery('#endDatepicker').data("DateTimePicker").minDate($scope.defaultEndDate);

    jQuery("#startDatepicker").on("dp.change", function(e) {        
        jQuery('#startDatepicker').focus();        
        jQuery('#endDatepicker').data("DateTimePicker").minDate(e.date);
    });
    jQuery("#endDatepicker").on("dp.change", function(e) {
        jQuery('#endDatepicker').focus();
        jQuery('#startDatepicker').data("DateTimePicker").maxDate(e.date);
    });
    jQuery('#startTimepicker').datetimepicker({
        format: 'LT'
    });
    jQuery('#endTimepicker').datetimepicker({
        format: 'LT'
    });