window.activeModal = {
  name: null,
  elem: null,
  toggle: function(){
    this.elem.classList.toggle('opacity-0');
    this.elem.classList.toggle('pointer-events-none');
    document.querySelector('body').classList.toggle('modal-active');
  }
};

let openModalButtons = document.querySelectorAll('.modal-open');
for (let i = 0; i < openModalButtons.length; i++) {
  let button = openModalButtons[i];
  button.addEventListener('click', function(event) {
    event.preventDefault();
    setActiveModal(button.dataset.modalName);
    window.activeModal.toggle();
  });
}

function setActiveModal(name){
  window.activeModal.name = name;
  window.activeModal.elem = document.querySelector('.modal-' + name);
}
