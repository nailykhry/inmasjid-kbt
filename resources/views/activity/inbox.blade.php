@extends('layout.main')

@section('title', 'Chat')

@section('css')
<style>
    body {
      background-color: #f0f0f0;
    }

    .chat-container {
      background-color: white;
      border-radius: 10px;
      /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); */
      /* padding: 15px; */
      /* max-width: 400px; */
      margin: 0 auto;
      /* padding-top: 150px */
    }

    .chat-box {
      height: 300px;
      overflow-y: auto;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .message {
      margin: 8px;
      padding: 8px;
      border-radius: 5px;
    }

    .received {
      background-color: #e1ffc7;
    }

    .sent {
      background-color: #c7d8fd;
      text-align: right;
    }

    .timestamp {
      font-size: 10px;
      color: #888;
    }

    .input-containers {
      margin-top: 10px;
      display: flex;
      /* width: 773px;
      height: 202px; */
      border: 1px solid #ccc;
    }

    input[type="text"] {
      flex: 1;
      padding: 8px;
      border: none;
      border-radius: 5px 0 0 5px;
    }

    button {
      background-color: white;
      color: rgb(171,171,171);
      border: none;
      /* border-radius: 0 5px 5px 0; */
      padding: 8px 15px;
      cursor: pointer;
    }

    .contact-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .search-box {
      /* margin-bottom: 10px; */
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 5px;
      /* width: 460px */
    }

    .contact-item {
      padding: 10px;
      border-bottom: 1px solid #ccc;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      /* border-radius: 5px;
      margin-bottom: 5px; */
      transition: background-color 0.3s;
    }

    .contact-item:hover {
      background-color: #f0f0f0;
    }
 
    .logo-img {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        max-height: 100px;
    }

    .asd {
        font-weight: 400;
        font-size: 36px;
    }
  </style>
@endsection

@section('content')
<div class="container" style="padding-top: 150px">
    <div class="row" >
        <div class="col-10" style="display:flex;justify-content:left;align-items:center">
            <h4 class="asd">Chat</h4>
        </div>
        <div class="col" style="display:flex;justify-content:left;align-items:center">
            {{-- <img class="logo-img" src="{{ asset('assets/images/MySpareLogs.png') }}" style="width: 180px;;"> --}}
        </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="search-box">
          <input type="text" id="searchContact" class="form-control" placeholder="Search here...">
        </div>
        <ul class="contact-list" id="contactList">
          <li class="contact-item">John Doe <span class="timestamp">12:30 PM</span></li>
          <li class="contact-item">Jane Smith <span class="timestamp">1:45 PM</span></li>
          <li class="contact-item">Mike Johnson <span class="timestamp">2:15 PM</span></li>
        </ul>
      </div>
      <div class="col-6">
        <div class="chat-container">
          <div class="chat-box" id="chatBox">
            <!-- Default chat when page loads -->
            {{-- <img class="logo-img" src="{{ asset('assets/images/MySpareLogs.png') }}" style="width: 180px; padding-top:8px;"> --}}
            <div class="message received">
              Welcome! Please select a contact to start chatting.
              <span class="timestamp">10:00 AM</span>
            </div>
          </div>
          <div class="input-containers">
            <input type="text" id="messageInput" class="form-control" placeholder="Type here">
            <button id="sendMessage"><i class="fa-regular fa-paper-plane"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection

  @section('js')
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const sendMessageButton = document.getElementById("sendMessage");
      const messageInput = document.getElementById("messageInput");
      const chatBox = document.getElementById("chatBox");
      const contactList = document.getElementById("contactList");
      const searchContact = document.getElementById("searchContact");

      // Default chat message
      const defaultChat = chatBox.querySelector(".message.received");

      // Initial chat with a selected contact
      const contacts = contactList.getElementsByClassName("contact-item");
      for (const contact of contacts) {
        contact.addEventListener("click", function() {
          const selectedContact = contact.textContent.split(" ")[0];
          defaultChat.style.display = "none";
          chatBox.innerHTML = `
            <div class="message received">Chat with ${selectedContact}</div>
          `;
        });
      }

      // Search contacts
      searchContact.addEventListener("input", function() {
        const searchTerm = searchContact.value.toLowerCase();
        for (const contact of contacts) {
          const contactName = contact.textContent.split(" ")[0].toLowerCase();
          if (contactName.includes(searchTerm)) {
            contact.style.display = "block";
          } else {
            contact.style.display = "none";
          }
        }
      });

      sendMessageButton.addEventListener("click", function() {
        const message = messageInput.value.trim();
        if (message !== "") {
          const messageElement = document.createElement("div");
          messageElement.className = "message sent";
          messageElement.innerHTML = `
            ${message}
            <span class="timestamp">${getCurrentTime()}</span>
          `;
          chatBox.appendChild(messageElement);
          messageInput.value = "";
          chatBox.scrollTop = chatBox.scrollHeight;
        }
      });

      messageInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
          sendMessageButton.click();
        }
      });

      function getCurrentTime() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes();
        const ampm = hours >= 12 ? "PM" : "AM";
        const formattedHours = hours % 12 === 0 ? 12 : hours % 12;
        const formattedMinutes = minutes < 10 ? "0" + minutes : minutes;
        return `${formattedHours}:${formattedMinutes} ${ampm}`;
      }
    });
  </script>
  @endsection
