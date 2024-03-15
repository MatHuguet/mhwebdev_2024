// get submit button
const sbmtBtn = document.getElementById('user_form_submit')



function formControl() {
    let isFirstname = checkFirstname()
    let isLastname = checkLasttname()
    let isEmail = checkEmail()
    let isMessage = checkMessage()
    let isCapcha = checkCapcha()


    if (isFirstname && isLastname && isEmail && isMessage && isCapcha) {
        sbmtBtn.disabled = false
        sbmtBtn.classList.remove('submit-btn-greyed')
        sbmtBtn.classList.add('submit-btn')

    } else {
        sbmtBtn.disabled = true
        sbmtBtn.classList.remove('submit-btn')
        sbmtBtn.classList.add('submit-btn-greyed')


    }
}


function passLength() {
    let length = false
    const setPass = document.getElementById('password').value
    if (setPass.length === 0) {
        document.getElementById('error-ltr-nbr').innerHTML = ''

    } else if (setPass.length >= 0 && setPass.length < 8) {
        document.getElementById('error-ltr-nbr').color = 'red'
        document.getElementById('error-ltr-nbr').innerHTML = '&#10071 Password must be at least 8 characters'
        document.getElementById('password').classList.remove('input-success')
        length = false
        return length
    } else {
        document.getElementById('error-ltr-nbr').innerHTML = '&#9989'
        document.getElementById('password').classList.add('input-success')
        length = true
        return length

    }
}


function comparePass() {
    const setPass = document.getElementById('password').value
    const confirmPass = document.getElementById('password-confirm').value

    if (confirmPass.length === 0) {
        document.getElementById('error-display').innerHTML = ''


    } else if (confirmPass.length > 0) {


        if (setPass === confirmPass) {
            document.getElementById('error-display').innerHTML = '&#9989'
            document.getElementById('password-confirm').classList.add('input-success')

            return true
        } else {
            document.getElementById('error-display').innerHTML = 'Error, password confirmation must be the same as password'
            return false
        }
    }

}

function checkFirstname() {
    const firstName = document.getElementById('forename').value
    return firstName.length >= 2;
}

function checkLasttname() {
    const firstName = document.getElementById('surname').value
    return firstName.length >= 2;
}

function checkEmail() {
    const email = document.getElementById('email').value
    return !!email;
}

function checkMessage() {
    const messageInput = document.getElementById('message').value
    return messageInput.length >= 4
}

//-------------------------------------------------------------------------------------------------------------------------------
// CAPTCHA
// create an array with words
// store a random number
// random num select a word

//let randIndex = Math.random() define a new random num according to selected word length
// random index select a single letter in the selected word
// -> selected letter is underlined -> index + letter are store in separate variable
// write innerText the selected random word with random underlined letter
// get user input : unique letter
// compare user letter to the letter selected (underlined)
// if (isLetter) { return true }
// pass the result to the global submit check


// SELECT A RANDOM WORD
const words = [
    "concaténation",
    "indentation",
    "instancier",
    "multidimensionnel",
    "javascript",
    "constructeur",
    "développement",
    "polymorphisme"
]
let randNum = Math.floor(Math.random() * words.length)
// put the random word in a variable
let randWord = words[randNum]

// SELECT A RANDOM LETTER IN THE SELECTED WORD
// first: random number
let randNumLetter = Math.floor(Math.random() * randWord.length)
// second: random letter
let randLetter = randWord[randNumLetter];

// get capcha word displayer
const capWord = document.getElementById('cap-word')
let letters = []
for (let i = 0; i < randWord.length; i++) {
    if (i === randNumLetter) {
        letters.push('<span class="selected">' + randWord[randNumLetter] + '</span>')
    } else {
        letters.push(randWord[i])
    }
}
capWord.innerHTML = letters.join(' ')

function checkCapcha() {
    const userCapcha = document.getElementById('user-cap').value
    return userCapcha === randLetter;
}


















