<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>
    <div>
        <div>
            <div class="sidebar"></div>
            <div class="chat window">
                <div class="chat box">
                    @foreach($chats as $chat )
                    <div data-chatid="{{$chat->chat_id}}"></div>
                    @endforeach
                </div>
                <div class="message box">
                    <textarea name="message" id="message" cols="10" rows="3"></textarea>
                    <button type="button" id="sendMessage" data-userid="{{$user_id}}">Send Message</button>
                </div>
            </div>           
        </div>
    </div>

    <script>
        sendMessage.addEventListener("click", function(){
            let mesText = message.value;
            let user_id = this.getAttribute("data-userid");
            let chat_id = this.getAttribute("data-chatid");
            fetch("/send-message", {
                method: "post",
                body: JSON.stringify({
                    message: mesText,
                    userID : user_id,
                    chatID: chat_id
                }),
                headers: {
                    "Content-Type": "application/json"
                }
            })
        });
        const allRooms = document.querySelectorAll(".chat-rooms");
        allRooms.forEach((room)=>{
            const roomID = room.getAttribute("data-chat-room")?? "room";
            Echo.channel("chat-channel").listen(`.chat.${roomID}`, function(data){
            console.log("message recieve from server ", data.message, "chat id gotten ", data.chatID, "sender id gotten: ", data.sender_id );
        });
        });
        
    </script>
</body>
</html>