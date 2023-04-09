let cartAmount = document.getElementById("cartAmount");
let modalPanelOn = false;

function getCartAmount(userId) {
    console.log("getCartAmount");
    fetch('/api/cart/getCartAmount')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data = data == null ? 0 : data;
            cartAmount.innerHTML = data;
        })
        .catch(error => {
            console.error(error);
        });
}

function getCartAmountAsVisitor() {
    fetch('/api/cart/getCartAmountAsVisitor')
        .then(response => response.json())
        .then(data => {
            cartAmount.innerHTML = data;
        })
        .catch(error => {
            console.error(error);
        });
}

function displayModalPanel(imgName, message, destroyPrevious) {
    if (!modalPanelOn || destroyPrevious) {
        if (destroyPrevious && modalPanelOn)
            document.getElementsByClassName("modal-panel").item(0).remove();
        modalPanelOn = true;
        var panel = document.createElement("div");
        panel.classList.add("modal-panel");
        panel.innerHTML =
            "<img src='../img/" + imgName + "' /> <p>" + message + "</p> ";
        document.body.appendChild(panel);
        setTimeout(function () {
            panel.classList.add("slide");
        }, 200);
        setTimeout(function () {
            panel.classList.remove("slide");
            modalPanelOn = false;
        }, 2500);
        setTimeout(function () {
            panel.remove();
        }, 3000);
    }
}