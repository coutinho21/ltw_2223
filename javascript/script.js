function attachBuyEvents(){
    const buttons = document.querySelectorAll('section#products button')
    const table = document.querySelector('section#cart table')
    for(const button of buttons){
        button.addEventListener('click', function() {
            const parent = this.parentElement
            const tr = document.createElement('tr')
            const id = document.createElement('td')
            const name = document.createElement('td')
            const price = document.createElement('td')
            const quantity = document.createElement('td')
            const total = document.createElement('td')
            const deleteRow = document.createElement('td')
            const totalSum = document.querySelector('section#cart table tfoot tr th:nth-child(2)')
            flag = false
            dataId = parent.getAttribute('data-id')
            for(const tr of table.querySelectorAll(':scope > tr')){
                if(tr.querySelector('td:nth-child(1)').textContent == dataId){
                    flag = true
                    tr.querySelector('td:nth-child(3)').textContent = parseInt(tr.querySelector('td:nth-child(3)').textContent) + parseInt(parent.querySelector('input').value)
                    tr.querySelector('td:nth-child(5)').textContent = parseInt(tr.querySelector('td:nth-child(4)').textContent) * parseInt(tr.querySelector('td:nth-child(3)').textContent)
                    added = parseInt(parent.querySelector('input').value) * parseInt(tr.querySelector('td:nth-child(4)').textContent)
                }
            }
            if(!flag){
                id.textContent = dataId
                name.textContent = parent.querySelector('h2').textContent
                price.textContent = parent.querySelector('p').textContent
                quantity.textContent = parent.querySelector('input').value
                total.textContent = parseInt(price.textContent) * parseInt(quantity.textContent)
                deleteRow.appendChild(document.createElement('a'))
                deleteRow.querySelector('a').textContent = '\u2715'
                deleteRow.querySelector('a').addEventListener('click', function(){
                    this.parentElement.parentElement.remove()
                    totalSum.textContent = parseInt(totalSum.textContent) - parseInt(this.parentElement.previousElementSibling.textContent)
                })
                tr.appendChild(id)
                tr.appendChild(name)
                tr.appendChild(quantity)
                tr.appendChild(price)
                tr.appendChild(total)
                tr.appendChild(deleteRow)
                table.appendChild(tr)
                added = total.textContent
            }

            totalSum.textContent = parseInt(totalSum.textContent) + parseInt(added)
        })
    }
}

attachBuyEvents()