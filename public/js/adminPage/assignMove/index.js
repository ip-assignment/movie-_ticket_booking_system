const urlParams = new URLSearchParams(window.location.search);
const editParam = urlParams.get('edit');
console.log("asdf")
const home = document.getElementById('home')
const edit = document.getElementById('edit')
const deleteU = document.getElementById('delete')

const homeTG = document.getElementById('homeTG')
const editTG = document.getElementById('editTG')
const deleteTG = document.getElementById('deleteTG')


if(editParam){
    
        homeTG.setAttribute('class', 'null')
        editTG.setAttribute('class', 'toggleSelected')
        
        home.setAttribute('class','areaSelected')
        edit.setAttribute('class', 'null')
       
}else{
    homeTG.setAttribute('class', 'toggleSelected')
    editTG.setAttribute('class', 'null')
   
    home.setAttribute('class','null')
    edit.setAttribute('class', 'areaSelected')
    
}

homeTG.addEventListener('click', ()=>{
    homeTG.setAttribute('class', 'toggleSelected')
    editTG.setAttribute('class', 'null')

    home.setAttribute('class','null')
    edit.setAttribute('class', 'areaSelected')
})

editTG.addEventListener('click', ()=>{
    homeTG.setAttribute('class', 'null')
    editTG.setAttribute('class', 'toggleSelected')

    
    home.setAttribute('class','areaSelected')
    edit.setAttribute('class', 'null')
   
})

deleteTG.addEventListener('click', ()=>{
    homeTG.setAttribute('class', 'null')
    editTG.setAttribute('class', 'null')

    home.setAttribute('class','areaSelected')
    edit.setAttribute('class','areaSelected')
   
})