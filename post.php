    <div><input id=input placeholder="message" /></div>
    <div id=box></div>
    <script src=https://cdn.pubnub.com/sdk/javascript/pubnub.4.28.2.min.js></script>
    <script> (function() {
            var pubnub = new PubNub({
                publishKey: 'pub-c-32771adc-f7e8-4906-ab30-eca0907cd066',
                subscribeKey: 'sub-c-fc530d3e-f08b-11eb-a6ad-d27c727b4015'
            });
            function $(id) {
                return document.getElementById(id);
            }
            var box = $('box'),
                input = $('input'),
                channel = '10chat-demo';
            pubnub.addListener({
                message: function(obj) {
                    box.innerHTML = ('' + obj.message).replace(/[<>]/g, '') + '<br>' + box.innerHTML
                }
            });
            pubnub.subscribe({
                channels: [channel]
            });
            input.addEventListener('keyup', function(e) {
                if ((e.keyCode || e.charCode) === 13) {
                    pubnub.publish({
                        channel: channel,
                        message: input.value,
                        x: (input.value = '')
                    });
                }
            });
        })();
    </script>
<?php
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
     
    $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>".$_SESSION['name']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
}
?>
