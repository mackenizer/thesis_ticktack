const webSocket = new WebSocket("ws://192.168.188.128:3000")

webSocket.onmessage = (event) => {
    handleSignallingData(JSON.parse(event.data))
}

function handleSignallingData(data){
    switch (data.type){
        case "answer":
            peerConn.setRemoteDescription(data.answer)
            break
        case "candidate":
            peerConn.addIceCandidate(data.candidate)
    }
}


let email

function sendEmail(){
    email = document.getElementById("username-input").value
    sendData({
        type: "store_user",
    })

}

function sendData(data){
    data.email = email
    webSocket.send(JSON.stringify(data))
}




function joinCall(){
    let localStream
    let peerConn
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
                type: "store_candidate",
                candidate: e.candidate
            })
        })
        createAndSendOffer()



    }, (error) => {
        console.log(error)
    })
}

function createAndSendOffer(){
    peerConn.createOffer((offer) => {
        sendData({
            type: "store-offer",
            offer: offer
        })
        peerConn.setLocalDescription(offer)
    }, (error) => {
        console.log(error)
    })
}