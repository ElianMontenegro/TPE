"use strict";

let BtnDeleteBlog = document.querySelectorAll('.delete');
let body = document.querySelector('body');
let containerModal = document.querySelector('.container-modal-delete');
let question = document.querySelector('.question');
let idBlogDelete = document.querySelector('.id');
let exit = document.querySelector('.exit');
let cancelBtnModal = document.querySelector('.cancel-button');
let DeleteBtnModal = document.querySelector('.delete-button');

const displayModalOn = (e) => {
    containerModal.style.display = 'flex';
    let positionScrollY  = window.scrollY;
    containerModal.style.top = `${positionScrollY}px`;
    body.style.overflow = 'hidden';
};

const displayModalOff = (e) => {
    containerModal.style.display = 'none';
    body.style.overflow = 'visible';
};

BtnDeleteBlog.forEach(fieldDelete => {
    fieldDelete.addEventListener('click', (e) => {
        let idBlog = fieldDelete.dataset.id;
        let titleBlog = fieldDelete.dataset.title;
        question.innerHTML = 'Are you sure you want to delete ' + `${titleBlog}`;
        idBlogDelete.innerHTML = 'Id: ' + `${idBlog}`;
        displayModalOn();
        DeleteBtnModal.value = idBlog;
    });
});

// Close modal

exit.addEventListener('click', (e) => {
    displayModalOff();
});


cancelBtnModal.addEventListener('click', (e) => {
    displayModalOff();
});

// edit ---------------------------
let BtnEditBlog = document.querySelectorAll('.edit');
let modalEdit = document.querySelector('.container-modal-edit');
let exitEdit = document.querySelector('.exit-edit');
let imageCurrent = document.querySelector('.image-current');
let BtnEditForm = document.querySelector('.btn-edit-form');
// inputs
let title = document.querySelector('#title');
let resume = document.querySelector('#resume');
let idCategory = document.querySelector('#idCategory');
let content = document.querySelector('#content');
let public1 = document.querySelector('#public1');
let public0 = document.querySelector('#public0');
let cover1 = document.querySelector('#cover1');
let cover0 = document.querySelector('#cover0');
let image = document.querySelector('#image');
let idUpdate = document.querySelector('.idUpdate');
//

const displayModalEditOn = (e) => {
    modalEdit.style.display = 'flex';
    let positionScrollY  = window.scrollY;
    modalEdit.style.top = `${positionScrollY}px`;
    body.style.overflow = 'hidden';
    
};

const displayModalEditOff = (e) => {
    modalEdit.style.display = 'none';
    body.style.overflow = 'visible';
};

const selectRadiusButton = (currentValue, optionOne , optionTwo) =>{
    if(currentValue == 1){
        optionOne.checked = currentValue;
    }else {
        optionTwo.checked = currentValue;
    }
}


BtnEditBlog.forEach(fieldEdit => {
    fieldEdit.addEventListener('click', (e) => {
        displayModalEditOn();  
        let idBlog = fieldEdit.dataset.id;
        let publicBlog = fieldEdit.dataset.public;
        let coverBlog = fieldEdit.dataset.cover;
        let imageBlog = fieldEdit.dataset.image;
        
        imageCurrent.src = imageCurrent.src + imageBlog;
        title.value = fieldEdit.dataset.title;
        resume.value = fieldEdit.dataset.resume;
        content.value = fieldEdit.dataset.content;
        idCategory.value = fieldEdit.dataset.idcategory;
        selectRadiusButton(coverBlog, cover1, cover0);
        selectRadiusButton(publicBlog, public1, public0);

        
        BtnEditForm.addEventListener('click', (e) => {
            console.log(image.files[0]);
            e.preventDefault();
            displayModalEditOff();
            let coverSelect = (cover1.checked ? 1 : 0)
            let publicSelect = (public1.checked ? 1 : 0)
            const blog = new FormData();
            blog.set('id' ,idBlog);
            blog.set('title' ,title.value);
            blog.set('resume' ,resume.value);
            blog.set('content' ,content.value);
            blog.set('idCategory' , idCategory.value);
            blog.set('cover' , coverSelect);
            blog.set('public' , publicSelect);
            blog.append('image' , image.files[0]);

            
            const url = "http://localhost/blogTPE/admin/updateBlog";
            fetch(url, {
                method : "POST",
                body : blog,
                processData: false,
                contentType: false,
            }).then(res => {
                console.log(res)
            })
            .catch(error => console.error('Error'))
            .then(response => {
                console.log('success')
                location.reload(); // then reload the page.(3)
            });
        });
    });
});


exitEdit.addEventListener('click', (e) => {
    displayModalEditOff();
});