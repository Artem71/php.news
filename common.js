const formWrapper = document.querySelector('.form-wrapper')
const btnAdd = document.querySelector('.btn-add')
const posts = document.querySelectorAll('.post')

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
    })
})