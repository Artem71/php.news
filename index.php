<?php
include "blocks/header.php";
include "connection.php";
include_once "./posts.php";
?>

<div class="container">
    <div class="row form-wrapper d-none">
        <?php include "blocks/formAddNews.php"; ?>
    </div>

    <div class="row">
        <button class="btn-add btn btn-primary mx-auto my-5">Add News</button>
    </div>

    <?php
    if (count($posts)):
        ?>

        <div class="row">
            <?php
            for($i = 0; $i < count($posts); $i++):
                ?>


                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative w-100">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success"><?php echo $posts[$i]['time']; ?></strong>
                        <h3 class="mb-0"><?php echo $posts[$i]['title']; ?></h3>
                        <div class="mb-1 text-muted"><?php echo $posts[$i]['date']; ?></div>
                        <p class="mb-auto"><?php
                            if (strlen($posts[$i]['text']) > 200) {
                                $text = $posts[$i]['text'];
                                $text = substr($text, 0, 200) . '...';
                                echo $text;
                            } else {
                                echo $posts[$i]['text'];
                            }
                            ?></p>
                        <a href="<?php echo 'http://ailjuhe3.beget.tech/post.php?id='.$posts[$i]['id'] ?>" class="stretched-link link-more">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img
                                src="<?php echo $posts[$i]['img']; ?>"
                                class="card-img-top"
                                alt="<?php echo $posts[$i]['title']; ?>"
                        >
                    </div>
                </div>
            <?php endfor; ?>
        </div>

    <?php
    else:
        ?>

        <div>
            <h1 class="text-center">Новостей еще нет. Можете что-нибуть добавить.</h1>
        </div>

    <?php
    endif;
    ?>
</div>

<div class="container">
    <div class="row">

    </div>
</div>


<?php include "blocks/footer.php"; ?>

<script>
    const formWrapper = document.querySelector('.form-wrapper')
    const btnAdd = document.querySelector('.btn-add')
    const posts = document.querySelectorAll('.link-more')

    function addClass(target, className) {
        target.classList.add(className)
    }

    btnAdd.addEventListener('click', () => {
        addClass(formWrapper, 'd-block')
        addClass(btnAdd, 'd-none')
    })

    posts.forEach(post => {
        const self = post
        post.addEventListener('click', e => {
            const id = self.getAttribute('data-id')
            document.location.href='http://ailjuhe3.beget.tech/post.php?id='+id
        })
    })
</script>
