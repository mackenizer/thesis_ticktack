const form = document.querySelector(".typing-area"),
  inputField = form.querySelector(".input-field");
sendBtn = form.querySelector("button");
chatBox = document.querySelector(".chat-box");

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
}, 500);
