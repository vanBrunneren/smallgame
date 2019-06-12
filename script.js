let roundCounter = 0;

$('.button').click(function() {

    roundCounter++;
    $(".roundCounter").html("Anzahl Runden: " + roundCounter);

    $.ajax({
        type: "POST",
        url: "start.php",
    }).done(function( response ) {

        $(".response").html(response);

    });

});