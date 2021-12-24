const time = document.querySelector('.time');
// const date = document.querySelector('.date');
// const r_time = document.querySelector('.r_time');
// const r_date = document.querySelector('.r_date');

if(time) {
    setInterval(() => {
      moment.locale('id');
      time.textContent = moment().format('LTS');
    //   date.textContent = '📅' + ' ' + moment().format('LL');
    //   r_time.textContent = '🕖' + ' ' + moment().format('LTS');
    //   r_date.textContent = '📅' + ' ' + moment().format('LL');
  }, 1000);
}