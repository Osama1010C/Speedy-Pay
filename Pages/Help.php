<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InstaPay FAQs</title>
  <style>
    body {
      
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f7f7f7;
    }
    .container {

      max-width: 800px;
      margin: 230px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
    .question {
      cursor: pointer;
      margin-bottom: 10px;
      padding: 10px;
      background-color: #f2f2f2;
      border-radius: 5px;
    }
    .question:hover {
      background-color: #e0e0e0;
    }
    .answer {
      display: none;
      margin-top: 10px;
      padding: 10px;
      background-color: #f9f9f9;
      border-radius: 5px;
    }
    .answer.show {
      display: block;
    }
    p {
      margin: 0;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>InstaPay FAQs</h1>

    <div class="faq">
      <div class="question" onclick="toggleAnswer(1)">
        <p>How do I transfer money using InstaPay?</p>
      </div>
      <div class="answer" id="answer1">
        <p>To transfer money using InstaPay, you can log in to your bank's online banking platform or mobile app. Then, navigate to the transfer or payments section, select InstaPay as the transfer method, enter the recipient's details, and confirm the transfer.</p>
      </div>
    </div>
    
    <div class="faq">
      <div class="question" onclick="toggleAnswer(2)">
        <p>Are there any fees for using InstaPay?</p>
      </div>
      <div class="answer" id="answer2">
        <p>Fees for using InstaPay may vary depending on your bank or financial institution. Some banks offer InstaPay transfers for free, while others may charge a small fee. It's best to check with your bank to understand their fee structure for InstaPay transfers.</p>
      </div>
    </div>
    
    <div class="faq">
      <div class="question" onclick="toggleAnswer(3)">
        <p>How long does it take for an InstaPay transfer to go through?</p>
      </div>
      <div class="answer" id="answer3">
        <p>InstaPay transfers are typically processed instantly or within a few minutes. However, the exact processing time may vary depending on factors such as your bank's processing speed and the recipient's bank.</p>
      </div>
    </div>

    <!-- Add more FAQs here if needed -->
  </div>

  <script>
    function toggleAnswer(id) {
      var answer = document.getElementById("answer" + id);
      answer.classList.toggle("show");
    }
  </script>
</body>
</html>
