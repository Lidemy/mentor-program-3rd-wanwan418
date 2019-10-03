
// // Select the Elements
// const clear = document.querySelector('.clear');
const dateElement = document.getElementById('date');
const list = document.getElementById('list');
const input = document.getElementById('input');

// Classes names
const CHECK = 'fa-check-circle';
const UNCHECK = 'fa-circle';
const LINE_THROUGH = 'lineThrough';

// // Variables
const LIST = [];

// Show todays date
const options = { weekday: 'long', month: 'short', day: 'numeric' };
const today = new Date();
dateElement.innerHTML = today.toLocaleDateString('zh-TW', options);

// add to do function
function addToDo(toDo, id, done, trash) {
  if (trash) { return; }
  const DONE = done ? CHECK : UNCHECK;
  const LINE = done ? LINE_THROUGH : '';

  const item = `<li class="item">
  <i class="far ${DONE} co" job="complete" id="${id}"></i>
  <p class="text ${LINE}">${toDo}</p>
  <i class="fas fa-trash-alt de" job="delete" id="${id}"></i>
  </li>`;

  const position = 'beforeend';
  list.insertAdjacentHTML(position, item);
}

// // add an item to the list user the enter key
document.addEventListener('keyup', (event) => {
  if (event.keyCode === 13) {
    const toDo = input.value;
    // if the input isn't empty
    if (toDo) {
      addToDo(toDo, false, false);
      LIST.push({
        name: toDo,
        done: false,
        trash: false,
      });
    }
    input.value = '';
  }
});

// complete to do
function completeToDo(element) {
  element.classList.toggle(CHECK);
  element.classList.toggle(UNCHECK);
  element.parentNode.querySelector('.text').classList.toggle(LINE_THROUGH);
  LIST[element.id].done = !LIST[element.id].done;
}

// remove to do
function removeToDo(element) {
  element.parentNode.parentNode.removeChild(element.parentNode);
  LIST[element.id].trash = true;
}

// target the items created dynamically
list.addEventListener('click', (event) => {
  const element = event.target;
  const elementJob = element.attributes.job.value;
  if (elementJob === 'complete') {
    completeToDo(element);
  } else if (elementJob === 'delete') {
    removeToDo(element);
  }
});

// const addBtn = document.querySelector('#addBtn');
// addBtn.addEventListener('click', addToDo(input.value));
