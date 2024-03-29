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
    
    




                
                            
                        
        

    
 


