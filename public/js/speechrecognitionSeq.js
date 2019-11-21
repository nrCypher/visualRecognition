showInfo('info_start');


var create_email = false;
var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;

if (!('webkitSpeechRecognition' in window)) {
    upgrade();
} else {
    start_button.style.display = 'inline-block';
    var recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    recognition.interimResults = true;


    recognition.onstart = function () {
        recognizing = true;
        showInfo('info_speak_now');
        //start_img.src = 'mic-animate.gif';
    };
    recognition.onerror = function (event) {

        if (event.error == 'no-speech') {

            showInfo('info_no_speech');
            ignore_onend = true;
        }
        if (event.error == 'audio-capture') {

            showInfo('info_no_microphone');
            ignore_onend = true;
        }
        if (event.error == 'not-allowed') {
            if (event.timeStamp - start_timestamp < 100) {
                showInfo('info_blocked');
            } else {
                showInfo('info_denied');
            }
            ignore_onend = true;
        }
    };
    recognition.onend = function () {
        recognizing = false;
        if (ignore_onend) {
            return;
        }

        if (!final_transcript) {
            showInfo('info_start');
            return;
        }
        showInfo('');
        if (window.getSelection) {
            window.getSelection().removeAllRanges();
            var range = document.createRange();
            range.selectNode(document.getElementById('final_span'));
            window.getSelection().addRange(range);
        }
        if (create_email) {
            create_email = false;
            createEmail();
        }
    };
    recognition.onresult = function (event) {
        var interim_transcript = '';
        for (var i = event.resultIndex; i < event.results.length; ++i) {

            final_transcript='';
            var aux_final_transcript='';
            if (event.results[i].isFinal) {
                final_transcript += event.results[i][0].transcript;

                aux_final_transcript = final_transcript.replace(/\s/g, '');
                console.log(aux_final_transcript);
                $("#speechText").text(aux_final_transcript);

                if ((aux_final_transcript == 'mostrar'))
                {
                    var videoPath = 'http://localhost/visualrecognition/public/storage/Scenarios/s'+sequence+'/'+sequence+'_'+step+'.mp4';

                    $("#video").attr("src", videoPath);
                    $('video').load();

                    $('#myModal').modal('show');

                    recognition.stop();
                    return;
                }
                else{

                    if(aux_final_transcript == 'avançar' || aux_final_transcript == 'adançar') {
                        location.reload();
                    }
                    else{

                        console.log('nao faz nada');
                        aux_final_transcript = '';
                    }

                }

            } else {
                interim_transcript += event.results[i][0].transcript;
            }
        }
        final_transcript = capitalize(final_transcript);
        // final_span.innerHTML = linebreak(final_transcript);
        // interim_span.innerHTML = linebreak(interim_transcript);
        // if (final_transcript || interim_transcript) {
        //     showButtons('inline-block');
        // }
    };
}

function upgrade() {
    start_button.style.visibility = 'hidden';
    showInfo('info_upgrade');
}

var two_line = /\n\n/g;
var one_line = /\n/g;

function linebreak(s) {
    return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}

var first_char = /\S/;

function capitalize(s) {
    return s.replace(first_char, function (m) {
        return m.toUpperCase();
    });
}


function startButton() {

    if (recognizing) {
        recognition.stop();
        return;
    }
    final_transcript = '';


    //recognition.lang = select_dialect.value;
    recognition.lang = "PT-pt";
    console.log(recognition.lang);


    recognition.start();
    ignore_onend = false;
    // final_span.innerHTML = '';
    // interim_span.innerHTML = '';
    // start_img.src = 'mic-slash.gif';
    showInfo('info_allow');
    showButtons('none');
    //  start_timestamp = event.timeStamp;
}

function showInfo(s) {
    // if (s) {
    //     for (var child = info.firstChild; child; child = child.nextSibling) {
    //         if (child.style) {
    //             child.style.display = child.id == s ? 'inline' : 'none';
    //         }
    //     }
    //     info.style.visibility = 'visible';
    // } else {
    //     info.style.visibility = 'hidden';
    // }
}

var current_style;

function showButtons(style) {
    if (style == current_style) {
        return;
    }
    current_style = style;
    // copy_button.style.display = style;
    // email_button.style.display = style;
    // copy_info.style.display = 'none';
    // email_info.style.display = 'none';
}