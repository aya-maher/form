function get_data(id) {
    $.ajax({
        url: "select.php?id=" + id,
        type: "get",
        success: function (msg) {
//            console.log(msg);
            var data = JSON.parse(msg);
//            $("#image").val(data['image']);
//            $("#title").val(data['title']);
//            $("#price").val(data['price']);
            for (var i in data) {
//                console.log(i + " - "+ data[i]);
                $("#" + i).val(data[i]);
            }
            var id = data['id'];
            $("#form").attr("action","update.php?id="+id);
        }
    });

}