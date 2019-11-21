$(document).ready(function() {

    startButton();

    var dontCheck = 1;
    var validScenario = 1;
    var countIsValid = 0;

    (function worker() {

        $.ajax({
            url: "checkScenario",
            type: "GET",
            success: function(data) {
				//console.log(data);

                if(data == 0)
                    dontCheck = 1;
				else if(data == 1)
					location.reload(true);
                else
                {
                    dontCheck = 0;

                    var validationArray = data.split(',');
					//console.log('order '+validationArray);
					//console.log('validScenario '+validScenario);
                    if(validationArray[0] == 1)
                    {
                        countIsValid += 1;
                        $("#component1 span").addClass('glyphicon glyphicon-ok');
                    }
                    else
                    {
                        validScenario = 0;
                        $("#component1 span").addClass('glyphicon glyphicon-remove');
                    }

                    if(validationArray[1] == 1)
                    {
                        countIsValid += 1;
                        $("#component2 span").addClass('glyphicon glyphicon-ok');
                    }
                    else
                    {
                        validScenario = 0;
                        $("#component2 span").addClass('glyphicon glyphicon-remove');
                    }

                    if(validationArray[2] == 1)
                    {
                        countIsValid += 1;
                        $("#component3 span").addClass('glyphicon glyphicon-ok');
                    }
                    else
                    {
                        validScenario = 0;
                        $("#component3 span").addClass('glyphicon glyphicon-remove');
                    }

                    if(validationArray[3] == 1)
                    {
                        countIsValid += 1;
                        $("#component4 span").addClass('glyphicon glyphicon-ok');
                    }
                    else
                    {
                        validScenario = 0;
                        $("#component4 span").addClass('glyphicon glyphicon-remove');
                    }
//console.log('count '+countIsValid);
                    if(validScenario == 0 && countIsValid < 4)
                    {


                        $(".alertLabelCustom").removeClass('hidden');
                        $(".alertLabelCustom").removeClass('alert-success');
                        $(".alertLabelCustom").addClass('alert-danger');

                        $(".alertSuccessMessages").html('<h1 class="blink_me"><strong>TENTE NOVAMENTE!!</strong></h1>');


                        jQuery.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            url: "setScenarioStatus",
                            data: {status:validScenario},
                            type: "POST",
                            success:function(data){
                                console.log(data);
                            },
                            error:function (){}
                        });



                        setTimeout(function(){

                            $("#component1 span").removeClass('glyphicon glyphicon-remove');
                            $("#component1 span").removeClass('glyphicon glyphicon-ok');
                            $("#component2 span").removeClass('glyphicon glyphicon-remove');
                            $("#component2 span").removeClass('glyphicon glyphicon-ok');
                            $("#component3 span").removeClass('glyphicon glyphicon-remove');
                            $("#component3 span").removeClass('glyphicon glyphicon-ok');
                            $("#component4 span").removeClass('glyphicon glyphicon-remove');
                            $("#component4 span").removeClass('glyphicon glyphicon-ok');

                        }, 3000);

                        dontCheck = 1;
                        countIsValid = 0;
                    }
                    else if(countIsValid == 4)
                    {
                        $(".alertLabelCustom").removeClass('hidden');
                        $(".alertLabelCustom").removeClass('alert-danger');

                        $(".alertLabelCustom").addClass('alert-success');

                        $(".alertSuccessMessages").html('<h1 class="blink_me"><strong>CORRECTO! Por favor remova a caixa.</strong></h1>');

                        validScenario = 1;
                        countIsValid = 0;
						dontCheck = 1;
						
						jQuery.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            url: "setScenarioStatus",
                            data: {status:validScenario},
                            type: "POST",
                            success:function(data){
                                //console.log(data);
                            },
                            error:function (){}
                        });
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