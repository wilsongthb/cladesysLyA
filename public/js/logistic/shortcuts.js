// define a handler
function doc_keyUp(e) {
    // console.log(e.keyCode)

    // this would test for whichever key is 40 and the ctrl key at the same time
    if (e.ctrlKey && e.keyCode == 113) {
        // call your function to do the thing
        // pauseSound();
        // console.log('enfocar menu')
        document.getElementById('nav_focus').focus()
    }
}
// register the handler 
document.addEventListener('keyup', doc_keyUp, false);