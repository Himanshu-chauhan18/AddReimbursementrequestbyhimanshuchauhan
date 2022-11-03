function loadTable() {
    fetch('./php/read.php')
        .then((response) => response.json())
        .then((data) => {
            var tbody = document.getElementById('tbody');
            if (data['empty']) {
                tbody.innerHTML = '<tr><td colspan="6" align="center"><h3>No Record Found.</h3></td></tr>'
            } else {
                var tr = '';
                for (var i in data) {
                    tr += `<tr>
		            <td align="center">${data[i].Id}</td>
		            <td>${data[i].FirstName}</td>
		            <td>${data[i].Department}</td>
                    <td align="center"><button class="edit-btn" onclick="editRecord(${data[i].Id},'${data[i].FirstName}')">ONN</button></td>
		          </tr>`;
                }
                tbody.innerHTML = tr;
            }
        })
        .catch((error) => {
            show_message('error', "Can't Fetch Data");
        });
}
loadTable();


// Hide Modal Box / Popup Box
function hide_modal() {
    var addModal = document.getElementById("addModal");
    addModal.style.display = 'none';

    var editModal = document.getElementById("modal");
    editModal.style.display = 'none';
}



function editRecord(id, name) {
    var editModal = document.getElementById("modal");
    editModal.style.display = 'block';
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-fname').value = name;
}


//show error / success message
function show_message(type, text) {
    if (type == 'error') {
        var message_box = document.getElementById('error-message');
    } else {
        var message_box = document.getElementById('success-message');
    }
    message_box.innerHTML = text;
    message_box.style.display = "block";
    setTimeout(function() {
        message_box.style.display = "none";
    }, 3000);
}