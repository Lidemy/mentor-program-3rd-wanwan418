let start = 0;
let end = 0;
let time = 0;

function RandomColor() {
  const letters = '0123456789ABCDEF'.split('');
  let color = '#';
  for (let i = 0; i < 6; i += 1) {
    color += letters[Math.round(Math.random() * 15)];
  }
  return color;
}

function changeColor() {
  time = Math.floor(Math.random() * 5000);
  document.querySelector('.again').style.visibility = 'hidden';
  this.games = setTimeout(() => {
    document.querySelector('body').style.background = RandomColor();
    start = Date.now();
  }, time);
}

changeColor();

window.addEventListener('click', (e) => {
  end = Date.now();
  if (start === 0) {
    alert('還沒開始啊啊啊啊啊，手速太快了');
    clearTimeout(this.games);
    changeColor();
  } else if (start > 100) {
    alert(`你的速度是：${(end - start) / 1000}秒`);
    document.querySelector('body').style.background = 'initial';
    document.querySelector('.again').style.visibility = 'visible';
    start = 10;
  } else if (e.target.name === 'again') {
    start = 0;
    changeColor();
  } else {
    alert('按再試一次，重新開始');
  }
});
