<?php
include "blocks/header.php";
include_once "posts.php";
include_once "connection.php";

foreach($posts as $k) {
    if($k['id'] == $_GET['id']) $post = $k;
}
?>

    <div class="layout d-none" style="position: absolute; width: 100%; height: 100%;
   background: rgba(0,0,0,.5); z-index: 10;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <form class="save-edit" method="post" action="edit.php">
                    <h1 class="text-center old-data old-title">
                        <?php echo $post['title']; ?>
                    </h1>
                    <input name="new-title" type="text" class="d-none new-data new-title w-100 px-3">
                    <div class="d-block text-center">
                        <small><?php echo $post['date']; ?></small>
                        <small><?php echo $post['time']; ?></small>
                        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                    </div>
                    <img class="w-100 mt-3" src="<?php echo $post['img']; ?>">
                    <p class="mt-5 old-text old-data">
                        <?php echo $post['text']; ?>
                    </p>
                    <textarea name="new-text" class="d-none new-text p-3 new-data" resize="none" rows="10" style="width: 100%;"></textarea>
                </form>

                <div class="d-block text-center mt-3">
                    <button class="btn btn-warning btn-edit old-data">Редактировать</button>
                    <button class="btn btn-success btn-save d-none new-data">Сохранить</button>
                    <button class="btn-show btn btn-danger old-data">Удалить</button>
                    <button class="btn-edit-cancel btn btn-danger new-data d-none">Отмена</button>
                    <a class="btn btn-primary" href="index.php">На главную</a>
                </div>

                <div
                    class="alert alert-danger d-none"
                    role="alert"
                    style="position: absolute; top: 50%; left: 50%; width: 400px;
                    margin-left: -200px; margin-top: -84px; z-index: 20;"
                >
                    <h4 class="mb-5">Вы уверены что хотите удалить эту запись?</h4>
                    <div class="d-block text-right">
                        <a class="btn btn-danger btn-delete" href="delete.php?id=<?php echo $post['id']; ?>">Да</a>
                        <button class="btn btn-success btn-cancel">Отмена</button>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script>
        const layout = document.querySelector('.layout')
        const modal = document.querySelector('.alert')
        const showModal = document.querySelector('.btn-show')

        const btnDelete = document.querySelector('.btn-delete')
        const btnCancel = document.querySelector('.btn-cancel')
        const btnEdit = document.querySelector('.btn-edit')
        const btnSave = document.querySelector('.btn-save')
        const btnEditCancel = document.querySelector('.btn-edit-cancel')



        function hiddenLayout() {
            layout.classList.remove('d-block')
            modal.classList.remove('d-block')
        }

        showModal.addEventListener('click', () => {
            layout.classList.add('d-block')
            modal.classList.add('d-block')
        })

        layout.addEventListener('click', () => {
            hiddenLayout()
        })

        btnCancel.addEventListener('click', () => {
            hiddenLayout()
        })

        btnEdit.addEventListener('click', () => {
            const oldData = document.querySelectorAll('.old-data')
            const newData = document.querySelectorAll('.new-data')

            oldData.forEach(el => {
                el.classList.add('d-none')
            })

            newData.forEach(el => {
                el.classList.add('d-inline-block')
            })

            editTitle()
            editText()
        })

        btnEditCancel.addEventListener('click', () => {
            const oldData = document.querySelectorAll('.old-data')
            const newData = document.querySelectorAll('.new-data')

            oldData.forEach(el => {
                el.classList.remove('d-none')
            })

            newData.forEach(el => {
                el.classList.remove('d-inline-block')
            })
        })

        btnSave.addEventListener('click', () => {
            const id = document.querySelector('.post-id')
            document.querySelector('.save-edit').submit()
        })

        function editTitle() {
            const oldTitle = document.querySelector('.old-title').textContent
            const newTitle = document.querySelector('.new-title')

            newTitle.value = oldTitle.trim()
        }

        function editText() {
            const oldText = document.querySelector('.old-text').textContent
            const newText = document.querySelector('.new-text')
            console.log(oldText)
            newText.value = oldText.trim()
        }
    </script>


<?php
include "blocks/footer.php"; ?>