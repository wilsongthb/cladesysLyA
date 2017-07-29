// define a handler
function doc_keyUp(e) {
    // console.log(e.keyCode)

    // this would test for whichever key is 40 and the ctrl key at the same time
    if (e.ctrlKey && e.shiftKey && e.keyCode == 32) {
        // console.log(e)
        // call your function to do the thing
        // pauseSound();
        // console.log('enfocar menu')
        // document.getElementById('nav_focus').focus()
        enfocar('nav_focus')
    }
}
// register the handler 
document.addEventListener('keyup', doc_keyUp, false);