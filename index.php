<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านอาหาร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <style>
        .header{
            margin-top: 20px;
        }
    </style>
</head>

<body class="header"style="background-color: lightgray;">
    <div class="container" style="background-color: white;">
        <form class="row g-3 container style="background-color: white;"">
            <div class="col-md-6">
                <label for="shopName" class="form-label">ShopName</label>
                <input type="text" class="form-control" id="shopName">
            </div>
            <div class="col-md-6">
                <label for="shopName" class="form-label"></label>
                <input type="hidden" class="form-control" id="shopName">
            </div>

            <div class="col-md-4">
                <label for="idfood" class="form-label">ID</label>
                <input type="text" class="form-control" id="idfood" value="1">
            </div>
            <div class="col-4">
                <label for="namefood" class="form-label">Name</label>
                <input type="text" class="form-control" id="namefood" placeholder="">
            </div>
            <div class="col-4">
                <label for="pricefood" class="form-label">Price</label>
                <input type="number" class="form-control" id="pricefood" placeholder=" ">
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-success" id='btnAdd'>add</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn " id='btnUpdate' style="display: none;background-color: aquamarine;">Update</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-danger" id='btnClear'>delete data</button>
            </div>
        </form>

        <!--ฟอม-->
        <table id="tblAll" class="table table-striped" style="margin-top:23px">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>ShopName</th>
                    <th>FootName</th>
                    <th>price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
<script>
    $(function () {
        $('#btnAdd').on('click', function () {
            var shopName, namefood, pricefood, idfood;
            shopName = $("#shopName").val();
            idfood = $("#idfood").val();
            namefood = $("#namefood").val();
            pricefood = $("#pricefood").val();
            var edit = "<a class='edit' href='JavaScript:void(0);' >Edit</a>";
            var del = "<a class='delete' href='JavaScript:void(0);'>Delete</a>";
            if (namefood == "" || pricefood == "" || shopName == " ") {
                alert("กรุณากรอกข้อมูล!");
            } else {
                var table = "<tr><td>" + idfood + "</td><td>" + shopName + "</td><td>" + namefood + "</td><td>" + pricefood + "</td><td>" + edit + "</td><td>" + del + "</td></tr>";
                $("#tblAll").append(table);
            }
            idfood = $("#idfood").val("");
            shopName = $("#shopName").val();
            namefood = $("#namefood").val("");
            pricefood = $("#pricefood").val("");
            Clear();
        });
        $('#btnUpdate').on('click', function () {
            var shopName, namefood, pricefood, idfood;
            shopName = $("#shopName").val();
            idfood = $("#idfood").val();
            namefood = $("#namefood").val();
            pricefood = $("#pricefood").val();
            $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(0).html(idfood);
            $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(1).html(shopName);
            $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(2).html(namefood);
            $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(3).html(pricefood);
            $('#btnAdd').show();
            $('#btnUpdate').hide();
            Clear();
        });
        $("#tblAll").on("click", ".delete", function (e) {
            if (confirm("ยืนยันการลบ")) {
                $(this).closest('tr').remove();
            } else {
                e.preventDefault();
            }
        });
        $('#btnClear').on('click', function () {
            Clear();
        });
        $("#tblAll").on("click", ".edit", function (e) {
            var row = $(this).closest('tr');
            $('#hfRowIndex').val($(row).index());
            var td = $(row).find("td");
            $('#shopName').val($(td).eq(1).html());
            $('#idfood').val($(td).eq(0).html());
            $('#namefood').val($(td).eq(2).html());
            $('#pricefood').val($(td).eq(3).html());
            $('#btnAdd').hide();
            $('#btnUpdate').show();
        });
    });
    function Clear() {
        $("#shopName").val("");
        $("#idfood").val("");
        $("#namefood").val("");
        $("#pricefood").val("");
        $("#hfRowIndex").val("");
    }
</script>

</html>
