<div class="container_chat">
    @csrf
    <div class="title_form_chat">
        <div class="title">
            Liên hệ chúng tôi
        </div>
        <div class="btn btn-close btn-danger">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </div>
    </div>
    <div class="container_message">
        <div class="list_message_chat"></div>
    </div>
    <div class="form_chat">
        <div class="include_input_chat">
            <input type="text" id="message_chat">
        </div>
        <div class="button_chat">
            <button type="button" class="btn btn-primary" style="padding: 5px; margin-top: 5px">send</button>
        </div>
    </div>
</div>


<script>
    Pusher.logToConsole = true;

    var cur_user = 'anonymous_' + sessionid;

    var pusher = new Pusher('cd9486769166e387ebfe', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('chat_support');
    channel.bind('send_message', function(data) {
        //   alert(JSON.stringify(data));
        var data_message = JSON.parse(data.message);
        if (data_message.id_room == sessionid) {
            var class_item_chat = '';
            if(data_message.id_user == cur_user){
                class_item_chat = 'your_self';
            }


            var html_item_chat =
                `
        <div class="item_chat ${class_item_chat}">
        ${data_message.message}
        </div>
    `;
            $('.list_message_chat').append(html_item_chat);
        }
    });

    $(() => {
        var hidden_form = 0;
        $('.button_chat').click(() => {
            // console.log(123);
            if ($('#message_chat').val()) {
                var token = $('input[name="_token"]').val();
                var data_mess = {
                    message: $('#message_chat').val(),
                    id_room: sessionid,
                    id_user: cur_user
                };

                var data_string = JSON.stringify(data_mess);
                $.post('/message', {
                        message: data_string,
                        _token: token
                    })
                    .then((response) => {
                        $('#message_chat').val('');
                        // console.log(response);
                    });
            }

        });

        $('#message_chat').on('keypress', (e) => {
            if (e.keyCode == 13) {
                if ($('#message_chat').val()) {
                    var token = $('input[name="_token"]').val();
                    var data_mess = {
                        message: $('#message_chat').val(),
                        id_room: sessionid,
                        id_user: cur_user
                    };

                    var data_string = JSON.stringify(data_mess);
                    $.post('/message', {
                            message: data_string,
                            _token: token
                        })
                        .then((response) => {
                            $('#message_chat').val('');
                            // console.log(response);
                        });
                }
            }


        })

        $('.title_form_chat').click(() => {
            // console.log('click');
            if (hidden_form == 0) {
                hidden_form = 1;
                $('.container_chat').removeClass('inactive');
                $('.container_chat').addClass('active');
            } else {
                hidden_form = 0;
                $('.container_chat').removeClass('active');
                $('.container_chat').addClass('inactive');
            }
        })
    });

    window.onbeforeunload = function(event) {
        var message = 'Important: Please click on \'Save\' button to leave this page.';
        if (typeof event == 'undefined') {
            event = window.event;
        }
        if (event) {
            event.returnValue = message;
        }

        var token = $('input[name="_token"]').val();
        var data_mess = {
            message: 'delete popup chat admin support',
            id_room: sessionid
        };

        var data_string = JSON.stringify(data_mess);
        $.post('/message-turn-off', {
                message: data_string,
                _token: token
            })
            .then((response) => {
                console.log(response);
            });

        return message;
    };
</script>
