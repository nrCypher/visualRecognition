$(document).ready(function() {


    var dontCheck = 1;

    (function worker() {

        $.ajax({
            url: "checkSequence",
            type: "GET",
            dataType: 'json',
            success: function(data) {

                if(data != 0)
                {
                    if (data == 1)
                    {
                        $(".alertLabelCustom").removeClass('hidden');
                        $(".alertLabelCustom").removeClass('alert-success');
                        $(".alertLabelCustom").addClass('alert-danger');

                        $(".alertSuccessMessages").html('<h1 class="blink_me"><strong>TENTE NOVAMENTE!!</strong></h1>');

                        setTimeout(function(){
                            $(".alertLabelCustom").removeClass('alert-danger');
                            $(".alertLabelCustom").addClass('alert-success');
                            $(".alertSuccessMessages").html('<h1>Cenário Montagem de Sequência de Operação</h1>');
                        }, 5000);

                        startButton();
                    }
                    else
                    {
                        recognition.stop();

                        dontCheck = 0;

                        $(".alertLabelCustom").removeClass('hidden');
                        $(".alertLabelCustom").removeClass('alert-danger');
                        $(".alertLabelCustom").addClass('alert-success');

                        $(".alertSuccessMessages").html('<h1 class="blink_me"><strong>CORRECTO!</strong></h1>');

                        if(data != 2)
                        {

                            setTimeout(function(){
                                $(".step").text(data.step);
                                $("#sequenceStep").attr("src", 'http://localhost/visualrecognition/public/' + data.img);
                                $(".alertSuccessMessages").html('<h1>Cenário Montagem de Sequência de Operação</h1>');
                            }, 5000);
                        }

                        step = data.step;

                        // data.step == totalSteps
                        if(data == 2)
                        {
                            startButton();
                        //     setTimeout(function(){
                        //         location.reload();
                        //     }, 1500);
                        }

                        dontCheck = 1;
                    }
                }
            },
            complete: function() {
                // Schedule the next request when the current one's complete
                if(dontCheck)
                    setTimeout(worker, 100);
            }
        });

    })();

});