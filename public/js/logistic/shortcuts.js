// define a handler
function doc_keyUp(e) {
    if (e.ctrlKey && e.shiftKey && e.keyCode == 32) {
        enfocar('nav_focus')
    }
}
// register the handler 
document.addEventListener('keyup', doc_keyUp, false);