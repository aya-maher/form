
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <form id="form" action="" method='post'> 
                <input type="hidden" id="id" value='0' />
                <div class="form-group" >
                    <label>image</label>
                    <input type="text" class="form-control" name="image" id="image">
                </div> 
                <div class="form-group">
                    <label>title</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div> 
                <div class="form-group">
                    <label>price</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div> 
                <div class="form-group">
                    <label>quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity">
                </div> 
                <!--            <button type="submit" class="btn btn-default" name="submit">Submit</button>-->
                <input type="submit" class="btn btn-default" name="submit" value="Submit">
            </form>
            <!--            <div id="div"></div>-->
            <?php
            require_once './config.php';

            $query = "SELECT * FROM products";

            $result = mysqli_query($link, $query);

            $num_rows = mysqli_num_rows($result);

            $data = null;
            for ($i = 0; $i < $num_rows; $i++) {
                $data[] = mysqli_fetch_assoc($result);
            }
            ?>
            <h2>All products</h2>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $value) { ?>
                        <tr class="row_<?php echo $value['id']; ?>">
                            <td><?php echo $value['image']; ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['price']; ?></td>
                            <td><?php echo $value['quantity']; ?></td>
                            <td>
                                <a class="delete" data-id="<?php echo $value['id']; ?>" href="delete.php?id=<?php echo $value['id'] ?>">Delete</a>
                             || <a class="edit" href="javascript:;" onclick="get_data(<?= $value['id']; ?>)">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div id="div"></div>   
        </div>
        <script>


        </script>                    
        <script type="text/javascript">
            $(document).ready(function () {
                $("#form").submit(function (e) {
                    var id = $("#id").val();
                    if (id == 0) {
                        e.preventDefault();
                        var formData = $("#form").serialize();
                        $.ajax({
                            url: "insert.php",
                            type: "post",
                            data: formData,
                            success: function (msg) {
                                $("#image").val("");
                                $("#name").val("");
                                $("#price").val("");
                                $("#quantity").val("");
                                $("tbody").append(msg);
                            }
                        });
                    }
                });

            });
        </script> 
        <script type="text/javascript">
            $(document).on("click", ".delete", function (e) {
                e.preventDefault();
                var url = $(this).attr("href");
                var id = $(this).attr("data-id");
                var $this = $(this);
                // alert(id);
                $.ajax({
                    url: url,
                    data: {},
                    success: function (msg) {
                        // alert(msg);
                        $(".row_" + id).css("display", "none");
                    }
                });
            });
        </script>   

    </body>
</html>
