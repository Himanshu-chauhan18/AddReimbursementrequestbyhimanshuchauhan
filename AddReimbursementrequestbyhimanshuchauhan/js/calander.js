$(document).ready(function() {
    var minD;
    var maxD;

    var dateFormat = "yy-mm-dd",
        from = $("#from")
        .datepicker({
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd"
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
            minD = $(this).val();


        }),
        to = $("#to").datepicker({
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd"
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
            maxD = $(this).val();

            showvalue(minD, maxD)
        });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }
        return date;
    }


    function showvalue(minD, maxD) {
        $(".datepicker").datepicker({
            minDate: minD,
            maxDate: maxD,
            dateFormat: "yy-mm-dd",
        });
        $.ajax({
            url: "php/fetch-insert.php",
            type: "POST",
            data: { fdate: minD, tdate: maxD },
            success: function(response) {
                $("#table-data tbody").html(response);
            }
        });
    }
});