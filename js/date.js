$(document).ready(function(e) {
    $("input").change(function() {
        let dateFrom;
        let dateTo;
        let timeDifference;
        let ms;
        let results;

        $("input[name=date]").each(function(){
            dateFrom = new Date($("#datepicker").val());
            dateTo = new Date($("#dateout").val());

            timeDifference = dateTo.getTime() - dateFrom.getTime();

            ms = 1000 * 3600 * 24;

            results = timeDifference/ms;
        });
        $("input[name=totalDays]").val(results);
    });
});