function attachBuyEvents(){
    const buttons = document.querySelectorAll('section#products button')
    for(const button of buttons){
        button.addEventListener('click', function() {
            console.log(this)
        })
    }   
}

attachBuyEvents()