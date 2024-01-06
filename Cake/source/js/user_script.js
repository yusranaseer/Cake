let accountBox = document.querySelector('.account-box');

document.querySelector('#user-btn').onclick = () =>{
    accountBox.classList.toggle('active');
}

window.onscroll = () =>{    
    accountBox.classList.remove('active'); 
}
