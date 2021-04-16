console.log('work');
url = location.origin + '/main/';
const $app = document.querySelector('#app');
fetch(url)
    .then((response) => {
        return response.text();
    })
    .then((data) => {
        $app.innerHTML = data;
    });