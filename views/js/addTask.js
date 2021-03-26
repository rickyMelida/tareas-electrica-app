let form = document.querySelector("form");

form.addEventListener("submit", (event) => {
    let dataMap = new Map();
    var data = new FormData(form);
    event.preventDefault();

    for (const entry of data) {
        dataMap.set(entry[0], entry[1]);
    };

    let dataForm = Object.fromEntries(dataMap);

    $.ajax({
        url: '../../controller/users-process/add_task.php',
        type: 'post',
        data: dataForm,
        success: (res) => {
            let dataRes = JSON.parse(res);
            // (dataRes.status == "200") ? loginSuccess(dataRes.message) : errorData(dataRes.message);
            console.log(dataRes);
        }
    });
}, false);



