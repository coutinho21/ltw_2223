function changeAllArticleColors(){
    const products = document.querySelectorAll('section#products > article')
    for(const product of products){
        product.classList.add('sale')
    }
}

changeAllArticleColors()