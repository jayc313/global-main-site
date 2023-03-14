var fullScreenModalActivator = document.querySelectorAll('.modal-trigger'),
    fullScreenModal = document.querySelector('.md-modal');

for (let index = 0; index < fullScreenModalActivator.length; index++) {
    const element = fullScreenModalActivator[index];
    
    fullScreenModal.addEventListener('click', function(){
        fullScreenModal.classList.toggle('md-show');
    });
    
}
