<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Static Chat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>

    <div id='start-chat'>
        <form id="save-name">
            <input type="text" name="name" id="name" placeholder="Enter Name" required>
            <input type="submit" value="Let's Chat">
        </form>
    </div>
    <div id="chat-part">
        <form id="chat-form">
            @csrf
            <input type="hidden" name="username" id="username">
            <input type="text" name="message" id="message" placeholder="Enter Message" required>
            <input type="submit" value="Send">
        </form>
        <div id="chat-container">

        </div>
    </div>



    <script>
        $('#chat-form').hide();

        $('#start-chat').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            $('#username').val($('#name').val());
            $('#chat-form').show();
            $('#start-chat').hide();
        });

        $('#chat-form').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = $(this).serialize();
            alert(formData);
            $.ajax({
                url: "{{ route('broadcastMessage') }}",
                type: 'POST',
                data: formData
            });
            $('#message').val('');

        });
    </script>


    @vite('resources/js/app.js')

    <script type="module">
        Echo.channel('message')
            .listen('MessageEvent', (e) => {
                let html = `<br>
        <b>` + e.username + `:- </b>
        <span>` + e.message + `</span>`;
                $('#chat-container').append(html);
            });
    </script>


</body>

</html>
