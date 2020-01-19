<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>News</title>
</head>
<body>
    <?php include "blocks/header.php"; ?>

    <div class="container">
        <div class="row form-wrapper d-none">
            <?php include "blocks/formAddNews.php"; ?>
        </div>

        <div class="row">
            <button class="btn-add btn btn-primary mx-auto my-5">Add News</button>
        </div>

        <div class="row">
            <?php 
                include_once "./posts.php";
                for($i = 0; $i < count($posts); $i++):
            ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img 
                        src="<?php echo $posts[$i]['img']; ?>" 
                        class="card-img-top" 
                        alt="<?php echo $posts[$i]['title']; ?>"
                    >
                    <div class="card-body">
                        <p class="card-text"><?php echo $posts[$i]['text']; ?></p>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
    
     <div class="container">
        <div class="row">
            <h1>Posts length is <?php include_once "./posts.php"; count($posts); ?></h1>
        </div>
     </div>               


    <?php include "blocks/footer.php"; ?>
    <script>
        const formWrapper = document.querySelector('.form-wrapper')
        const btnAdd = document.querySelector('.btn-add')

        function addClass(target, className) {
            target.classList.add(className)
        }

        btnAdd.addEventListener('click', () => {
            addClass(formWrapper, 'd-block')
            addClass(btnAdd, 'd-none')
        })

        

    </script>
</body>
</html>