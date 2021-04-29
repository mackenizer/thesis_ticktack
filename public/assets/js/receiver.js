const webSocket = new WebSocket("")

webSocket.onmessage = (event) => {
    handleSignallingData(JSON.parse(event.data))
}

function handleSignallingData(data){
    switch (data.type){
        case "offer":
            peerConn.setRemoteDescription(data.answer)
            createAndSendAnswer()
            break
        case "candidate":
            peerConn.addIceCandidate(data.candidate)
    }
}

function createAndSendAnswer(){
    peerConn.createAndSendAnswer((answer) => {
        peerConn.setLocalDescription(answer)
        sendData({
            type: "send_answer",
            answer: answer
        })
    }, error => {
        console.log(error)
    })
}



function sendData(data){
    data.email = email
    webSocket.send(JSON.stringify(data))
}




function joinCalls(){
    let localStream
    let peerConn
    let email
    email = document.getElementById("username-input").value
    document.getElementById("video-call-div").style.display = "inline"

    navigator.getUserMedia({
        video: {
            frameRate: 24,
            width: {
                min: 480, ideal: 720, max: 1280
            },
            aspectRatio: 1.33333
        },
        audio: true
    }, (stream) => {
        localStream = stream
        document.getElementById("local-video").srcObject = stream

        let configuration = {
            iceServers: {
                "urls":["stun.l.google.com:19302",
                    "stun1.l.google.com:19302",
                    "stun2.l.google.com:19302"]
            }
        }
        peerConn = new RTCPeerConnection(configuration)
        peerConn.addStream(localStream)
        peerConn.onaddstream = (e) => {
            document.getElementById("remote-video").srcObject = e.stream
        }

        peerConn.onicecandidate = ((e) => {
            if (e.candidate == null)
                return
            sendData({
                type: "send_candidate",
                candidate: e.candidate
            })
        })

        sendData({
            type: "join_call"
        })



    }, (error) => {
        console.log(error)
    })
}



