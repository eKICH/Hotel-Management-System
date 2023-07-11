$(document).ready(function(){
    $("#btn-mult").click(function(){
        var tdays = parseInt($("#tdays").val());
        var aday = parseInt($("#aday").val());

        $("#totalamount").val(tdays * aday);
    });
});

$(document).ready(function(){
    $("#amountpaid").change(function(){
        var amountpaid = parseInt($("#amountpaid").val());
        var totalamount = parseInt($("#totalamount").val());

        $("#balance").val(totalamount - amountpaid);
    });
});