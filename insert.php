<?php


      $image = $_POST['image'] ;
      $name = $_POST['name'] ;
      $price= $_POST['price'] ;
      $quantity = $_POST['quantity'] ;
      
            require_once './config.php';
       
             $query = "INSERT INTO `products`(`image`, `name`, `price`, `quantity`)"
                   . " VALUES ('$image', '$name', '$price' , '$quantity')";

          
              $result = mysqli_query($link, $query);
              if ($result) {
                //  echo 'done';
                 
            $select = "SELECT * FROM products ORDER BY id DESC limit 1";

            $select_result = mysqli_query($link, $select);

                         $data = mysqli_fetch_assoc($select_result);

?> 
                    <tr class="row_<?php echo $data['id']; ?>">
                        <td> <?php echo $data['image']; ?></td>  
                        <td> <?php echo $data['name']; ?></td>
                        <td> <?php echo $data['price']; ?></td>
                        <td> <?php echo $data['quantity']; ?></td> 
                        <td>
                            <a  data-id="<?php echo $data['id']; ?>" class="delete" href="delete.php?id=<?php echo $data['id'] ?>">Delete</a>
                         || <a class="edit" href="javascript:;" onclick="get_data(<?= $value['id']; ?>)">Edit</a>
                        </td>
                   </tr>
                   <?php }   ?> 
                    
