// Color inputs :
const mainColorPicker = document.getElementById('maincolor')
const brandColorPicker = document.getElementById('brandcolor')
const doorMainColorPicker = document.getElementById('doormaincolor')
const mouluresColorPicker = document.getElementById('moulurescolor')
const bordersMouluresColorPicker = document.getElementById('bordermoulurescolors')
const poigneePicker = document.getElementById('doorpoignee')
// Elements to color
const mainColor = document.querySelectorAll('#main-color')
const secondColor = document.querySelectorAll('#second-color')
const brandColor = document.getElementById('brand-panel')
const doorMainColor = document.querySelectorAll('#door-main-color')
const doorSecondColor = document.querySelectorAll('#door-second-color')
const mouluresColor = document.querySelectorAll('#moulures')
const bordersMouluresColor = document.querySelectorAll('#borders-moulures')
const poigneeColor = document.querySelectorAll('#door-poignee')
const setSecondColorToInput = document.getElementById('getsecondcolor')
const setSecondDoorColorToInput = document.getElementById('getseconddoorcolor')



//borders-moulures
// moulures
//door-poignee
if (mainColorPicker) {
mainColorPicker.addEventListener("change", e => {
    let color = e.target.value
    let lowerColor = decrHex(color)
    for (let j = 0; j < secondColor.length; j++) {
        secondColor[j].style.fill = lowerColor
    }
    for (let i = 0; i < mainColor.length; i++) {
        mainColor[i].style.fill = color
    }
    setSecondColorToInput.setAttribute('value', lowerColor)
})
}

if (brandColorPicker) {

    brandColorPicker.addEventListener('change', e => {
        brandColor.style.fill = e.target.value
    })
}

if (doorMainColorPicker) {

    doorMainColorPicker.addEventListener('change', e => {
        let color = e.target.value
        let lowerColor = decrHex(color)
        for (let l = 0; l < doorMainColor.length; l++) {
            doorMainColor[l].style.fill = color
        }
        for (let m = 0; m < doorSecondColor.length; m++) {
            doorSecondColor[m].style.fill = lowerColor
        }
        setSecondDoorColorToInput.setAttribute('value', lowerColor)
    })
}
 
if (mouluresColorPicker) {

    mouluresColorPicker.addEventListener('change', e => {
        for (let n = 0; n < mouluresColor.length; n++) {
            mouluresColor[n].style.fill = e.target.value
        }
    })
    
    bordersMouluresColorPicker.addEventListener('change', e => {
        for (let o = 0; 0 < bordersMouluresColor.length; o++) {
            bordersMouluresColor[o].style.fill = e.target.value
        }
    })
}
 
if (poigneePicker) {

    poigneePicker.addEventListener('change', e => {
        for (let p = 0; p < poigneeColor.length; p++) {
            
            poigneeColor[p].style.fill = e.target.value
        }
    })
}
    
/*
facePicker.addEventListener('input', e => {
    console.log(e);
})

doorPicker.addEventListener("change", e => {
    mainDoor.style.fill = e.target.value
})

restName.addEventListener('keyup', e => {
    let getName = e.target.value;
    displayRestName.innerText = getName
})
*/


//-------------------------------------------------------------------------------
/* COLOR INDENT */
// find a way to :
// decrement one by one each characters of the HEX color code for the darker parts

const symbols = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f']

    function decrHex(hex) {
        // hex to array + treat :
        let toLow = hex.toLowerCase() // to lower case
        let splitHex = toLow.split('') // split char to array
        let hexArray = splitHex.splice(1) // remove hashtag symbol
        let decrHexArray = []
        for (let i = 0; i < hexArray.length; i++) {
                        
            let hexElIndex = symbols.indexOf(hexArray[i])
            if (hexElIndex >= 2) {
                let lowerIndex = hexElIndex - 2
                let newSymbol = symbols[lowerIndex]
                decrHexArray.push(newSymbol)
            } else if (hexElIndex == 1) {
                let lowerIndex = hexElIndex - 1
                let newSymbol = symbols[lowerIndex]
                decrHexArray.push(newSymbol)
            } else {
                decrHexArray.push(hexArray[i])
            }

        }
                return '#' + decrHexArray.join('')
    }



    // RESTAURANT NAME :

    const getNameInput = document.getElementById('restaurant-name');
    const restaurantNameDisplayer = document.getElementById('rest-title');
   const fontSelect = document.getElementById('font-select-input')
   const nameColorSelect = document.getElementById('restaurant-name-color')


if (getNameInput) {

    getNameInput.addEventListener('keyup', e => {
        
        restaurantNameDisplayer.textContent = e.target.value
    })
}

if (fontSelect) {

    fontSelect.addEventListener('input', e => {
        
        console.log(e.target.value);
        let font = e.target.value
        console.log(font);
        restaurantNameDisplayer.setAttribute('class', font)
    })
}
 
if (fontSelect) {

    nameColorSelect.addEventListener('change', e => {
        restaurantNameDisplayer.style.fill = e.target.value
    })
}



// display next input
    
//ENTREES
let entree1Title = document.getElementById('entree1')
let entree1Desc = document.getElementById('entree1-desc') 

let entree2Title = document.getElementById('entree2')
let entree2Desc = document.getElementById('entree2-desc')  

let entree3Title = document.getElementById('entree3')
let entree3Desc = document.getElementById('entree3-desc') 
/*
if (entree2Title) {
    entree2Title.setAttribute('disabled', true)
}
if (entree2Desc) {
    entree2Desc.setAttribute('disabled', true)
}
if (entree3Title) {
    entree3Title.setAttribute('disabled', true)
}
if (entree3Desc) {
    entree3Desc.setAttribute('disabled', true)
}
*/

function getEntree1() {
    const entree1Title = document.getElementById('entree1').value.length
    const entree1Desc = document.getElementById('entree1-desc').value.length
    if (entree1Title > 1 && entree1Desc > 1) {
        return true
    } else {
        return false
    }
}

function getEntree2() {
    const entree2Title = document.getElementById('entree2').value.length
    const entree2Desc = document.getElementById('entree2-desc').value.length
    if (entree2Title > 1 && entree2Desc > 1) {
        return true
    } else {
        return false
    }
}

function checkEntreeFields() {


    let entree1 = getEntree1()
    let entree2 = getEntree2()

/*
    if (entree1) {
        entree2Title.removeAttribute('disabled')
        entree2Desc.removeAttribute('disabled')

        if (entree2) {
            entree3Title.removeAttribute('disabled')
            entree3Desc.removeAttribute('disabled')
        }
    }
    */
}

// PLATS

let plat1Title = document.getElementById('plat1')
let plat1Desc = document.getElementById('plat1-desc') 

let plat2Title = document.getElementById('plat2')
let plat2Desc = document.getElementById('plat2-desc')  

let plat3Title = document.getElementById('plat3')
let plat3Desc = document.getElementById('plat3-desc') 
/*
if (plat2Title) {

    plat2Title.setAttribute('disabled', true)
}
if (plat2Desc) {

    plat2Desc.setAttribute('disabled', true)
}

if (plat3Title) {

    plat3Title.setAttribute('disabled', true)
}

if (plat3Desc) {
    plat3Desc.setAttribute('disabled', true)

}
*/
function getPlat1() {
    const plat1Title = document.getElementById('plat1').value.length
    const plat1Desc = document.getElementById('plat1-desc').value.length
    if (plat1Title > 1 && plat1Desc > 1) {
        return true
    } else {
        return false
    }
}

function getPlat2() {
    const plat2Title = document.getElementById('plat2').value.length
    const plat2Desc = document.getElementById('plat2-desc').value.length
    if (plat2Title > 1 && plat2Desc > 1) {
        return true
    } else {
        return false
    }
}

function checkPlatFields() {


    let plat1 = getPlat1()
    let plat2 = getPlat2()

/*
    if (plat1) {
        plat2Title.removeAttribute('disabled')
        plat2Desc.removeAttribute('disabled')

        if (plat2) {
            plat3Title.removeAttribute('disabled')
            plat3Desc.removeAttribute('disabled')
        }
    }
    */
}

// DESSERTS

let dessert1Title = document.getElementById('dessert1')
let dessert1Desc = document.getElementById('dessert1-desc') 

let dessert2Title = document.getElementById('dessert2')
let dessert2Desc = document.getElementById('dessert2-desc')  

let dessert3Title = document.getElementById('dessert3')
let dessert3Desc = document.getElementById('dessert3-desc') 
/*
if (dessert2Title) {
    dessert2Title.setAttribute('disabled', true)

}
if (dessert2Desc) {
    dessert2Desc.setAttribute('disabled', true)

}
if (dessert3Title) {
    dessert3Title.setAttribute('disabled', true)

}

if (dessert3Desc) {
    dessert3Desc.setAttribute('disabled', true)

}
*/
function getDessert1() {
    const dessert1Title = document.getElementById('dessert1').value.length
    const dessert1Desc = document.getElementById('dessert1-desc').value.length
    if (dessert1Title > 1 && dessert1Desc > 1) {
        return true
    } else {
        return false
    }
}

function getDessert2() {
    const dessert2Title = document.getElementById('dessert2').value.length
    const dessert2Desc = document.getElementById('dessert2-desc').value.length
    if (dessert2Title > 1 && dessert2Desc > 1) {
        return true
    } else {
        return false
    }
}

function checkDessertFields() {


    let dessert1 = getDessert1()
    let dessert2 = getDessert2()

/*
    if (dessert1) {
        dessert2Title.removeAttribute('disabled')
        dessert2Desc.removeAttribute('disabled')

        if (dessert2) {
            dessert3Title.removeAttribute('disabled')
            dessert3Desc.removeAttribute('disabled')
        }
    }
    */
}










                
                            
                        
        

    
 


