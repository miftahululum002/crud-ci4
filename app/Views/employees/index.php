<?= $this->extend('templates/master') ?>
<?= $this->section('headAdditional') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card card-body">
    <div class="table-responsive">
        <table id="table-data" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody id="table-data-detail">
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('scriptAdditional') ?>
<script>
    document.addEventListener('DOMContentLoaded', getDataVersi);
    async function getData() {
        const response = await fetch(`${site_url}/getlistemployees`);
        const data = await response.json();
        let container = document.getElementById('table-data-detail');
        let mark = '';
        data.forEach((element, index) => {
            mark = getTemplate(element, index);
            const tr = document.createElement('tr');
            container.append(tr)
            tr.innerHTML = mark;
        })
    }
    async function getDataVersi() {
        const response = await fetch(`${site_url}/getlistemployees`).then(function(response) {
            return response.json();
        }).then(function(jsonResponse) {
            // do something with jsonResponse
        });
        // const data = await response.json();
        // let container = document.getElementById('table-data-detail');
        // let mark = '';
        // data.forEach((element, index) => {
        //     mark = getTemplate(element, index);
        //     const tr = document.createElement('tr');
        //     container.append(tr)
        //     tr.innerHTML = mark;
        // })
    }

    function getTemplate(element, index) {
        let template = `
        <td>${(index + 1)}</td>
        <td>${element.name}</td>
        <td>${element.number}</td>
        <td>${element.email}</td>
        <td>${element.gender}</td>
        <td>${element.address}</td>`;
        return template;
    }

    function loadXMLDoc() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 3) {
                showLoading();
            }
            if (xmlhttp.readyState == 4) { // XMLHttpRequest.DONE == 4
                hideLoading();
                if (xmlhttp.status == 200) {
                    // document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
                    let data = JSON.parse(xmlhttp.responseText);
                    let container = document.getElementById('table-data-detail');
                    let mark = '';
                    data.forEach((element, index) => {
                        mark = getTemplate(element, index);
                        const tr = document.createElement('tr');
                        container.append(tr)
                        tr.innerHTML = mark;
                    })
                } else if (xmlhttp.status == 400) {
                    alert('There was an error 400');
                } else {
                    alert('something else other than 200 was returned');
                }
            }

        };

        xmlhttp.open("GET", `${site_url}/getlistemployees`, true);
        xmlhttp.send();
    }
</script>
<?= $this->endSection() ?>