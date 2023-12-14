<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud_app</title>

    <style>
        /* Default Light Mode Styles */
        body {
            transition: background-color 0.5s ease;
            background-color: #ffffff;
            color: #000000;
        }

        /* Dark Mode Styles */
        body.dark-mode {
            background-color: #222222;
            color: #ffffff;
        }

        /* Set background color for the table in light mode */
        body:not(.dark-mode) table {
            background-color: #f0f0f0;
        }

        /* Set background color for the table in dark mode */
        body.dark-mode table {
            background-color: #333333;
        }
    </style>
</head>
<body>
    <!-- main page -->
    <div class="container p-5">
        <h2 class="text-center" style="font-weight: normal; font-size: 50px; position: relative; margin: 30px 0; text-transform: uppercase;">
            All products
            <div>
                <span style="content: ''; position: absolute; left: 50%; transform: translateX(-50%);  height: 2px; background-color: #333; bottom: -32px; width: 120px;"></span>
                <span style="content: ''; position: absolute; left: 50%; transform: translateX(-50%); width: 14px; height: 14px; border-radius: 50%; border: 2px solid #333; bottom: -38px; background-color: white;"></span>
            </div>
        </h2>
        <br>
        <br>
        <br>
        <table style="width:100%;">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">qty</th>
                    <th scope="col">action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "select * from `products`";
                $result= mysqli_query($con,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        echo ' <tr class="text-center">
                        <th scope="row">'.$id.'</th>
                        <td>'.$name.'</td>
                        <td>'.$price.'</td>
                        <td>'.$qty.'</td>
                        <td>
                        <button type="button" class="btn btn-outline-secondary button-edit"><a href="edit.php?updateid='.$id.'" >
                        <i class="bi bi-pen text-black"></a></i>
                        </button>
                        
                        <button type="button" class="btn btn-outline-danger button-edit">
                        <a class="text-danger " href="delete.php?deleteid='.$id.'">
                            <i class="bi bi-trash"></i>
                        </a>
                        </button>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
<div class="button-group" style="padding-top:15px;">
<button class="btn btn-outline-secondary"><a href='http://localhost/test/crud_project/add.php' style="text-decoration: none; color: inherit;translate: 657px;">Add product</a></button>
<button id="toggleDark" class="btn btn-outline-secondary">
    <i id="icon" class="bi bi-moon"></i>
</button>
</div>

    </div>

    <script>
        const toggle = document.getElementById('toggleDark');
const body = document.querySelector('body');
const icon = document.getElementById('icon');

toggle.addEventListener('click', function() {
    body.classList.toggle('dark-mode');
    icon.classList.toggle('bi-moon');
    icon.classList.toggle('bi-sun');
});

    </script>   
</body>
</html>
 