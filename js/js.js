let linked_num = document.querySelectorAll('.like_number')


let likes_btn = document.querySelectorAll('.comments-action-item .bxs-like')
let like_btn = document.querySelectorAll('.comments-action-item .bxs-like')


likes_btn.forEach((item, index) =>{
    item.addEventListener('click',function(){
        let ktNum = this.classList.toggle('tag_link')
        let linked_num2 = linked_num[index].innerHTML

            if(ktNum){
                linked_num[index].innerHTML = Number(linked_num2) + 1
                 dislike_btn[index].classList.remove('tag_link')

            } else{
                linked_num[index].innerHTML = Number(linked_num2) - 1
            }
    })
})