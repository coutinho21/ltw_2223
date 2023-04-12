function attachBuyEvents(){
    const buttons = document.querySelectorAll('section#products button')
    for(const button of buttons){
        button.addEventListener('click', function() {
            const parent = this.parentElement
            parent.classList.toggle('sale')
            console.log('ID: ' + parent.getAttribute('data-id'))
            console.log('Name: ' + parent.querySelector('h2').textContent)
            console.log('Price: ' + parent.querySelector('p').textContent)
            console.log('Quantity: ' + parent.querySelector('input').value)
        })
    }   
}

attachBuyEvents()