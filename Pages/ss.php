<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chat Interface</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .chat-container {
        max-width: 600px;
        width: 100%;
    }

    .chat-box {
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .message {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 10px;
        clear: both;
    }

    .message.right {
        float: right;
        background-color: #DCF8C6;
    }

    .message.left {
        float: left;
        background-color: #EAEAEA;
    }

    .message p {
        margin: 0;
    }
</style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-box">
            <div class="message left">
                <p>Hello, how are you?</p>
            </div>
            <div class="message right">
                <p>Hi there! I'm doing fine, thanks.</p>
            </div>
            
        </div>
    </div>
</body>
</html>
