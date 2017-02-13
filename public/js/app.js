$(document).ready(function () {
    $("#calculate").submit(function (event) {
        var desc = getOperationDescription($("#operation").val());
        var output = $("#operand_one").val() + " " + desc + " " + $("#operand_two").val();
        $.ajax({
            url: "/" + $("#operation").val(),
            data: {
                operand_one: $("#operand_one").val(),
                operand_two: $("#operand_two").val(),
            },
            type: "POST",
            dataType: "json",
        }).done(function (json) {
            $("<h4 class=\"text-center\">").text(output + " = " + json.result).prependTo("#output");
        }).fail(function (xhr) {
            $("<h4 class=\"text-center\">").text(xhr.responseJSON.error).prependTo("#output");
        });

        event.preventDefault();
    });
});

function getOperationDescription(operation) {
    let desc;
    switch (operation) {
        case 'add':
            desc = 'plus'
            break;
        case 'subtract':
            desc = 'subtracted by'
            break;
        case 'divide':
            desc = 'divided by'
            break;
        case 'multiply':
            desc = 'multiplied by'
            break;
    }
    return desc;
}
