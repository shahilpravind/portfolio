function onResponse(response) {
    console.log("Received: " + response);
}

function onError(error) {
    console.log("Error: " + error);
}

browser.browserAction.onClicked.addListener(() => {
    console.log("Sending: ping");
    var sending = browser.runtime.sendNativeMessage("connect_app", "ping");
    sending.then(onResponse, onError);
});
