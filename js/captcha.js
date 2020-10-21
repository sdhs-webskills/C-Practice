const code = [
    'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T',
    'U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','r','j','k','l','m','n','o','p','q', 'r','s',
    't', 'u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9'
];

const getCaptchaString = () => Array(6)
    .fill(0)
    .map(() => Math.floor(Math.random() * code.length))
    .map(index => code[index])
    .join('');

document.querySelector('#maincaptcha').value = getCaptchaString();

if(document.getElementById("maincaptcha").length < 7){
    document.getElementById("maincaptcha").empty();
}
// document.oncontextmenu = function() {return false};
// document.ondragstart = function() {return false};
// document.onselectstart = function() {return false};